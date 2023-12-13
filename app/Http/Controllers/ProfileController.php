<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function editBiography()
    {
        return view('update');
    }

    public function updateBiography(Request $request)
    {
        // User::patch([
        //     'user_id' => $request->input('user_id'),
        //     'biography' => $request->input('biography'),
            
        // ]);
            $user = User::find($request->input('user_id'));
        
            if ($user) {
                $user->update(['biography' => $request->input('biography')]);
                return redirect()->route('profile.post',[$user->id]);
            } else {
                // Gérer le cas où l'utilisateur n'est pas trouvé
                // par exemple, rediriger avec un message d'erreur
                return redirect()->route('profile.post')->with('error', 'Utilisateur non trouvé');
            }
        
        }
}
