{{-- {!! Form::open(['action' => 'ProductController@postStore', 'files' => true]) !!} --}}
{!! Form::open(['action' => 'ProductController@postStore', 'files' => true, 'method' => 'post']) !!}
    <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                  {!! Form::label('name', 'Name', ['class' => 'form-control-label']) !!}
                  {!! Form::text('name', Request::old('name'), ['class' => 'form-control '.($errors->has('name')? 'has-error': '')]) !!}
              </div>
              <!-- Category -->
              <div class="form-group">
                  {!! Form::label('category_select', 'Add Categories', ['class' => 'form-control-label']) !!}
                  {!! Form::select('category_select', $category_select, null, ['class' => 'form-control']) !!}
              </div>
              <div class="form-group">
                  {!! Form::button('Add Category', ['class' => 'btn btn-primary add-category-btn']) !!}
              </div>
              <div class="form-group added-categories" style="background-color: lightgray; min-height: 1px;">
                  <ul></ul>
              </div>
              <div class="form-group">
                  <input type="hidden" name="categories" id="categories">
              </div>
              <!---->
              <!-- Tag -->
              <div class="form-group">
                  {!! Form::label('tag_select', 'Add Tags', ['class' => 'form-control-label']) !!}
                  {!! Form::select('tag_select', $tag_select, null, ['class' => 'form-control']) !!}
              </div>
              <div class="form-group">
                  {!! Form::button('Add Tag', ['class' => 'btn btn-primary add-tag-btn']) !!}
              </div>
              <div class="form-group added-tags" style="background-color: lightgray; min-height: 1px;">
                  <ul></ul>
              </div>
              <div class="form-group">
                  <input type="hidden" name="tags" id="tags">
              </div>
              <!---->
              <!-- Size -->
              <div class="form-group">
                  {!! Form::label('size_select', 'Add Sizes', ['class' => 'form-control-label']) !!}
                  {!! Form::select('size_select', $size_select, null, ['class' => 'form-control']) !!}
              </div>
              <div class="form-group">
                  {!! Form::button('Add Size', ['class' => 'btn btn-primary add-size-btn']) !!}
              </div>
              <div class="form-group added-sizes" style="background-color: lightgray; min-height: 1px;">
                  <ul></ul>
              </div>
              <div class="form-group">
                  <input type="hidden" name="sizes" id="sizes">
              </div>
              <!---->
              <div class="form-group">
                  {!! Form::label('price', 'Price', ['class' => 'form-control-label']) !!}
                  {!! Form::number('price', Request::old('price'), ['class' => 'form-control '.($errors->has('price')? 'has-error': '')]) !!}
              </div>
              <div class="form-group">
                  {!! Form::label('description', 'Description', ['class' => 'form-control-label']) !!}
                  {!! Form::textarea('description', Request::old('description'), ['class' => 'form-control '.($errors->has('description')? 'has-error': '')]) !!}
              </div>
              <div class="form-group">
                  {!! Form::submit('Upload Item', ['class' => 'btn btn-primary', 'accept' => 'image/jpeg, image/png']) !!}
              </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
              {!! Form::label('picture', 'Picture', ['class' => 'form-control-label']) !!}
                <div class="place" style="margin-bottom: 20px;"></div>
              {!! Form::file('picture', null, ['class' => 'form-control '.($errors->has('picture')? 'has-error': '')]) !!}
            </div>
        </div>
    </div>
{{ csrf_field() }}
{!! Form::close() !!}
