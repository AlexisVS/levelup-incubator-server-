@extends('incubator::layouts.master')

@section('content')
@foreach ($users as $user)
<div class="max-w-sm px-4 py-3 bg-white rounded-md shadow-md dark:bg-gray-800 grid grid-cols-4 mt-6">
    <div>
        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            User : {{$user->first_name}} {{$user->last_name}}
        </p>
        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            Email : {{$user->email}}
        </p>
    </div>
</div>
@endforeach

@endsection
