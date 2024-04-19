@extends('layouts.dashboard')


@section('contenu')
    <style>
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Roboto', sans-serif;
        }

        .table-responsive {
            margin: 30px 0;
        }

        .table-wrapper {
            min-width: 1000px;
            background: #fff;
            padding: 20px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
            min-width: 100%;
        }

        .table-title h2 {
            margin: 8px 0 0;
            font-size: 22px;
        }

        .search-box {
            position: relative;
            float: right;
        }

        .search-box input {
            height: 34px;
            border-radius: 20px;
            padding-left: 35px;
            border-color: #ddd;
            box-shadow: none;
        }

        .search-box input:focus {
            border-color: #3FBAE4;
        }

        .search-box i {
            color: #a0a5b1;
            position: absolute;
            font-size: 19px;
            top: 8px;
            left: 10px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }

        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td:last-child {
            width: 130px;
        }

        table.table td a {
            color: #a0a5b1;
            display: inline-block;
            margin: 0 5px;
        }

        table.table td a.view {
            color: #03A9F4;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #E34724;
        }

        table.table td i {
            font-size: 19px;
        }

        .pagination {
            float: right;
            margin: 0 0 5px;
        }

        .pagination li a {
            border: none;
            font-size: 95%;
            width: 30px;
            height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 30px !important;
            text-align: center;
            padding: 0;
        }

        .pagination li a:hover {
            color: #666;
        }

        .pagination li.active a {
            background: #03A9F4;
        }

        .pagination li.active a:hover {
            background: #0397d6;
        }

        .pagination li.disabled i {
            color: #ccc;
        }

        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }

        .hint-text {
            float: left;
            margin-top: 6px;
            font-size: 95%;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h1>Liste des médicaments</h1>
                        </div>
                        <div class="col-sm-4">
                            <a href="{{ route('formMedicament') }}" class="btn btn-primary">Ajouter un médicament</a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prix</th>
                            <th>Description</th>
                            <th>Fabricant</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medicaments as $medicament)
                            <tr>
                                <td>{{ $medicament->name }}</td>
                                <td>{{ $medicament->price }}</td>
                                <td>{{ $medicament->description }}</td>
                                <td>{{ $medicament->maker }}</td>
                                <td style="color: {{ $medicament->stock < 10 ? 'red' : 'black' }}">{{ $medicament->stock }}
                                </td>
                                <td>
                                    <a href="{{ route('addStock', ['id' => $medicament->id]) }}" class="add-stock"
                                        title="Add Stock" data-toggle="tooltip"><i class="material-icons">add</i></a>
                                    <a href="{{ route('removeStock', ['id' => $medicament->id]) }}" class="remove-stock"
                                        title="Remove Stock" data-toggle="tooltip"><i class="material-icons">remove</i></a>
                                    <a href="{{ route('delmedicament', ['id' => $medicament->id]) }}" class="delete"
                                        title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Modal pour ajouter ou retirer du stock -->
                <!-- Modal pour ajouter ou retirer du stock -->
                <div class="modal fade" id="stockModal" tabindex="-1" aria-labelledby="stockModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="stockModalLabel"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="stockForm">
                                    <div class="form-group">
                                        <label for="quantity">Quantité :</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity"
                                            min="1" value="1">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <button type="button" class="btn btn-primary" id="submitStock">Enregistrer</button>
                                <div class="spinner-border text-primary d-none" role="status" id="loadingIndicator">
                                    <span class="sr-only">Chargement...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <script>
                    $(document).ready(function() {
                        // Afficher le modal pour ajouter du stock
                        $('.add-stock').click(function(event) {
                            event.preventDefault(); // Empêcher le rechargement de la page
                            $('#stockModal').modal('show');
                            $('#stockModal').attr('action', $(this).attr('href'));
                            $('#stockModalLabel').text('Ajouter du stock');
                            $('#stockForm').data('modified',
                            false); // Réinitialiser le marqueur de modification du formulaire
                        });

                        // Afficher le modal pour retirer du stock
                        $('.remove-stock').click(function(event) {
                            event.preventDefault(); // Empêcher le rechargement de la page
                            $('#stockModal').modal('show');
                            $('#stockModal').attr('action', $(this).attr('href'));
                            $('#stockModalLabel').text('Retirer du stock');
                            $('#stockForm').data('modified',
                            false); // Réinitialiser le marqueur de modification du formulaire
                        });

                        // Soumettre le formulaire pour ajouter ou retirer du stock
                        $('#submitStock').click(function() {
                            var action = $('#stockModal').attr('action');
                            var quantity = $('#quantity').val();

                            // Afficher l'icône de chargement et désactiver le bouton "Enregistrer"
                            $('#loadingIndicator').removeClass('d-none');
                            $('#submitStock').prop('disabled', true);

                            // Envoyer une requête AJAX pour ajouter ou retirer du stock
                            $.ajax({
                                url: action,
                                type: 'GET', // Vous pouvez utiliser POST si nécessaire
                                data: {
                                    quantity: quantity
                                },
                                success: function(response) {
                                    // Actualiser la page ou mettre à jour la vue si nécessaire
                                    // Vous pouvez ajouter votre logique ici
                                    $('#stockModal').modal('hide');
                                    $('#stockForm').data('modified',
                                    true); // Marquer le formulaire comme modifié
                                },
                                error: function(xhr, status, error) {
                                    // Gérer les erreurs
                                    console.error(xhr.responseText);
                                },
                                complete: function() {
                                    // Masquer l'icône de chargement et réactiver le bouton "Enregistrer"
                                    $('#loadingIndicator').addClass('d-none');
                                    $('#submitStock').prop('disabled', false);
                                }
                            });
                        });

                        // Lorsque le modal se ferme
                        $('#stockModal').on('hidden.bs.modal', function(e) {
                            // Mettre à jour le stock si une modification a été effectuée
                            if ($('#stockForm').data('modified')) {
                                // Rafraîchir la page ou charger les données mises à jour par AJAX
                                location
                            .reload(); // Vous pouvez remplacer cela par une autre méthode de mise à jour de la page si nécessaire
                            }
                        });

                        // Code précédent pour détecter la fermeture du modal...
                    });
                </script>
            @endsection


            <!-- Modal pour ajouter ou retirer du stock -->
