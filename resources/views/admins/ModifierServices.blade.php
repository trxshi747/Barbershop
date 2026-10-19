@extends('layouts.admins')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Edit Service</h5>
                
                @isset($Services)
                <form method="POST" action="{{ route('Update.Services', $Services->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <!-- Name -->
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="name" class="form-control" 
                               placeholder="Name" value="{{ old('name', $Services->name) }}" />
                        
                    </div>
                    
                    <!-- Description -->
                    <div class="form-outline mb-4">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description', $Services->description) }}</textarea>
                       
                    </div>
                    
                    <!-- Image -->
                    <div class="form-outline mb-4">
                        <label>Current Image:</label>
                        @if($Services->image)
                            <img src="{{ asset('storage/'.$Services->image) }}" width="100" class="d-block mb-2">
                        @endif
                        <input type="file" name="image" class="form-control" />
                        
                    </div>
                    
                    <!-- Price -->
                    <div class="form-outline mb-4">
                        <input type="text" name="price" class="form-control" 
                               placeholder="Price" value="{{ old('price', $Services->price) }}" />
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <!-- Section -->
                    <div class="form-outline mb-4">
                        <select name="section" class="form-select form-control">
                            <option value="">Choose section</option>
                            <option value="Men" {{ old('section', $Services->section) == 'Men' ? 'selected' : '' }}>Men</option>
                            <option value="Kids" {{ old('section', $Services->section) == 'Kids' ? 'selected' : '' }}>Kids</option>
                        </select>
                        
                    </div>
                    
                    <!-- Duration -->
                    <div class="form-outline mb-4">
                        <label>Duration (minutes):</label>
                        <input type="number" name="duration" min="0" max="59" class="form-control" 
                               placeholder="0" value="{{ old('duration', $Services->duration) }}" />
                        
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary mb-4 text-center">Update</button>
                </form>
                @else
                <div class="alert alert-danger">Service not found</div>
                @endisset
            </div>
        </div>
    </div>
</div>
@endsection