<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    //
     public function store(Request $request)
    {
        //
        Comment::create($request->all()); 
        return redirect()->route('home');
    }

    public function update(Request $request, Comment $comment)
    {
        //
        $comment->update($request->All());

         return redirect()->route('home');

    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //

        $comment->delete();
        return redirect()->route('home');

    }
}
