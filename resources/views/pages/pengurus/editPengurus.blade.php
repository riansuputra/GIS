@extends('layouts.app')

@section('title', 'Edit Pengurus')

@section('breadcrumb')
<li class="breadcrumb-item active"><a href="{{route('daftarpengurus')}}">Daftar Pengurus</a></li>
<li class="breadcrumb-item"><span>Edit Pengurus</span></li>
@endsection

@section('back')
<a data-mdb-ripple-duration=0 href="{{ route('index') }}" class="btn btn-primary">
    <svg class="icon">
        <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-arrow-circle-left')}}"></use>
    </svg>  Back</a>
@endsection

@section('content')
<div class="col-6">
    <div class="card mb-4">
        <div class="card-header">
            <strong>Edit Data Pengurus</strong>
        </div>
        <div class="card-body">
            <div class="tab-content rounded-bottom">
                <form method="POST" action="{{ route('updatepengurus', ['puraid' => $pengurus->pura_id, 'id' => $pengurus->id]) }}" id="formCreate" enctype="multipart/form-data">
                    @csrf
                <div class="col mb-3">
                    <label class="form-label" for="sebagai">Sebagai :</label>
                    <select class="form-select @error('sebagai') is-invalid @enderror" id="sebagai" name="sebagai" aria-label="Default select example">
                        <option @if ($pengurus->sebagai == 'Pemangku') selected="selected" @endif value="Pemangku">Pemangku</option>
                        <option @if ($pengurus->sebagai == 'Ketua') selected="selected" @endif value="Ketua">Ketua</option>
                        <option @if ($pengurus->sebagai == 'Sekretaris') selected="selected" @endif value="Sekretaris">Sekretaris</option>
                        <option @if ($pengurus->sebagai == 'Bendahara') selected="selected" @endif value="Bendahara">Bendahara</option>
                    </select>
                </div>
                    @if ($errors->has('sebagai'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sebagai') }}
                    </div>
                    @endif
                <div class="mb-3">
                    <label class="form-label" for="nama">Nama Pengurus :</label>
                    <input class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" type="text" placeholder="Nama Pengurus" value="{{ $pengurus->nama }}">
                    @if ($errors->has('nama'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama') }}
                    </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label" for="alamat">Alamat :</label>
                    <input class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" type="text" placeholder="Alamat" value="{{ $pengurus->alamat }}">
                    @if ($errors->has('alamat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('alamat') }}
                    </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label" for="telepon">Telepon :</label>
                    <input class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" type="text" placeholder="Telepon" value="{{ $pengurus->telepon }}">
                    @if ($errors->has('telepon'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telepon') }}
                    </div>
                    @endif
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <label class="form-label" for="tahun_mulai">Tahun Mulai :</label>
                        <input class="form-control @error('tahun_mulai') is-invalid @enderror" id="tahun_mulai" name="tahun_mulai" type="text" placeholder="Tahun Mulai" value="{{ $pengurus->tahun_mulai }}">
                        @if ($errors->has('tahun_mulai'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tahun_mulai') }}
                        </div>
                        @endif
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="tahun_berakhir">Tahun Berakhir :</label>
                        <input class="form-control @error('tahun_berakhir') is-invalid @enderror" id="tahun_berakhir" name="tahun_berakhir" type="text" placeholder="Tahun Berakhir" value="{{ $pengurus->tahun_berakhir }}">
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
                        <input class="form-check-input @error('status') is-invalid @enderror" type="radio" name="status" id="inlineRadio1" value="Aktif" @if ($pengurus->status == 'Aktif') checked="checked" @endif>
                        <label class="form-check-label" for="inlineRadio1">Aktif</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('status') is-invalid @enderror" type="radio" name="status" id="inlineRadio2" value="Tidak Aktif" @if ($pengurus->status == 'Tidak Aktif') checked="checked" @endif>
                        <label class="form-check-label" for="inlineRadio2">Tidak Aktif</label>
                    </div>
                    @if ($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                    @endif
                </div>
                <button data-mdb-ripple-duration=0 class="btn btn-success mb-3 text-light" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
@endsection