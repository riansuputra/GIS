@extends('layouts.app')

@section('title', 'Daftar Pelinggih')

@section('breadcrumb')
<li class="breadcrumb-item active">Daftar Pelinggih</li>
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
                        
                        
                        <select class="form-select @error('pura_id') is-invalid @enderror" id="pura_id" name="pura_id" aria-label="Default select example">
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
                <table id="datatable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelinggih</th>
                            <th>Keterangan</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
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
    });
    // $('#btn').on('click', function() {
    //     var select_value = $('#instructorSelector').val();

    //     // use the value here
    // });

    // $(function(){
    // // bind change event to select
    //     $('#submit').on('click', function () {
    //         var url = $('#pura_id').val(); // get selected value
    //         if (url!="") { // require a URL
    //             window.location.href = url; // redirect
    //         }
    //         else
    //             alert('Please select a Website!');
    //         return false;
    //     });
    // });
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
@endsection