<div x-data="{
    showModal: false,
    handleKeydown(event) {
        if (event.key === 'Escape') {
            this.showModal = false;
            $wire.search = '';
        }
        if (event.key === '/') {
            this.showModal = true;
        }
    }
}">
  <button type="button" @click="showModal = true"
    class="my-2 flex space-x-3 border-b border-slate-200 px-4 py-2 outline-none dark:border-slate-200 dark:text-slate-500"
    @keydown.window="handleKeydown">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
      class="h-6 w-6">
      <path stroke-linecap="round" stroke-linejoin="round"
        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
    </svg>
    <span class="pr-6">Search</span>
  </button>

  @teleport('body')
    <div x-show="showModal" x-trap="showModal" class="relative z-10" aria-labelledby="modal-title" role="dialog"
      aria-modal="true">
      <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

      <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex justify-center p-4 sm:p-0">
          <div
            class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
            <div @click.outside="showModal = false" class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">

              <div class="w-full max-w-lg px-1 pt-1" x-data="{
                  searchPosts(event) {
                      document.querySelector('#searchInput').focus();
                      event.preventDefault();
                  }
              }">
                <input wire:model.live.throttle.500ms="search" type="text" id="searchInput"
                  class="mt-2 block w-full flex-1 rounded-md border-none bg-slate-100 px-3 py-2 outline-none"
                  placeholder="Start Typing..." @keydown.slash.window="searchPosts" />

                <div class="mt-2 w-full overflow-hidden rounded-md bg-white">
                  @foreach ($results as $result)
                    <div class="cursor-pointer px-3 py-2 hover:bg-slate-100">
                      <p class="text-sm font-medium text-gray-600">{{ $result->title }}</p>
                    </div>
                  @endforeach
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  @endteleport
</div>
