@extends('root')

@section('content')
  <main class="flex text-gray-300">
    <div>
      <x-partial.sidebar />
    </div>
    <div class="flex-1">
      <x-partial.navbar />
      <div class="p-4">
        {{ $slot }}
      </div>
    </div>
  </main>
@endsection
