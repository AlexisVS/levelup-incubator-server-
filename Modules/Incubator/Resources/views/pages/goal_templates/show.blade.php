@extends('incubator::layouts.master')

@section('content')
<div class="overflow-hidden sm:rounded-lg">
  <div class=" py-5 sm:px-6">
    <h3 class="text-2xl my-6 leading-6 font-medium text-gray-900 dark:text-gray-200">Goal {{ $goal_template->name }} Information</h3>
    <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-300">
      <strong>Description:</strong>
      {{ $goal_template->description }}</p>
  </div>
  <div class="">
    <dl>
      <div class="px-4 py-8 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-800 underline dark:text-gray-200 mt-6 mb-4">Goal tasks include</dt>
        <dd class="mt-1 text-sm text-gray-900 dark:text-gray-200 sm:mt-0 sm:col-span-2">
          @foreach($goal_task_templates as $goal_task_template)
          <p class="ml-6 pl-6">{{ $goal_task_template->name }}</p>
          <br>
          @endforeach
        </dd>
      </div>
    </dl>
  </div>
</div>
@endsection
