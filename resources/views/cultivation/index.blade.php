@extends('layout.master')

@section('title')
    <h1>Cultivation</h1>
@endsection

@section('css')
    {{Html::style('plugins/datatables/dataTables.bootstrap.css')}}
@endsection
@section('content')


    <section class="content">
        @if (session()->has('message'))
            <div class="alert alert-info">{{ session()->get('message') }}</div>
        @endif
        <div class="box">
            <div class="box-header" >
                @if(Auth()->user()->role_id == 1)
                {{Form::open(['url' => 'cultivation/create', 'method' => 'GET','style'=>'width:80%;margin:auto; text-align:center'])}}
                    {{ Form::submit('Tambah Budidaya Baru', ['class' => 'btn btn-info btn-flat']) }}
                {{Form::close()}}

                @endif


                    {{Form::open(array('url' => 'cultivation/', 'method' => 'GET'))}}
                    <div class="input-group " style="width: 80%; margin: auto;">
                <span class="input-group-addon">
                        {{ Form::label('search','Name Search')}}
                </span>
                        {{ Form::text('search','',['class' => 'form-control'])}}
                        <span class="input-group-btn">
                        {{ Form::submit('search', array('class' => 'btn btn-info btn-flat')) }}
                </span>
                    </div>
                    {{Form::close()}}
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Jenis Budidaya</th>
                        @if(Auth()->user()->role_id == 1)
                            <th>Action</th>
                        @endif

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                        <tr>
                            <td>{{$d->description}}</td>
                            </td>

                            @if(Auth()->user()->role_id == 1)
                                <td>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-btn">
                                            {{Form::open(array('url' => 'cultivation/'.$d->id.'/edit', 'method' => 'GET'))}}
                                                {{ Form::submit('Edit', array('class' => 'btn btn-warning btn-flat')) }}
                                            {{Form::close()}}
                                        </span>

                                        <span class="input-group-btn">
                                            {{Form::open(array('url' => 'cultivation/'.$d->id, 'method' => 'delete'))}}

                                                {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-flat')) }}
                                            {{Form::close()}}
                                        </span>
                                    </div>

                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            {{$data->links()}}
        </div>

    </section>

@endsection


@section('js')
    {{Html::script('plugins/datatables/jquery.dataTables.min.js')}}
    {{Html::script('plugins/datatables/dataTables.bootstrap.min.js')}}
    <script>
        $(function () {
            $("#example1").DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": false,
                "autoWidth": true
            });
        });
    </script>
@endsection