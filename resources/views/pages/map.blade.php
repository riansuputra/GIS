@extends('layouts.app')

@section('title', 'Map')

@section('breadcrumb')
<li class="breadcrumb-item active"><span>Map</span></li>
@endsection

@section('back')
<a data-mdb-ripple-duration=0 type="button" id="buttonPura" data-mdb-toggle="modal" data-mdb-target="#modalPura" class="btn btn-success text-light">
    <svg class="icon">
        <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-location-pin')}}"></use>
    </svg>  Routing</a>
@endsection

@section('content')
<div class="modal fade" id="modalPura" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered d-flex justify-content-center">
        <div class="modal-content w-100">
            <div class="modal-header">
                <h5 class="modal-title w-100 text-center" id="exampleModalLabel2">Routing Instruction</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3">
                <div class="row">
                    <p>1. Klik pada map untuk menambahkan marker posisi awal</p>
                    <p>2. Klik pada marker pura yang dituju untuk memunculkan rute tujuan</p>
                    <p>3. Marker posisi awal dapat dipindahkan dengan klik di lokkasi lain pada map</p>
                    <p>4. Marker tujuan dan marker posisi awal juga dapat dipindahkan dengan cara di drag ke lokasi yang diinginkan</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div id="map" style="height: 670px">               
            <script type="text/javascript">
                let puras = <?php echo json_encode($puras); ?>;
                let fotos = <?php echo json_encode($fotos); ?>;
            </script>
            <script src="{{url('js/leaflet-routing-machine.js')}}"></script>         
            <script type="text/javascript" src="{{url('js/leaflet.js')}}"></script>         
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
@endsection