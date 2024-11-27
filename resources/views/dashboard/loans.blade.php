<x-dashboard.layout :title="$title">
  <livewire:loan-table />
  <div>
    <x-partial.modal name="create peminjaman">
      <livewire:modal.loan.create />
    </x-partial.modal>
    <x-partial.modal name="done">
      <livewire:modal.loan.done />
    </x-partial.modal>
    <x-partial.modal name="delete">
      <livewire:modal.loan.delete />
    </x-partial.modal>
  </div>
</x-dashboard.layout>
