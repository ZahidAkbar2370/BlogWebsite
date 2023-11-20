@extends('Backend.admin_layout')
@section('admincontent')


<main id="main" class="main">


    <section class="section">
<div class="row mt-5">
    <div class="col-12">
        <div class="d-flex justify-content-between">
            <h3>Edit Blog</h3>
        </div>
    </div>
    <div class="col-12 mt-3">
        <form action="{{ URL::to('backend/update-blog') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $blog->id }}">

            <div class="card p-3 mb-2">
                <h3 class="card-title">Blog Information</h3>
            <div class="row">
              <div class="col">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $blog->title ?? old('title') }}" placeholder="Blog Title" required="true">
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
                                <option value="{{ $category->id }}" @if($blog->category_id == $category->id) selected @endif>{{ $category->category_name }}</option>
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
                        <input type="text" name="tags" value="{{ $blog->tags ?? old('tags') }}" class="form-control" placeholder="Blog Tags">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>Thumbnail</label>
                        <input type="file" name="thumbnail" class="form-control" id="imageInput" onchange="previewImage()">
                        <img id="imagePreview" src="{{ asset($blog->thumbnail) }}" class="mt-2" alt="Image Preview" style="max-width: 200px; max-height: 150px;">
                    </div>
                </div>
              </div>

              <div class="row mt-2">
                <div class="col-12">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="blog_description" placeholder="Enter Description" class="tinymce-editor">{{ $blog->description ?? old('description') }}</textarea>
                    </div>
                </div>
              </div>
            </div>

            
            <div class="card p-3">
            <h3 class="card-title">SEO Meta</h3>
              <div class="row mt-2">

                <div class="col-4">
                    <div class="form-group">
                        <label>SEO Title</label>
                        <input type="text" name="seo_title" class="form-control" value="{{ $blog->seo_title ?? old('seo_title') }}">
                    </div>
                </div>

              <div class="col-4">
                    <div class="form-group">
                        <label>SEO Keywords</label>
                        <input type="text" name="seo_keywords" class="form-control" value="{{ $blog->seo_keywords ?? old('seo_keywords') }}">
                    </div>
                </div>
              

              <div class="col-4">
                    <div class="form-group">
                        <label>URL</label>
                        <input type="url" name="url" class="form-control" value="{{ $blog->url ?? old('url') }}">
                    </div>
                </div>
             

             
              <div class="col-12">
                    <div class="form-group">
                        <label>SEO Description</label>
                        <textarea name="seo_description" class="form-control">{{ $blog->seo_description ?? old('seo_description') }}</textarea>
                    </div>
                </div>
            </div>
            </div>


              <div class="row mt-2">
                <div class="col">
                    <div class="form-group">
                        <input type="submit" value="Update Blog" onclick="return confirm('Are you sure To Update Blog?')" class="btn btn-success">
                    </div>
                </div>
              </div>

          </form>
    </div>
</div>
    </section>
</main>


    
@endsection