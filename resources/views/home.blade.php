@if (session('success'))
    <div class="mb-4 bg-green-600 rounded p-2 text-white">
        {{ session('success') }}
    </div>
@endif


<h1>Créer un Message</h1>
<form action="{{route('messages.store') }}" method="POST">
  @csrf
  <label for="content">Message:</label><br>
  <textarea name="content"></textarea><br>
  <input type="submit" value="Post">
</form>

<h1>Mettre à jour le message</h1>

@foreach ($messages as $message)

  <p>{{ $message->content }}</p>

  @if ($message->user_id === auth()->id())
    <form action="{{ route('messages.update', $message->id) }}" method="POST">
      @csrf
      @method('PUT')
      <label for="content">Message:</label><br>
      <textarea name="content">{{ $message->content }}</textarea><br>
      <input type="submit" value="Update">
    </form>

    <form action="{{ route('messages.destroy', $message->id) }}" method="POST">
      @csrf
      @method('DELETE')
      <input type="submit" value="Delete">
    </form>
  @endif

@endforeach