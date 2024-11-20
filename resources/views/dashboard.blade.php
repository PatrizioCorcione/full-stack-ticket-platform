<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <h3 class="font-semibold text-xl mb-4 text-center">Ticket</h3>

          @if ($tickets->isEmpty())
            <p>Non ci sono ticket al momento.</p>
          @else
            <table class="min-w-full bg-white dark:bg-gray-800 w-full">
              <thead>
                <tr>
                  <th class="px-4 py-2 border">Titolo</th>
                  <th class="px-4 py-2 border">Descrizione</th>
                  <th class="px-4 py-2 border">Operatore</th>
                  <th class="px-4 py-2 border">Operazioni</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($tickets as $ticket)
                  <tr>
                    <td class="px-4 py-2 border">{{ $ticket->titolo }}</td>
                    <td class="px-4 py-2 border">{{ $ticket->descrizione }}</td>
                    <td class="px-4 py-2 border">{{ $ticket->operatore->nome ?? 'Nessun operatore' }}</td>
                    <td class="px-4 py-2 border">
                      <a href="{{ route('tickets.show', $ticket) }}" class="text-blue-600">Visualizza</a>
                      <a href="{{ route('tickets.edit', $ticket) }}" class="text-blue-600">Modifica</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          @endif
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
