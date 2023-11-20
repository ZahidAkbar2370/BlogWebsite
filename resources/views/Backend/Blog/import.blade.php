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
            <h3>Import Blog</h3>
        </div>
    </div>
    <div class="col-12 mt-3">
        <form action="{{ URL::to('backend/import-blog') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="card p-3 mb-2">
                <h3 class="card-title">CSV File</h3>
                <div class="row">


                      <div class="col-6">
                          <div class="form-group">
                              <input type="file" name="csv_file" class="form-control" id="imageInput" onchange="previewImage()" required="true">
                              <!-- <img id="imagePreview" src="#" class="mt-2" alt="Image Preview" style="display: none; max-width: 200px; max-height: 150px;"> -->
                          </div>
                      </div>
                  </div>




            </div>


              <div class="row mt-2">
                <div class="col">
                    <div class="form-group">
                        <input type="submit" onclick="return confirm('Are you sure To Import Blog CSV?')" class="btn btn-success">
                    </div>
                </div>
              </div>

          </form>
    </div>
</div>
    </section>
</main>



@endsection
