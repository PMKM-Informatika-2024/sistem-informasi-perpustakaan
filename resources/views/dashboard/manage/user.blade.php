<x-dashboard.layout :title="$title">
  <h1 class="text-3xl font-bold text-gray-100">{{ $title }}</h1>
  <livewire:users-table />
  {{-- Modal --}}
  <div>
    {{-- Add User Modal --}}
    <x-partial.modal name="create">
      <livewire:modal.user.create />
    </x-partial.modal>
    {{-- Add User Modal --}}
    {{-- Update User Modal --}}
    <x-partial.modal name="update">
      <livewire:modal.user.update />
    </x-partial.modal>
    {{-- Update User Modal --}}
    {{-- Delete Specific User Modal --}}
    <x-partial.modal name="delete specific">
      <livewire:modal.user.delete />
    </x-partial.modal>
    {{-- Delete Specific User Modal --}}
    {{-- Delete All User Modal --}}
    <x-partial.modal name="delete all">
      <x-modal.user.delete-all />
    </x-partial.modal>
    {{-- Delete All User Modal --}}
    <x-partial.modal name="role">
      <livewire:modal.user.role />
    </x-partial.modal>
  </div>
  {{-- Modal --}}
  {{-- Toast --}}
  @session('success')
    <div id="toast-success" class="fixed bottom-0 right-0 w-full max-w-xs rounded-lg bg-white p-4 text-gray-500 shadow dark:border-green-800 dark:bg-gray-800 dark:text-green-400" role="alert">
      <div class="flex items-center">
        <div class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-green-100 text-green-500 dark:bg-green-800 dark:text-green-200">
          <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
          </svg>
          <span class="sr-only">Check icon</span>
        </div>
        <span class="ms-3 text-sm font-normal">{{ $value }}</span>
      </div>
      <div class="absolute bottom-0 left-0 h-1 w-full bg-gray-200 dark:bg-gray-700">
        <div id="progress" class="h-1 bg-blue-600 dark:bg-blue-500" style="width: 45%"></div>
      </div>
    </div>
  @endsession
  {{-- Toast --}}
</x-dashboard.layout>
