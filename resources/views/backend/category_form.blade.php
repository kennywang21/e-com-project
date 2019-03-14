@extends('layouts.admin-master')

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <style media="screen">
        #update {
          visibility: hidden;
        }

        .updated-name-div {
          position: relative;
          visibility: hidden;
        }
    </style>
@endsection

@section('content')
    <div class="container" style="min-height: 100vh;">
        @include('includes._info-box')

            {!! Form::open(['action' => 'CategoryController@postStore']) !!}
            <div class="row">
              <div class="form-group col-sm-6">
                  {!! Form::label('name', 'Category: ', ['class' => 'form-control-label']) !!}
                  {!! Form::text('name', null, ['class' => 'form-control', 'onkeyup' => "capitalize(this.id, this.value);"]) !!}
              </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-3">
                  {!! Form::submit('Create Category', array( 'class'=>'btn btn-danger form-control' )) !!}
              </div>
              {!! Form::close() !!}
              {!! Form::open(['action' => 'CategoryController@postUpdate']) !!}
              <div class="form-group col-sm-6 updated-name-div">
                  {!! Form::text('update_name', null, ['id' => 'update_name', 'class' => 'form-control', 'onkeyup' => "capitalize(this.id, this.value);"]) !!}
              </div>
              <div class="form-group col-sm-3">
                  {!! Form::submit('Update Category', array( 'id' => 'update', 'class'=>'btn btn-primary form-control' )) !!}
                  <!-- REMEMBER IF Form::hidden failed, use standard form type="hidden" -->
                  <input type="hidden" name='update_id' id='update_id' />
              </div>
              {!! Form::close() !!}
            </div>

            <div class="">
                <table class="table table-bordered" id="categories-table">
                    <thead>
                        <tr>
                            <th>Category</th>
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
          table = $('#categories-table').DataTable({
              "processing": true,
              "serverSide": true,
              "ajax": "{!! route('categories.datatable') !!}",
              "columns": [
                  {data: 'name', name: 'name'},
                  {data: 'actions', name: 'actions', orderable: false, searchable: false}
              ]
          });
        });
    </script>

    <script type="text/javascript">
        function capitalize(textboxid, str) {
            
            if (str && str.length >= 1)
            {
                var firstChar = str.charAt(0);
                var remainingStr = str.slice(1);
                str = firstChar.toUpperCase() + remainingStr;
            }
            document.getElementById(textboxid).value = str;
        }
    </script>

    <script type="text/javascript">

            function updateCategory(id, name) {

                $('#update').css('visibility', 'visible');
                $('#name').css('visibility', 'hidden');
                $('.updated-name-div').css('visibility', 'visible');

                $('#update_id').val(id);
                $('#update_name').val(name);
            };

    </script>
@endsection
