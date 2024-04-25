@extends('layouts.admin-app')

@section('title', $title)

@section('customCss')
<link rel="stylesheet" href="{{url('assets/customs/css/dashboard.css')}}">
@endsection

@section('content')
<div class="container">
    <p class="page-intro">
        Dashboard
    </p>
    <div class="row">
        <div class="col-4 mb-4">
            <div class="card card1">
                <div class="card-body">
                    <p>Total Users</p>
                    <h4>24</h4>

                </div>
            </div>
        </div>
        <div class="col-4 mb-4">
            <div class="card card2">
                <div class="card-body">
                    <p>Total Users</p>
                    <h4>24</h4>
                </div>
            </div>
        </div>
        <div class="col-4 mb-4">
            <div class="card card3">
                <div class="card-body">
                    <p>Total Users</p>
                    <h4>24</h4>
                </div>
            </div>
        </div>
        <div class="col-4 mb-4">
            <div class="card card4">
                <div class="card-body">
                    <p>Total Users</p>
                    <h4>24</h4>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="row">
            <div class="col-6"></div>
            <div class="col-6"></div>
        </div>
    </section>
    <section>
        <div class="row">
            <div class="col-12">
                <p></p>
            </div>
        </div>
    </section>
</div>
@endsection