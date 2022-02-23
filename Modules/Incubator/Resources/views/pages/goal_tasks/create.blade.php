@extends('incubator::layouts.master')

@section('content')
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
  Add goal task
</h2>

<form action="/incubator/startups/{{ $goal->startup_id }}/goals/{{ $goal->id }}/tasks" method="POST" enctype="multipart/form-data">
  @csrf
  @method('POST')
  <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

    <label class="block py-2 text-sm">
      <span class="text-gray-700 dark:text-gray-400">Name</span>
      <input autofocus type="text" name="name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="First name">
    </label>

    <button type="submit" class="px-4 mt-4 mb-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
      Submit
    </button>

  </div>
</form>
@endsection
