@extends('incubator::layouts.master')

@section('content')
<a href="/incubator/startups/{{$startup->id}}/asking-docs"
    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
    <span>Demander un document</span>
</a>
<div class="both w-full">
    <div>
        <p class="mb-2 text-xl font-medium text-gray-600 dark:text-gray-400">Documents demandés par L'incubateur</p>

        @foreach ($askedStartupDocs as $askedStartupDoc )
        <div class="mt-4 min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            {{-- {{dd($askedStartupDoc->document_title)}} --}}
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">{{$askedStartupDoc->document_title}}</p>
        </div>
        @endforeach
    </div>
    <div class="doc">
        <p class="mb-2 text-xl font-medium text-gray-600 dark:text-gray-400">Documents demandés par la Startup </p>
    </div>
</div>

<style>
    .both{
            display: grid;
            grid-template-columns: 1fr 2fr;
            grid-gap: 10px;
            margin-top: 10%;
            width:100%
        }
    .doc{
        margin-left: 20%;
        padding-left: 3%;
        border-left: solid 1px blue
    }
</style>
@endsection