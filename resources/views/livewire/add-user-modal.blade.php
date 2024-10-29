<div class="relative max-h-full w-full max-w-md p-4">
  <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
    <div class="flex items-center justify-between rounded-t border-b p-4 dark:border-gray-600 md:p-5">
      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
        Tambah Member Baru
      </h3>
      <button type="button" class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
        data-modal-toggle="add-modal">
        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close modal</span>
      </button>
    </div>
    <form class="p-4 md:p-5" wire:submit="save">
      <div class="space-y-4">
        <div>
          <label for="name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
          <input type="text" wire:model="form.name" id="name"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:read-only:bg-gray-600 dark:read-only:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
            placeholder="Udin Petot" required>
          @error('form.name')
            <span class="text-sm text-red-400">{{ $message }}</span>
          @enderror
        </div>
        <div class="flex gap-4">
          <div>
            <label for="email" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" wire:model="form.email" id="email"
              class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:read-only:bg-gray-600 dark:read-only:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
              placeholder="udinpetot@gmail.com" required>
            @error('form.email')
              <span class="text-sm text-red-400">{{ $message }}</span>
            @enderror
          </div>
          <div>
            <label for="phone_number" class="mb-2 block appearance-none text-sm font-medium text-gray-900 dark:text-white">No. HP</label>
            <input type="number" wire:model="form.phone_number" id="phone_number"
              class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:read-only:bg-gray-600 dark:read-only:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
              placeholder="081212121212" required>
            @error('form.phone_number')
              <span class="text-sm text-red-400">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div>
          <label for="address" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
          <input type="text" wire:model="form.address" id="address"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:read-only:bg-gray-600 dark:read-only:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
            placeholder="Jl. Pak Benceng" required>
          @error('form.address')
            <span class="text-sm text-red-400">{{ $message }}</span>
          @enderror
        </div>
        <div>
          <label for="role" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Role</label>
          <select id="role" wire:model="form.role_id"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500 dark:disabled:bg-gray-600 dark:disabled:text-gray-400">
            <option selected disabled value="">Pilih Role</option>
            @foreach ($roles as $role)
              <option wire:key="{{ $role->name }}" value="{{ $role->id }}">{{ Str::ucfirst($role->name) }}</option>
            @endforeach
          </select>
        </div>
        <div class="flex justify-end">
          <button type="submit"
            class="inline-flex items-center rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="-ms-1 me-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
            </svg>
            <span>Tambahkan</span>
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
