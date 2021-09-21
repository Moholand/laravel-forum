<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CreateChannelRequest;

class ChannelsController extends Controller
{

    public function __construct() 
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('channels.index', [
            'channels' => Channel::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('channels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateChannelRequest $request)
    {
        Channel::create([
            'name' => $request->channel,
            'slug' => Str::slug($request->channel)
        ]);

        session()->flash('success', 'Channel Created Successfully');

        return redirect(route('channels.index'));
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
    public function edit(Channel $channel)
    {
        return view('channels.create', [
            'channel' => $channel
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateChannelRequest $request, Channel $channel)
    {
        $channel->update([
            'name' => $request->channel,
            'slug' => Str::slug($request->channel)
        ]);

        session()->flash('success', 'Channel Updated Successfully');

        return redirect(route('channels.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Channel $channel)
    {
        $channel->delete();

        session()->flash('success', 'Channel Deleted Successfully');

        return redirect(route('channels.index'));
    }
}
