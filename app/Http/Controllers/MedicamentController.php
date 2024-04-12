<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Medicament;


class MedicamentController extends Controller
{

    // CREATE
    public function createMedicament(Request $request)
    {
        $medicament = new Medicament();
        $medicament->name = $request->input('name');
        $medicament->price = $request->input('price');
        $medicament->description = $request->input('description');
        $medicament->stock = $request->input('stock');

        $medicament->save();

        // Rediriger vers la vue contenant tous les employés
        return redirect()->route('medicament.list');
    }



    // READ

    public function getAllMedicament()
    {
        $medicaments = Medicament::all();
        return view('Médicament\liste')->with('medicaments', $medicaments);
    }


    public function getMedicamentById($id)
    {
        $medicament = Medicament::find($id);
        return response()->json($medicament);
    }

    // UPDATE
    public function updateMedicament(Request $request, $id)
    {
        $medicament = Medicament::findOrFail($id);
        $medicament->update($request->all());
        return response()->json($medicament);
    }

    // DELETE
    public function delMedicament($id)
    {
        $medicament = Medicament::findOrFail($id);
        $medicament->delete();
        return response()->json('Medicament deleted successfully');
    }
    // Afficher Formulaire
    public function showCreateForm()
    {
        return view('Médicament\add');
    }
}
