{!! Form::open(['route' => 'admin.blog.post.update', 'method' => 'post']) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title', ['class' => 'form-control-label']) !!}
        {!! Form::text('title', (Request::old('title')? Request::old('title'): (isset($post)? $post->title: '')), ['class' => 'form-control '.($errors->has('title')? 'has-error': '')]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('author', 'Author', ['class' => 'form-control-label']) !!}
        {!! Form::text('author', (Request::old('author')? Request::old('author') : (isset($post)? $post->author: '')), ['class' => 'form-control '.($errors->has('author')? 'has-error': '')]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category_select', 'Add Categories', ['class' => 'form-control-label']) !!}
        {!! Form::select('category_select', $select_option_value_name, null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::button('Add Category', ['class' => 'btn btn-primary add-category-btn']) !!}
    </div>
    <div class="form-group added-categories">
        <ul><!-- display only category that attach to that post -->
            @foreach ($post_categories as $post_category)
                <li><a href="#" data-id="{{ $post_category->id }}">{{ $post_category->name }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="form-group">
        {!! Form::label('body', 'Body', ['class' => 'form-control-label']) !!}
        {!! Form::textarea('body', (Request::old('body')? Request::old('body'): (isset($post)? $post->body: '')), ['class' => 'form-control '.($errors->has('body')? 'has-error': ''), 'rows' => '12']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update Post', ['class' => 'btn btn-primary']) !!}
    </div>
    <div class="form-group"><!-- implode() returns a STRING from the elements of an ARRAY -->
        <input type="hidden" name='categories' id='categories' value="{{ implode(",", $post_categories_ids) }}"/><!-- $post_categories_ids is an 'ARRAY' so it 'MUST BE STRING' to store inside 'VALUE' -->
        {!! Form::hidden('post_id', $post->id) !!}
    </div>
{{ csrf_field() }}
{!! Form::close() !!}
