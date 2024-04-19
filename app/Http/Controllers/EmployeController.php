<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employe;
use App\Models\User;
use Illuminate\Support\Str; // Importez la classe Str pour utiliser la méthode `slug()`
use Illuminate\Support\Facades\Redirect;


class EmployeController extends Controller
{
    // CREATE
    public function createEmploye(Request $request)
    {
        $employe = new Employe();
        $employe->first_name = $request->input('first_name');
        $employe->last_name = $request->input('last_name');
        $employe->age = $request->input('age');
        $employe->sexe = $request->input('sexe');
        $employe->tel = $request->input('tel');
        $employe->adresse = $request->input('adresse');
        $employe->situation = $request->input('situation');
        $employe->service = $request->has('service'); // If checkbox is checked, it will be true, otherwise false
        $employe->status = $request->input('status');

        $employe->save();

        // Créer un nouvel utilisateur avec les mêmes informations que l'employé
        $user = new User();
        $user->name = $request->input('first_name') . ' ' . $request->input('last_name');
        $email = strtolower(str_replace(' ', '', $request->input('first_name'))) . '@gmail.com';
        $user->email = $email; // Assurez-vous que vous avez un champ email dans votre formulaire
        $user->password = bcrypt($request->input('password')); // Assurez-vous que vous avez un champ password dans votre formulaire
        $user->is_admin = false; // Vous pouvez définir ceci en fonction de vos besoins, par exemple, si l'employé est un administrateur ou non
        $user->save();

        // Rediriger vers la vue contenant tous les employés
        return redirect()->route('employe.list');
    }



    // READ

    public function getAllEmploye()
    {
        $employes = Employe::all();
        return view('Employe\liste')->with('employes', $employes);
    }


    public function getEmployeById($id)
    {
        $employe = Employe::find($id);
        return response()->json($employe);
    }

    // UPDATE
    public function updateEmploye(Request $request, $id)
    {
        $employe = Employe::findOrFail($id);
        $employe->update($request->all());
        return response()->json($employe);
    }

    // DELETE
    public function delEmploye($id)
    {
        $employe = Employe::findOrFail($id);
        // Trouver l'utilisateur associé à l'employé
        $user = User::where('email', '=', strtolower(str_replace(' ', '', $employe->first_name)) . '@gmail.com')->first();

        // Si l'utilisateur existe, le supprimer
        if ($user) {
            $user->delete();
        }
        $employe->delete();
        $employes = Employe::all();
        return Redirect::route('employe.list');
    }



    // Afficher Formulaire
    public function showCreateForm()
    {
        return view('Employe\add');
    }
}
