<div class="w-full lg:mt-28 lg:px-16 mt-24 px-6 py-2 todolist">
    <div class="lg:flex lg:justify-between lg:items-center">
        <div>
            <p class="font-medium">Remaining {{ $total ? "Tasks" : "Task" }} : {{ $total }}</p>
        </div>
        <div class="min-w-min flex items-center gap-3">
            <button wire:click="all" type="button" class="flex items-center {{ $alltaskBTN ? "bg-gray-800" : "bg-gray-700" }} justify-between text-slate-200  hover:text-slate-100	 hover:bg-gray-800	 focus:ring-4 focus:outline-none  font-medium rounded text-sm px-5 py-2 text-center mr-3 md:mr-0">All Task</button>
            <button wire:click="due" type="button" class="flex items-center justify-between text-slate-200 {{ $duetaskBTN ? "bg-gray-800" : "bg-gray-700" }} hover:text-slate-100	 hover:bg-gray-800	 focus:ring-4 focus:outline-none  font-medium rounded text-sm px-5 py-2 text-center mr-3 md:mr-0">Due Task</button>
        </div>
    </div>
    <div class="{{ $alltaskBTN ? "block" : "hidden" }}">
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
                        <p class="font-thin text-xs">Task Started: {{ $onetask->updated_at->format('l F j, Y, g:i a') }}</p>
                        <p class="font-thin text-xs">Task End: {{ date('l F j, Y, g:i a ',strtotime($onetask->finished))  }}</p>
                    </div>
                    <button data-tooltip="Delete" onclick="deleteAnimation(this.parentNode.parentNode)" class="flex bg-red-400 py-1 px-2 text-stone-800 hover:bg-red-600 hover:text-slate-200 rounded" wire:click="deleteTask({{ $onetask->id }})"><svg width="25" height="25" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                    </svg></button>
                </div>
            </div>
            @endforeach
        @endif
        </div>
        <div class="{{ $duetaskBTN ? "block" : "hidden" }}">
        @if ($dues->isEmpty())
        <div class="w-full h-32 flex justify-center items-center">
            <p>No Due Task</p>
        </div>
        @else
            @foreach ($dues as $due )
            @php
                $currentDate = date('j',(strtotime($due->finished) - (strtotime($due->created_at))))
            @endphp
            <div wire:key='{{ $due->id }}' class="w-full animate-slide-in ease-in bg-gray-900 text-slate-200 dark:text-slate-200 my-3	rounded min-h-min p-4">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="font-medium">{{ ucfirst($due->task) }}</p>
                        <p class="font-thin text-xs">You have {{ $currentDate }} days left to finish this task.</p>
                        <p class="font-thin text-xs">{{ date('l F j, Y, g:i a ',strtotime($due->finished))  }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

</div>

