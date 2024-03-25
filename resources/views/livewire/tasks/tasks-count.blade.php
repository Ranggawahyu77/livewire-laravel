<div class="mt-4 flex justify-center">
  <div class="flex w-8/12 justify-between rounded-md bg-slate-200 p-4 shadow-md">
    @foreach ($tasksByStatus as $status)
      <div class="flex flex-col items-center justify-center">
        <span @class([
            'w-16 h-16 flex justify-center items-center rounded-full text-lg text-black border-2',
            $status->status->color() => $status->status,
        ])>
          {{ $status->count }}
        </span>
        <span>{{ Str::of($status->status->value)->headline() }}</span>
      </div>
    @endforeach
  </div>
</div>
