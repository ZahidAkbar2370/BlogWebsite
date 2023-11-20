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
            <h3>New Blog</h3>
        </div>
    </div>
    <div class="col-12 mt-3">
        <form action="{{ URL::to('backend/save-blog') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="card p-3 mb-2">
                <h3 class="card-title">Blog Information</h3>
                <div class="row">
                    <div class="col">
                      <div class="form-group">
                          <label>Title</label>
                          <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Blog Title" required="true">
                          @if($errors->has('title'))
                              <div class="text-danger">{{ $errors->first('title') }}</div>
                          @endif
                      </div>
                    </div>
                    <div class="col">
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
                  </div>

                  <div class="row mt-2">
                      <div class="col-6">
                          <div class="form-group">
                              <label>Tags</label>
                              <input type="text" name="tags" value="{{ old('tags') }}" class="form-control" placeholder="Blog Tags">
                          </div>
                      </div>

                      <div class="col-6">
                          <div class="form-group">
                              <label>Thumbnail</label>
                              <input type="file" name="thumbnail" class="form-control" id="imageInput" onchange="previewImage()" required="true">
                              <img id="imagePreview" src="#" class="mt-2" alt="Image Preview" style="display: none; max-width: 200px; max-height: 150px;">
                          </div>
                      </div>
                  </div>


                    <div class="row mt-2">
                      <div class="col-12">
                          <div class="form-group">
                              <label>Description</label>
                              <textarea name="description" id="blog_description" placeholder="Enter Description" class="tinymce-editor">{{ old('description') }}</textarea>
                              @if($errors->has('description'))
                              <div class="text-danger">{{ $errors->first('description') }}</div>
                          @endif
                          </div>
                      </div>
                    </div>

            </div>


              <div class="card p-3">
                <h3 class="card-title">SEO Meta</h3>
              <div class="row mt-2 mb-4">
                <div class="col-4">
                    <div class="form-group">
                        <label>SEO Title</label>
                        <input type="text" name="seo_title" placeholder="Enter Title" value="{{ old('seo_title') }}" class="form-control">
                    </div>
                </div>
                <div class="col-4">
                      <div class="form-group">
                          <label>SEO Keywords</label>
                          <input type="text" name="seo_keywords" placeholder="Enter Keywords" value="{{ old('seo_keywords') }}" class="form-control">
                      </div>
                  </div>


                <div class="col-4">
                      <div class="form-group">
                          <label>URL</label>
                          <input type="url" name="url" placeholder="Enter URL" value="{{ old('url') }}" class="form-control">
                      </div>
                  </div>

                  <div class="col-12 mt-3">
                    <div class="form-group">
                        <label>SEO Description</label>
                        <textarea name="seo_description" placeholder="Enter Description" class="form-control">{{ old('seo_description') }}</textarea>
                    </div>
                </div>
                </div>
            </div>



              <div class="row mt-2">
                <div class="col">
                    <div class="form-group">
                        <input type="submit" onclick="return confirm('Are you sure To Create Blog?')" class="btn btn-success">
                    </div>
                </div>
              </div>

          </form>
    </div>
</div>
    </section>
</main>



@endsection
