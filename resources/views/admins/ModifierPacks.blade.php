@extends('layouts.admins')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Edit Pack</h5>
                
                
                <form method="POST" action="{{ route('Update.Packs', $Packs->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <!-- Name -->
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="name" class="form-control" 
                               placeholder="Name" value="{{ old('name', $Packs->name) }}" />
                    </div>
                    
                    <!-- Description -->
                    <div class="form-outline mb-4">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description', $Packs->description) }}</textarea>
                    </div>
                    
                    <!-- Image -->
                    <div class="form-outline mb-4">
                        <label>Picture:</label>
                        @if($Packs->image)
                            <img src="{{ asset('storage/'.$Packs->image) }}" width="100" class="d-block mb-2">
                        @endif
                        <input type="file" name="image" class="form-control" />
                    </div>
                    
                    <!-- Price -->
                    <div class="form-outline mb-4">
                        <input type="text" name="price" class="form-control" 
                               placeholder="Price" value="{{ old('price', $Packs->price) }}" />
                    </div>
                    
                    <!-- Duration -->
                    <div class="form-outline mb-4">
                        <label>Duration (minutes):</label>
                        <input type="number" name="duration" min="0" max="59" class="form-control" 
                               placeholder="0" value="{{ old('duration', $Packs->duration) }}" />
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary mb-4 text-center">Update</button>
                </form>
                
            </div>
        </div>
    </div>
</div>
@endsection