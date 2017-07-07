@extends('layout.master')


@section('content')
    @if($errors->all())


    @endif
    <div class="login-box">

        <div class="box box-primary">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger"> {{ $error }} </div>
            @endforeach
            <div class="box-header with-border" style="text-align: center;">
                <h3 class="box-title " >Tambahkan Budidaya Baru</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            {{Form::open(array('url' => 'cultivation', 'method' => 'POST'))}}
            <div class="box-body">


                <div class="form-group">
                    {{Form::label('description','Nama Budidaya')}}
                    {{Form::text('description','',array('class' => 'form-control'))}}
                </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer" style="text-align: center;">
                {{Form::submit('Save',['class'=> 'btn btn-primary'])}}
            </div>
            {{Form::close()}}
        </div>
    </div>
@endsection