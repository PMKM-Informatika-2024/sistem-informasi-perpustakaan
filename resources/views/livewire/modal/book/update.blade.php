<div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
  <div class="flex items-center justify-between rounded-t border-b p-4 dark:border-gray-600 md:p-5">
    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
      Update Buku
    </h3>
    <button type="button" class="size-8 ms-auto inline-flex items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
      x-on:click="open = false">
      <svg class="size-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
      </svg>
      <span class="sr-only">Close modal</span>
    </button>
  </div>
  <form class="gap-4 p-4 md:p-5" wire:submit="update">
    <div class="space-y-3">
      <div>
        <label for="code" class="mb-1 block text-sm font-medium text-gray-900 dark:text-white">Nomor Induk</label>
        <input type="text" wire:model="code" id="code"
          class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:read-only:bg-gray-600 dark:read-only:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
          placeholder="741.5592" required>
        @error('code')
          <span class="text-sm text-red-400">{{ $message }}</span>
        @enderror
      </div>
      <div>
        <label for="author" class="mb-1 block text-sm font-medium text-gray-900 dark:text-white">Pengarang</label>
        <input type="text" wire:model="author" id="author"
          class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:read-only:bg-gray-600 dark:read-only:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
          placeholder="741.5592" required>
        @error('author')
          <span class="text-sm text-red-400">{{ $message }}</span>
        @enderror
      </div>
      <div>
        <label for="title" class="mb-1 block text-sm font-medium text-gray-900 dark:text-white">Judul Buku</label>
        <input type="text" wire:model="title" id="title"
          class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:read-only:bg-gray-600 dark:read-only:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
          placeholder="Doraemon" required>
        @error('title')
          <span class="text-sm text-red-400">{{ $message }}</span>
        @enderror
      </div>
      <div class="flex gap-4">
        <div>
          <label for="publisher" class="mb-1 block text-sm font-medium text-gray-900 dark:text-white">Penerbit</label>
          <input type="text" wire:model="publisher" id="publisher"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:read-only:bg-gray-600 dark:read-only:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
            placeholder="Doraemon" required>
          @error('publisher')
            <span class="text-sm text-red-400">{{ $message }}</span>
          @enderror
        </div>
        <div>
          <label for="year" class="mb-1 block text-sm font-medium text-gray-900 dark:text-white">Tahun Terbit</label>
          <input type="text" wire:model="year" id="year"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:read-only:bg-gray-600 dark:read-only:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
            placeholder="Doraemon" required>
          @error('year')
            <span class="text-sm text-red-400">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div>
        <label for="source" class="mb-1 block text-sm font-medium text-gray-900 dark:text-white">Sumber</label>
        <input type="text" wire:model="source" id="source"
          class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:read-only:bg-gray-600 dark:read-only:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
          placeholder="Doraemon" required>
        @error('source')
          <span class="text-sm text-red-400">{{ $message }}</span>
        @enderror
      </div>
      <div>
        <label for="description" class="mb-1 block text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
        <textarea wire:model="description" id="description"
          class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:read-only:bg-gray-600 dark:read-only:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
          placeholder="Doraemon" required></textarea>
        @error('description')
          <span class="text-sm text-red-400">{{ $message }}</span>
        @enderror
      </div>
    </div>
    <div class="flex justify-end">
      <button type="submit" class="mt-4 inline-flex items-center rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700">
        <svg wire:loading.class="animate-spin" class="size-4 -ms-1 me-1 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.651 7.65a7.131 7.131 0 0 0-12.68 3.15M18.001 4v4h-4m-7.652 8.35a7.13 7.13 0 0 0 12.68-3.15M6 20v-4h4" />
        </svg>
        <span>Update</span>
      </button>
    </div>
  </form>
</div>
