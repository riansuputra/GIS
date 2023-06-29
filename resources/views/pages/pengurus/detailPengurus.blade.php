@extends('layouts.app')

@section('title', 'Daftar Pura')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('daftarpura')}}">Daftar Pura</a></li>
<li class="breadcrumb-item active">{{$penguruses->nama}}</li>
@endsection

@section('back')
<a data-mdb-ripple-duration=0 href="{{ url()->previous() }}" class="btn btn-primary">
    <svg class="icon">
        <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-arrow-circle-left')}}"></use>
    </svg>  Back</a>
@endsection

@section('content')
<div class="col-6">
    <div class="card mb-4">

        <div class="card-header">
            <strong>{{$penguruses->nama}}</strong>
        </div>

        <div class="card-body">
            <div class="example">

                <ul class="nav nav-tabs" role="tablist">
                    
                    <li class="nav-item">
                        <a class="nav-link active" data-coreui-toggle="tab" href="#pelinggih_" role="tab">
                            <svg class="icon me-2">
                                <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-user')}}"></use>
                            </svg>Pengurus
                        </a>
                    </li>
                    
                </ul>

                <div class="tab-content rounded-bottom">

                

                
                    <div class="tab-pane p-3 active preview" role="tabpanel" id="pengurus_">
                        <div class="row">
                            <div class="col">

                                <div class="mb-3">
                                    <label class="form-label" for="nama">Nama Pengurus :</label>
                                    <input class="form-control" id="nama" name="nama" type="text" value="{{ $penguruses->nama }}" disabled readonly>
                                </div>
                                <div class="row">
                                    <div class="col">

                                        <div class="mb-3">
                                            <label class="form-label" for="jenis">Sebagai :</label>
                                            <input class="form-control" id="jenis" name="jenis" type="text" value="{{ $penguruses->sebagai }}" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col">

                                        <div class="mb-3">
                                            <label class="form-label" for="jenis">Telepon :</label>
                                            <input class="form-control" id="jenis" name="jenis" type="text" value="{{ $penguruses->telepon }}" disabled readonly>
                                        </div>
                                    </div>

    
                                
                                </div>
                                <div class="row">
                                    <div class="col">

                                        <div class="mb-3">
                                            <label class="form-label" for="jenis">Tahun Mulai :</label>
                                            <input class="form-control" id="jenis" name="jenis" type="text" value="{{ $penguruses->tahun_mulai }}" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col">

                                        <div class="mb-3">
                                            <label class="form-label" for="jenis">Tahun Berakhir :</label>
                                            <input class="form-control" id="jenis" name="jenis" type="text" value="{{ $penguruses->tahun_berakhir }}" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col">

                                        <div class="mb-3">
                                            <label class="form-label" for="jenis">Status :</label>
                                            <input class="form-control" id="jenis" name="jenis" type="text" value="{{ $penguruses->status }}" disabled readonly>
                                        </div>
                                    </div>

    
                                
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="nama">Alamat :</label>
                                    <input class="form-control" id="nama" name="nama" type="text" value="{{ $penguruses->alamat }}" disabled readonly>
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