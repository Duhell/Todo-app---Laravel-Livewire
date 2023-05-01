<div class="w-full lg:mt-28 lg:px-16 lg:py-4 mt-24 px-6 py-2 ">
    <p class="font-medium">Remaining {{ $total ? "Tasks" : "Task" }} : {{ $total }}</p>

        @if ($tasks->isEmpty())
        <div class="w-full h-32 flex justify-center items-center">
            <p>No Remaining Task</p>
        </div>
        @else
        @foreach ($tasks as $onetask )
        <div wire:key='{{ $onetask->id }}' class="w-full animate-slide-in ease-in bg-gray-900 text-slate-200 dark:text-slate-200 my-3	rounded min-h-min p-4">
            <div class="flex justify-between items-center">
                <div>
                    <p class="font-medium">{{ ucfirst($onetask->task) }}</p>
                    <p class="font-thin text-xs">Task Created at: {{ $onetask->updated_at->format('F j, Y, g:i a') }}</p>
                </div>
                <button onclick="deleteAnimation(this.parentNode.parentNode)" class="bg-red-400 py-1 px-2 text-stone-800 hover:bg-red-600 hover:text-slate-200 rounded" wire:click="deleteTask({{ $onetask->id }})">Delete</button>
            </div>
        </div>
        @endforeach
        @endif

</div>

