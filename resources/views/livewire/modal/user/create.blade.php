<div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
  <div class="flex items-center justify-between rounded-t border-b p-4 dark:border-gray-600 md:p-5">
    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
      Tambah Member
    </h3>
    <button type="button" class="size-8 ms-auto inline-flex items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
      x-on:click="open = false">
      <svg class="size-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
      </svg>
      <span class="sr-only">Close modal</span>
    </button>
  </div>
  <form class="gap-4 p-4 md:p-5" wire:submit="create">
    <div class="space-y-4">
      <div class="flex gap-4">
        <div class="flex-1">
          <label for="name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
          <input type="text" wire:model="name" id="name"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:read-only:bg-gray-600 dark:read-only:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
            placeholder="Udin Petot" required>
          @error('name')
            <span class="text-sm text-red-400">{{ $message }}</span>
          @enderror
        </div>
        <div class="flex-1">
          <label for="username" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Username</label>
          <input type="text" wire:model="username" id="username"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:read-only:bg-gray-600 dark:read-only:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
            placeholder="Udin Petot" required>
          @error('name')
            <span class="text-sm text-red-400">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div>
        <label for="phone_number" class="mb-2 block appearance-none text-sm font-medium text-gray-900 dark:text-white">No. HP</label>
        <input type="tel" wire:model="phone_number" id="phone_number"
          class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:read-only:bg-gray-600 dark:read-only:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
          placeholder="081212121212" required>
        @error('phone_number')
          <span class="text-sm text-red-400">{{ $message }}</span>
        @enderror
      </div>
      <div>
        <label for="role" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Role</label>
        <select id="role" wire:model="role_id"
          class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
          <option selected disabled value="">Pilih Role</option>
          @foreach ($roles as $role)
            <option wire:key="{{ $role->id }}" {{ old('role_id') === $role->id ? 'selected' : '' }} value="{{ $role->id }}">{{ Str::ucfirst($role->name) }}</option>
          @endforeach
        </select>
        @error('role_id')
          <span class="text-sm text-red-400">{{ $message }}</span>
        @enderror
      </div>
    </div>
    <div class="flex justify-end">
      <button type="submit" class="mt-4 inline-flex items-center rounded-lg bg-primary-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-primary-800">
        <svg class="size-4 -ms-1 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
        </svg>
        <span>Tambahkan</span>
      </button>
    </div>
  </form>
</div>
