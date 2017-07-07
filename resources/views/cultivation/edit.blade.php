@extends('layout.master')


@section('content')
    <div class="login-box">
        <div class="box box-primary">
            <div class="box-header with-border" style="text-align: center;">
                <h3 class="box-title " >Ubah Nama Budidaya</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{Form::open(array('url' => 'cultivation/'.$data->id, 'method' => 'patch'))}}
            <div class="box-body">


                <div class="form-group">
                    {{Form::label('description','Nama Budidaya')}}
                    {{Form::text('description',$data->description,array('class' => 'form-control'))}}
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