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
    <x-partial.modal name="update peminjaman">
      <livewire:modal.loan.update />
    </x-partial.modal>
    <x-partial.modal name="undo">
      <livewire:modal.loan.undo />
    </x-partial.modal>
    <x-partial.modal name="missing">
      <livewire:modal.loan.missing />
    </x-partial.modal>
  </div>
  <x-partial.toast type="success" />
</x-dashboard.layout>
