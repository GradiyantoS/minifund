@extends('layout.master')


@section('content')
    <div class="login-box">
        <div class="box box-primary">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger"> {{ $error }} </div>
            @endforeach

            <div class="box-header with-border" style="text-align: center;">
                <h3 class="box-title " >Add new Project</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{Form::open(array('url' => 'project', 'method' => 'POST','enctype'=>'multipart/form-data'))}}
                <div class="box-body">

                    <div class="form-group">
                        {{Form::label('cultivation_id','Nama Budidaya')}}

                        {{Form::select('cultivation_id',
                            $list

                        ,
                        null,array('class' =>'form-control select2 select2-hidden-accessible'))}}
                    </div>
                    <div class="form-group">
                        {{Form::label('title','Nama Proyek')}}
                        {{Form::text('title','',array('class' => 'form-control'))}}
                    </div>
                    <div class="form-group">
                        {{Form::label('start_at','Tanggal Mulai')}}

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            {{Form::date('start_at', \Carbon\Carbon::now(),array('class' => 'form-control'))}}
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        {{Form::label('end_at','Tanggal Selesai')}}

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            {{Form::date('end_at', \Carbon\Carbon::now(),array('class' => 'form-control'))}}
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        {{Form::label('image_url','Lokasi Gambar')}}
                        {{Form::file('image_url', array('class' =>'form-control', 'accept'=>',image/jpg,image/jpeg,image/png'))}}
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    {{Form::submit('Save',['class'=> 'btn btn-primary'])}}
                </div>
            {{Form::close()}}
        </div>

    </div>
@endsection