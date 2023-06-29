@extends('layouts.app')

@section('title', 'Tambah Pelinggih')

@section('back')
<a data-mdb-ripple-duration=0 href="{{ url()->previous() }}" class="btn btn-primary">
    <svg class="icon">
        <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-arrow-circle-left')}}"></use>
    </svg>  Back</a>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active"><span>Tambah Pelinggih</span></li>
@endsection

@section('content')
<div class="col-6">
    <div class="card mb-4">
        <div class="card-header"><strong>Tambah Data Pelinggih</strong></div>
        <div class="card-body">
            <div class="tab-content rounded-bottom">
                <form method="POST" action="{{ url('/{id}/createpelinggih') }}" id="formCreate" enctype="multipart/form-data">
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
                <div class="mb-3">
                    <label class="form-label" for="nama">Nama Pelinggih :</label>
                    <input class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" type="text" placeholder="Nama Pelinggih" value="{{ old('nama') }}">
                    @if ($errors->has('nama'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nama') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label" for="keterangan">Keterangan :</label>
                    <input class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" type="text" placeholder="Keterangan" value="{{ old('keterangan') }}">
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
                <button data-mdb-ripple-duration=0 class="btn btn-success mb-3 text-light" type="submit">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
@endsection