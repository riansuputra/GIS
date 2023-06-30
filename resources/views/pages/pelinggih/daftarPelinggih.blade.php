@extends('layouts.app')

@section('title', 'Daftar Pelinggih')

@section('breadcrumb')
<li class="breadcrumb-item active">Daftar Pelinggih</li>
@endsection

@section('back')
<a data-mdb-ripple-duration=0 href="{{ route('index') }}" class="btn btn-primary">
    <svg class="icon">
        <use xlink:href="{{url('/template/vendors/@coreui/icons/svg/free.svg#cil-arrow-circle-left')}}"></use>
    </svg>  Back</a>
@endsection

@section('content')
<div class="row">
    <div class="card mb-4">
        <div class="card-header row">
            <strong>Daftar Pelinggih</strong>
        </div>
        <div class="card-body row">
            <div class="tab-content rounded-bottom">
                <label class="form-label" for="pura_id">Pilih Pura :</label>
                    <select class="form-select @error('pura_id') is-invalid @enderror" id="pura_id" name="pura_id" aria-label="Default select example" >
                        <option>Pilih Pura</option>
                        @foreach($puras as $pura)
                            <option value="{{$pura->id}}">{{$pura->nama}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('pura_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('pura_id') }}
                        </div>
                    @endif
                <br>
                <table id="datatable" class="table table-bordered border datatable">
                    <thead>
                        <tr>
                            <th style="text-align: center">No</th>
                            <th>Nama Pelinggih</th>
                            <th>Keterangan</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width:5%; text-align: center"></td>
                            <td style="width:30%;"></td>
                            <td style="width:30%;"></td>
                            <td style="width:10%; text-align: center"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#datatable').DataTable();
    });
</script>
<script type="text/javascript">
    $('#pura_id').on('change', function() {
        var id = this.value;
        window.location.href = "http://localhost:8000/" + id + "/daftarpelinggih"
        // window.location.href = "htpp://gis-leaflet-rian.azurewebsites.net" + id + "/daftarpengurus"
    });
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>

<script src="{{url('/template/vendors/jquery/js/jquery.min.js')}}"></script>
<script src="{{url('/template/vendors/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{url('/template/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('/js/datatables.js')}}"></script>
@endsection