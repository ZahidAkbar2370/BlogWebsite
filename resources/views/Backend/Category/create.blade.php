@extends('Backend.admin_layout')
@section('admincontent')


<main id="main" class="main">


    <section class="section">
<div class="row mt-5">
    <div class="col-12">
        <div class="d-flex justify-content-between">
            <h3>New Category</h3>
        </div>
    </div>
    <div class="col-12 mt-3">
        <form action="{{ URL::to('backend/save-category') }}" method="post">
            @csrf
            <div class="row">
              <div class="col">
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" class="form-control" name="category_name" value="{{ old('category_name') }}" placeholder="Category Name ">
                    @if($errors->has('category_name'))
                        <div class="text-danger">{{ $errors->first('category_name') }}</div>
                    @endif
                </div>
              </div>
            </div>

              <div class="row mt-2">
                <div class="col">
                    <div class="form-group">
                        <input type="submit" onclick="return confirm('Are you Sure to Create New Category?')" class="btn btn-success">
                    </div>
                </div>
              </div>

          </form>
    </div>
</div>
    </section>
</main>

    
@endsection