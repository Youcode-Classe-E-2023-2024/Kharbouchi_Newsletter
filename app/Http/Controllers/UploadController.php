<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Update; 

class UploadController extends Controller
{
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'file' => 'nullable|file',
        ]);

        // Traitement du fichier
        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads', 'public');
        }

        // Création de l'enregistrement dans la base de données
        Update::create([
            'title' => $request->title,
            'text' => $request->text,
            'file_path' => $filePath,
            // Vous pouvez ajouter 'author' et 'author_role' si nécessaire
        ]);

        // Redirection ou retour de réponse
        return redirect()->back()->with('success', 'Upload successful!');
    }
}
