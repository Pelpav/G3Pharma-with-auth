<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/boxicons/2.0.7/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <style>
        /* Styles pour le formulaire */
        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            height: 100px;
        }

        button[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap");

            :root {
                --primary-color: #28bf96;
                --primary-color-dark: #209677;
                --text-dark: #111827;
                --text-light: #6b7280;
                --white: #ffffff;
            }

            a{
                text-decoration: none;
                color: var(--primary-color);
            }
            a:hover{
                text-decoration: none;
                color: var(--primary-color);
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
                min-height: calc(100vh - 200px);
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

<body>
    <div id="app">
        <nav>
            <div class="nav__logo"><a href="/">G3Pharma</a></div>

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

        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>
