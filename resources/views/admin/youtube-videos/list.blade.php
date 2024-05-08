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
                <div class="card-body table-responsive">
                    <!--begin: Datatable -->
                    <table class="table table-striped table-bordered table_data dataex-html5-export dataTable no-footer" id="table_data" role="grid" aria-describedby="table_data_info">
                        <thead class="">
                            <tr>
                                <th>SI No.</th>
                                <th>Title</th>
                                <th style="width:200px;">Video Source</th>
                                <th  style="width:200px">Thumbnail</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
    
                    </table>
                    <!--end: Datatable -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('customJs')
<script>
    $(document).ready(function(){
        $("#table_data").DataTable({
            processing: true,
            type:'get',
            serverSide: true,
            destroy: true,
            sortable: true,
            pagination: true,  
            dom: 'lBfrtip', 
            lengthMenu: [
                [ 10, 25, 50, 100, 500, 1000, 1500],
                [ '10 rows', '25 rows', '50 rows', '100 rows', '500 rows', '1000 rows', '1500 rows' ]
            ],
            buttons: [
                'pageLength'
            ], 
            searchPlaceholder: "Enter search term", 
            buttons: [
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: "{{env('APP_NAME')}}",
                    exportOptions: {
                        columns: [0,1,2]
                    }
                },
                {
                    extend: 'excelHtml5',
                    footer: true,
                    title: "{{env('APP_NAME')}}",
                    exportOptions: {
                        columns: [0,1,2]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    footer: true,
                    title: "{{env('APP_NAME')}}",
                    exportOptions: {
                        columns: [0,1,2]
                    }
                },
                {
                    extend: 'print',
                    footer: true,
                    title: "{{env('APP_NAME')}}",
                    exportOptions: {
                        columns: [0,1,2]
                    }
                },
                {
                    extend: 'csv',
                    footer: true,
                    title: "{{env('APP_NAME')}}",
                    exportOptions: {
                        columns: [0,1,2]
                    }
                },
                'colvis'
            ],
            ajax: "{{route('youtube-videos.ajax-list')}}",
            
            columns: [
                { data: 'id' },
                { data: 'title' },
                { data: 'video_source' },
                { data: 'thumbnail' },
                
                { data: 'status' },
                { data: 'action' }
            ],               
        });
    });
</script>

@endsection






