<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Category;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recupera tutti i ticket dal database
        $tickets = Ticket::with('category', 'operatore')->orderBy('id', 'desc')->get();
        return view('dashboard', compact('tickets')); // Passa i ticket alla vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Recupera tutte le categorie
        $categories = Category::all();

        // Passa le categorie alla vista 'tickets.create'
        return view('tickets.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validazione dei dati
        $validated = $request->validate([
            'titolo' => 'required|string|max:255',
            'descrizione' => 'required|string',
            'stato' => 'required|in:ASSEGNATO,IN LAVORAZIONE,CHIUSO',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Crea una nuova istanza del ticket e assegna i valori
        $ticket = new Ticket();
        $ticket->titolo = $validated['titolo'];
        $ticket->descrizione = $validated['descrizione'];
        $ticket->stato = $validated['stato'];
        $ticket->category_id = $validated['category_id'];
        $ticket->data = $request->input('data', now());

        // Salva il ticket nel database
        $ticket->save();

        // Redirigi con un messaggio di successo
        return redirect()->route('tickets.index')->with('success', 'Ticket creato con successo!');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Recupera il ticket con la sua categoria
        $ticket = Ticket::with('category')->findOrFail($id);

        // Passa il ticket alla vista 'tickets.show'
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Recupera il ticket con la sua categoria
        $ticket = Ticket::with('category')->findOrFail($id);

        // Recupera tutte le categorie
        $categories = Category::all();

        // Passa il ticket e le categorie alla vista 'tickets.edit'
        return view('tickets.edit', compact('ticket', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validazione dei dati
        $validated = $request->validate([
            'stato' => 'required|in:ASSEGNATO,IN LAVORAZIONE,CHIUSO',
        ]);

        // Recupera il ticket
        $ticket = Ticket::findOrFail($id);

        // Modifica i campi
        $ticket->stato = $validated['stato'];

        // Salva i cambiamenti
        $ticket->save();

        // Redirigi l'utente
        return redirect()->route('tickets.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
