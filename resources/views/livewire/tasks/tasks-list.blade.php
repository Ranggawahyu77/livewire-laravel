<div class="mx-4 w-7/12">
  <livewire:tasks.tasks-count :tasksByStatus="$this->tasksByStatus" />
  @if (true)
    <div class="px-6">
      @foreach ($this->tasks as $task)
        <div
          class="my-4 rounded-lg bg-white px-4 py-6 shadow hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
          <div class="p-4 leading-normal">
            <div class="mb-4 flex justify-between">
              <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $task->title }}
              </h5>
              <span class="rounded-md border border-slate-200 px-2 py-1">{{ $task->deadline->diffForHumans() }}</span>
            </div>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $task->description }}</p>
          </div>

          <div class="flex justify-between">
            <div>
              @foreach (App\Enums\StatusType::cases() as $case)
                <button type="button" wire:click="changeStatus({{ $task->id }}, '{{ $case->value }}')"
                  @class([
                      'inline-flex items-center px-4 py-2 bg-white border rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150',
                      $case->color() => true,
                  ]) {{ $case->value == $task->status->value ? 'disabled' : '' }}>
                  {{ Str::of($case->value)->headline() }}
                </button>
              @endforeach
            </div>
            <div>
              <x-primary-button wire:click="$dispatch('edit-task', {id: {{ $task->id }}})"
                class="bg-green-500 hover:bg-green-700">Edit</x-primary-button>
              <x-primary-button wire:click="delete({{ $task->id }})"
                wire:confirm="Are you sure you want to delete this task"
                class="bg-red-500 hover:bg-red-700">Delete</x-primary-button>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endif
  <div class="mb-12 mt-2 p-2">
    {{ $this->tasks->links() }}
  </div>
</div>
