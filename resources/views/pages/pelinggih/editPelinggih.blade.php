@extends('layouts.app')

@section('title', 'Edit Pelinggih')

@section('breadcrumb')
<li class="breadcrumb-item active"><a href="{{route('daftarpelinggih')}}">Daftar Pelinggih</a></li>
<li class="breadcrumb-item"><span>Edit Pelinggih</span></li>
@endsection

@section('back')
<a data-mdb-ripple-duration=0 href="{{ route('daftarpura') }}" class="btn btn-primary">
    <svg class="icon">
        <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-arrow-circle-left')}}"></use>
    </svg>  Back</a>
@endsection

@section('content')
<div class="col-6">
    <div class="card mb-4">
        <div class="card-header"><strong>Edit Data Pelinggih</strong></div>
        <div class="card-body">
            <div class="tab-content rounded-bottom">
                <form method="POST" action="{{ route('updatepelinggih', ['puraid' => $pelinggih->pura_id, 'id' => $pelinggih->id]) }}" id="formCreate" enctype="multipart/form-data">
                    @csrf
                <div class="mb-3">
                    <label class="form-label" for="nama">Nama Pelinggih :</label>
                    <input class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" type="text" placeholder="Nama Pelinggih" value="{{ $pelinggih->nama }}">
                    @if ($errors->has('nama'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nama') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label" for="keterangan">Keterangan :</label>
                    <input class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" type="text" placeholder="Keterangan" value="{{ $pelinggih->keterangan }}">
                    @if ($errors->has('keterangan'))
                        <div class="invalid-feedback">
                            {{ $errors->first('keterangan') }}
                        </div>
                    @endif
                </div>
                <div class="mb-4">
                    <label for="formFile" class="form-label">Tambah Foto :</label>
                    <input class="form-control" name="fotos[]" type="file" id="fotos" multiple>
                </div>
                <button data-mdb-ripple-duration=0 class="btn btn-success mb-3 text-light" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
@endsection