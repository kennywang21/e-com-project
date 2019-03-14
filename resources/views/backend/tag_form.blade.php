@extends('layouts.admin-master')

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="container" style="min-height: 100vh;">
        @include('includes._info-box')
            <!-- action Controller -->
            {!! Form::open(['action' => 'TagController@postStore']) !!}
            <div class="row">
              <div class="form-group col-sm-6">
                  {!! Form::label('tag', 'Tag: ', ['class' => 'form-control-label']) !!}
                  {!! Form::text('tag', null, ['class' => 'form-control', 'onkeyup' => "capitalize(this.id, this.value);"]) !!}
              </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-3">
                  {!! Form::submit('Create Tag', array( 'class'=>'btn btn-primary form-control' )) !!}
              </div>
              {{ csrf_field() }}
              {!! Form::close() !!}
            </div>

            <div class="">
                <table class="table table-bordered" id="sizes-table">
                    <thead>
                        <tr>
                            <th>Tag</th>
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
              "ajax": "{!! route('tags.datatable') !!}",
              "columns": [
                  {data: 'tag', name: 'tag'},
                  {data: 'actions', name: 'actions', orderable: false, searchable: false}
              ],
              order: [[0, 'asc']]
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
@endsection
