@extends('incubator::layouts.master')

@section('content')
<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    Elements
</h4>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <form action="/incubator/tasks/{{$edit->id}}/update" method="post">
        @csrf
        @method('PUT')
    <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Tache</span>
        <input name="title"
            value="{{$edit->title}}"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
             />
    </label>
    <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Description</span>
        <input name="description"
        value="{{$edit->description}}"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
             />
    </label>
    <div>
        <button
        type="submit"
          class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        >
          Submit
        </button>
      </div>
</form>
</div>
@endsection