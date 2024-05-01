@extends('layouts.admin-app')

@section('title', $title)

@section('customCss')
<link rel="stylesheet" href="{{url('assets/customs/css/dashboard.css')}}">
@endsection

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Dashboard</h2>
            </div>
        </div>
    </div>
    <div class="row">

    </div>
</div>
@endsection