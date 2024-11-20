<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Modifica Ticket') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <h3 class="font-semibold text-2xl mb-4">Modifica Ticket: {{ $ticket->titolo }}</h3>

          <!-- Form di modifica dello stato del ticket -->
          <form action="{{ route('tickets.update', $ticket->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Stato -->
            <div class="mb-4">
              <label for="stato" class="block font-medium text-gray-700">Stato</label>
              <select name="stato" id="stato"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="ASSEGNATO" {{ $ticket->stato == 'ASSEGNATO' ? 'selected' : '' }}>Assegnato</option>
                <option value="IN LAVORAZIONE" {{ $ticket->stato == 'IN LAVORAZIONE' ? 'selected' : '' }}>In Lavorazione
                </option>
                <option value="CHIUSO" {{ $ticket->stato == 'CHIUSO' ? 'selected' : '' }}>Chiuso</option>
              </select>
            </div>

            <!-- Bottone di aggiornamento -->
            <div class="flex items-center justify-between">
              <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Aggiorna Stato</button>
              <a href="{{ route('tickets.index') }}" class="text-blue-600">Torna alla lista dei ticket</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
