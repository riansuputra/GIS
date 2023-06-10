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
                            <th style="text-align: center">No</th>
                            <th>Nama Pura</th>
                            <th>Jenis Pura</th>
                            <th>Piodalan</th>
                            <th>Alamat</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($puras as $pura)
                        <tr class="align-middle">
                            <td style="width:5%; text-align: center">{{ $loop->iteration }}</td>
                            <td>{{$pura->nama}}</td>
                            <td>{{$pura->jenis}}</td>
                            @if(!($pura->sasih))
                                <td>{{$pura->sapta_wara}} {{$pura->panca_wara}} {{$pura->wuku}}</td>
                            @else
                                <td>Sasih {{$pura->sasih}}</td>
                            @endif
                            <td>{{$pura->alamat}}</td>
                            <td style="width:10%; text-align: center">
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <a data-mdb-ripple-duration=0 class="btn btn-success" href="/{{$pura->id}}/detailpura">
                                        <svg class="icon">
                                            <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass')}}"></use>
                                        </svg>
                                    </a>
                                    <a data-mdb-ripple-duration=0 class="btn btn-info" href="/{{$pura->id}}/editpura">
                                        <svg class="icon">
                                            <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-pencil')}}"></use>
                                        </svg>
                                    </a>
                                    <a data-mdb-ripple-duration=0 data-coreui-toggle="modal" data-coreui-target="#staticBackdropLive" class="btn btn-danger" >
                                        <svg class="icon">
                                            <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-trash')}}"></use>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <div class="modal fade" id="staticBackdropLive" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" style="width:20%;">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                        <h5 class="modal-title w-100" id="exampleModalCenterTitle">Info</h5>
                                        <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <p style="margin-bottom: 0">Apakah anda yakin ingin menghapus pura?</p>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <a data-mdb-ripple-duration=0 href="" class="btn btn-primary" style="width: 30%" type="button">Ya</a>
                                        <a data-mdb-ripple-duration=0 class="btn btn-secondary" style="width: 30%" type="button" data-coreui-dismiss="modal">Tidak</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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