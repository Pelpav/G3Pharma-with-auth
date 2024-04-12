<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/welcome.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/boxicons/2.0.7/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap");

        :root {
            --primary-color: #28bf96;
            --primary-color-dark: #209677;
            --text-dark: #111827;
            --text-light: #6b7280;
            --white: #ffffff;
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .btn {
            padding: 1rem 2rem;
            outline: none;
            border: none;
            font-size: 1rem;
            color: var(--white);
            background-color: var(--primary-color);
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn:hover {
            background-color: var(--primary-color-dark);
        }

        body {
            font-family: "Roboto", sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        nav {
            padding: 2rem 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .nav__logo {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .nav__links {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .link a {
            text-decoration: none;
            color: var(--text-light);
            cursor: pointer;
            transition: 0.3s;
        }

        .link a:hover {
            color: var(--primary-color);
        }

        .header {
            padding: 0 1rem;
            flex: 1;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            align-items: center;
        }

        .content h1 {
            margin-bottom: 1rem;
            font-size: 3rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        .content h1 span {
            font-weight: 400;
        }

        .content p {
            margin-bottom: 2rem;
            color: var(--text-light);
            line-height: 1.75rem;
        }

        .image {
            position: relative;
            text-align: center;
            isolation: isolate;
        }

        .image__bg {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            height: 450px;
            width: 450px;
            background-color: var(--primary-color);
            border-radius: 100%;
            z-index: -1;
        }

        .image img {
            width: 100%;
            max-width: 475px;
        }

        .image__content {
            position: absolute;
            top: 50%;
            left: 50%;
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            text-align: left;
            background-color: var(--white);
            border-radius: 5px;
            box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.2);
        }

        .image__content__1 {
            transform: translate(calc(-50% - 12rem), calc(-50% - 8rem));
        }

        .image__content__1 span {
            padding: 10px 12px;
            font-size: 1.5rem;
            color: var(--primary-color);
            background-color: #defcf4;
            border-radius: 100%;
        }

        .image__content__1 h4 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .image__content__1 p {
            color: var(--text-light);
        }

        .image__content__2 {
            transform: translate(calc(-50% + 8rem), calc(-50% + 10rem));
        }

        .image__content__2 ul {
            list-style: none;
            display: grid;
            gap: 1rem;
        }

        .image__content__2 li {
            display: flex;
            align-items: flex-start;
            gap: 0.5rem;
            color: var(--text-light);
        }

        .image__content__2 span {
            font-size: 1.5rem;
            color: var(--primary-color);
        }

        @media (width < 900px) {
            .nav__links {
                display: none;
            }

            .header {
                padding: 1rem;
                grid-template-columns: repeat(1, 1fr);
            }

            .content {
                text-align: center;
            }

            .image {
                grid-area: 1/1/2/2;
            }
        }
    </style>
</head>

<body class="antialiased">

    <div class="container">
        <nav>
            <div class="nav__logo">G3Pharma</div>

            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/auth/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"><button
                                class="btn">Home</button></a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"><button
                                class="btn">Se connecter</button></a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline"><button
                                    class="btn">S'enregistrer</button></a>
                        @endif
                    @endauth
                </div>
            @endif
        </nav>
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
    {{-- <footer>
                <p>Copyright &copy; 2024</p>
            </footer> --}}

    </div>

    </div>
</body>

</html>
