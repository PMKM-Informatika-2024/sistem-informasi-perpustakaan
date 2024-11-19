@extends('root')

@section('content')
  <main class="flex text-gray-300">
    <div>
      <x-partial.sidebar />
    </div>
    <div class="max-h-dvh flex-1 overflow-y-scroll">
      <x-partial.navbar />
      <div class="px-6 py-4">
        {{ $slot }}
      </div>
    </div>
  </main>
@endsection
