@extends('layouts.app')

@section('title', 'Daftar Pura')

@section('breadcrumb')
<li class="breadcrumb-item active">Daftar Pura</li>
@endsection

@section('content')
<div class="row">
    <div class="card mb-4">
        <div class="card-header row">
            <strong>Daftar Pura</strong>
        </div>
        <div class="card-body row">
            <div class="tab-content rounded-bottom">
                <table id="datatable" class="table table-bordered border datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pura</th>
                            <th>Jenis Pura</th>
                            <th>Piodalan</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($puras as $pura)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$pura->nama}}</td>
                            <td>{{$pura->jenis}}</td>
                            @if(!($pura->sasih))
                                <td>{{$pura->sapta_wara}} {{$pura->panca_wara}} {{$pura->wuku}}</td>
                            @else
                                <td>Sasih {{$pura->sasih}}</td>
                            @endif
                            <td>{{$pura->alamat}}</td>
                            <td>test</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#datatable').DataTable();
    });
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
<script src="{{url('/template/vendors/jquery/js/jquery.min.js')}}"></script>
<script src="{{url('/template/vendors/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{url('/template/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('/js/datatables.js')}}"></script>
@endsection