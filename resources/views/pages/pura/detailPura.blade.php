@extends('layouts.app')

@section('title', 'Daftar Pura')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('daftarpura')}}">Daftar Pura</a></li>
<li class="breadcrumb-item active">{{$puras->nama}}</li>
@endsection

@section('content')
<div class="row">
    <div class="card mb-4">

        <div class="card-header">
            <strong>{{$puras->nama}}</strong>
        </div>

        <div class="card-body">
            <div class="example">

                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-coreui-toggle="tab" href="#pura_" role="tab">
                            <svg class="icon me-2">
                                <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-bank')}}"></use>
                            </svg>Pura
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-coreui-toggle="tab" href="#pelinggih_" role="tab">
                            <svg class="icon me-2">
                                <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-bank')}}"></use>
                            </svg>Pelinggih
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-coreui-toggle="tab" href="#pengurus_" role="tab">
                            <svg class="icon me-2">
                                <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-user')}}"></use>
                            </svg>Pengurus
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
                                        <input class="form-control" id="piodalan" name="piodalan" type="text" value="Sasih {{ $puras->sasih }}" disabled readonly>
                                    @endif
                                </div>
                            
                                <div class="mb-3">
                                    <label class="form-label" for="alamat">Alamat Pura :</label>
                                    <input class="form-control" id="alamat" name="alamat" type="text" value="{{ $puras->alamat }}" disabled readonly>
                                </div>
                                @if(!empty($penguruses->id))
                                <div class="row">
                                    
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="pemangku">Nama Pemangku :</label>
                                            <input class="form-control" id="pemangku" name="pemangku" type="text" value="-" disabled readonly>
                                        </div>

                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="notelp">No. Telp. Pemangku :</label>
                                            <input class="form-control" id="notelp" name="notelp" type="text" value="-" disabled readonly>
                                        </div>
                                     
                                    </div>
                                </div>
                                @else
                                <div class="row">
                                    @foreach($penguruses as $pengurus)
                                        @if($pengurus->sebagai == "Pemangku" && $pengurus->pura_id == $puras->id)
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="pemangku">Nama Pemangku :</label>
                                            <input class="form-control" id="pemangku" name="pemangku" type="text" value="{{ $pengurus->nama }}" disabled readonly>
                                        </div>

                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="notelp">No. Telp. Pemangku :</label>
                                            <input class="form-control" id="notelp" name="notelp" type="text" value="{{ $pengurus->telepon }}" disabled readonly>
                                        </div>
                                        
                                        @endif
                                    @endforeach
                                    </div>
                                </div>
                                @endif

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

                    <div class="tab-pane p-3 {{ Request::is('#preview-692*') ? 'active preview' : '' }}" role="tabpanel" id="pelinggih_">
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelinggih</th>
                                <th>Foto</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pelinggihs as $pelinggih)
                            <tr>
                                @if($pelinggih->pura_id == $puras->id)
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$pelinggih->nama}}</td>
                                @foreach($fotos as $foto)
                                    @if($foto->type == "Pelinggih" && $foto->pura_id == $puras->id)
                                        <td align="center"><img src="{{url('foto/pelinggih/'.$foto->foto)}}" class="d-block w-80" alt="..." style="width:50%;height:80px"></td>
                                    @endif
                                @endforeach
                                <td>{{$pelinggih->keterangan}}</td>
                                <td>test</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    </div>

                    <div class="tab-pane p-3 {{ Request::is('#preview-693*') ? 'active preview' : '' }}" role="tabpanel" id="pengurus_">
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pengurus</th>
                                <th>Sebagai</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Tahun Mulai</th>
                                <th>Tahun Berakhir</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($penguruses as $pengurus)
                            @if($pengurus->pura_id == $puras->id)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$pengurus->nama}}</td>
                                <td>{{$pengurus->sebagai}}</td>
                                <td>{{$pengurus->alamat}}</td>
                                <td>{{$pengurus->telepon}}</td>
                                <td>{{$pengurus->tahun_mulai}}</td>
                                <td>{{$pengurus->tahun_berakhir}}</td>
                                <td>{{$pengurus->status}}</td>
                                <td><button type="button" class="btn btn-primary"><span class="cil-contrast btn-icon mr-2"></span> Details</button></td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
@endsection