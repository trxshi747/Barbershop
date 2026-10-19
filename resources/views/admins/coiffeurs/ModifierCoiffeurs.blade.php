@extends('layouts.admins')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Edit Barber</h5>
                
                @isset($Coiffeurs)
                <form method="POST" action="{{ route('admin.coiffeurs.update', $Coiffeurs->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <!-- Nom -->
                    <div class="form-outline mb-4 mt-4">
                        <label>Last name</label>
                        <input type="text" name="nom" class="form-control" 
                               value="{{ old('nom', $Coiffeurs->nom) }}" />
                        
                    </div>
                    
                    <!-- Prénom -->
                    <div class="form-outline mb-4">
                        <label>First name</label>
                        <input type="text" name="prenom" class="form-control" 
                               value="{{ old('prenom', $Coiffeurs->prenom) }}" />
                        
                    </div>
                    
                    <!-- Nom d'utilisateur -->
                    <div class="form-outline mb-4">
                        <label>User name</label>
                        <input type="text" name="nom_utilisateur" class="form-control" 
                               value="{{ old('nom_utilisateur', $Coiffeurs->nom_utilisateur) }}" />
                       
                    </div>
                    
                    <!-- Email -->
                    <div class="form-outline mb-4">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" 
                               value="{{ old('email', $Coiffeurs->email) }}" />
                       
                    </div>
                    
                    <!-- Adresse -->
                    <div class="form-outline mb-4">
                        <label>Adress</label>
                        <textarea name="adresse" class="form-control" rows="2">{{ old('adresse', $Coiffeurs->adresse) }}</textarea>
                       
                    </div>
                    
                    <!-- Spécialité -->
                    <div class="form-outline mb-4">
                        <label>Speciality</label>
                        <input type="text" name="specialite" class="form-control" 
                               value="{{ old('specialite', $Coiffeurs->specialite) }}" />
                        
                
                    </div>
                    
                    <!-- Téléphone -->
                    <div class="form-outline mb-4">
                        <label>phone</label>
                        <input type="text" name="telephone" class="form-control" 
                               value="{{ old('telephone', $Coiffeurs->telephone) }}" />
                        
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary mb-4 text-center">Update</button>
                </form>
                @else
                <div class="alert alert-danger">Barber not found</div>
                @endisset
            </div>
        </div>
    </div>
</div>
@endsection