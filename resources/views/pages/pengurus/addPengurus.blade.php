@extends('layouts.app')

@section('title', 'Tambah Pengurus')

@section('breadcrumb')
<li class="breadcrumb-item active"><span>Tambah Pengurus</span></li>
@endsection

@section('content')
<div class="col-6">
    <div class="card mb-4">
        <div class="card-header"><strong>Tambah Data Pengurus</strong></div>
        <div class="card-body">
                <div class="tab-content rounded-bottom">
                    <form method="POST" action="{{ url('/{id}/createpengurus') }}" id="formCreate" enctype="multipart/form-data">
                        @csrf
                    <div class="mb-3">
                        <label class="form-label" for="pura_id">Pilih Pura :</label>
                        <select class="form-select @error('pura_id') is-invalid @enderror" id="pura_id" name="pura_id" aria-label="Default select example">
                            @foreach($puras as $pura)
                                <option value="{{$pura->id}}">{{$pura->nama}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('pura_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('pura_id') }}
                        </div>
                        @endif
                    </div>
                    <div class="col mb-3">
                    <label class="form-label" for="sebagai">Sebagai :</label>
                            <select class="form-select @error('sebagai') is-invalid @enderror" id="sebagai" name="sebagai" aria-label="Default select example">
                                <option selected>Pilih Jabatan</option>
                                <option value="Pemangku">Pemangku</option>
                                <option value="Ketua">Ketua</option>
                                <option value="Sekretaris">Sekretaris</option>
                                <option value="Bendahara">Bendahara</option>
                            </select>
                        </div>
                        @if ($errors->has('sebagai'))
                        <div class="invalid-feedback">
                            {{ $errors->first('sebagai') }}
                        </div>
                        @endif
                    <div class="mb-3">
                        <label class="form-label" for="nama">Nama Pengurus :</label>
                        <input class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" type="text" placeholder="Nama Pengurus" value="{{ old('nama') }}">
                        @if ($errors->has('nama'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nama') }}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="alamat">Alamat :</label>
                        <input class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" type="text" placeholder="Alamat" value="{{ old('alamat') }}">
                        @if ($errors->has('alamat'))
                        <div class="invalid-feedback">
                            {{ $errors->first('alamat') }}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="telepon">Telepon :</label>
                        <input class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" type="text" placeholder="Telepon" value="{{ old('telepon') }}">
                        @if ($errors->has('telepon'))
                        <div class="invalid-feedback">
                            {{ $errors->first('telepon') }}
                        </div>
                        @endif
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <label class="form-label" for="tahun_mulai">Tahun Mulai :</label>
                            <input class="form-control @error('tahun_mulai') is-invalid @enderror" id="tahun_mulai" name="tahun_mulai" type="text" placeholder="Telepon">
                            @if ($errors->has('tahun_mulai'))
                            <div class="invalid-feedback">
                                {{ $errors->first('tahun_mulai') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="tahun_berakhir">Tahun Berakhir :</label>
                            <input class="form-control @error('tahun_berakhir') is-invalid @enderror" id="tahun_berakhir" name="tahun_berakhir" type="text" placeholder="Telepon">
                            @if ($errors->has('tahun_berakhir'))
                            <div class="invalid-feedback">
                                {{ $errors->first('tahun_berakhir') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="mb-2 mt-4">
                        <label class="form-label" for="status">Status :&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input @error('status') is-invalid @enderror" type="radio" name="status" id="inlineRadio1" value="Aktif">
                            <label class="form-check-label" for="inlineRadio1">Aktif</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input @error('status') is-invalid @enderror" type="radio" name="status" id="inlineRadio2" value="Tidak Aktif">
                            <label class="form-check-label" for="inlineRadio2">Tidak Aktif</label>
                        </div>
                        @if ($errors->has('status'))
                        <div class="invalid-feedback">
                            {{ $errors->first('status') }}
                        </div>
                        @endif
                    </div>
                    <button data-mdb-ripple-duration=0 class="btn btn-success mb-3" type="submit">Tambah</button>
                    </form>
                </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
@endsection