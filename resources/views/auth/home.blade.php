@extends('layouts.dashboard')

@section('contenu')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Vous êtes connecté en tant qu\'admin !') }}
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <meta http-equiv="refresh" content="0;url={{ route('getallemploye') }}">
    <p>Redirection en cours...</p>
@endsection
