@extends('layouts.admins')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#coiffeur">Coiffeur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#admin">Admin</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content">
                        <!-- Onglet Coiffeur -->
                        <div class="tab-pane fade show active" id="coiffeur">
                            <form method="POST" action="{{ route('coiffeur.login') }}">
                                @csrf
                                
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control @error('email', 'coiffeur') is-invalid @enderror" required>
                                    @error('email', 'coiffeur')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Mot de passe</label>
                                    <input type="password" name="password" class="form-control @error('password', 'coiffeur') is-invalid @enderror" required>
                                    @error('password', 'coiffeur')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                

                                <button type="submit" class="btn btn-primary">Connexion Coiffeur</button>
                            </form>
                        </div>

                        <!-- Onglet Admin -->
                        <div class="tab-pane fade" id="admin">
                            <form method="POST" action="{{ route('check.login') }}">
                                @csrf
                                
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control @error('email', 'admin') is-invalid @enderror" required>
                                    @error('email', 'admin')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Mot de passe</label>
                                    <input type="password" name="password" class="form-control @error('password', 'admin') is-invalid @enderror" required>
                                    @error('password', 'admin')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Connexion Admin</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection