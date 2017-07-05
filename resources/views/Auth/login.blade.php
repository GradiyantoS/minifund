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

            <form action="../../index2.html" method="post">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-12   ">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>



        </div>
        <!-- /.login-box-body -->
    </div>
@endsection