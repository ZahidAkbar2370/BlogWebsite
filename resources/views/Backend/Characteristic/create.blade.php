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
            <h3>New Characteristic</h3>
        </div>
    </div>
    <div class="col-12 mt-3">
        <form action="{{ URL::to('backend/save-characteristic') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="card p-3 mb-2">
                {{-- <h3 class="card-title">Breed Information</h3> --}}
                <div class="row">


                    <div class="col-10">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category_id"  required="true">
                                <option value="" selected disabled>Select Category</option>
                                @if(!empty($allCategories))
                                    @foreach($allCategories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                      </div>


                    <div class="col-5 mt-4">
                      <div class="form-group">
                          <label>Title</label>
                          <input type="text" class="form-control" name="characteristic_title[]" value="{{ old('breed_ncharacteristic_titleame') }}" placeholder="Characteristic Title" required="true">
                          @if($errors->has('characteristic_title'))
                              <div class="text-danger">{{ $errors->first('characteristic_title') }}</div>
                          @endif
                      </div>
                    </div>

                    <div class="col-5 mt-4">
                        <div class="form-group">
                            <label>Text</label>
                            <input type="number" min="0" max="100" class="form-control" name="characteristic_text[]" value="{{ old('characteristic_text') }}" placeholder="Percentage" required="true">
                            @if($errors->has('characteristic_text'))
                                <div class="text-danger">{{ $errors->first('characteristic_text') }}</div>
                            @endif
                        </div>
                      </div>

                      <div class="col-2 mt-5">
                        <button type="button" class="btn btn-primary" onclick="addDynamicField()"><i class="bi bi-plus"></i></button>
                    </div>

                      <div id="dynamic-fields-container">
                        <!-- Dynamic fields will be added here -->
                    </div>

                  </div>



            </div>



              <div class="row mt-2">
                <div class="col">
                    <div class="form-group">
                        <input type="submit" onclick="return confirm('Are you sure To Create Characteristic?')" class="btn btn-success">

                            <button type="button" class="btn btn-primary" onclick="addDynamicField()"><i class="bi bi-plus"></i></button>
                    </div>
                </div>
              </div>

          </form>
    </div>
</div>
    </section>
</main>



@endsection
