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

            <form action="/incubator/askedDoc/{{ $askedStartupDoc->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                    aria-label="Delete">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </form>
        </div>

        
        @endforeach
    </div>
    <div class="doc">
        <p class="mb-2 text-xl font-medium text-gray-600 dark:text-gray-400">Documents demandés par la Startup </p>
    </div>
    <div >
        <p class="mb-2 text-xl font-medium text-gray-600 dark:text-gray-400">Documents recus </p>
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