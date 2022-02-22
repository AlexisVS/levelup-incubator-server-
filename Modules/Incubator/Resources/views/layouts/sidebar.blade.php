    <!-- Desktop sidebar -->
    <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
      <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="/incubator/dashboard">
          Windmill
        </a>
        <ul class="mt-6">
          <li class="relative px-6 py-3">
            @if(Request::is('incubator/dashboard*'))
            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
            @endif
            <a class="inline-flex items-center w-full text-sm font-semibold {{ Request::is('incubator/dashboard') ? 'text-gray-800 dark:text-gray-100' : null }} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="/incubator/dashboard">
              <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
              </svg>
              <span class="ml-4">Dashboard</span>
            </a>
          </li>
        </ul>
        <ul>
          <li class="relative px-6 py-3">
            @if(Request::is('incubator/startups*'))
            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
            @endif
            <a class="inline-flex items-center w-full text-sm font-semibold {{ Request::is('incubator/startups') ? 'text-gray-800 dark:text-gray-100' : null }} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="/incubator/startups">
              <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
              </svg>
              <span class="ml-4">Startups</span>
            </a>
          </li>
          {{-- <li class="relative px-6 py-3">
            @if(Request::is('incubator/goals*'))
            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
            @endif
            <a class="inline-flex items-center w-full text-sm font-semibold {{ Request::is('incubator/goals') ? 'text-gray-800 dark:text-gray-100' : null }} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="/incubator/goals">
              <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
              </svg>
              <span class="ml-4">Goals</span>
            </a>
          </li> --}}

          <div class="py-1 mx-auto border-t" style="width: 82%; border-color: #999999a0"></div>
          <li class="relative px-6 py-3">
            @if(Request::is('incubator/goal-templates*'))
            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
            @endif
            <a class="inline-flex items-center w-full text-sm font-semibold {{ Request::is('incubator/goal-templates') ? 'text-gray-800 dark:text-gray-100' : null }} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="/incubator/goal-templates">
              <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
              </svg>
              <span class="ml-4">Goals templates</span>
            </a>
          </li>
          <li class="relative px-6 py-3">
            @if(Request::is('incubator/goal-task-templates*'))
            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
            @endif
            <a class="inline-flex items-center w-full text-sm font-semibold {{ Request::is('incubator/goal-task-templates') ? 'text-gray-800 dark:text-gray-100' : null }} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="/incubator/goal-task-templates">
              <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
              </svg>
              <span class="ml-4">Goals task templates</span>
            </a>
          </li>
        </ul>
        <div class="px-6 my-6">
          <a href="/incubator/startups/create" class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Créer une Startup
            <span class="ml-2" aria-hidden="true">+</span>
          </a>
        </div>
        <div class="px-6 my-6">
          <a href="/incubator/startup-users/create" class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Create user account
            <span class="ml-2" aria-hidden="true">+</span>
          </a>
        </div>
      </div>
    </aside>
    <!-- Mobile sidebar -->
    <!-- Backdrop -->
    <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
    <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden" x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu" @keydown.escape="closeSideMenu">
      <div class="py-4 text-gray-500 dark:text-gray-400">
        <a href="/incubator/dashboard" class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
          Windmill
        </a>
        <ul class="mt-6">
          <li class="relative px-6 py-3">
            @if(Request::is('incubator/dashboard*'))
            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
            @endif
            <a href="/incubator/dashboard" class="inline-flex items-center w-full text-sm font-semibold {{ Request::is('incubator/dashboard') ? 'text-gray-800 dark:text-gray-100' : null }} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="index.html">
              <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
              </svg>
              <span class="ml-4">Dashboard</span>
            </a>
          </li>
        </ul>
        <ul>
          <li class="relative px-6 py-3">
            @if(Request::is('incubator/startups*'))
            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
            @endif
            <a class="inline-flex items-center w-full text-sm font-semibold {{ Request::is('incubator/startups') ? 'text-gray-800 dark:text-gray-100' : null }} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="/incubator/startups">
              <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
              </svg>
              <span class="ml-4">Startup</span>
            </a>
          </li>
          {{-- <li class="relative px-6 py-3">
            @if(Request::is('incubator/goals*'))
            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
            @endif
            <a class="inline-flex items-center w-full text-sm font-semibold {{ Request::is('incubator/goals') ? 'text-gray-800 dark:text-gray-100' : null }} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="/incubator/goals">
              <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
              </svg>
              <span class="ml-4">Goals</span>
            </a>
          </li> --}}
          <div class="py-1 mx-auto border-t" style="width: 82%; border-color: #999999a0"></div>
          <li class="relative px-6 py-3">
            @if(Request::is('incubator/goal-templates*'))
            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
            @endif
            <a class="inline-flex items-center w-full text-sm font-semibold {{ Request::is('incubator/goal-templates') ? 'text-gray-800 dark:text-gray-100' : null }} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="/incubator/goal-templates">
              <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
              </svg>
              <span class="ml-4">Goals templates</span>
            </a>
          </li>
          <li class="relative px-6 py-3">
            @if(Request::is('incubator/goal-task-templates*'))
            <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
            @endif
            <a class="inline-flex items-center w-full text-sm font-semibold {{ Request::is('incubator/goal-task-templates') ? 'text-gray-800 dark:text-gray-100' : null }} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="/incubator/goal-task-templates">
              <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
              </svg>
              <span class="ml-4">Goals tasks templates</span>
            </a>
          </li>
        </ul>
        <div class="px-6 my-6">
          <a href="/incubator/startups/create" class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Créer une Startup
            <span class="ml-2" aria-hidden="true">+</span>
          </a>
        </div>
        <div class="px-6 my-6">
          <a href="/incubator/startup-users/create" class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Create user account
            <span class="ml-2" aria-hidden="true">+</span>
          </a>
        </div>
      </div>
    </aside>
