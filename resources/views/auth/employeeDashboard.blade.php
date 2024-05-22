@extends('auth.layouts')

@section('content')
<style>
    img:hover {
        border: 2px solid gray;
    }

    @media screen and (max-width: 768px) {
        .navbar-nav {
            display: none;
        }

        .show-buttons {
            display: block !important;
        }
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Bienvenu</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <a href="{{ url('page1') }}" class="btn btn-light btn-block">Indexage table à rouleaux</a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ url('page2') }}" class="btn btn-light btn-block">Moteur entraînement rouleaux</a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ url('page3') }}" class="btn btn-light btn-block">Compliance lugette</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <a href="{{ url('page4') }}" class="btn btn-light btn-block">Indexage base porteuse</a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ url('page5') }}" class="btn btn-light btn-block">Entraineur</a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ url('page6') }}" class="btn btn-light btn-block">Index balancelle</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <a href="{{ url('page7') }}" class="btn btn-light btn-block">Table élévatrice</a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ url('page8') }}" class="btn btn-light btn-block">Index base porteuse sur caisse</a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ url('page9') }}" class="btn btn-light btn-block">Compliance base porteuse</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <a href="{{ url('page10') }}" class="btn btn-light btn-block">Marteaux</a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ url('page11') }}" class="btn btn-light btn-block">Verrouillage base porteuse</a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ url('page12') }}" class="btn btn-light btn-block">Moteur Entraînement mât</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <a href="{{ url('page13') }}" class="btn btn-light btn-block">Approche Plateau</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    @endsection