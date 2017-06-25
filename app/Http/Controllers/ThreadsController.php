<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Http\Requests\ThreadRequest;

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
       $colleges = ['In General','College of Information and Communication Technology', 'College of Engineering and Architecture', 'College of Nursing and Midwifery', 'College of Industrial Technology', 'College of Business Administration','College of Technical Vocational Technology', 'College of Education', 'College of Agriculture'];
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
        $thread->delete();
        return redirect('threads');
    }
}
