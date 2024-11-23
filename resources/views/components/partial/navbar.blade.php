<nav class="border-gray-200 bg-white px-4 py-2.5 dark:bg-gray-800">
  <div class="flex flex-wrap items-center justify-between">
    <div>
      <h1 class="text-3xl/none font-bold text-gray-100">{{ session('menu') }}</h1>
    </div>
    <div class="flex items-center justify-start">
      <button aria-expanded="true" aria-controls="sidebar" data-drawer-target="sidebar" data-drawer-toggle="sidebar"
        class="mr-2 cursor-pointer rounded-lg p-2 text-gray-600 hover:bg-gray-100 hover:text-gray-900 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:bg-gray-700 dark:focus:ring-gray-700 lg:hidden">
        <svg class="size-[18px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
        </svg>
      </button>
    </div>
    <div class="flex items-center gap-3">
      <div>
        <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ Auth::user()->name }}</p>
        <p class="text-right text-sm text-gray-500 dark:text-gray-400">{{ Str::ucfirst(Auth::user()->role->name) }}</p>
      </div>
      <div>
        <img class="size-10 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
      </div>
    </div>
  </div>
</nav>
