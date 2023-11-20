@extends('Backend.admin_layout')
@section("admincontent")

<main id="main" class="main">
<button id="exportBlog" class="btn btn-success mb-2">Export Blogs</button>


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
            <h5 class="card-title">Blogs</h5>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">SR #</th>
                  <th scope="col">Tital</th>
                  <th scope="col">Category</th>
                  <th scope="col">Created By</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @if(!empty($allBlogs))
                    @foreach($allBlogs as $blogKey => $blog)
                        <tr>
                            <th scope="row">{{ $blogKey+1 }}</th>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->categories->category_name ?? '' }}</td>
                            <td>{{ $blog->users->name ?? 'Admin' }}</td>
                            <td>
                                <div class="form-check form-switch">
                                  <input class="form-check-input blogUpdateStatus" type="checkbox" role="switch" data-blog-id="{{ $blog->id }}" @if($blog->status == "active") checked @endif>
                                  </div>
                            </td>
                            <td>
                              <a href="{{ url('backend/show-blog',$blog->id) }}" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                              <a href="{{ url('backend/edit-blog',$blog->id) }}" class="btn btn-info"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{ url('backend/delete-blog',$blog->id) }}" onclick="return confirm('Are you sure to Delete Blog?')" class="btn btn-danger"><i class="bi bi-trash"></i></a>
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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#exportBlog').click(function () {
            $.ajax({
                url: "{{ route('blogs.export') }}",
                type: "GET",
                success: function (response) {
                    // Create a Blob object from the CSV data
                    var blob = new Blob([response], { type: 'text/csv' });

                    // Create a link to download the file
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = 'blog.csv';

                    // Append the link to the document and trigger a click event
                    document.body.appendChild(link);
                    link.click();

                    // Remove the link from the document
                    document.body.removeChild(link);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });
</script>


@endsection
