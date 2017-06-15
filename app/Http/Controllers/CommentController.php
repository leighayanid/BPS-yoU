<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Thread;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
	
	/**
		create comment to thread
	**/
	public function addCommentToThread(CommentRequest $request, Thread $thread){
	
		$comment = new Comment();
		$comment->body = $request->body;
		$comment->user_id = auth()->user()->id;
		//save the comment
		$thread->comments()->save($comment);

		return back();

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Comment  $comment
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Comment $comment)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Comment  $comment
	 * @return \Illuminate\Http\Response
	 */
	public function update(CommentRequest $request, Comment $comment)
	{
		$comment->update($request->all());
		return back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Comment  $comment
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Comment $comment)
	{
		$comment->delete();
		return back();
	}
}
