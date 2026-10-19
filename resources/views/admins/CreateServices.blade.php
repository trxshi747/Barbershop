
@extends('layouts.admins')

@section('content')

<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">ADD Services</h5>
                <form method="POST" action="{{ route('Store.Services')  }}" enctype="multipart/form-data">
                <!-- Email input -->
                @csrf
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>
                
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="file" name="image" id="form2Example1" class="form-control"  />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" />
                 
                </div>
                
               
                <div class="form-outline mb-4 mt-4">

                  <select name="section" id="form2Example1" class="form-select  form-control" aria-label="Default select example">
                    <option selected>Choose section</option>
                    <option value="Men">Men</option>
                    <option value="Kids">Kids</option>
                    
                  </select>
                </div>
                <h5 class="mt-4">Specify duration</h5>
                <!-- Duration input -->
                <div   class="form-outline mb-4 mt-4">
                        
                        <label for="minutes" class="mt-2">Minutes :</label>
                        <input type="number"  name="duration" min="0" class="form-control" placeholder="0">
                    </div>

                <br>
              

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
      @endsection