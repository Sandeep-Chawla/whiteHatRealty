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
                    <a class="btn btn-primary pt-2" href="{{route('youtube-videos.index')}}">
                        <span class="fa fa-bars"></span> All list
                    </a>
                </div>
            </div>

            <div class="card contentCard">
            <div class="card-body">
                <div class="col-md-6">
                <form method="POST" action="{{route('youtube-videos.update')}}" enctype="multipart/form-data">
                        @csrf
                        <input name="id" value="{{request()->route('id')}}" type="hidden">
                        <div class="form-group">
                            <label for="thumbnail">Video Thumbnail:</label>
                            <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail" placeholder="Thumbnail">
                            
                        </div>
                        <div class="form-group">
                            <label for="source">Video Source:</label>
                            <input type="text" class="form-control @error('video_source') is-invalid @enderror" value="{{$video->video_source}}" name="video_source" placeholder="Video Source">
                        </div>
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{$video->title}}" name="title" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="description">Video Description:</label>
                            <textarea name="description" rows="5" id="" class="form-control @error('description') is-invalid @enderror">
                                {{$video->description}}
                            </textarea>
                        </div><br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection