@extends('layouts.admins')

@section('content')
     <div class="row">
        <div class="col">
        <div class=" container">
                   @if(Session::has('success'))
                     <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
                   @endif
            </div>
            <div class=" container">
                   @if(Session::has('delete'))
                     <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('delete') }}</p>
                   @endif
            </div>
            <div class=" container">
                   @if(Session::has('update'))
                     <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('update') }}</p>
                   @endif
            </div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">services</h5>
              <a  href="{{route('Create.Services')  }}" class="btn btn-primary mb-4 text-center float-right">Add services</a>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">description</th>
                    <th scope="col">picture</th>
                    <th scope="col">price</th>
                    <th scope="col">section</th>
                    <th scope="col">duration</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Edit</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $Services as $Service )
                    <tr>
                    <th scope="row">{{ $Service->id }}</th>
                    <td>{{ $Service->name }}</td>
                    <td>{{ $Service->description }}</td>
                    <td><img src="{{ asset('assets/images/'.$Service->image.'') }}"  width="80" height="70"></td>
                    <td>{{ $Service->price }}</td>
                    <td>{{ $Service->section }}</td>
                    <td>{{ $Service->duration }}</td>
                    <td><a href="{{route('Delete.Services',$Service -> id)  }}" class="btn btn-danger  text-center ">Delete</a></td>
                    <td><a href="{{route('Modifier.Services',$Service -> id)  }}" class="btn btn-danger  text-center ">Edit</a></td>
                   </tr>
                    
                    @endforeach
                  
                   
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>

@endsection