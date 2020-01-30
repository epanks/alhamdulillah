@extends('layouts.master')

@section('content')

  
    <div class="col-12">
      <table id="paket_table" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Pagu</th>
          <th>Keuangan</th>
          <th>Progres Fisik</th>
        </tr>
        </thead>        
      </table>
    </div>
  </div>

@endsection

@section('script')
{{-- <script src="{{ mix('js/app.js') }}"></script> --}}
<script>
    $(document).ready(function () {
      $('#paket_table').DataTable({
        processing: true,
        serverside: true,
        ajax: '{{ url('paket.filter2') }}',
        columns: [
          { data: 'id', name: 'id' },
          { data: 'nmpaket', name: 'nmpaket' },
          { data: 'pagurmp', name: 'pagurmp' },
          { data: 'keuangan', name: 'keuangan' },
          { data: 'progres_fisik', name: 'progres_fisik' }
        ]
      });
    });
</script>
@endsection