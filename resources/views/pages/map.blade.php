@extends('layouts.app')

@section('title', 'Map')

@section('breadcrumb')
<li class="breadcrumb-item active"><span>Map</span></li>
@endsection

@section('content')


<div class="card">
    <div class="card-body">
        <div id="map" style="height: 680px"> 
            
            <script type="text/javascript" src="{{url('js/leaflet.js')}}"></script>         
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
@endsection