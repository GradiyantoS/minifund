@extends('layout.master')

@section('title')
    <h1>Detail</h1>
@endsection

@section('content')
    <div class="col-md-3 ">
        <div class=" box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{$data->title}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12" >
                        <image src="{{asset('storage/'.$data->image_url)}}" width="100%;"/>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-md-12" style="text-align: center;">
                        <h5 class="box-comment">{{$data->start_at}} - {{$data->end_at}}</h5>
                    </div>
                    <!-- /.col -->
                </div>

                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
    </div>
@endsection