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
        <tbody>
        </tbody>        
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
          { data: 'id' },
          { data: 'nmpaket' },
          { data: 'pagurmp' },
          { data: 'keuangan' },
          { data: 'progres_fisik' }
        ],
      });
    });
</script>
@endsection