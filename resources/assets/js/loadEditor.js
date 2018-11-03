window.onload = function(){
    $(document).ready(function(){
        let preload = $('#preload');
        $('#save').on('click', function(){
            $('#edit_form').submit();
        });

        $('.select2-multi').select2();

        let editor = CKEDITOR.replace('body');
        editor.on('loaded', ()=> preload.fadeOut());
    });
};