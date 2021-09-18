<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Reply;
use App\Models\Discussion;
use Illuminate\Http\Request;
use App\Notifications\NewReplyAdded;
use App\Http\Requests\CreateReplyRequest;

class RepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateReplyRequest $request, Discussion $discussion)
    {
        auth()->user()->replies()->create([
            'content' => $request->content,
            'discussion_id' => $discussion->id
        ]);

        if($discussion->user->id !== auth()->user()->id) {
            $discussion->author->notify(new NewReplyAdded($discussion));
        }

        session()->flash('success', 'Reply Added!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function like(Discussion $discussion, Reply $reply) {
        Like::create([
            'reply_id' => $reply->id,
            'user_id' => auth()->user()->id
        ]);

        session()->flash('success', 'You like the reply!');

        return redirect()->back();
    }

    public function unlike(Discussion $discussion, Reply $reply) {

        $like = Like::where('reply_id', $reply->id)->where('user_id', auth()->user()->id)->first();

        $like->delete();

        session()->flash('success', 'You unlike the reply!');

        return redirect()->back();
    }
}
