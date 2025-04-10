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
        <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" data-dropdown-placement="bottom-end"
          class="flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:w-auto"
          type="button">
          <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="mr-2 h-4 w-4 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
          </svg>
          Kategori
          <svg class="-mr-1 ml-1.5 h-5 w-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
          </svg>
        </button>
        <div id="filterDropdown" class="z-10 hidden w-48 rounded-lg bg-white p-3 shadow dark:bg-gray-700">
          <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Kategori</h6>
          <form>
            <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
              @foreach ($categories as $category)
                <li class="flex items-center">
                  <input id="{{ $category->id }}" onchange="this.form.submit()" type="radio" name="kategori" value="{{ $category->slug }}"
                    class="size-4 rounded-full border-gray-300 bg-gray-100 text-primary-600 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-primary-600">
                  <label for="{{ $category->id }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">{{ $category->name }} ({{ $category->books->count() }})</label>
                </li>
              @endforeach
            </ul>
          </form>
        </div>
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
        <table wire:loading.remove wire:target="keyword" class="h-0.5 w-full text-left text-sm text-gray-500 dark:text-gray-400">
          <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-4 py-3">Tanggal Masuk</th>
              <th scope="col" class="px-4 py-3">Nomor Induk</th>
              <th scope="col" class="px-4 py-3">Jumlah</th>
              <th scope="col" class="px-4 py-3">Pengarang</th>
              <th scope="col" class="px-4 py-3">Judul</th>
              <th scope="col" class="px-4 py-3">Kategori</th>
              <th scope="col" class="px-4 py-3">Penerbit</th>
              <th scope="col" class="px-4 py-3">Tahun Terbit</th>
              <th scope="col" class="px-4 py-3">Sumber</th>
              <th scope="col" class="px-4 py-3">Harga</th>
              <th scope="col" class="px-4 py-3">Keterangan</th>
              <th scope="col" class="px-4 py-3">
                <span class="sr-only">Actions</span>
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($books as $book)
              <tr wire:key="{{ $book->id }}" class="border-b last:border-b-0 hover:bg-gray-100 dark:border-gray-600 dark:hover:bg-gray-700">
                <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">{{ $book->created_at->translatedFormat('F Y') }}</td>
                <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">{{ $book->code }}</td>
                <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">{{ $book->stock }}/{{ $book->initial }}</td>
                <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">
                  <ul class="list-disc">
                    @foreach (Str::of($book->author)->explode('|') as $author)
                      <li>{{ $author }}</li>
                    @endforeach
                  </ul>
                </td>
                <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">
                  {{ $book->title }}
                </td>
                <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">
                  {{ $book->category->name }}
                </td>
                <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">
                  {{ $book->publisher }}
                </td>
                <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">
                  {{ $book->year }}
                </td>
                <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">
                  {{ $book->source }}
                </td>
                <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">
                  {{ rupiah($book->price) }}
                </td>
                <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">
                  {{ $book->description }}
                </td>
                <td class="flex h-full items-center justify-end px-4 py-3">
                  <button type="button" x-on:click="$dispatch('update', { id: '{{ $book->id }}' })"
                    class="me-2 inline-flex items-center rounded-full bg-blue-700 p-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="size-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                      <path fill-rule="evenodd"
                        d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z"
                        clip-rule="evenodd" />
                      <path fill-rule="evenodd"
                        d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z"
                        clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Edit</span>
                  </button>
                  <button x-on:click="$dispatch('delete', { id: '{{ $book->id }}' })" type="button"
                    class="me-2 inline-flex items-center rounded-full bg-red-700 p-2.5 text-center text-sm font-medium text-white hover:bg-red-800 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
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
