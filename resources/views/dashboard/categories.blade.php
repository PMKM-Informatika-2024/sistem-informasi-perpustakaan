<x-dashboard.layout :title="$title">
  <div class="mt-4 max-w-screen-2xl">
    <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
      <div class="flex flex-col justify-end space-y-3 px-4 py-3 lg:flex-row lg:items-center lg:space-x-4 lg:space-y-0">
        <div class="flex flex-shrink-0 flex-col space-y-3 md:flex-row md:items-center md:space-x-3 md:space-y-0 lg:justify-end">
          <button x-data type="button" x-on:click="$dispatch('open-modal', { modal: 'create category' })"
            class="flex items-center justify-center rounded-lg bg-primary-700 px-4 py-2 text-sm font-medium text-white hover:bg-primary-800 dark:bg-primary-600 dark:hover:bg-primary-700">
            <svg class="size-4 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
            </svg>
            <span>Tambah Kategori</span>
          </button>
        </div>
      </div>
      <div class="overflow-x-auto">
        @if ($categories->isEmpty())
          <div class="flex items-center justify-center gap-4 px-4 py-20">
            <p class="-mt-1.5 text-4xl/none font-semibold text-white">Tidak Ada Kategori</p>
          </div>
        @else
          <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
            <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="px-4 py-3">No</th>
                <th scope="col" class="px-4 py-3">Nama Kategori</th>
                <th scope="col" class="px-4 py-3">Deskripsi</th>
                <th scope="col" class="px-4 py-3">
                  <span class="sr-only">Actions</span>
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $category)
                <tr class="border-b hover:bg-gray-100 dark:border-gray-600 dark:hover:bg-gray-700">
                  <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">{{ $loop->iteration }}</td>
                  <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">{{ $category->name }}</td>
                  <td class="px-4 py-2 font-medium text-gray-900 dark:text-white">
                    {{ $category->description }}
                  </td>
                  <td class="flex items-center justify-end px-4 py-3">
                    <button x-data x-on:click="$dispatch('prepare for update', { id: '{{ $category->id }}' })" type="button"
                      class="me-2 inline-flex items-center gap-2.5 rounded-lg bg-blue-700 p-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                      <svg class="size-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                          d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 18.092 8Z"
                          clip-rule="evenodd" />
                      </svg>
                      <span>Edit</span>
                    </button>
                    @if ($category->trashed())
                      <form action="{{ route('restore category', ['category' => $category->id]) }}" method="POST">
                        @csrf
                        <button type="submit"
                          class="me-2 inline-flex items-center gap-2.5 rounded-lg bg-blue-700 p-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                          <svg class="size-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                              d="M3 6a3 3 0 1 1 4 2.83v6.34a3.001 3.001 0 1 1-2 0V8.83A3.001 3.001 0 0 1 3 6Zm11.207-2.707a1 1 0 0 1 0 1.414L13.914 5H15a4 4 0 0 1 4 4v6.17a3.001 3.001 0 1 1-2 0V9a2 2 0 0 0-2-2h-1.086l.293.293a1 1 0 0 1-1.414 1.414l-2-2a1 1 0 0 1 0-1.414l2-2a1 1 0 0 1 1.414 0Z"
                              clip-rule="evenodd" />
                          </svg>
                          <span>Restore</span>
                        </button>
                      </form>
                    @endif
                    <button x-data x-on:click="$dispatch('open-modal', { modal: 'delete category', data: '{{ $category->name }}' })" type="button"
                      class="me-2 inline-flex items-center gap-2.5 rounded-lg bg-red-700 p-2.5 text-center text-sm font-medium text-white hover:bg-red-800 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                      <svg class="size-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                          d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                          clip-rule="evenodd" />
                      </svg>
                      <span>Delete</span>
                    </button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @endif
      </div>
    </div>
  </div>
  <div>
    <x-partial.modal name="create category">
      <livewire:modal.category.create />
    </x-partial.modal>
    <x-partial.modal name="delete category">
      <livewire:modal.category.delete />
    </x-partial.modal>
    <x-partial.modal name="update category">
      <livewire:modal.category.update />
    </x-partial.modal>
    <x-partial.modal name="restore category">
      {{-- <livewire:modal.category.restore /> --}}
      <h1>Restore Kontol</h1>
    </x-partial.modal>
  </div>
  <x-partial.toast type="success" />
</x-dashboard.layout>
