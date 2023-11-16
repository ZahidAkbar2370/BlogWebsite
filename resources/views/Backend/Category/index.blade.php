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
                  <th scope="col">Name</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @if(!empty($allCategories))
                    @foreach ($allCategories as $categoryKey => $category)
                        <tr>
                            <th scope="row">{{ $categoryKey+1 }}</th>
                            {{-- <td>{{ $category->category_name }}</td> --}}
                            <td><span class="editable" data-category-id="{{ $category->id }}">{{ $category->category_name }}</span></td>
                            <td> <div class="form-check form-switch">
                                <input class="form-check-input categoryUpdateStatus" type="checkbox" role="switch" id="flexSwitchCheckChecked" data-category-id="{{ $category->id }}" @if($category->status == "active") checked @endif>
                              </div></td>
                            <td>
                                <a href="#" class="btn btn-info editCategoryBtn"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{ url('backend/delete-category',$category->id) }}" onclick="return confirm('Are you sure to Delete Category?')" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
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