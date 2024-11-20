<x-dashboard.layout :title="$title">
  <section class="bg-white dark:bg-gray-950">
    <div class="mt-4 max-w-2xl">
      <form method="POST" action="{{ route('store user') }}">
        @csrf
        <div class="flex flex-col gap-4">
          <div class="flex-1">
            <label for="name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
            <input type="text" name="name" id="name"
              class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
              placeholder="Udin Petot" required value="{{ old('name') }}">
            @error('name')
              <span class="text-sm text-red-400">{{ $message }}</span>
            @enderror
          </div>
          <div class="flex gap-4">
            <div class="flex-1">
              <label for="username" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Username</label>
              <input type="username" name="username" id="username"
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                placeholder="wadujh" required value="{{ old('username') }}">
              @error('username')
                <span class="text-sm text-red-400">{{ $message }}</span>
              @enderror
            </div>
            <div class="flex-1">
              <label for="phone_number" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">No. Hp</label>
              <input type="tel" name="phone_number" id="phone_number"
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                placeholder="081234567890" required value="{{ old('phone_number') }}">
              @error('phone_number')
                <span class="text-sm text-red-400">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="flex-1">
            <label for="role" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Role</label>
            <select id="role" name="role_id"
              class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
              <option selected disabled>Pilih Role</option>
              @foreach ($roles as $role)
                <option {{ old('role_id') === $role->id ? 'selected' : '' }} value="{{ $role->id }}">{{ Str::ucfirst($role->name) }}</option>
              @endforeach
            </select>
            @error('role_id')
              <span class="text-sm text-red-400">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="flex w-full justify-end">
          <button type="submit" class="mt-4 inline-flex items-center rounded-lg bg-primary-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-primary-800 sm:mt-6">
            <svg class="size-4 -ms-1 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
            </svg>
            <span>Tambahkan</span>
          </button>
        </div>
      </form>
    </div>
  </section>
</x-dashboard.layout>
