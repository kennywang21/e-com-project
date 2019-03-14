  <div class="mask">
    <div class="darken-div"></div>
    <ul class="images">
      @foreach ($sliderImages as $sliderImage)
          <li>
              <img src="{{ asset('images/slider/'. $sliderImage->file_path) }}"  alt="{{ $sliderImage->file_path }}" />
          </li>
      @endforeach
    </ul>
    <ul class="triggers">
        @foreach ($sliderImages as $sliderImage)
            <li><i class="" aria-hidden="true"></i></li>
        @endforeach
    </ul>
    <span class="control prev"><i class="fa fa-angle-left"></i></span>
    <span class="control next"><i class="fa fa-angle-right"></i></span>
  </div>
