<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Http\Requests\ThreadRequest;
use App\College;
use App\Vote;
use App\Comment;
use App\Like;

class ThreadsController extends Controller
{

    public function __construct(){
        return $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $s = $request->input('search');
        $threads = Thread::latest()
            ->search($s)->paginate(20);
        return view('threads.index', compact('threads', 's'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $colleges = College::all();
       return view('threads.create', compact('colleges'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThreadRequest $request)
    {
        $input = $request->all();
        auth()->user()->threads()->create($input);
        return redirect('threads')->withMessage('Thread created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thread = Thread::findOrFail($id);
        return view('threads.show')->with('thread',$thread);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        $this->authorize('update', $thread);
        return view('threads.edit')->with('thread', $thread);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ThreadRequest $request, Thread $thread)
    {
       $this->authorize('update', $thread); 
       $thread->update($request->all());
       return redirect()->route('threads.show', $thread->id)->withMessage("Thread updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //check if user is authorized to delete the thread first
        $this->authorize('delete', $thread);

        //delete thread
        $thread->delete();

        // find comments in the thread.
        $comments = Comment::where('commentable_id', $thread->id);

        // delete the comments
        $comments->delete();

        // find upvotes in the thread
        $votes = Vote::where('votable_id', $thread->id);
        
        // delete the upvotes
        $votes->delete();
        /*
            TODO
            // find likes for the thread's comment
            //delete the likes for the thread's comment
        */ 
        return redirect('threads');
    }

}
