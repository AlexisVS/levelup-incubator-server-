@extends('incubator::layouts.master')

@section('content')
<div class="flex items-center justify-between">
  <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Document
  </h2>
  <div class="flex items-center space-x-3">
    <a href="/incubator/startups/{{$startup->id}}/asking-docs" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
      <span>Demander un document</span>
    </a>
  </div>
</div>

<div>
  <div class="grid grid-cols-2">
    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Documents demandés par L'incubateur</p>

  </div>
  <div>
    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Documents demandés par </p>

  </div>
</div>

@endsection
