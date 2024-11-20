<x-auth.layout :title="$title" heading="Login">
  <x-slot:image>
    <img src="{{ asset('image/login.webp') }}" alt="Login Image" class="size-full object-cover">
  </x-slot>
  <x-slot:form>
    <form class="space-y-4" action="{{ route('login') }}" method="POST">
      @session('error')
        <div class="mb-4 flex items-center rounded-lg border border-red-300 bg-transparent p-4 text-sm text-red-800 dark:border-red-800 dark:text-red-400" role="alert">
          <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
          </svg>
          <div>
            <span class="font-medium">{{ $value }}</span>
          </div>
        </div>
      @endsession
      @csrf
      <div>
        <label for="username" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Username</label>
        <input type="text" name="username" id="username"
          class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-700 dark:bg-gray-950 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
          placeholder="akunkeren" required="" value="{{ old('username') }}">
      </div>
      <div>
        <label for="password" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Password</label>
        <input type="password" name="password" id="password" placeholder="••••••••"
          class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-700 dark:bg-gray-950 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
          required="">
      </div>
      <div class="flex items-center justify-end">
        <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Lupa Password?</a>
      </div>
      <button type="submit" class="w-full rounded-lg bg-primary-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-primary-700 dark:bg-primary-600 dark:hover:bg-primary-700">
        Login
      </button>
      <p class="text-sm font-light text-gray-500 dark:text-gray-400">
        Belum punya akun? <a href="/register" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Register</a>
      </p>
    </form>
  </x-slot>
</x-auth.layout>
