@extends('layouts.app')

@section('title', 'Tambah Pura')

@section('breadcrumb')
<li class="breadcrumb-item active"><span>Tambah Pura</span></li>
@endsection

@section('content')
<button type="button" id="buttonAddModal"class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#exampleModal" hidden>
    Launch demo modal
</button>
<div class="row">
    <div class="card mb-4">
        <div class="card-header row"><strong>Tambah Data Pura</strong></div>
        <div class="card-body row">
            <div class="col">
                <div class="tab-content rounded-bottom">
                    <form method="POST" action="{{ url('create') }}" id="formCreate" enctype="multipart/form-data">
                        @csrf
                    <div class="mb-3">
                        <label class="form-label" for="nama">Nama Pura :</label>
                        <input class="form-control" id="nama" name="nama" type="text" placeholder="Nama Pura">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="jenis">Jenis Pura :</label>
                        <select class="form-select" id="jenis" name="jenis" aria-label="Default select example">
                            <option selected>Pilih Jenis Pura</option>
                            <option value="Swagina">Swagina</option>
                            <option value="Kawitan">Kawitan</option>
                            <option value="Kahyangan Tiga">Kahyangan Tiga</option>
                            <option value="Kahyangan Jagat">Kahyangan Jagat</option>
                        </select>
                    </div>
                    <div class="mb-2 mt-4">
                        <label class="form-label" for="jenis_piodalan">Piilh Jenis Piodalan :&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_piodalan" id="inlineRadio1" value="wuku">
                            <label class="form-check-label" for="inlineRadio1">Wuku</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_piodalan" id="inlineRadio2" value="sasih">
                            <label class="form-check-label" for="inlineRadio2">Sasih</label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="form-label" for="wuku">Berdasarkan Wuku :</label>
                        <div class="col">
                            <select class="form-select" id="sapta_wara" name="sapta_wara" aria-label="Default select example">
                                <option selected>Pilih Sapta Wara</option>
                                <option value="Redite">Redite</option>
                                <option value="Soma">Soma</option>
                                <option value="Anggara">Anggara</option>
                                <option value="Budha">Budha</option>
                                <option value="Wrhaspati">Wrhaspati</option>
                                <option value="Sukra">Sukra</option>
                                <option value="Saniscara">Saniscara</option>
                            </select>

                        </div>
                        <div class="col">
                            <select class="form-select" id="panca_wara" name="panca_wara" aria-label="Default select example">
                                <option selected>Pilih Panca Wara</option>
                                <option value="Umanis">Umanis</option>
                                <option value="Paing">Paing</option>
                                <option value="Pon">Pon</option>
                                <option value="Wage">Wage</option>
                                <option value="Kliwon">Kliwon</option>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-select" id="wuku" name="wuku" aria-label="Default select example">
                                <option selected>Pilih Wuku</option>
                                <option value="Sinta">Sinta</option>
                                <option value="Landep">Landep</option>
                                <option value="Ukir">Ukir</option>
                                <option value="Kulantir">Kulantir</option>
                                <option value="Tolu">Tolu</option>
                                <option value="Gumbreg">Gumbreg</option>
                                <option value="Wariga">Wariga</option>
                                <option value="Warigadian">Warigadian</option>
                                <option value="Julungwangi">Julungwangi</option>
                                <option value="Sungsang">Sungsang</option>
                                <option value="Dungulan">Dungulan</option>
                                <option value="Kuninga">Kuninga</option>
                                <option value="Langkir">Langkir</option>
                                <option value="Medangsia">Medangsia</option>
                                <option value="Pujut">Pujut</option>
                                <option value="Pahang">Pahang</option>
                                <option value="Krulut">Krulut</option>
                                <option value="Mrakih">Mrakih</option>
                                <option value="Tambir">Tambir</option>
                                <option value="Madangkungan">Madangkungan</option>
                                <option value="Matal">Matal</option>
                                <option value="Uye">Uye</option>
                                <option value="Mnail">Mnail</option>
                                <option value="Prangbakat">Prangbakat</option>
                                <option value="Bala">Bala</option>
                                <option value="Ugu">Ugu</option>
                                <option value="Wayang">Wayang</option>
                                <option value="Klawu">Klawu</option>
                                <option value="Dukut">Dukut</option>
                                <option value="Watugunung">Watugunung</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label" for="sasih">Berdasarkan Sasih :</label>
                        <select class="form-select" id="sasih" name="sasih" aria-label="Default select example">
                            <option selected>Pilih Sasih</option>
                            <option value="Kasa">Kasa</option>
                            <option value="Karo">Karo</option>
                            <option value="Katiga">Katiga</option>
                            <option value="Kapat">Kapat</option>
                            <option value="Kalima">Kalima</option>
                            <option value="Kanam">Kanam</option>
                            <option value="Kapitu">Kapitu</option>
                            <option value="Kawolu">Kawolu</option>
                            <option value="Kasanga">Kasanga</option>
                            <option value="Kadasa">Kadasa</option>
                            <option value="Jiyestha">Jiyestha</option>
                            <option value="Sadha">Sadha</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="alamat">Alamat Pura :</label>
                        <input class="form-control" id="alamat" name="alamat" type="text" placeholder="Alamat Pura">
                    </div>
                    <div class="mb-4">
                        <label for="formFile" class="form-label">Tambah Foto :</label>
                        <input class="form-control" name="fotos[]" type="file" id="fotos" multiple>
                    </div>
                    <input type="text" id="lat" name="lat" class="form-control" hidden />
                    <input type="text" id="lng" name="lng" class="form-control" hidden />
                    <button data-mdb-ripple-duration=0 class="btn btn-success" type="submit">Tambah</button>
                    </form>
                </div>
            </div>
            <div class="vr"></div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Tambah Pura ?</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer justify-content-between">
                @guest
                    <a role="button" data-mdb-ripple-duration="0" href="{{route('login')}}" class="btn btn-primary">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspYa&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>
                @else
                    <a role="button" data-mdb-ripple-duration="0" href="{{route('tambahpura')}}" class="btn btn-primary">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspYa&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>
                @endguest
                <button type="button" data-mdb-ripple-duration="0" class="btn btn-secondary" data-coreui-dismiss="modal">&nbsp&nbsp&nbsp&nbspTidak&nbsp&nbsp&nbsp&nbsp</button>
            </div>
        </div>
    </div>
</div>
            <div class="col">
                <div id="map" style="height: 640px">               
                <script type="text/javascript">
                let puras = <?php echo json_encode($puras); ?>;
            </script>
                    <script type="text/javascript" src="{{url('js/leaflet.js')}}"></script>         
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

        function checkradiobox(){
            var radio = $("input[name='jenis_piodalan']:checked").val();
            $('#wuku,#sasih,#sapta_wara,#panca_wara').attr('disabled',true);
            if(radio == "wuku"){
                $('#wuku').attr('disabled',false);
                $('#sapta_wara').attr('disabled',false);
                $('#panca_wara').attr('disabled',false);
            }else if(radio == 'sasih'){
                $('#sasih').attr('disabled',false);
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