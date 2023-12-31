@extends('Backend.admin_layout')
@section("admincontent")


<main id="main" class="main">


    <section class="section">
    <div class="row">
        @if(session('success'))
              <div class="alert alert-success mt-2 mb-2">
                  {{ session('success') }}
               </div>
        @endif

      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Categories</h5>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Category Name</th>
                  <th scope="col">Sub Category</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($allSubCategories as $index => $subcategory)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $subcategory->categories->category_name }}</td>
                        <td>{{ $subcategory->sub_category_name }}</td>

                        <td>
                            <!-- Your action buttons, e.g., delete button -->
                            <a href="{{ url('backend/delete-sub-category', $subcategory->id) }}" onclick="return confirm('Are you sure to delete this subcategory?')" class="btn btn-danger">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>


  </main><!-- End #main -->


@endsection
