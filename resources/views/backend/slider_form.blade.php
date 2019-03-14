@extends('layouts.admin-master')

@section('styles')
    <style media="screen">
      .s-v {
        display: table;
        margin: 0 auto;
        margin-top: 50px;
        position: relative;
      }

      .s-v>div {
          display: inline-block;
      }

      .slider-image-view {
          height: 300px;
          width: 760px;
          border: 1px solid orange;

      }

      .slider-image-view>img {
        height: 100%;
        width: 100%;
      }

      .slider-navigation-left,
      .slider-navigation-right {
          position: absolute;
          top: 0;
          height: 100%;
          font-size: 26px;
      }

      .slider-navigation-left {
          left: -30px;
      }

      .slider-navigation-right {
          right: -30px;
      }

      .slider-navigation-left>span,
      .slider-navigation-right>span {
          position: relative;
          top: 45%;
      }

    </style>
@endsection

@section('content')
  <div class="container" style="margin-bottom: 50px;">
    @if(Session::has('success'))
        <div class="alert alert-success"> {{ Session::get('success') }} </div>
    @endif
        {!! Form::open(['action' => 'SliderImageController@postStore', 'files' => true]) !!}

        <div class="form-group">
            Slider Image <span class="s-i-id">Add</span>
        </div>
        <div class="form-group" style="">
          <div class="s-v">
            <div class="slider-navigation-left">
                <span><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
            </div>
            <div class="slider-image-view" style=""></div>
            <div class="slider-navigation-right">
                <span><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
            </div>
          </div>

        </div>
        <div class="form-group">
            {!! Form::label('slider-image', 'Choose an image') !!}
            {!! Form::file('slider-image') !!}
            <h4>Note: Image min-size -> 960 x 400</h4>
        </div>

        <div class="form-group">
            {!! Form::submit('Save', array( 'class'=>'btn btn-danger form-control' )) !!}
        </div>
        {{ csrf_field() }}
        {!! Form::close() !!}
        <div class="alert-warning">
            @foreach( $errors->all() as $error )
               <br> {{ $error }}
            @endforeach
        </div>
        <div class="">
            <?php $i=1 ?>
            @foreach ($sliderImages as $sliderImage)
                <h4>{{ 'Slider '.$i }}</h4>
                <div class="slider-image-view">
                    <img src="{{ asset('/images/slider/'. $sliderImage->file_path) }}" alt="{{ $sliderImage->file_path }}">
                </div>
                {!! Form::open(['action' => 'SliderImageController@postUpdate', 'onsubmit' => "return validateForm(this)", 'files' => true]) !!}
                    {!! Form::file('slider-image', ['id' => 'slider-image'. $sliderImage->id, 'class' => 's']) !!}
                    {!! Form::submit('Update Slider', ['class' => 'btn btn-primary']) !!}
                    {!! Form::hidden('id', $sliderImage->id) !!}
                {!! Form::close() !!}
                <a href="{{ route('slider.image.delete', ['id' => $sliderImage->id]) }}" class="btn" style="background-color: red; color: #fff; margin: 10px;">Delete Slider</a>
                <?php $i++ ?>
            @endforeach
        </div>
  </div>
@endsection

@section('jquery')
    <script type="text/javascript">
        
        $(document).ready(function() {
          $('#slider-image').on('change', function(event) {

            var place = document.getElementsByClassName('slider-image-view')[0];

            if(place.childNodes[0]) {
              place.removeChild(place.childNodes[0]);
            }

            for (var i = 0; i < event.originalEvent.srcElement.files.length; i++) {
                var file = event.originalEvent.srcElement.files[i];
                var img = document.createElement("img");
                var reader = new FileReader();

                reader.onloadend = function() {
                     img.src = reader.result;
                }

                reader.readAsDataURL(file);
                place.appendChild(img);
                img.style.width = '100%';
                img.style.height = '100%';
            }
          });



        });
    </script>

    <script type="text/javascript">
    
    function validateForm(form) {
       
       var fileThis = $('input[type="file"]', form);

        if(fileThis.get(0).files.length === 0)
        {
            console.log('FAILED');

            return false;

          }







      }
    </script>
@endsection
