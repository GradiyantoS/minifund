@extends('layout.master')

@section('title')
    <h1>Project</h1>
@endsection

@section('css')
    {{Html::style('plugins/datatables/dataTables.bootstrap.css')}}
@endsection
@section('content')


    <section class="content">


        <div class="box">

            @if (session()->has('message'))
                <div class="alert alert-info">{{ session()->get('message') }}</div>
            @endif
            <div class="box-header">
                {{Form::open(['url' => 'project/create', 'method' => 'GET','style'=>'width:80%;margin:auto; text-align:center'])}}
                {{ Form::submit('Tambah Project Baru', ['class' => 'btn btn-info btn-flat']) }}
                {{Form::close()}}


                {{Form::open(['id'=>'searchForm','url' => 'project', 'method' => 'GET'])}}
                <div class="input-group " style="width: 80%; margin: auto;">
                <span class="input-group-addon" >
                        {{ Form::select('timeline',[
                            '1' => 'All Project',
                            '2' => 'Pending Project',
                            '3' => 'Active Project',
                            '4' => 'Complete Project',
                        ],$status ?? 1,
                        ['onChange' =>'document.getElementById("searchForm").submit()']
                         )}}
                </span>
                <span class="input-group-addon">
                        {{ Form::label('search','Name Search')}}
                </span>
                    {{ Form::text('search','',array('class' => 'form-control'))}}
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
                        <th>Nomor Project</th>
                        <th>Nama budidaya</th>
                        <th>Nama Project</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Link Gambar</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                        <tr>
                            <td>{{$d->project_no}}</td>
                            <td>{{$d->cultivation->description}}</td>
                            <td>{{$d->title}}</td>
                            <td>{{$d->start_at}}</td>
                            <td>{{$d->end_at}}</td>
                            <td>{{$d->image_url}}</td>
                            </td>
                            <td>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-btn">
                                        {{Form::open(array('url' => 'project/'.$d->id.'/edit', 'method' => 'GET'))}}

                                        {{ Form::submit('Edit', array('class' => 'btn btn-warning btn-flat')) }}
                                        {{Form::close()}}
                                    </span>

                                    <span class="input-group-btn">
                                        {{Form::open(array('url' => 'project/'.$d->id, 'method' => 'delete'))}}

                                            {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-flat')) }}
                                        {{Form::close()}}
                                    </span>
                                </div>
                            </td>
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