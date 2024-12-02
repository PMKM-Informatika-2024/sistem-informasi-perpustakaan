<x-dashboard.layout :title="$title">
  <div class="space-y-4 sm:grid sm:grid-cols-2 sm:gap-3 sm:space-y-0 lg:grid-cols-3">
    <div class="flex w-full rounded-lg border border-gray-200 bg-white p-4 shadow dark:border-gray-700 dark:bg-gray-800">
      <div class="flex flex-col justify-center">
        <svg class="size-7 mb-2 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
          <path fill-rule="evenodd"
            d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z"
            clip-rule="evenodd" />
        </svg>
        <h5 class="mb-1 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Total Member</h5>
      </div>
      <p class="flex flex-1 items-center justify-end text-7xl font-medium text-gray-500 dark:text-white">{{ $members->count() }}</p>
    </div>
    <div class="flex w-full rounded-lg border border-gray-200 bg-white p-4 shadow dark:border-gray-700 dark:bg-gray-800">
      <div class="flex flex-col justify-center">
        <svg class="size-7 mb-2 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
          <path fill-rule="evenodd" d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z" clip-rule="evenodd" />
        </svg>
        <h5 class="mb-1 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Total Buku</h5>
      </div>
      <p class="flex flex-1 items-center justify-end text-7xl font-medium text-gray-500 dark:text-white">{{ $books->count() }}</p>
    </div>
    <div class="flex w-full rounded-lg border border-gray-200 bg-white p-4 shadow dark:border-gray-700 dark:bg-gray-800">
      <div class="flex flex-col justify-center">
        <svg class="size-7 mb-2 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
          <path fill-rule="evenodd"
            d="M5.617 2.076a1 1 0 0 1 1.09.217L8 3.586l1.293-1.293a1 1 0 0 1 1.414 0L12 3.586l1.293-1.293a1 1 0 0 1 1.414 0L16 3.586l1.293-1.293A1 1 0 0 1 19 3v18a1 1 0 0 1-1.707.707L16 20.414l-1.293 1.293a1 1 0 0 1-1.414 0L12 20.414l-1.293 1.293a1 1 0 0 1-1.414 0L8 20.414l-1.293 1.293A1 1 0 0 1 5 21V3a1 1 0 0 1 .617-.924ZM9 7a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2H9Zm0 4a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Zm0 4a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z"
            clip-rule="evenodd" />
        </svg>
        <h5 class="mb-1 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Peminjaman</h5>
      </div>
      <p class="flex flex-1 items-center justify-end text-7xl font-medium text-gray-500 dark:text-white">{{ $loans->count() }}</p>
    </div>
  </div>
</x-dashboard.layout>
