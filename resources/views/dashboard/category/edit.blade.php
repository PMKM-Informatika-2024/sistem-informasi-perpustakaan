<x-dashboard.layout :title="$title">
  <section class="bg-white dark:bg-gray-950">
    <div class="mt-4 max-w-2xl">
      <form method="POST" action="{{ route('update category', ['category' => $category->id]) }}">
        @csrf
        @method('PUT')
        <div class="flex flex-col gap-4">
          <div>
            <label for="name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama Kategori</label>
            <input type="text" name="name" id="name"
              class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
              placeholder="Komputer" required value="{{ old('name', $category->name) }}">
            @error('name')
              <span class="text-sm text-red-400">{{ $message }}</span>
            @enderror
          </div>
          <div>
            <label for="description" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Deskripsi Kategori</label>
            <textarea id="description" name="description" rows="3"
              class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
              placeholder="...">{{ old('description', $category->description) }}</textarea>
            @error('description')
              <span class="text-sm text-red-400">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="flex w-full justify-end">
          <button type="submit" class="mt-4 inline-flex items-center gap-1.5 rounded-lg bg-primary-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-primary-800 sm:mt-6">
            <svg class="size-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
              <path fill-rule="evenodd"
                d="M14 4.182A4.136 4.136 0 0 1 16.9 3c1.087 0 2.13.425 2.899 1.182A4.01 4.01 0 0 1 21 7.037c0 1.068-.43 2.092-1.194 2.849L18.5 11.214l-5.8-5.71 1.287-1.31.012-.012Zm-2.717 2.763L6.186 12.13l2.175 2.141 5.063-5.218-2.141-2.108Zm-6.25 6.886-1.98 5.849a.992.992 0 0 0 .245 1.026 1.03 1.03 0 0 0 1.043.242L10.282 19l-5.25-5.168Zm6.954 4.01 5.096-5.186-2.218-2.183-5.063 5.218 2.185 2.15Z"
                clip-rule="evenodd" />
            </svg>
            <span>Edit</span>
          </button>
        </div>
      </form>
    </div>
  </section>
</x-dashboard.layout>
