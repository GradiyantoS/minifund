@extends('layout.master')

@section('title')
    <h1>Login Area</h1>
@endsection
@section('content')

    <div class="login-box">
        <div class="login-logo">
            <b>mini</b>Fund
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            {{$data}}
            {{Form::open(array('url' => 'login/', 'method' => 'POST'))}}
                <div class="form-group has-feedback">
                    {{Form::email('email','',array('class'=>'form-control','placeholder'=>'email'))}}
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    {{Form::password('password',array('class'=>'form-control','placeholder'=>'password'))}}
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-12   ">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            {{Form::close()}}



        </div>
        <!-- /.login-box-body -->
    </div>
@endsection