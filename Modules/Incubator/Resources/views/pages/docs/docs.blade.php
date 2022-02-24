@extends('incubator::layouts.master')

@section('content')
<a href="/incubator/startups/{{$startup->id}}/asking-docs"
    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
    <span>Demander un document</span>
</a>
{{-- Modal button --}}
<button @click="openModal" class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
    Uploader un document
  </button>
<div class="both w-full">
    <div>
        <p class="mb-2 text-xl font-medium text-gray-600 dark:text-gray-400">Documents demandés par L'incubateur</p>

        @foreach ($askedStartupDocs as $askedStartupDoc )
        <div class="mt-4 min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 flex justify-between">
            {{-- {{dd($askedStartupDoc->document_title)}} --}}

            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">{{$askedStartupDoc->document_title}}</p>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">{{$askedStartupDoc->document_description}}</p>

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

        @foreach ($docsAskedByStartups as $docsAskedByStartup)
        <div class="mt-4 min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 flex justify-between">
          {{-- {{dd($askedStartupDoc->document_title)}} --}}

          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">{{$docsAskedByStartup->document_title}}</p>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">{{$docsAskedByStartup->document_description}}</p>

          <form action="/incubator/askedDoc/{{ $docsAskedByStartup->id }}" method="post">
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
    <div>
        <p class="mb-2 text-xl font-medium text-gray-600 dark:text-gray-400">Documents uploadés </p>

        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
              <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                  <th class="px-4 py-3">Nom</th>
                  <th class="px-4 py-3">Delete</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                  @foreach ($documents as $document)
                <tr class="text-gray-700 dark:text-gray-400">

                  <td class="px-4 py-3">

                    <div class="flex items-center text-sm">
                      <!-- Avatar with inset shadow -->
                      <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                        
                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                      </div>
                      <div>
                          {{-- Nom de l'image --}}
                        <a href="/incubator/startups/{{$startup->id}}/documents/{{$document->id}}" class="font-semibold">{{$document->name}}</a>
                        
                      </div>
                    </div>
                  </td>
                  <td>
                      <form action="/incubator/startups/{{ $startup->id }}/documents/{{$document->id }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                              <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                          </button>
                        </form>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
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
          Ajout de fichiers à la Startup
        </p>
        <!-- Modal description -->
        <form action="/incubator/startups/{{$startup->id}}/documents" method="post" enctype="multipart/form-data">
          @csrf
          <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Nom du fichier</span>
            <input name="name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
          </label>
          
          <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">File</span>
            <input type="file" name="filepath" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
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
