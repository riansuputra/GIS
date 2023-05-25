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
                        <a class="nav-link active" data-coreui-toggle="tab" href="#preview-691" role="tab">
                            <svg class="icon me-2">
                                <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-bank')}}"></use>
                            </svg>Pura
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-coreui-toggle="tab" href="#preview-692" role="tab">
                            <svg class="icon me-2">
                                <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-bank')}}"></use>
                            </svg>Pelinggih
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-coreui-toggle="tab" href="#preview-693" role="tab">
                            <svg class="icon me-2">
                                <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-user')}}"></use>
                            </svg>Pengurus
                        </a>
                    </li>
                </ul>

                <div class="tab-content rounded-bottom">
                    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-691">
                        <div class="row">

                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="nama">Nama Pura :</label>
                                    <input class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" type="text" placeholder="Nama Pura" value="{{ old('nama') }}">
                                    @if ($errors->has('nama'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('nama') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="vr"></div>

                            <div class="col">
                                <div id="carouselExampleControls" class="carousel slide" data-coreui-ride="carousel">
                                    <div class="carousel-inner">
                                    @foreach($fotos as $foto)
                                        @if($foto->type == "Pura" && $foto->pura_id == $puras->id)
                                        <div class="carousel-item {{$foto->is_thumbnail == 1 ? 'active' : ''}}">
                                            <img src="{{url('foto/pura/'.$foto->foto)}}" class="d-block w-100" alt="..." style="width:100%;height:570px">
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

                    <div class="tab-pane p-3" role="tabpanel" id="preview-692">
                        <h1>Pelinggih</h1>
                    </div>

                    <div class="tab-pane p-3" role="tabpanel" id="preview-693">
                        <h1>Pengurus</h1>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
@endsection