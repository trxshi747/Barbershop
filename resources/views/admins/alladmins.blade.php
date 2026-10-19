
@extends('layouts.admins')

@section('content')


<div class="row">
        <div class="col"> 
          <div class="card">
            <div class=" container">
                   @if(Session::has('success'))
                     <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
                   @endif
            </div>
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Admins</h5>
             <a  href="{{route('Create.Admins')  }}" class="btn btn-primary mb-4 text-center float-right">Add Admin</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">full name </th>
                    <th scope="col">email</th>
                    <th scope="col">action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $alladmins as $admin )
                    <tr>
                        <th scope="row">{{ $admin->id }}</th>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>
                                <a href="{{route('Modifier.Admins',$admin-> id)  }}" class="btn btn-sm btn-warning" title="Update">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{route('Delete.Admin',$admin-> id)  }}" method="POST" class="d-inline">
                                     @csrf
                                 @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                       onclick="return confirm('Are you sure you want to delete this Admin ?')" 
                                         title="Delete">
                                         <i class="fas fa-trash"></i>
                                     </button>
                                 </form>
                            </td>
                   
                    </tr>
                    
                    @endforeach
                  
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>
      @endsection