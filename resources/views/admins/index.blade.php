@extends('layouts.admins')

@section('content')
     <div class="row">

        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
            <h5 class="card-title">Admins</h5>
              
              <p class="card-text">Number of Admins: {{ $adminsCount }}</p>  
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
            <h5 class="card-title">Services</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">Services: {{ $ServicesCount }}</p>
             
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Barbers</h5>
              
              <p class="card-text">Number of Barbers: {{ $CoiffeursCount }}</p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Bookings</h5>
              
              <p class="card-text">Number of bookings:{{ $bookingsCount }} </p>
              
            </div>
          </div>
        </div>
      </div>
@endsection