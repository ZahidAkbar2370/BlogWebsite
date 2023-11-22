@extends('Backend.admin_layout')
@section('admincontent')


<main id="main" class="main">


    <section class="section">
<div class="row mt-5">
    <div class="col-12">
        <div class="d-flex justify-content-between">
            <h3>New SubCategory</h3>
        </div>
    </div>
    <div class="col-12 mt-3">
        <form action="{{URL::to('backend/save-sub-category')}}" method="post">
            @csrf

            <div class="col-10">
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="category_id"  required="true">
                        <option value="" selected disabled>Select Category</option>
                        @if(!empty($categories))
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
              </div>


            <div class="row mt-4">
              <div class="col-10">
                <div class="form-group">
                    <label>SubCategory Name</label>
                    <input type="text" class="form-control" name="sub_category_name" value="{{ old('subcategory_name') }}" placeholder="SubCategory Name ">
                    @if($errors->has('Sub_category_name'))
                        <div class="text-danger">{{ $errors->first('sub_category_name') }}</div>
                    @endif
                </div>
              </div>
            </div>

              <div class="row mt-3">
                <div class="col">
                    <div class="form-group">
                        <input type="submit" onclick="return confirm('Are you Sure to Create New Sub Category?')" class="btn btn-success">
                    </div>
                </div>
              </div>

          </form>
    </div>
</div>
    </section>
</main>


@endsection
