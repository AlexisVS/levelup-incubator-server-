@extends('incubator::layouts.master')

@section('content')

<div class="flex items-center justify-between">
  <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Startup {{ $startup->name }}
  </h2>
  <div class="flex items-center space-x-3">
    {{-- Modal button --}}
    <button @click="openModal" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
      Ajouter une tache
    </button>

    <a href="/incubator/startups/{{$startup->id}}/documents" class="mx-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
      <span>Documents</span>
    </a>
  </div>
</div>
{{-- /* --------------------------------- Taches --------------------------------- */ --}}
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
  Startup users
</h2>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">

  @foreach ($users as $user)
  <div class="bg-gray-200 p-1 rounded-lg dark:bg-gray-800">
    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
      User : {{ $user->first_name }} {{ $user->last_name }}
    </p>
    <p class="text-xs font-semibold text-gray-700 dark:text-gray-200 whitespace-nowrap">
      Email : {{ $user->email }}
    </p>
  </div>
  @endforeach

</div>
{{-- /* -------------------------------------------------------------------------- */ --}}
<div id="both">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Taches
    </h2>
    @foreach ($tasks as $task)
    <div class="mt-4 min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
      <div class="flex items-center justify-between">

        <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
          {{$task->title}}
        </h4>

      {{-- Action --}}
      <div class="flex items-center space-x-4 text-sm">
        <form action="/incubator/tasks/delete/{{ $task->id }}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
            </svg>
          </button>
        </form>
        {{-- Edit --}}
        <a href="/incubator/tasks/{{ $task->id }}/edit" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
          <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
            </path>
          </svg>
        </a>
      </div>

      </div>
      <p class="text-gray-600 dark:text-gray-400">
        {{$task->description}}
      </p>

    </div>
    @endforeach
  </div>
</div>

</div>

{{-- Modal Div --}}
<div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center" style="display: none;">
  <!-- Modal -->
  <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal" @keydown.escape="closeModal" class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="modal" style="display: none;">
    <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
    <header class="flex justify-end">
      <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" @click="closeModal">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
          <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
        </svg>
      </button>
    </header>
    <!-- Modal body -->
    <div class="mt-4 mb-6">
      <!-- Modal title -->
      <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
        Ajout de taches à la Startup
      </p>
      <!-- Modal description -->

      <form action="/incubator/tasks/startups/{{$user->startup_id}}" method="post">
        @csrf

        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Titre</span>
          <input name="title" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
        </label>
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Description</span>
          <input name="description" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
        </label>

        <button type="submit" class="mt-4 w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
          Accept
        </button>
      </form>
    </div>
    <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
      <button @click="closeModal" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
        Cancel
      </button>

    </footer>
  </div>
</div>
<style>
  /* #both {
    display: grid;
    grid-template-columns: 1fr 2fr;
    grid-gap: 10px;
  } */

</style>
@endsection
