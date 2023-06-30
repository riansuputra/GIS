@extends('layouts.app')

@section('title', 'Edit Pura')

@section('breadcrumb')
<li class="breadcrumb-item active"><a href="{{route('daftarpura')}}">Daftar Pura</a></li>
<li class="breadcrumb-item"><span>Edit Pura</span></li>
@endsection

@section('back')
<a data-mdb-ripple-duration=0 href="{{route('daftarpura')}}" class="btn btn-primary">
    <svg class="icon">
        <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-arrow-circle-left')}}"></use>
    </svg>  Back</a>
@endsection

@section('content')
<button type="button" id="buttonAddModal"class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#exampleModal" hidden>
    Launch demo modal
</button>
<div class="row">
    <div class="card mb-4">
        <div class="card-header row"><strong>Edit Data Pura</strong></div>
        <div class="card-body row">
            <div class="col">
                <div class="tab-content rounded-bottom">
                    <form method="POST" action="{{ route('updatepura', ['id' => $pura->id]) }}" id="formCreate" enctype="multipart/form-data">
                        @csrf
                    <div class="mb-3">
                        <label class="form-label" for="nama">Nama Pura :</label>
                        <input class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" type="text" placeholder="Nama Pura" value="{{ $pura->nama }}">
                        @if ($errors->has('nama'))
                            <div class="invalid-feedback">
                                {{ $errors->first('nama') }}
                            </div>
                        @endif
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label" for="jenis">Jenis Pura :</label>
                            <select class="form-select @error('jenis') is-invalid @enderror" id="jenis" name="jenis" aria-label="Default select example" value="{{ $pura->jenis }}">
                                <option @if ($pura->jenis == 'Swagina') selected="selected" @endif value="Swagina">Swagina</option>
                                <option @if ($pura->jenis == 'Kawitan') selected="selected" @endif value="Kawitan">Kawitan</option>
                                <option @if ($pura->jenis == 'Kahyangan Tiga') selected="selected" @endif value="Kahyangan Tiga">Kahyangan Tiga</option>
                                <option @if ($pura->jenis == 'Kahyangan Jagat') selected="selected" @endif value="Kahyangan Jagat">Kahyangan Jagat</option>
                            </select>
                            @if ($errors->has('jenis'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('jenis') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-3">
                            <label class="form-label" for="lat">Latitude :</label>
                            <input type="text" id="lat" name="lat" class="form-control" value="{{ $pura->lat }}" readonly/>
                        </div>
                        <div class="col-3">
                            <label class="form-label" for="lng">Longitude :</label>
                            <input type="text" id="lng" name="lng" class="form-control" value="{{ $pura->lng }}" readonly/>
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <label class="form-label" for="jenis_piodalan">Piilh Jenis Piodalan :&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                        <div class="col-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('jenis_piodalan') is-invalid @enderror" type="radio" name="jenis_piodalan" id="inlineRadio2" value="sasih" @if ($pura->jenis_piodalan == 'Sasih') checked="checked" @endif>
                                <label class="form-check-label" for="inlineRadio2">Sasih</label>
                            </div>
                        </div>
                        <div class="col">
                            <select class="form-select @error('sasih') is-invalid @enderror" id="sasih" name="sasih" aria-label="Default select example" value="{{ $pura->sasih }}">
                                <option selected>Pilih Sasih</option>
                                <option @if ($pura->sasih == 'Kasa') selected="selected" @endif value="Kasa">Kasa</option>
                                <option @if ($pura->sasih == 'Karo') selected="selected" @endif value="Karo">Karo</option>
                                <option @if ($pura->sasih == 'Katiga') selected="selected" @endif value="Katiga">Katiga</option>
                                <option @if ($pura->sasih == 'Kapat') selected="selected" @endif value="Kapat">Kapat</option>
                                <option @if ($pura->sasih == 'Kalima') selected="selected" @endif value="Kalima">Kalima</option>
                                <option @if ($pura->sasih == 'Kanam') selected="selected" @endif value="Kanam">Kanam</option>
                                <option @if ($pura->sasih == 'Kapitu') selected="selected" @endif value="Kapitu">Kapitu</option>
                                <option @if ($pura->sasih == 'Kawolu') selected="selected" @endif value="Kawolu">Kawolu</option>
                                <option @if ($pura->sasih == 'Kasanga') selected="selected" @endif value="Kasanga">Kasanga</option>
                                <option @if ($pura->sasih == 'Kadasa') selected="selected" @endif value="Kadasa">Kadasa</option>
                                <option @if ($pura->sasih == 'Jiyestha') selected="selected" @endif value="Jiyestha">Jiyestha</option>
                                <option @if ($pura->sasih == 'Sadha') selected="selected" @endif value="Sadha">Sadha</option>
                            </select>
                            @if ($errors->has('sasih'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sasih') }}
                                </div>
                            @endif
                        </div>
                        <div class="col">
                            <select class="form-select @error('bulan') is-invalid @enderror" id="bulan" name="bulan" aria-label="Default select example" value="{{ $pura->bulan }}">
                                <option selected>Pilih Bulan</option>
                                <option @if ($pura->bulan == 'Purnaming') selected="selected" @endif value="Purnaming">Purnaming</option>
                                <option @if ($pura->bulan == 'Tilem') selected="selected" @endif value="Tilem">Tilem</option>
                            </select>
                            @if ($errors->has('bulan'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('bulan') }}
                                </div>
                            @endif
                        </div>
                       
                        @if ($errors->has('jenis_piodalan'))
                            <div class="invalid-feedback">
                                {{ $errors->first('jenis_piodalan') }}
                            </div>
                        @endif
                    </div>
                    <div class="row mb-3 align-items-center">
                        <div class="col-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('jenis_piodalan') is-invalid @enderror" type="radio" name="jenis_piodalan" id="inlineRadio1" value="wuku" @if ($pura->jenis_piodalan == 'Wuku') checked="checked" @endif>
                                <label class="form-check-label" for="inlineRadio1">Wuku</label>
                            </div>
                        </div>
                        <div class="col">
                            <select class="form-select @error('wuku') is-invalid @enderror" id="wuku" name="wuku" aria-label="Default select example" value="{{ $pura->wuku }}">
                                <option selected>Pilih Wuku</option>
                                <option @if ($pura->wuku == 'Sinta') selected="selected" @endif value="Sinta">Sinta</option>
                                <option @if ($pura->wuku == 'Landep') selected="selected" @endif value="Landep">Landep</option>
                                <option @if ($pura->wuku == 'Ukir') selected="selected" @endif value="Ukir">Ukir</option>
                                <option @if ($pura->wuku == 'Kulantir') selected="selected" @endif value="Kulantir">Kulantir</option>
                                <option @if ($pura->wuku == 'Tolu') selected="selected" @endif value="Tolu">Tolu</option>
                                <option @if ($pura->wuku == 'Gumbreg') selected="selected" @endif value="Gumbreg">Gumbreg</option>
                                <option @if ($pura->wuku == 'Wariga') selected="selected" @endif value="Wariga">Wariga</option>
                                <option @if ($pura->wuku == 'Warigadian') selected="selected" @endif value="Warigadian">Warigadian</option>
                                <option @if ($pura->wuku == 'Julungwangi') selected="selected" @endif value="Julungwangi">Julungwangi</option>
                                <option @if ($pura->wuku == 'Sungsang') selected="selected" @endif value="Sungsang">Sungsang</option>
                                <option @if ($pura->wuku == 'Dungulan') selected="selected" @endif value="Dungulan">Dungulan</option>
                                <option @if ($pura->wuku == 'Kuningan') selected="selected" @endif value="Kuningan">Kuningan</option>
                                <option @if ($pura->wuku == 'Langkir') selected="selected" @endif value="Langkir">Langkir</option>
                                <option @if ($pura->wuku == 'Medangsia') selected="selected" @endif value="Medangsia">Medangsia</option>
                                <option @if ($pura->wuku == 'Pujut') selected="selected" @endif value="Pujut">Pujut</option>
                                <option @if ($pura->wuku == 'Pahang') selected="selected" @endif value="Pahang">Pahang</option>
                                <option @if ($pura->wuku == 'Krulut') selected="selected" @endif value="Krulut">Krulut</option>
                                <option @if ($pura->wuku == 'Mrakih') selected="selected" @endif value="Mrakih">Mrakih</option>
                                <option @if ($pura->wuku == 'Tambir') selected="selected" @endif value="Tambir">Tambir</option>
                                <option @if ($pura->wuku == 'Madangkungan') selected="selected" @endif value="Madangkungan">Madangkungan</option>
                                <option @if ($pura->wuku == 'Matal') selected="selected" @endif value="Matal">Matal</option>
                                <option @if ($pura->wuku == 'Uye') selected="selected" @endif value="Uye">Uye</option>
                                <option @if ($pura->wuku == 'Mnail') selected="selected" @endif value="Mnail">Mnail</option>
                                <option @if ($pura->wuku == 'Prangbakat') selected="selected" @endif value="Prangbakat">Prangbakat</option>
                                <option @if ($pura->wuku == 'Bala') selected="selected" @endif value="Bala">Bala</option>
                                <option @if ($pura->wuku == 'Ugu') selected="selected" @endif value="Ugu">Ugu</option>
                                <option @if ($pura->wuku == 'Wayang') selected="selected" @endif value="Wayang">Wayang</option>
                                <option @if ($pura->wuku == 'Klawu') selected="selected" @endif value="Klawu">Klawu</option>
                                <option @if ($pura->wuku == 'Dukut') selected="selected" @endif value="Dukut">Dukut</option>
                                <option @if ($pura->wuku == 'Watugunung') selected="selected" @endif value="Watugunung">Watugunung</option>
                            </select>
                            @if ($errors->has('wuku'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('wuku') }}
                                </div>
                            @endif
                        </div>
                        <div class="col">
                            <select class="form-select @error('sapta_wara') is-invalid @enderror" id="sapta_wara" name="sapta_wara" aria-label="Default select example" value="{{ $pura->sapta_wara }}">
                                <option selected>Pilih Sapta Wara</option>
                                <option @if ($pura->sapta_wara == 'Redite') selected="selected" @endif value="Redite">Redite</option>
                                <option @if ($pura->sapta_wara == 'Soma') selected="selected" @endif value="Soma">Soma</option>
                                <option @if ($pura->sapta_wara == 'Anggara') selected="selected" @endif value="Anggara">Anggara</option>
                                <option @if ($pura->sapta_wara == 'Budha') selected="selected" @endif value="Budha">Budha</option>
                                <option @if ($pura->sapta_wara == 'Wrhaspati') selected="selected" @endif value="Wrhaspati">Wrhaspati</option>
                                <option @if ($pura->sapta_wara == 'Sukra') selected="selected" @endif value="Sukra">Sukra</option>
                                <option @if ($pura->sapta_wara == 'Saniscara') selected="selected" @endif value="Saniscara">Saniscara</option>
                            </select>
                            @if ($errors->has('sapta_wara'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sapta_wara') }}
                                </div>
                            @endif
                        </div>
                        <div class="col">
                            <select class="form-select @error('panca_wara') is-invalid @enderror" id="panca_wara" name="panca_wara" aria-label="Default select example" value="{{ $pura->panca_wara }}">
                                <option selected>Pilih Panca Wara</option>
                                <option @if ($pura->panca_wara == 'Umanis') selected="selected" @endif value="Umanis">Umanis</option>
                                <option @if ($pura->panca_wara == 'Paing') selected="selected" @endif value="Paing">Paing</option>
                                <option @if ($pura->panca_wara == 'Pon') selected="selected" @endif value="Pon">Pon</option>
                                <option @if ($pura->panca_wara == 'Wage') selected="selected" @endif value="Wage">Wage</option>
                                <option @if ($pura->panca_wara == 'Kliwon') selected="selected" @endif value="Kliwon">Kliwon</option>
                            </select>
                            @if ($errors->has('panca_wara'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('panca_wara') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="alamat">Alamat Pura :</label>
                        <input class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" type="text" placeholder="Alamat Pura" value="{{ $pura->alamat }}">
                        @if ($errors->has('alamat'))
                            <div class="invalid-feedback">
                                {{ $errors->first('alamat') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-4">
                        <label for="formFile" class="form-label">Tambah Foto :</label>
                        <input class="form-control @error('fotos') is-invalid @enderror" name="fotos[]" type="file" id="fotos" multiple>
                        @if ($errors->has('fotos'))
                            <div class="invalid-feedback">
                                {{ $errors->first('fotos') }}
                            </div>
                        @endif
                    </div>
                    <button data-mdb-ripple-duration=0 class="btn btn-success text-light" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
            <div class="vr"></div>
            <div class="col">
                <div id="map" style="height: 610px">               
                <script type="text/javascript">
                let puras = <?php echo json_encode($pura); ?>;
                    var jenis;
                    $('#jenis').on('change', function() {
                        jenis = this.value;
                        // alert(country);
                    });
                    console.log(puras.lat);
            </script>
                    <script type="text/javascript" src="{{url('js/leaflet-edit.js')}}"></script>         
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

        function checkradiobox(){
            var radio = $("input[name='jenis_piodalan']:checked").val();
            $('#wuku,#sasih,#sapta_wara,#panca_wara,#bulan').attr('disabled',true);
            if(radio == "wuku"){
                $('#wuku').attr('disabled',false);
                $('#sapta_wara').attr('disabled',false);
                $('#panca_wara').attr('disabled',false);
            }else if(radio == 'sasih'){
                $('#sasih').attr('disabled',false);
                $('#bulan').attr('disabled',false);
            }
        }
        $("#inlineRadio1, #inlineRadio2").change(function() {
           checkradiobox(); 
        });
        checkradiobox();

    });
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
@endsection