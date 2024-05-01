@extends('layouts.admin-app')

@section('title', $title)

@section('customCss')
<link rel="stylesheet" href="{{url('assets/customs/css/youtube-video.css')}}">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="page_title">
                <div class="d-flex justify-content-between">
                    <div>
                        <h2>{{$title}}</h2>
                    </div>
                    <a class="btn btn-primary pt-2" href="{{route('youtube-videos.create')}}">
                        <span class="fa fa-plus"></span> Add New
                    </a>
                </div>
            </div>

            <div class="card contentCard">
            <h2>Hello</h2>
            </div>
        </div>
    </div>
</div>
@endsection