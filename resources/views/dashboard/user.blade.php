<x-dashboard.layout :title="$title">
  <h1 class="text-3xl font-bold text-gray-100">{{ $title }}</h1>
  <livewire:users-table />
  <div>
    <x-modal name="create">
      <livewire:modal.user.create />
    </x-modal>
    <x-modal name="update">
      <livewire:modal.user.update />
    </x-modal>
    <x-modal name="delete specific">
      <livewire:modal.user.delete />
    </x-modal>
    <x-modal name="delete all">
      <livewire:modal.user.delete-all />
    </x-modal>
    <x-modal name="role">
      <livewire:modal.user.role />
    </x-modal>
  </div>
  <x-toast type="success" />
</x-dashboard.layout>
