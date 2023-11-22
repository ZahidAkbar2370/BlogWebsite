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

        <a href="{{ url('backend/create-characteristic')}}" class="btn btn-primary mb-3">Create Characteristic</a>

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Characteristics</h5>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Category Name</th>
                  <th scope="col">Title</th>
                  <th scope="col">Text</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @if(!empty($allCharacteristics))
                    @foreach ($allCharacteristics as $charactersiticKey => $charactersitics)
                        <tr>
                            <th scope="row">{{ $charactersiticKey+1 }}</th>
                            {{-- <td>{{ $category->category_name }}</td> --}}
                            <td>{{ $charactersitics->categories->category_name ?? '' }}</td>
                            <td>{{ $charactersitics->title }}</td>
                            <td>{{ $charactersitics->value }}</td>
                            <td>
                                <a href="{{ url('backend/delete-charactersitics',$charactersitics->id) }}" onclick="return confirm('Are you sure to Delete Charactersitic?')" class="btn btn-danger"><i class="bi bi-trash"></i></a>
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
