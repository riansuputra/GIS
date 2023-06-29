@extends('layouts.app')

@section('title', 'Map')

@section('breadcrumb')
<li class="breadcrumb-item active"><span>Map</span></li>
@endsection

@section('content')
@foreach($puras as $pura)
<button type="button" id="buttonPura_{{$pura->id}}" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#modalPura_{{$pura->id}}" hidden>
    Edit
</button>
<div class="modal fade" id="modalPura_{{$pura->id}}" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered d-flex justify-content-center">
        <div class="modal-content w-100">
            <div class="modal-header">
                <h5 class="modal-title w-100 text-center" id="exampleModalLabel2">Detail Pura</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3">
                <div class="row text-center">
                    <div class="col">
                        <a type="button" class="nav-link" data-mdb-toggle="modal" data-mdb-target="#modalPura_{{$pura->id}}" id="buttonPura_{{$pura->id}}">Pura</a>
                    </div>
                    <div class="vr"></div>
                    <div class="col">
                        <a type="button" class="nav-link" data-mdb-toggle="modal" data-mdb-target="#modalPelinggih_{{$pura->id}}" id="buttonPelinggih_{{$pura->id}}">Pelinggih</a>
                    </div>
                    <div class="vr"></div>
                    <div class="col">
                        <a type="button" class="nav-link" data-mdb-toggle="modal" data-mdb-target="#modalPengurus_{{$pura->id}}" id="buttonPengurus_{{$pura->id}}">Pengurus</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td style="width:30%">Nama Pura</td>
                                    <td style="width:10%">:</td>
                                    <td style="width:60%">{{$pura->nama}}</td>
                                </tr>
                                <tr>
                                    <td style="width:30%">Jenis Pura</td>
                                    <td style="width:10%">:</td>
                                    <td style="width:60%">{{$pura->jenis}}</td>
                                </tr>
                                @if(!($pura->sasih))
                                    <tr>
                                        <td style="width:30%">Piodalan Pura</td>
                                        <td style="width:10%">:</td>
                                        <td style="width:60%">{{$pura->sapta_wara}} {{$pura->panca_wara}} {{$pura->wuku}}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td style="width:30%">Piodalan Pura</td>
                                        <td style="width:10%">:</td>
                                        <td style="width:60%">Sasih {{$pura->sasih}}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td style="width:30%">Piodalan Pura</td>
                                    <td style="width:10%">:</td>
                                    <td style="width:60%">{{$pura->alamat}}</td>
                                </tr>
                                <tr>
                                    <td style="width:30%">Alamat Pura</td>
                                    <td style="width:10%">:</td>
                                    <td style="width:60%">{{$pura->alamat}}</td>
                                </tr>
                                <tr>
                                    <td style="width:30%">Nama Pura</td>
                                    <td style="width:10%">:</td>
                                    <td style="width:60%">{{$pura->nama}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="vr"></div>
                    <div class="col">
                        @foreach($fotos as $foto)
                            @if($foto->type == "Pura" && $foto->pura_id == $pura->id)
                                @if($foto->is_thumbnail == 1 )
                                
                                    <img src="{{url('foto/pura/'.$foto->foto)}}" style="width:100%;height:100%">
                                @break
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
        
<div class="card">
    <div class="card-body">
        <div id="map" style="height: 670px">               
            <script type="text/javascript">
                let puras = <?php echo json_encode($puras); ?>;
                let fotos = <?php echo json_encode($fotos); ?>;
            </script>
            <script type="text/javascript" src="{{url('js/leaflet.js')}}"></script>         
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
@endsection