@extends('Backend.admin_layout')
@section('admincontent')


<main id="main" class="main">


    <section class="section">

<div class="row mt-5">
    @if(session('success'))
              <div class="alert alert-success mt-2 mb-2">
                  {{ session('success') }}
               </div>
        @endif
    <div class="col-12">
        <div class="d-flex justify-content-between">
            <h3>Edit Setting</h3>
        </div>
    </div>
    <div class="col-12 mt-3">
        <form action="{{ URL::to('backend/update-setting') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="card p-3 mb-2">
                <h3 class="card-title">Site Setting</h3>
            <div class="row">
              <div class="col">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="website_title" value="{{ $setting[0]->key_value ?? old('website_title') }}" placeholder="Blog Title" required="true">
                    @if($errors->has('website_title'))
                        <div class="text-danger">{{ $errors->first('website_title') }}</div>
                    @endif
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                    <label>Logo</label>
                    <input type="file" class="form-control" name="website_logo" value="{{ $setting[1] ?? old('website_logo') }}">
                    <img id="imagePreview" src="{{ asset($setting[1]->key_value) }}" class="mt-2" alt="Image Preview" style="max-width: 200px; max-height: 150px;">
                    @if($errors->has('website_logo'))
                        <div class="text-danger">{{ $errors->first('website_logo') }}</div>
                    @endif
                </div>
              </div>
            </div>



            {{-- Header Menu --}}

            <div class="row mt-4 mb-2">
                <div class="col-6">
                    <div class="form-group">
                        <label>Show Category</label>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="menu_show_category" @if($setting[2]->key_value == "on") checked @endif>
                            <label class="form-check-label">Enable</label>
                        </div>
                    </div>
                </div>
            
                <div class="col-6">
                    <div class="form-group">
                        <label>Show Login Button</label>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="menu_show_login" @if($setting[3]->key_value == "on") checked @endif>
                            <label class="form-check-label">Enable</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4 mb-2">
                <div class="col-6">
                    <div class="form-group">
                        <label>Home</label>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="menu_show_home" @if($setting[4]->key_value == "on") checked @endif>
                            <label class="form-check-label">Enable</label>
                        </div>
                    </div>
                </div>
            
                <div class="col-6">
                    <div class="form-group">
                        <label>About</label>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="menu_show_about" @if($setting[5]->key_value == "on") checked @endif>
                            <label class="form-check-label">Enable</label>
                        </div>
                    </div>
                </div>
            </div>

              <div class="row mt-2">
                <div class="col">
                    <div class="form-group">
                        <input type="submit" value="Update Setting" onclick="return confirm('Are you sure To Update Setting?')" class="btn btn-success">
                    </div>
                </div>
              </div>
            </div>

          </form>
    </div>
</div>
    </section>
</main>


    
@endsection