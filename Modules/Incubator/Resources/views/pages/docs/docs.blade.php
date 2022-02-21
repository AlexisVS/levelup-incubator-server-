@extends('incubator::layouts.master')

@section('content')

<a href="/incubator/startups/{{$startup->id}}/asking-docs"
    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
    <span>Demander un document</span>
</a>

<div>
    <div class="grid grid-cols-2">
        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Documents demandés par L'incubateur</p>

    </div>
    <div>
        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Documents demandés par  </p>

    </div>
</div>

@endsection