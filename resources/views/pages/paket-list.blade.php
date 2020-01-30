@extends('layouts.master')

@section('content')

  {{-- <div class="row m-5">
    <button id="btn-filter" class="btn btn-primary">Filter</button>
<a id="btn-download" href="{{ route('paket.download') }}" class="btn btn-outline-primary">Download</a>
  </div> --}}
  <div class="row m-3 col-md-6 col-md-offset-4">
    <div class="col-6">
      <select name  = "balai_filter" id = "balai_filter" class = "form-control">
        <option value = "">Select Balai</option>
            @foreach($balaipaket as $row)
                <option value = "{{ $row->id }}">{{ $row->nmbalai }}</option>
            @endforeach
      </select>
    </div>
    <div class="col-6">
    <select name  = "balai_filter" id = "balai_filter" class = "form-control">
      <option value = "">Select Kode Output</option>
          @foreach($kdoutput as $row)
              <option value = "{{ $row->kdoutput }}">{{ $row->nmoutput }}</option>
          @endforeach
    </select>
  </div>
  </div>
    <div class="col-12">
      <table id="paket_table" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Pagu</th>
          <th>Keuangan</th>
          <th>Progres Fisik</th>
          <th>Nama Balai</th>
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
      fetch_data();
    function fetch_data(balaipaket = '')
    {
        let table = $('#paket_table').DataTable({
          dom: 'Bfrtip',
          className: 'fa fa-cog fa-2x',
          buttons: [
            { extend: 'copy', className: 'btn btn-primary glyphicon glyphicon-duplicate' },
            { extend: 'csv', className: 'btn btn-primary glyphicon glyphicon-save-file' },
            { extend: 'excel', className: 'btn btn-primary glyphicon glyphicon-list-alt' },
            { extend: 'pdf', className: 'btn btn-primary glyphicon glyphicon-file' },
            { extend: 'print', className: 'btn btn-primary glyphicon glyphicon-print' }
          ],
            processing: true,
            language: {
                processing: '<span>Processing</span>',
            },
            serverSide: true,
            order: [4, 'asc'],
            ajax: {
                url : "{{ route('paket.query') }}",
                data: {balaipaket:balaipaket}
            },
            columns: [
                { data: 'id' },
                { data: 'nmpaket' },
                { data: 'pagurmp' },
                { data: 'keuangan' },
                { data: 'progres_fisik' },
                { data: 'nmbalai' },
            ],
        });
      }
        $('#balai_filter').change(function(){
            var balaipaket = $('#balai_filter').val();
            $('#paket_table').DataTable().destroy();
            fetch_data(balaipaket);
        });
    });
</script>
@endsection