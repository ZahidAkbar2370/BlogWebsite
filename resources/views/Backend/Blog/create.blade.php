@extends('Backend.admin_layout')
@section('admincontent')


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
                        <input type="file" name="thumbnail" class="form-control" required="true">
                    </div>
                </div>
              </div>

              <div class="row mt-2">
                <div class="col-12">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" placeholder="Enter Description" class="form-control"  required="true"></textarea>
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



  {{-- <script src="https://cdn.tiny.cloud/1/e1lcv2whqbysl6ly792l0h69tazqu9tfa4p9h4k9i4ab7bbi/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> --}}

  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ],
      ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
    });
  </script>

    
@endsection