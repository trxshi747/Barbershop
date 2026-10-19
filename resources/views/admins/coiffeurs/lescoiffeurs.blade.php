@extends('layouts.admins')
@section('title', 'Gestion des coiffeurs')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-6">
        <div class=" container">
                   @if(Session::has('delete'))
                     <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('delete') }}</p>
                   @endif
            </div>
            <div class=" container">
                   @if(Session::has('success'))
                     <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
                   @endif
            </div>
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-user-shield"></i> Barbers Management
            </h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.coiffeurs.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add Barbers 
            </a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-white">List of Barbers </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Prenom</th>                          
                            <th>mail</th>
                            <th>Adress</th>                           
                            <th>phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($Coiffeurs as $Coiffeur)
                        <tr>
                            <td>{{ $Coiffeur->id }}</td>
                            <td>{{  $Coiffeur->nom }}</td>
                            <td>{{  $Coiffeur->prenom }}</td>
                            <td>{{  $Coiffeur->email }}</td>
                            <td>{{  $Coiffeur->adresse }}</td> 
                            <td>{{ $Coiffeur->telephone ?? 'Non renseigné' }}</td>
                            <td>
                                <a href="{{ route('admin.coiffeurs.modifier', $Coiffeur->id) }}" class="btn btn-sm btn-warning" title="Update">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.coiffeurs.delete', $Coiffeur->id) }}" method="POST" class="d-inline">
                                     @csrf
                                 @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                       onclick="return confirm('Are you sure you want to delete this Barbers')" 
                                         title="Delete">
                                         <i class="fas fa-trash"></i>
                                     </button>
                                 </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">No Barbers registered.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .avatar-placeholder {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        background-color: #f8f9fa;
        color:rgb(9, 10, 11);
        font-weight: bold;
        font-size: 1.2rem;
    }
</style>
@endpush