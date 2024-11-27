<x-dashboard.layout :title="$title">
  <livewire:karyawan.history.history-table />
  <div>
    <x-partial.modal name="create peminjaman">
      <livewire:modal.history.create />
    </x-partial.modal>
  </div>
</x-dashboard.layout>
