<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;

class postcontroller extends Controller
{      

    public function deletepost(Post $post) {
        if (auth()->user()->id === $post['user_id']) {
          $post->delete();
        }
        return redirect('/');
    }
    public function actuallyupdatepost(Post $post, Request $request) {
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }

        $incomingfields = $request->validate([
          'title' => 'required',
          'body'  => 'required'
        ]);
        $incomingfields['title'] = strip_tags($incomingfields['title']);
        $incomingfields['body'] = strip_tags($incomingfields['body']);

        $post->update($incomingfields);
        return redirect('/');
    }
    public function showeditscreen(Post $post){
        if(auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }
     return view('edit-post', ['post' => $post]);
    }
   
    public function createpost(request $request){
        $incomingfields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingfields['title'] = strip_tags($incomingfields['title']);
        $incomingfields['body'] = strip_tags($incomingfields['body']);
        $incomingfields['user_id'] = auth()->id();
        Post::create($incomingfields);
        
        return redirect('/');

    }
}
