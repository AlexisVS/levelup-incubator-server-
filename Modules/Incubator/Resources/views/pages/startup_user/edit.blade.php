@extends('incubator::layouts.master')

@section('content')
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
  Startup users {{ $startup_user->first_name . ' ' . $startup_user->last_name }}
</h2>

<form action="/incubator/startup-users/{{ $startup_user->id }}/update" method="POST">
  @csrf
  @method('PUT')
  <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

    <label class="block py-2 text-sm">
      <span class="text-gray-700 dark:text-gray-400">Email</span>
      <input value="{{ $startup_user->email }}" name="email" type="email" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Email">
    </label>

    <label class="block py-2 text-sm">
      <span class="text-gray-700 dark:text-gray-400">Password</span>
      <input name="password" type="password" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Password">
    </label>

    <label class="block py-2 text-sm">
      <span class="text-gray-700 dark:text-gray-400">First name</span>
      <input value="{{ $startup_user->first_name }}" type="text" name="first_name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="First name">
    </label>

    <label class="block py-2 text-sm">
      <span class="text-gray-700 dark:text-gray-400">Last name</span>
      <input value="{{ $startup_user->last_name }}" type="text" name="last_name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Last name">
    </label>

    <label class="block py-2 text-sm">
      <span class="text-gray-700 dark:text-gray-400">
        Startup
      </span>

    </label>

    <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
      Submit
    </button>

  </div>
</form>
@endsection
