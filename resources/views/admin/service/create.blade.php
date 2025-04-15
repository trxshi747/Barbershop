@extends('admin.layouts.layout')
@section('admin_page_title')
Create Service - Admin Panel
@endsection
@section('admin_layout')
    <div class="row">   
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Create Service</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <label for="nom_service">Give name of your service</label>
                        <input type="text" class="form-control" placeholder="
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection