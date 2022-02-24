@extends('incubator::layouts.master')

@section('content')
<form action="/incubator/startups/{{$startup->id}}/asking-docs" method="post">
  @csrf

  <label class="block text-sm">
    <span class="text-gray-700 dark:text-gray-400">Titre du Document</span>
    <input name="document_title" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
  </label>

  <label class="block text-sm">
    <span class="text-gray-700 dark:text-gray-400">Description du Document</span>
    <input name="document_description" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
  </label>

  <label class="block mt-4 text-sm">
    <span class="text-gray-700 dark:text-gray-400">
      Aidant
    </span>
    <select name="helper_user_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
      @foreach ($users as $user)
      <option value="{{$user->id}}">{{$user->name}}</option>
      @endforeach

    </select>
  </label>

  <button type="submit" class="mt-4 w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
    Accept
  </button>
</form>
@endsection
