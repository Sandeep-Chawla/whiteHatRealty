<?php

namespace App\Http\Controllers\admin;
use App\Models\admin\YoutubeVideo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $title = 'Dashboard Page';
        return view('admin/dashboard',['title' => $title]);
    }

    public function comingSoon(){
        $videos = YoutubeVideo::get();
        return view('comingsoon',compact('videos'));
    }
}