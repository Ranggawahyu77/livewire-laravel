<?php

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use function Livewire\Volt\{state, usesFileUploads, computed, rules};

usesFileUploads();

state([
    'title' => '',
    'body' => '',
    'image' => null
]);

rules(['title' => 'required|min:3', 'body' => 'required|min:20', 'image' => 'image|max:1024']);

$posts = computed(fn() => Post::all());

$addPost = function () {
    $this->validate();
    Post::create([
        'title' => $this->title,
        'body' => $this->body,
        'image' => $this->image->store('posts')
    ]);

    $this->title = '';
    $this->body = '';
};

$deletePost = function (Post $post) {
    Storage::delete($post->image);
    $post->delete();
}

?>

<div>
    <div class="mb-4">
        <form wire:submit="addPost" enctype="multipart/form-data">
            <div class="grid gap-6 mb-6 md:grid-cols-1">
                <div>
                    <label for="title"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input type="text" name="title" id="title" wire:model="title"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Title Example"/>
                    @error('title')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                            class="font-medium">Oh, snapp!</span> {{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="body"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea id="body" rows="4" wire:model="body"
                              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                              placeholder="Write your thoughts here..."></textarea>
                    @error('body')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                            class="font-medium">Oh, snapp!</span> {{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Upload
                        file</label>
                    <input wire:model="image"
                           class="block p-2.5 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                           id="image" type="file">
                    @error('image')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                            class="font-medium">Oh, snapp!</span> {{ $message }}</p>
                    @enderror
                </div>
            </div>
            <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </form>
    </div>

    <div class="max-w-md mx-auto flex flex-col space-y-2">
        @foreach($this->posts as $post)
            <div href="#"
                 class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                     src="{{ asset('/storage/' . $post->image) }}" alt="">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
                    {{-- <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $post->body }}</p> --}}
                </div>
                <button wire:click="deletePost({{ $post->id }})"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    Delete
                </button>
            </div>
        @endforeach
    </div>
</div>
