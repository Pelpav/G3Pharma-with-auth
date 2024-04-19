@extends('layouts.app')

@section('content')
    <div class="container">
        <header class="header">
            <div class="content">
                <h1><span>Obtenez</span><br />Des Services Médicaux</h1>
                <p>
                    Dans le monde en évolution rapide d’aujourd’hui, l’accès à des services médicaux rapides et
                    efficaces est d’une importance primordiale. Lorsque vous êtes confronté à une urgence médicale ou
                    que vous recherchez des soins médicaux immédiats, la capacité de recevoir des services médicaux
                    rapides peut avoir un impact significatif sur l’issue d’une situation.
                </p>

            </div>
            <div class="image">
                <span class="image__bg"></span>
                {{-- <img src="assets/header-bg.png" alt="header image" /> --}}
                <div class="image__content image__content__1">
                    <span><i class="ri-user-3-line"></i></span>
                    <div class="details">
                        <h4>1520+</h4>
                        <p>Clients Actifs</p>
                    </div>
                </div>
                <div class="image__content image__content__2">
                    <ul>
                        <li>
                            <span><i class="ri-check-line"></i></span>
                            20% de Réduction chaque mois
                        </li>
                        <li>
                            <span><i class="ri-check-line"></i></span>
                            Pharmaciens experts
                        </li>
                    </ul>
                </div>
            </div>
        </header>
    </div>
@endsection
