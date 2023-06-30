@extends('layouts.app')

@section('title', 'Detail Pelinggih')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('daftarpelinggih')}}">Daftar Pelinggih</a></li>
<li class="breadcrumb-item active">{{$pelinggihs->nama}}</li>
@endsection

@section('back')
<a data-mdb-ripple-duration=0 href="{{ route('daftarpura') }}" class="btn btn-primary">
    <svg class="icon">
        <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-arrow-circle-left')}}"></use>
    </svg>  Back</a>
@endsection

@section('content')
<div class="row">
    <div class="card mb-4">

        <div class="card-header">
            <strong>{{$pelinggihs->nama}}</strong>
        </div>

        <div class="card-body">
            <div class="example">

                <ul class="nav nav-tabs" role="tablist">
                    
                    <li class="nav-item">
                        <a class="nav-link active" data-coreui-toggle="tab" href="#pelinggih_" role="tab">
                            <svg class="icon me-2">
                                <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-bank')}}"></use>
                            </svg>Pelinggih
                        </a>
                    </li>
                    
                </ul>

                <div class="tab-content rounded-bottom">

                

                
                    <div class="tab-pane p-3 active preview" role="tabpanel" id="pengurus_">
                        <div class="row">
                            <div class="col">

                                <div class="mb-3">
                                    <label class="form-label" for="nama">Nama Pelinggih :</label>
                                    <input class="form-control" id="nama" name="nama" type="text" value="{{ $pelinggihs->nama }}" disabled readonly>
                                </div>
                            
                                <div class="mb-3">
                                    <label class="form-label" for="jenis">Keterangan :</label>
                                    <input class="form-control" id="jenis" name="jenis" type="text" value="{{ $pelinggihs->keterangan }}" disabled readonly>
                                </div>
                            
                                
                               
                                
                            </div>

                            <div class="vr"></div>

                            <div class="col">
                                <div id="carouselExampleControls" class="carousel slide" data-coreui-ride="carousel">
                                    <div class="carousel-inner">
                                    @foreach($fotos as $foto)
                                        @if($foto->type == "Pelinggih" && $foto->pelinggih_id == $pelinggihs->id)
                                        <div class="carousel-item {{$foto->is_thumbnail == 1 ? 'active' : ''}}">
                                            <img src="{{url('foto/pelinggih/'.$foto->foto)}}" class="d-block w-80" alt="..." style="width:100%;height:570px">
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
                                        <a data-mdb-ripple-duration=0 class="btn btn-secondary" style="width: 30%" type="button" data-coreui-dismiss="modal">Tidak</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    

                    

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
@endsection