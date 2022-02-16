@extends('incubator::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p class="text-red-500">
        This view is loaded from module: {!! config('incubator.name') !!}
    </p>
@endsection
