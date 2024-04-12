<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employe;


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
        $employe->delete();
        return response()->json('Employe deleted successfully');
    }



    // Afficher Formulaire
    public function showCreateForm()
    {
        return view('Employe\add');
    }
}