<x-dashboard.layout :title="$title">
  <div class="max-w-screen-md">
    <form action="#" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-4 w-full">
        <div class="flex gap-4">
          <div class="flex-1">
            <label for="name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
            <input type="text" name="name" id="name"
              class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
              value="{{ $user->name }}" placeholder="nama" required>
          </div>
          <div class="flex-1">
            <label for="username" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Username</label>
            <input type="text" name="username" id="username"
              class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
              value="{{ $user->username }}" placeholder="Username" required>
          </div>
        </div>
        <div class="mt-4 flex gap-4">
          <div class="flex-1">
            <label for="password" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="password" name="password" id="password"
              class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
              placeholder="Password" required>
          </div>
          <div class="flex-1">
            <label for="password_confirmation" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
              class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
              placeholder="Konfirmasi Password" required>
          </div>
        </div>
      </div>
      <div class="flex items-center space-x-4">
        <button type="submit" class="w-full rounded-lg bg-primary-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-primary-800 dark:bg-primary-600 dark:hover:bg-primary-700">
          Update Profile
        </button>
      </div>
    </form>
  </div>
</x-dashboard.layout>
