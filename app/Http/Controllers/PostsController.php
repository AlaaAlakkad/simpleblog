<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title"       => "required|max:255",
            "slug"        => "required|alpha_dash|min:5|max:255|unique:posts,slug",
            "category_id" => "required|integer", //prevent spoofing
            "body"        => "required"
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->slug  = $request->slug;
        $post->category_id = $request->category_id;
        $post->body  = clean($request->body);
        $post->save();
        // we sync after we save the post we use the sync function, second param to prevent overriting existing values.
        // note that we call tags() as a function not as a property.
        $post->tags()->sync($request->tags, false);

        return redirect()->route('posts.show', $post->id)->withSuccess('Your Post was saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        $values = $post->tags()->allRelatedIds();
        return view('posts.edit')->withPost($post)->withCategories($categories)->withTags($tags)->withValues($values);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if($request->slug != $post->slug)
        {
            $request->validate([
                "title" => "required|max:255",
                "slug"  => "required|alpha_dash|min:5|max:255|unique:posts,slug",
                "category_id"=>"required|integer",
                "body" => "required"
            ]);
        }else{
            $request->validate([
                "title" => "required|max:255",
                "slug"  => "required|alpha_dash|min:5|max:255",
                "category_id"=>"required|integer",
                "body" => "required"
            ]);
        }

        $post->title = $request->title;
        $post->slug  = $request->slug;
        $post->category_id = $request->category_id;
        $post->body  = clean($request->body);

        $post->save();

        if(isset($request->tags)){
            $post->tags()->sync($request->tags);
        }else{
            $post->tags()->sync([]);
        }
        return redirect()->route('posts.show', $post->id)->withSuccess("Your post was editted succesfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        // detach to clean up pivot table
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('posts.index')->withSuccess("Deleted Successfully");
    }
}
