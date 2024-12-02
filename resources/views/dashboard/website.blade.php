<x-dashboard.layout :title="$title">
  <form action="{{ route('update website') }}" method="POST" enctype="multipart/form-data" class="max-w-screen-sm">
    @method('PUT')
    @csrf
    <div>
      <img src="{{ $image ? asset('storage/' . $image) : asset('image/login2.webp') }}" alt="Login Image" id="cover" class="h-96 w-full object-cover object-center">
      <input type="file" name="cover" id="image" class="my-4 w-full rounded-lg bg-gray-50 text-gray-900 file:rounded-lg dark:bg-gray-950 dark:text-white dark:placeholder-gray-400">
    </div>
    <div>
      <button type="submit" class="w-full rounded-lg bg-primary-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-primary-800 dark:bg-primary-600 dark:hover:bg-primary-700">
        Ganti Foto Sampul
      </button>
    </div>
  </form>
  <script>
    const input = document.getElementById("image");

    input.addEventListener("change", function(ev) {
      const image = document.getElementById("cover");

      image.src = URL.createObjectURL(ev.target.files[0]);
    });
  </script>
</x-dashboard.layout>
