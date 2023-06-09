@extends('layouts.app')

@section('title', 'Daftar Pura')

@section('breadcrumb')
<li class="breadcrumb-item active">Daftar Pura</li>
@endsection

@section('back')
<a data-mdb-ripple-duration=0 href="{{ route('index') }}" class="btn btn-primary">
    <svg class="icon">
        <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-arrow-circle-left')}}"></use>
    </svg>  Back</a>
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
                                <td>{{$pura->bulan}} Sasih {{$pura->sasih}}</td>
                            @endif
                            <td>{{$pura->alamat}}</td>
                            <td style="width:10%; text-align: center">
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <a data-mdb-ripple-duration=0 class="btn btn-secondary" href="{{ route('detailpura', ['id' => $pura->id]) }}" title="Detail Pura">
                                        <svg class="icon">
                                            <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-library-building')}}"></use>
                                        </svg>
                                    </a>
                                    <a data-mdb-ripple-duration=0 class="btn btn-success" href="{{ route('daftarlistpelinggih', ['id' => $pura->id]) }}" title="Daftar Pelinggih">
                                        <svg class="icon">
                                            <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-building')}}"></use>
                                        </svg>
                                    </a>
                                    <a data-mdb-ripple-duration=0 class="btn btn-warning" href="{{ route('daftarlistpengurus', ['id' => $pura->id]) }}" title="Daftar Pengurus">
                                        <svg class="icon">
                                            <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-people')}}"></use>
                                        </svg>
                                    </a>
                                    <a data-mdb-ripple-duration=0 class="btn btn-info" href="{{ route('editpura', ['id' => $pura->id]) }}" title="Edit Pura">
                                        <svg class="icon">
                                            <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-pencil')}}"></use>
                                        </svg>
                                    </a>
                                    <a data-mdb-ripple-duration=0 type="button" data-id="{{ $pura->id }}" class="btn btn-danger" data-mdb-toggle="modal" data-mdb-target="#staticBackdropLive{{ $pura->id }}" title="Hapus Pura">
                                        <svg class="icon">
                                            <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-trash')}}"></use>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <div class="modal fade" id="staticBackdropLive{{ $pura->id }}" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel{{ $pura->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" style="width:20%;">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                        <h5 class="modal-title w-100" id="staticBackdropLive">Info</h5>
                                        <button class="btn-close" type="button" data-mdb-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <p style="margin-bottom: 0">Apakah anda yakin ingin menghapus pura?</p>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <form action="{{ route('deletepura', ['id' => $pura->id]) }}" method="POST" id="deleteForm">
                                            @csrf
                                            @method('DELETE')
                                            <button data-mdb-ripple-duration=0 type="submit" style="width: 30%" class="btn btn-dark">Ya</button>
                                        </form>
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
    <script>
    $(document).ready(function() {
        // Event listener for delete button click
        $('.btn-dark').click(function() {
        var id = $(this).data('id');
            $('#deleteForm').attr('action', id + '/deletepura');
        });
    });
</script>
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
<script src="{{url('/template/vendors/jquery/js/jquery.min.js')}}"></script>
<script src="{{url('/template/vendors/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{url('/template/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('/js/datatables.js')}}"></script>
@endsection