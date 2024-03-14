<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        # Je vérifie la validité des champs du formulaire
        $request->validate([
            'content' => 'required|max:300',
        ]);

        # Je créé un nouveau message
        $message = new Message();
        $message->content = $request->content;
        $message->user_id = auth()->id(); # En assignant l'id de l'utilisateur connecté

        # J'enregistre le message en BDD
        $message->save();

        # Je redirige vers l'accueil
        return redirect()->route('index')->with('success', 'Nouveau message publié !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        # On vérifie que les champs de formulaires sont valides
        $request->validate([
            'content' => 'required|max:300',
        ]);

        # Je récupère le message à modifier
        $message = Message::find($id);

        # Je vérifie que le message existe
        if (!$message) {
            return redirect()->route('index')->with('error', 'Message non trouvé');
        }

        # Je vérifie que l'utilisateur connecté est bien le propriétaire du message
        if ($message->user_id !== auth()->id()) {
            return redirect()->route('index')->with('error', 'Vous ne pouvez pas modifier ce message');
        }

        # Tout est bon, je mets à jour le message
        $message->content = $request->input('content'); # Je récupère le contenu du message depuis le formulaire
        $message->save();

        # Je redirige l'utilisateur vers la page d'accueil avec un message de succès
        return redirect()->route('index')->with('success', 'Mis à jour !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        # Je récupère le message à supprimer
        $message = Message::find($id);

        # Je vérifie que le message existe
        if (!$message) {
            return redirect()->route('index')->with('error', 'Message non trouvé');
        }

        # Je vérifie que l'utilisateur connecté est bien le propriétaire du message
        if ($message->user_id !== auth()->id()) {
            return redirect()->route('index')->with('error', 'Vous ne pouvez pas supprimer ce message');
        }

        # Tout est bon, je supprime le message
        $message->delete();

        # Je redirige l'utilisateur vers la page d'accueil avec un message de succès
        return redirect()->route('index')->with('success', 'Supprimé !');
    }
}
