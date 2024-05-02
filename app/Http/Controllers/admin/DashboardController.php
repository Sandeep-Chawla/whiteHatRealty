<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $title = 'Dashboard Page';
        return view('admin/dashboard',['title' => $title]);
    }

    public function comingSoon(){
        return view('comingsoon');
    }

    public function loadVideo(Request $request){
        $videos = YoutubeVideo::paginate(3);
        return response()->json([
            'status' => true,
            'data'   => $videos,
            'message'=> 'Data loaded.'
        ],200);
    }
}