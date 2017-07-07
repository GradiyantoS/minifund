@extends('layout.master')

@section('title')
    <h1>Dashboard</h1>
@endsection

@section('content')
    @foreach($data as $d)
    <div class="col-md-3 ">
        <div class=" box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{$d['title']}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12" >
                        <image src="{{asset('storage/'.$d['image_url'])}}" width="100%;"/>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-md-12" style="text-align: center;">
                    <h5 class="box-comment">{{$d['start_at']}} - {{$d['end_at']}}</h5>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-md-12" style="text-align: center;">
                        <div class="progress progress-xs">
                            @if( $d['progress']  == 100)
                                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="{{ $d['progress'] }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $d['progress'] }}%"></div>
                            @else

                                <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="{{ $d['progress'] }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $d['progress'] }}%"></div>

                            @endif
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
                <ul class="nav nav-pills nav-stacked">
                    <li></li>
                    <li><a href="{{url('dashboard/'.$d['id'])}}">Get More Info >></a></li>
                </ul>
            </div>
            <!-- /.footer -->
        </div>
    </div>
    @endforeach
@endsection

