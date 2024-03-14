<div class="mb-10 flex items-start space-x-4">
  <div class="flex-shrink-0">
    <img class="inline-block h-10 w-10 rounded-full" src="{{ auth()->user()->avatar }}?g=female" alt="">
  </div>
  <div class="min-w-0 flex-1">
    <form action="{{route('messages.store') }}" method="POST" class="relative">
      @csrf

      <div class="bg-white overflow-hidden rounded-lg shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-indigo-600">
        <label for="add-content" class="sr-only">Add your message</label>
        <textarea rows="3" name="content" id="add-content" class="text-lg bg-transparent block w-full resize-none border-0 py-1.5 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Add your comment..."></textarea>

        <!-- Spacer element to match the height of the toolbar -->
        <div class="py-2" aria-hidden="true">
          <!-- Matches height of button in toolbar (1px border + 36px content height) -->
          <div class="py-px">
            <div class="h-9"></div>
          </div>
        </div>
      </div>

      <div class="absolute inset-x-0 bottom-0 flex justify-between p-2">
        <div class="flex-shrink-0">
          <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Post</button>
        </div>
      </div>
    </form>
  </div>
</div>