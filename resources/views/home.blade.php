<x-app-layout>
  @if (session('success'))
    <div class="mb-8 bg-green-500 rounded-lg p-4 font-semibold text-white">
      {{ session('success') }}
    </div>
  @endif

  @include('messages.partials.create-message-form')
  @include('messages.partials.messages-list')
</x-app-layout>