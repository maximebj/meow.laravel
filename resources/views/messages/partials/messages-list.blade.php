<ul role="list" class="divide-y divide-gray-100 overflow-hidden bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl">
  @foreach ($messages as $message)

    <li class="px-4 py-5 hover:bg-gray-50 sm:px-6">
      <div class="flex min-w-0 gap-x-4">
        <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{ $message->user->avatar }}?g=male" alt="">
        <div class="min-w-0 flex-auto">
          <p class="font-semibold leading-6 text-gray-900">
            {{ $message->user->name }}
          </p>
          <p class="mt-1 mb-4 flex text-xs leading-5 text-gray-500">
            <a href="mailto:{{ $message->user->email }}" class="relative truncate hover:underline">{{ $message->user->email }}</a>
          </p>
          <p class="font-semibold text-gray-900">
            {{ $message->content }}
          </p>

          @if ($message->user_id === auth()->id())
              <form action="{{ route('messages.update', $message->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="content">Message:</label><br>
                <textarea name="content">{{ $message->content }}</textarea><br>
                <input type="submit" value="Update" class="text-sm bg-green-600 text-white rounded py-2 px-4 cursor-pointer">
              </form>

              <form action="{{ route('messages.destroy', $message->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete" class="text-red-500 text-sm cursor-pointer">
              </form>
            @endif
        </div>
      </div>
    </li>
  @endforeach
</ul>