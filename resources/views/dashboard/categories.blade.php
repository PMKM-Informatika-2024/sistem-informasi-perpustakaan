<x-dashboard.layout :title="$title">
  <livewire:categories-table />
  <div>
    <x-partial.modal name="create category">
      <livewire:modal.category.create />
    </x-partial.modal>
    <x-partial.modal name="delete category">
      <livewire:modal.category.delete />
    </x-partial.modal>
    <x-partial.modal name="update category">
      <livewire:modal.category.update />
    </x-partial.modal>
  </div>
  <x-partial.toast type="success" />
</x-dashboard.layout>
