<div class="mx-auto flex max-w-7xl">
  <div class="w-7/12">
    Images
  </div>
  <div class="4/12">
    <form class="mt-4 rounded-md bg-white p-4 dark:bg-slate-500" wire:submit="save">
      <div class="mt-3">
        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Upload Image</label>

        <input wire:model="photos"
          class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
          type="file" multiple>

        @if ($photos)
          @foreach ($photos as $photo)
            <img class="w-18 h-18 rounded-md" src="{{ $photo->temporaryUrl() }}">
          @endforeach
        @endif
        @error('photos')
          <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
      </div>
      <div class="mt-3">
        <x-primary-button>Upload</x-primary-button>
      </div>
    </form>
  </div>
</div>
