<x-guest-layout>
  @if (Route::has('login'))
    <livewire:auth.navigation />
  @endif
    <livewire:post/>
</x-guest-layout>
