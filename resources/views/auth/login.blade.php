@extends('root')

@section('content')
  <div class="h-dvh lg:flex">
    <div class="h-56 w-full lg:h-full lg:w-2/5">
      <img src="{{ $image ? asset('storage/' . $image) : asset('image/login2.webp') }}" alt="Login Image" class="size-full object-cover object-center">
    </div>
    <div class="grid w-full place-items-center lg:w-3/5">
      <div class="w-full rounded-lg bg-white shadow dark:border dark:border-gray-700 dark:bg-gray-950 lg:mt-0 lg:max-w-xl lg:p-0">
        <div class="space-y-4 p-6 lg:p-8">
          <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white lg:text-2xl">
            Login
          </h1>
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
              <label for="username" class="mb-1 block text-sm font-medium text-gray-900 dark:text-white">Username</label>
              <input type="text" name="username" id="username"
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-700 dark:bg-gray-950 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                placeholder="akunkeren" required="" value="{{ old('username') }}">
            </div>
            <div>
              <label for="password" class="mb-1 block text-sm font-medium text-gray-900 dark:text-white">Password</label>
              <input type="password" name="password" id="password" placeholder="••••••••"
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-700 dark:bg-gray-950 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                required="">
            </div>
            <button type="submit" class="w-full rounded-lg bg-primary-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-primary-700 dark:bg-primary-600 dark:hover:bg-primary-700">
              Login
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
