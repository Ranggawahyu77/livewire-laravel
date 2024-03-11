<div>
  <h1 class="dark:text-gray-400">Task</h1>
  <input type="text" wire:model="task"> 
 
    <button wire:mouseenter="add" class="bg-gray-300 p-2">Add</button>
  <ul>
    @foreach ($tasks as $task)
    <li class="dark:text-gray-300">{{ $task }}</li>
    @endforeach
  </ul>
</div>
