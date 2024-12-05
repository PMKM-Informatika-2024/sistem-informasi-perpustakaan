@props(['name'])
<div x-cloak x-data="{ open: false, modal: '{{ $name }}' }" x-show="open" x-on:open-modal.window="open = ($event.detail.modal === modal);" x-on:close-modal.window="open = false" x-on:keyup.escape.window="open = false"
  class="fixed inset-0 z-50 flex max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden bg-black/30 backdrop-blur md:inset-0">
  <div x-on:click.outside="open = false" class="relative max-h-full w-full max-w-lg p-4">
    {{ $slot }}
  </div>
</div>
