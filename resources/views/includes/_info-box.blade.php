@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/common.css') }}">
@append

@if (Session::has('fail'))
    <section class="alert-info">
        {{ Session::get('fail') }}
    </section>
@endif

@if (Session::has('success'))
    <section class="alert-success">
        {{ Session::get('success') }}
    </section>
@endif

@if (count($errors) > 0)
    <section class="alert-warning">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </section>
@endif
