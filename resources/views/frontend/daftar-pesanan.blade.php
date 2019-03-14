@extends('layouts.master')

@section('styles')
  <style media="screen">
      .datatables-image {
        width: 50px;
        height: 50px;
      }

      .next {
          color: rgba(255, 255, 255, 0.5);
          display: block;
          top: 0;
          right: 0;
          padding: 0;
          position: relative;
          z-index: 5;
          background-color: transparent;
          border-radius: 0;
          width: auto;
          height: auto;
          text-align: left;
          font-size: 14px;
          line-height: 1.6;
      }
  </style>
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="container" style="min-height: 100vh;">
        @include('includes._info-box')
        <div class="">
            <table class="table table-bordered" id="transactions-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Size</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Status</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('jquery')
  <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  <!-- DataTables -->
  <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <!-- Bootstrap JavaScript -->
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
  <script type="text/javascript">
      $(document).ready(function() {
        table = $('#transactions-table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{!! route('transactions.datatable', ['email' => Auth::user()->email]) !!}",
            "columns": [
                {data: 'name', name: 'name'},
                {data: 'image', name: 'image'},
                {data: 'size', name: 'size'},
                {data: 'qty', name: 'qty'},
                {data: 'total_price', name: 'total_price'},
                {data: 'status', name: 'status'}
            ],
            order: [[0, 'asc']]
        });
      });
  </script>
@endsection
