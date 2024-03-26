<div class="relative w-96 max-w-lg px-1 pt-1">
  <input wire:model.live.throttle.500ms="search" type="text"
    class="mt-2 block w-full flex-1 rounded-md border-none bg-slate-100 px-3 py-2 outline-none"
    placeholder="Start Typing..." />

  <div class="absolute mt-2 w-full overflow-hidden rounded-md bg-white">
    @foreach ($results as $result)
      <div class="cursor-pointer px-3 py-2 hover:bg-slate-100">
        <p class="text-sm font-medium text-gray-600">{{ $result->title }}</p>
      </div>
    @endforeach
  </div>
</div>
