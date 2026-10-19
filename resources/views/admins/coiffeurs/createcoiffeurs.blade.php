@extends('layouts.admins')

@section('title', 'Ajouter un coiffeur')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-user-plus"></i> Add New Barber
        </h1>
        <a href="{{ route('admin.coiffeurs.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to list
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-white">Barber informations </h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.coiffeurs.store') }}" enctype="multipart/form-data" id="CoiffeursForm">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Last name</label>
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" 
                                   id="nom" name="nom" value="{{ old('nom') }}" required>
                            
                        </div>
                        <div class="form-group">
                            <label for="name">First name</label>
                            <input type="text" class="form-control @error('prenom') is-invalid @enderror" 
                                   id="prenom" name="prenom" value="{{ old('prenom') }}" required>
                            
                        </div>
                        <div class="form-group">
                            <label for="name">User name</label>
                            <input type="text" class="form-control @error('nom_utilisateur') is-invalid @enderror" 
                                   id="nom_utilisateur" name="nom_utilisateur" value="{{ old('nom_utilisateur') }}" required>
                            
                        </div>

                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">password *</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                   id="password" name="password" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirme password*</label>
                            <input type="password" class="form-control" 
                                   id="password_confirmation" name="password_confirmation" required>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">phone</label>
                            <input type="text" class="form-control @error('telephone') is-invalid @enderror" 
                                   id="telephone" name="telephone" value="{{ old('telephone') }}">
                            
                        </div>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label for="specialties">adresse</label>
                    <textarea class="form-control @error('adresse') is-invalid @enderror" 
                              id="adresse" name="adresse" rows="3">{{ old('adresse') }}</textarea>
                    
                </div>
    
                <div class="form-group mt-3">
                    <label for="specialties">Speciality</label>
                    <textarea class="form-control @error('specialite') is-invalid @enderror" 
                              id="specialite" name="specialite" rows="3">{{ old('specialite') }}</textarea>
                    
                </div>

                <div class="form-group text-right mt-4">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save"></i> Save
                    </button>
                    <button type="reset" class="btn btn-outline-secondary ml-2">
                        <i class="fas fa-undo"></i> Reset
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    

    // Validation des mots de passe
    document.getElementById('CoiffeursForm').addEventListener('submit', function(e) {
        let password = document.getElementById('password').value;
        let confirmPassword = document.getElementById('password_confirmation').value;
        
        if (password !== confirmPassword) {
            e.preventDefault();
            alert('Les mots de passe ne correspondent pas');
            document.getElementById('password').focus();
        }
    });
</script>
@endpush