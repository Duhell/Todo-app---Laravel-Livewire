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
                <button data-tooltip="Delete" onclick="deleteAnimation(this.parentNode.parentNode)" class="flex bg-red-400 py-1 px-2 text-stone-800 hover:bg-red-600 hover:text-slate-200 rounded" wire:click="deleteTask({{ $onetask->id }})"><svg width="25" height="25" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                  </svg></button>
            </div>
        </div>
        @endforeach
        @endif

</div>

