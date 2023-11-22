@extends('Backend.admin_layout')
@section('admincontent')

<style>#blog_description {
    height: 300px; /* Adjust as needed */
}</style>

<main id="main" class="main">


    <section class="section">
<div class="row mt-5">
    <div class="col-12">
        <div class="d-flex justify-content-between">
            <h3>New Breed</h3>
        </div>
    </div>
    <div class="col-12 mt-3">
        <form action="{{ URL::to('backend/save-breed') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="card p-3 mb-2">
                <h3 class="card-title">Breed Information</h3>
                <div class="row">
                    <div class="col">
                      <div class="form-group">
                          <label>Title</label>
                          <input type="text" class="form-control" name="breed_name" value="{{ old('breed_name') }}" placeholder="Breed Name" required="true">
                          @if($errors->has('breed_name'))
                              <div class="text-danger">{{ $errors->first('breed_name') }}</div>
                          @endif
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                          <label>Category</label>
                          <select class="form-control" name="category_id" id="breedSelectedCategory"  required="true">
                              <option value="" selected disabled>Select Category</option>
                              @if(!empty($categories))
                                  @foreach($categories as $category)
                                      <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                  @endforeach
                              @endif
                          </select>
                      </div>
                    </div>
                  </div>








            </div>

            <div class="card mt-2 mb-2 showCharacteristics">

            </div>

            <div class="card mt-2 p-3">
                <h3 class="card-title">Breed Description</h3>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            {{-- <label>Description</label> --}}
                            <textarea name="breed_description" id="breed_description" placeholder="Enter Description" class="tinymce-editor">{{ old('breed_description') }}</textarea>
                            @if($errors->has('breed_description'))
                            <div class="text-danger">{{ $errors->first('breed_description') }}</div>
                        @endif
                        </div>
                    </div>
                  </div>
            </div>



              <div class="row mt-2">
                <div class="col">
                    <div class="form-group">
                        <input type="submit" onclick="return confirm('Are you sure To Create Breed?')" class="btn btn-success">
                    </div>
                </div>
              </div>

          </form>
    </div>
</div>
    </section>
</main>



@endsection
