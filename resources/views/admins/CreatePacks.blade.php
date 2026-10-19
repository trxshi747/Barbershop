@extends('layouts.admins')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">ADD Pack</h5>
                <form method="POST" action="{{ route('Store.Packs') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Name input -->
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="name" id="form2Example1" class="form-control" placeholder="Nom du pack" required />
                    </div>
                    
                    <!-- Description input -->
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                    </div>
                    
                    <!-- Image input -->
                    <div class="form-outline mb-4 mt-4">
                        <label for="image">Picture</label>
                        <input type="file" name="image" id="image" class="form-control" required />
                    </div>
                    
                    <!-- Price input -->
                    <div class="form-outline mb-4 mt-4">
                        <input type="number" name="price" id="form2Example1" class="form-control" placeholder="Prix" required />
                    </div>
                    
                    <!-- Duration input -->
                    <div class="form-outline mb-4 mt-4">
                        <label for="duration">Duration</label>
                        <input type="number" name="duration" id="duration" min="1" class="form-control" placeholder="Durée en minutes" required />
                    </div>

                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Create Pack</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection