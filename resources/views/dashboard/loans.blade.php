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
    <x-partial.modal name="redo">
      <livewire:modal.loan.redo />
    </x-partial.modal>
  </div>
  <x-partial.toast type="success" />
</x-dashboard.layout>
