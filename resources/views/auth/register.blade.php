<x-auth.layout :title="$title" heading="Daftar Akun Baru">
  <x-slot:image>
    <img src="{{ asset('image/register.webp') }}" alt="Register Image" class="size-full object-cover">
  </x-slot:image>
  <x-slot:form>
    <form class="space-y-4" action="{{ route('register') }}" method="POST">
      @csrf
      <div>
        <label for="name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
        <input type="text" name="name" id="name"
          class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-700 dark:bg-gray-950 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
          placeholder="Erika Maharani" required value="{{ old('name') }}">
        @error('name')
          <p class="mt-2 text-sm font-medium text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
      </div>
      <div>
        <label for="address" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
        <input type="text" name="address" id="address"
          class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-700 dark:bg-gray-950 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
          placeholder="Jl. Pak Benceng" required value="{{ old('address') }}">
        @error('address')
          <p class="mt-2 text-sm font-medium text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
      </div>
      <div>
        <label for="email" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Email</label>
        <input type="email" name="email" id="email"
          class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-700 dark:bg-gray-950 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
          placeholder="apalah@example.com" required value="{{ old('email') }}">
        @error('email')
          <p class="mt-2 text-sm font-medium text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
      </div>
      <div>
        <label for="phone_number" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">No. HP</label>
        <input type="number" name="phone_number" id="phone_number"
          class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-700 dark:bg-gray-950 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
          placeholder="081234567890" required value="{{ old('phone_number') }}">
        @error('phone_number')
          <p class="mt-2 text-sm font-medium text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
      </div>
      <div class="flex gap-4">
        <div class="flex-1">
          <label for="password" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Password</label>
          <input type="password" name="password" id="password" placeholder="••••••••"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-700 dark:bg-gray-950 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
            required>
          @error('password')
            <p class="mt-2 text-sm font-medium text-red-600 dark:text-red-500">{{ $message }}</p>
          @enderror
        </div>
        <div class="flex-1">
          <label for="password_confirmation" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Password</label>
          <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••"
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-700 dark:bg-gray-950 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
            required>
        </div>
      </div>
      <button type="submit" class="w-full rounded-lg bg-primary-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-primary-700 dark:bg-primary-600 dark:hover:bg-primary-700">
        Daftar
      </button>
      <p class="text-sm font-light text-gray-500 dark:text-gray-400">
        Sudah Punya Akun? <a href="/login" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login</a>
      </p>
    </form>
  </x-slot:form>
</x-auth.layout>
