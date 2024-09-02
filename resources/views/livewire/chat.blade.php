<div class="p-4 flex flex-col h-[500px]">

<div class="min-h-10 overflow-y-scroll gap-2">
    @foreach ($messages as $message)
        <div
            @class([
                'flex items-start gap-2.5 p-2',
                'border border-red-500 rounded bg-gray-100' => $message['is_private']
            ])
        >
        <img class="w-8 h-8 rounded-full" src="https://i.pravatar.cc/150?u=a042581f4e29026704d" alt="Jese image">
        <div class="flex flex-col w-full max-w-[320px] leading-1.5">
            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $message['name'] }}</span>
            </div>
            <p class="text-sm font-normal py-2 text-gray-900 dark:text-white">{{ $message['message'] }}</p>
        </div>
    </div>
    @endforeach
</div>


<div>
   <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
       <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
           <label for="message" class="sr-only">Your message</label>
           <textarea id="message" wire:model='message' rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write a message..." required ></textarea>
       </div>
       <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
           <button wire:mousedown='send' class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
               Send Message
           </button>
       </div>
   </div>
</div>

</div>
