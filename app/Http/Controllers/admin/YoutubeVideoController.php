<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\YoutubeVideo;

class YoutubeVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Youtube Videos List';
        return view('admin.youtube-videos.list',['title' => $title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $title = 'Add New Youtube Videos';
        return view('admin.youtube-videos.add',['title' => $title]);
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
            'video_source' => 'required',
            'thumbnail' => 'required|image',
            'title' => 'required',
            'description' => 'nullable'
        ]);
    
        // Store the thumbnail
        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
    
        // Now, you can save other data to the database, including the path to the thumbnail
        $video = new YouTubeVideo();
        $video->video_source = $request->video_source;
        $video->title = $request->title;
        $video->description = $request->description;
        $video->thumbnail = $thumbnailPath; // Save the path to the thumbnail
        $video->status = true;
        $video->save();
    
        return redirect()->route('youtube-videos.index')->with('success', 'Video uploaded successfully!');

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
        $title = 'Edit Youtube Videos';
        return view('admin.youtube-videos.edit',['title' => $title]);
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
}
