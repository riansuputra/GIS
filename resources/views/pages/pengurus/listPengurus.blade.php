@extends('layouts.app')

@section('title', 'Daftar Pengurus')

@section('breadcrumb')
<li class="breadcrumb-item active">Daftar Pengurus</li>
@endsection

@section('content')
<div class="row">
    <div class="card mb-4">
        <div class="card-header row">
            @foreach($puraid as $pura_id)
                <strong>{{$pura_id->nama}}</strong>
            </div>
        <div class="card-body row">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="/{{$pura_id->id}}/detailpura">
                            <button class="nav-link" data-coreui-toggle="tab" role="tab">
                                <svg class="icon me-2">
                                    <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-bank')}}"></use>
                                </svg>Pura
                            </button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/{{$pura_id->id}}/daftarpelinggih">
                            <button class="nav-link" data-coreui-toggle="tab" role="tab">
                                <svg class="icon me-2">
                                    <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-building')}}"></use>
                                </svg>Pelinggih
                            </button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/{{$pura_id->id}}/daftarpengurus">
                            <button class="nav-link active" data-coreui-toggle="tab" role="tab">
                                <svg class="icon me-2">
                                    <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-user')}}"></use>
                                </svg>Pengurus
                            </button>
                        </a>
                    </li>
                </ul>
            @endforeach
            <div class="tab-content rounded-bottom">
                <div class="tab-pane p-3 active show" role="tabpanel" id="pengurus_">
                    <table id="datatable" class="table table-bordered border datatable">
                    <thead>
                        <tr>
                            <th style="text-align: center">No</th>
                            <th>Nama</th>
                            <th>Sebagai</th>
                            <th>Telepon</th>
                            <th style="text-align: center">Status</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php    
                            $count = 1;
                        @endphp
                        @foreach($penguruses as $pengurus)
                        @if($pengurus->status == 'Aktif')
                        <tr class="align-middle">
                            <td style="width:5%; text-align: center">{{ $count }}</td>
                            @php
                                $count++;
                            @endphp
                            <td style="width:30%;">{{$pengurus->nama}}</td>
                            <td style="width:15%;">{{$pengurus->sebagai}}</td>
                            <td style="width:20%;">{{$pengurus->telepon}}</td>
                            <td style="width:5%; text-align: center">
                                @if($pengurus->status == 'Aktif')
                                    <span class="badge text-light text-bg-success">{{$pengurus->status}}</span>
                                @else
                                    <span class="badge text-bg-dark">{{$pengurus->status}}</span>
                                @endif
                            </td>
                            <td style="width:10%; text-align: center">
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <a data-mdb-ripple-duration=0 class="btn btn-success" href="/{{$pengurus->id}}/detailpengurus">
                                        <svg class="icon">
                                            <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass')}}"></use>
                                        </svg>
                                    </a>
                                    <a data-mdb-ripple-duration=0 class="btn btn-info" href="/{{$pengurus->pura_id}}/{{$pengurus->id}}/editpengurus">
                                        <svg class="icon">
                                            <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-pencil')}}"></use>
                                        </svg>
                                    </a>
                                    <a data-mdb-ripple-duration=0 href="/{{$pengurus->pura_id}}/{{$pengurus->id}}/deletepengurus" class="btn btn-danger" >
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
                                        <p style="margin-bottom: 0">Apakah anda yakin ingin menghapus pengurus?</p>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <a data-mdb-ripple-duration=0 href="/{{$pengurus->pura_id}}/{{$pengurus->id}}/deletepengurus" class="btn btn-primary" style="width: 30%" type="button">Ya</a>
                                        <a data-mdb-ripple-duration=0 class="btn btn-secondary" style="width: 30%" type="button" data-coreui-dismiss="modal">Tidak</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#datatable').DataTable();
    });
</script>
<script type="text/javascript">
    $('#pura_id').on('change', function() {
        var id = this.value;
        window.location.href = "http://localhost:8000/" + id + "/daftarpengurus"
        // window.location.href = "htpp://gis-leaflet-rian.azurewebsites.net" + id + "/daftarpengurus"
    });
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>

<script src="{{url('/template/vendors/jquery/js/jquery.min.js')}}"></script>
<script src="{{url('/template/vendors/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{url('/template/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('/js/datatables.js')}}"></script>
@endsection