<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class CommentsController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => 'store']);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
        $request->validate([
            "name" =>"required|max:199",
            "email" =>"required|max:199",
            "comment"=>"required|min:5|max:2000"
        ]);

        $post = Post::find($post_id);
        $comment = new Comment;
        $comment->name = $request->name;
        $comment->email=$request->email;
        $comment->comment=$request->comment;
        $comment->post()->associate($post);
        $comment->save();
        return redirect()->route('blog.single', $post->slug)->withSuccess('Comment was added');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comments.edit')->withComment($comment);
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
        $request->validate([
            "comment" => "required|min:5|max:2000"
        ]);
        $comment = Comment::find($id);
        $comment->comment = $request->comment;
        $comment->save();
        return redirect()->route('posts.show', $comment->post->id)->withSuccess('Comment Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);

        $post_id = $comment->post->id;
        $comment->delete();
        return redirect()->route('posts.show', $post_id)->withSuccess('Comment deleted');
    }
}
