@extends('incubator::layouts.master')

@section('content')
<!-- General elements -->
<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
  Elements
</h4>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
  <form action="/incubator/startups/create" method="post">
    @csrf
    <label class="block text-sm">
      <span class="text-gray-700 dark:text-gray-400">Nom de la Startup</span>
      <input name="name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
    </label>

    <label class="block text-sm">
      <span class="text-gray-700 dark:text-gray-400">Description</span>
      <input name="description" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
    </label>

    <label class="block py-2 text-sm">
      <span class="text-gray-700 dark:text-gray-400">
        Choisissez votre parcours
      </span>
      <select name="goalTemplates[]" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" multiple>
        @foreach($goalTemplates as $goalTemplate)
        <option value="{{ $goalTemplate->id }}">{{ $goalTemplate->name }}</option>
        @endforeach
      </select>
    </label>

    <div>
      <button type="submit" class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        Submit
      </button>
    </div>
  </form>
</div>
@endsection
