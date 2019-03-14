@extends('layouts.admin-master')

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="container" style="min-height: 100vh;">
        @include('includes._info-box')
            <!-- action Controller -->
            {!! Form::open(['action' => 'SizeController@postStore']) !!}
            <div class="row">
              <div class="form-group col-sm-6">
                  {!! Form::label('size', 'Size: ', ['class' => 'form-control-label']) !!}
                  {!! Form::number('size', null, ['class' => 'form-control', 'onkeypress' => 'return isNumberKey(event)', 'min' => 0]) !!}
              </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-3">
                  {!! Form::submit('Create Size', array( 'class'=>'btn btn-danger form-control' )) !!}
              </div>
              {{ csrf_field() }}
              {!! Form::close() !!}
            </div>

            <div class="">
                <table class="table table-bordered" id="sizes-table">
                    <thead>
                        <tr>
                            <th>Size</th>
                            <th>Actions</th>
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
          table = $('#sizes-table').DataTable({
              "processing": true,
              "serverSide": true,
              "ajax": "{!! route('sizes.datatable') !!}",
              "columns": [
                  {data: 'size', name: 'size'},
                  {data: 'actions', name: 'actions', orderable: false, searchable: false}
              ],
              order: [[0, 'asc']]
          });
        });
    </script>

    <script type="text/javascript">
       
        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {

                return false;
            }

            return true;
        }
    </script>

@endsection
