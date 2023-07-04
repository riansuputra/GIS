@extends('layouts.app')

@section('title', 'Detail Pura')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('daftarpura')}}">Daftar Pura</a>
</li>
<li class="breadcrumb-item active">{{$puras->nama}}</li>
@endsection

@section('back')
<a data-mdb-ripple-duration=0 href="{{ route('index')}}" class="btn btn-primary">
    <svg class="icon">
        <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-arrow-circle-left')}}"></use>
    </svg>  Back</a>
@endsection

@section('content')
<div class="row">
    <div class="card mb-4">
        <div class="card-header row">
            <strong>{{$puras->nama}}</strong>
        </div>
        <div class="card-body row">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a href="{{ route('detailpura', ['id' => $puras->id]) }}">
                        <button class="nav-link active" data-coreui-toggle="tab" role="tab">
                            <svg class="icon me-2">
                                <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-bank')}}"></use>
                            </svg>Pura
                        </button>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('daftarlistpelinggih', ['id' => $puras->id]) }}">
                        <button class="nav-link" data-coreui-toggle="tab" role="tab">
                            <svg class="icon me-2">
                                <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-building')}}"></use>
                            </svg>Pelinggih
                        </button>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('daftarlistpengurus', ['id' => $puras->id]) }}">
                        <button class="nav-link" data-coreui-toggle="tab" role="tab">
                            <svg class="icon me-2">
                                <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-user')}}"></use>
                            </svg>Pengurus
                        </button>
                    </a>
                </li>
            </ul>
            <div class="tab-content rounded-bottom">
                <div class="tab-pane p-3 active preview" role="tabpanel" id="pura_">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="nama">Nama Pura :</label>
                                <input class="form-control" id="nama" name="nama" type="text" value="{{ $puras->nama }}" disabled readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="jenis">Jenis Pura :</label>
                                <input class="form-control" id="jenis" name="jenis" type="text" value="{{ $puras->jenis }}" disabled readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="piodalan">Piodalan Pura :</label>
                                    @if(!($puras->sasih))
                                        <input class="form-control" id="piodalan" name="piodalan" type="text" value="{{$puras->sapta_wara}} {{$puras->panca_wara}} {{$puras->wuku}}" disabled readonly>
                                    @else
                                        <input class="form-control" id="piodalan" name="piodalan" type="text" value="{{$puras->bulan}} Sasih {{ $puras->sasih }}" disabled readonly>
                                    @endif
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="alamat">Alamat Pura :</label>
                                <input class="form-control" id="alamat" name="alamat" type="text" value="{{ $puras->alamat }}" disabled readonly>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label" for="alamat">Latitude :</label>
                                    <input class="form-control" id="alamat" name="alamat" type="text" value="{{ $puras->lat }}" disabled readonly>
                                </div>
                                <div class="col">
                                    <label class="form-label" for="alamat">Longitude :</label>
                                    <input class="form-control" id="alamat" name="alamat" type="text" value="{{ $puras->lng }}" disabled readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                @foreach($penguruses as $pengurus)
                                    @if ($pengurus->pura_id == $puras->id && $pengurus->status == "Aktif")
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="pemangku">Nama Pengurus :</label>
                                                <input class="form-control" id="pemangku" name="pemangku" type="text" value="{{ $pengurus->nama }}" disabled readonly>
                                            </div>

                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="notelp">No. Telp. Pengurus :</label>
                                                <input class="form-control" id="notelp" name="notelp" type="text" value="{{ $pengurus->telepon }}" disabled readonly>
                                            </div>
                                        </div>
                                        @break
                                    @endif
                                @endforeach
                            </div>
                            @guest
                            @else
                                <div class="row">
                                    <div class="col-2" style="width:22%">
                                        <a data-mdb-ripple-duration=0 href="{{ route('editpura', ['id' => $puras->id]) }}" type="button" class="btn btn-primary" style="display: inline-flex; align-items: flex-end; ">
                                            <svg class="icon me-2" style="width: 25; height: 25;">
                                                <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-pencil')}}"></use>
                                            </svg> Edit Pura
                                        </a>
                                    </div>
                                    <div class="col-2" style="width:22%">
                                        <a data-mdb-ripple-duration=0 type="button" data-id="{{ $puras->id }}" class="btn btn-danger text-light" data-mdb-toggle="modal" data-mdb-target="#staticBackdropLive{{ $puras->id }}" title="Hapus Pura" style="display: inline-flex; align-items: flex-end;">
                                            <svg class="icon me-2" style="width: 25; height: 25;">
                                                <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-trash')}}"></use>
                                            </svg> Hapus Pura
                                            
                                        </a>
                                    </div>
                                </div>
                            @endguest
                        </div>
                        <div class="vr"></div>
                        <div class="col">
                            <div id="carouselExampleControls" class="carousel slide" data-coreui-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($fotos as $foto)
                                        @if($foto->type == "Pura" && $foto->pura_id == $puras->id)
                                            <div class="carousel-item {{$foto->is_thumbnail == 1 ? 'active' : ''}}">
                                                <img src="{{url('foto/pura/'.$foto->foto)}}" class="d-block w-80" alt="..." style="width:100%;height:570px">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                    <button class="carousel-control-prev" type="button" data-coreui-target="#carouselExampleControls" data-coreui-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-coreui-target="#carouselExampleControls" data-coreui-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="staticBackdropLive{{ $puras->id }}" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel{{ $puras->id }}" aria-hidden="true">
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
                                <form action="{{ route('deletepura', ['id' => $puras->id]) }}" method="POST" id="deleteForm">
                                    @csrf
                                    @method('DELETE')
                                    <button data-mdb-ripple-duration=0 type="submit" style="width: " class="btn btn-dark">Ya</button>
                                </form>
                                <a data-mdb-ripple-duration=0 class="btn btn-secondary" style="width: 30%" type="button" data-coreui-dismiss="modal">Tidak</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#datatable').DataTable();
    });
    $(document).ready(function() {
        // Event listener for delete button click
        $('.btn-dark').click(function() {
        var id = $(this).data('id');
            $('#deleteForm').attr( id + '/deletepura');
        });
    });
</script>
<script src="{{url('/template/vendors/jquery/js/jquery.min.js')}}"></script>
<script src="{{url('/template/vendors/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{url('/template/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('/js/datatables.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
@endsection