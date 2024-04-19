<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Medicament;

use Illuminate\Support\Facades\Redirect;

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
        $medicament->maker = $request->input('maker');

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
        return Redirect::route('medicament.list');    }
    // Afficher Formulaire
    public function showCreateForm()
    {
        return view('Médicament\add');
    }

    // Ajouter du stock à un médicament
    public function addStock(Request $request, $id)
    {
        // Récupérer le médicament
        $medicament = Medicament::findOrFail($id);

        // Récupérer la quantité à ajouter
        $quantityToAdd = $request->input('quantity');

        // Ajouter la quantité au stock actuel
        $medicament->stock += $quantityToAdd;

        // Enregistrer les modifications
        $medicament->save();

        // Rediriger vers la liste des médicaments
        return Redirect::route('medicament.list');
    }

    // Retirer du stock à un médicament
    public function removeStock(Request $request, $id)
    {
        // Récupérer le médicament
        $medicament = Medicament::findOrFail($id);

        // Récupérer la quantité à retirer
        $quantityToRemove = $request->input('quantity');

        // Vérifier si le stock est suffisant pour le retrait
        if ($medicament->stock >= $quantityToRemove) {
            // Retirer la quantité du stock actuel
            $medicament->stock -= $quantityToRemove;

            // Enregistrer les modifications
            $medicament->save();
        } else {
            // Gérer le cas où le stock disponible est insuffisant
            return response()->json(['error' => 'Stock insuffisant pour retirer cette quantité'], 400);
        }

        // Rediriger vers la liste des médicaments
        return Redirect::route('medicament.list');
    }
}
