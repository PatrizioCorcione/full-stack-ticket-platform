<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Crea Ticket') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <h3 class="font-semibold text-2xl mb-4">Crea un nuovo ticket</h3>

          <!-- Form di creazione del ticket -->
          <form action="{{ route('tickets.store') }}" method="POST">
            @csrf

            <div class="mb-4">
              <label for="titolo" class="block font-medium text-gray-700">Titolo</label>
              <input type="text" name="titolo" id="titolo" value="{{ old('titolo') }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                required>
            </div>

            <div class="mb-4">
              <label for="descrizione" class="block font-medium text-gray-700">Descrizione</label>
              <textarea name="descrizione" id="descrizione" rows="4"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>{{ old('descrizione') }}</textarea>
            </div>

            <div class="mb-4">
              <label for="stato" class="block font-medium text-gray-700">Stato</label>
              <select name="stato" id="stato"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="ASSEGNATO">Assegnato</option>
                <option value="IN LAVORAZIONE">In Lavorazione</option>
                <option value="CHIUSO">Chiuso</option>
              </select>
            </div>

            <div class="mb-4">
              <label for="category_id" class="block font-medium text-gray-700">Categoria</label>
              <select name="category_id" id="category_id"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="flex items-center justify-between">
              <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Crea Ticket</button>
              <a href="{{ route('tickets.index') }}" class="text-blue-600">Torna alla lista dei ticket</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
