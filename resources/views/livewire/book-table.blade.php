<div class="max-w-screen-2xl">
  <div class="relative bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
    <div class="flex flex-col space-y-3 p-4 lg:flex-row lg:items-center lg:justify-between lg:space-x-4 lg:space-y-0">
      <div class="w-full md:w-1/2">
        <div class="flex items-center">
          <label for="simple-search" class="sr-only">Search</label>
          <div class="relative w-full">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
              <svg aria-hidden="true" class="size-4 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
              </svg>
            </div>
            <input type="text" id="simple-search" wire:model.live.debounce.300ms="keyword" type="search"
              class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 pl-10 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
              placeholder="Search">
          </div>
        </div>
      </div>
      <div class="flex flex-shrink-0 flex-col space-y-3 md:flex-row md:items-center md:space-x-3 md:space-y-0">
        <button type="button" x-on:click="$dispatch('open-modal', { modal: 'create book' })"
          class="flex items-center justify-center rounded-lg bg-primary-700 px-4 py-2 text-sm font-medium text-white hover:bg-primary-800 dark:bg-primary-600 dark:hover:bg-primary-700">
          <svg class="size-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd"
              d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z" clip-rule="evenodd" />
          </svg>
          <span>Tambah</span>
        </button>
        <button type="button" x-on:click="$dispatch('open-modal', { modal: 'delete all' })"
          class="flex items-center justify-center rounded-lg bg-red-700 px-4 py-2 text-sm font-medium text-white hover:bg-red-800 dark:bg-red-600 dark:hover:bg-red-700">
          <svg class="size-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd"
              d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
              clip-rule="evenodd" />
          </svg>
          <span>Hapus Semua</span>
        </button>
      </div>
    </div>
    <div class="overflow-x-auto">
      <div wire:loading.flex wire:target="keyword" class="flex items-center justify-center gap-4 px-4 py-20">
        <div role="status">
          <svg aria-hidden="true" class="size-12 inline animate-spin fill-purple-600 text-gray-200 dark:text-gray-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
              fill="currentColor" />
            <path
              d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
              fill="currentFill" />
          </svg>
          <span class="sr-only">Loading...</span>
        </div>
        <p class="-mt-1.5 text-4xl/none font-semibold text-white">sabar ye</p>
      </div>
      @if ($books->isEmpty())
        <div wire:loading.remove wire:target="keyword" class="flex items-center justify-center gap-4 px-4 py-20">
          <p class="-mt-1.5 text-4xl/none font-semibold text-white">Tidak Ada Buku</p>
        </div>
      @else
        <table wire:loading.remove wire:target="keyword" class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
          <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-4 py-2">Tanggal Masuk</th>
              <th scope="col" class="px-4 py-2">Nomor Induk</th>
              <th scope="col" class="px-4 py-2">Jumlah</th>
              <th scope="col" class="px-4 py-2">Pengarang</th>
              <th scope="col" class="px-4 py-2">Judul</th>
              <th scope="col" class="px-4 py-2">Penerbit</th>
              <th scope="col" class="px-4 py-2">Tahun Terbit</th>
              <th scope="col" class="px-4 py-2">Sumber</th>
              <th scope="col" class="px-4 py-2">Keterangan</th>
              <th scope="col" class="px-4 py-2">
                <span class="sr-only">Actions</span>
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($books as $book)
              <tr wire:key="{{ $book->id }}" class="border-b last:border-b-0 hover:bg-gray-100 dark:border-gray-600 dark:hover:bg-gray-700">
                <td class="px-4 py-2 font-medium text-gray-900 dark:text-white">{{ $book->created_at->translatedFormat('F Y') }}</td>
                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">{{ $book->code }}</td>
                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">{{ $book->stock }}</td>
                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">
                  <ul class="list-disc">
                    @foreach (Str::of($book->author)->explode(', ') as $author)
                      <li>{{ $author }}</li>
                    @endforeach
                  </ul>
                </td>
                <td class="px-4 py-2 font-medium text-gray-900 dark:text-white">
                  {{ $book->title }}
                </td>
                <td class="px-4 py-2 font-medium text-gray-900 dark:text-white">
                  {{ $book->publisher }}
                </td>
                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">
                  {{ $book->year }}
                </td>
                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">
                  {{ $book->source }}
                </td>
                <td class="px-4 py-2 font-medium text-gray-900 dark:text-white">
                  {{ $book->description }}
                </td>
                <td class="flex flex-col gap-2.5 px-4 py-2">
                  <button x-on:click="$dispatch('update', { id: '{{ $book->id }}' })" type="button"
                    class="mx-auto inline-flex items-center gap-1.5 rounded-full bg-blue-700 p-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="size-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                      <path fill-rule="evenodd"
                        d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 18.092 8Z"
                        clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Edit</span>
                  </button>
                  <button x-on:click="$dispatch('delete', { id: '{{ $book->id }}' })" type="button"
                    class="inline-flex items-center gap-1.5 rounded-full bg-red-700 p-2.5 text-center text-sm font-medium text-white hover:bg-red-800 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    <svg class="size-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                      <path fill-rule="evenodd"
                        d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                        clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Delete</span>
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
