<x-dashboard.layout :title="$title">
  <livewire:member-table />
  <div>
    <x-partial.modal name="create user">
      <livewire:modal.member.create />
    </x-partial.modal>
    <x-partial.modal name="delete specific">
      <livewire:modal.member.delete />
    </x-partial.modal>
    <x-partial.modal name="delete all">
      <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
        <button type="button"
          class="size-8 absolute end-2.5 top-3 ms-auto inline-flex items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
          x-on:click="open = false">
          <svg class="size-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
        <form action="{{ route('delete all user') }}" method="POST" class="p-4 text-center md:p-5">
          @csrf
          @method('DELETE')
          <svg class="mx-auto mb-4 h-12 w-12 text-gray-400 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>
          <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Hapus semua member?</h3>
          <button type="submit" type="button" class="inline-flex items-center rounded-lg bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800">
            Yakin
          </button>
          <button x-on:click="open = false" type="button"
            class="ms-3 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            Engga Jadi
          </button>
        </form>
      </div>
    </x-partial.modal>
    <x-partial.modal name="update user">
      <livewire:modal.member.update />
    </x-partial.modal>
  </div>
  <x-partial.toast type="success" />
</x-dashboard.layout>
