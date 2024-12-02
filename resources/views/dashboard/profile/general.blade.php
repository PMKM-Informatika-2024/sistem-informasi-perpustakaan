<x-dashboard.layout :title="$title">
  <div class="max-w-screen-sm">
    <form action="{{ route('update profile') }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div>
        <h2 class="text-3xl font-semibold text-white">Informasi Umum</h2>
        <div class="mt-4">
          <div>
            <label for="avatar_input" class="mb-1 block text-sm font-medium text-gray-900 dark:text-gray-200">Foto Profil</label>
            <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('image/profile.webp') }}" alt="Avatar" id="avatar" class="size-36 mb-4">
            <input type="file" name="avatar" id="avatar_input" class="rounded-lg file:rounded-lg">
          </div>
          <div class="my-4">
            <label for="name" class="mb-1 block text-sm font-medium text-gray-900 dark:text-gray-200">Nama Lengkap</label>
            <input type="text" name="name" id="name"
              class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
              value="{{ $user->name }}" placeholder="nama" required>
          </div>
        </div>
      </div>
      <div>
        <button type="submit" class="w-full rounded-lg bg-primary-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-primary-800 dark:bg-primary-600 dark:hover:bg-primary-700">
          Update Profile
        </button>
      </div>
    </form>
  </div>
  <x-partial.toast type="success" />
  <script>
    const input = document.getElementById("avatar_input");

    input.addEventListener("change", function(ev) {
      const image = document.getElementById("avatar");

      image.src = URL.createObjectURL(ev.target.files[0]);
    });
  </script>
</x-dashboard.layout>
