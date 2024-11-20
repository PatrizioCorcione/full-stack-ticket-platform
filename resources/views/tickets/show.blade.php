<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Dettagli del Ticket') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <h3 class="font-semibold text-2xl mb-4">Ticket: {{ $ticket->titolo }}</h3>

          <div class="mb-4">
            <strong>Descrizione:</strong>
            <p>{{ $ticket->descrizione }}</p>
          </div>

          <div class="mb-4">
            <strong>Stato:</strong>
            <p>{{ $ticket->stato }}</p>
          </div>

          <div class="mb-4">
            <strong>Categoria:</strong>
            <p>{{ $ticket->category->name ?? 'Nessuna Categoria' }}</p>
          </div>

          <div class="mb-4">
            <strong>Data di creazione:</strong>
            <p>{{ $ticket->data }}</p>
          </div>

          <div class="mb-4">
            <strong>Operatore:</strong>
            <p>{{ $ticket->operatore->nome ?? 'Nessun Operatore' }}</p>
          </div>

          <a href="{{ route('tickets.index') }}" class="text-blue-600">Torna alla lista dei ticket</a>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
