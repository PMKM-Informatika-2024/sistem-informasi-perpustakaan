@extends('root')

@section('content')
  <div class="h-dvh flex">
    <div class="w-2/5">
      {{ $image }}
    </div>
    <div class="grid w-3/5 place-items-center">
      <div class="w-full rounded-lg bg-white shadow dark:border dark:border-gray-700 dark:bg-gray-950 sm:max-w-xl md:mt-0 xl:p-0">
        <div class="space-y-4 p-6 sm:p-8">
          <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white md:text-2xl">
            {{ $heading }}
          </h1>
          {{ $form }}
        </div>
      </div>
    </div>
  </div>
@endsection
