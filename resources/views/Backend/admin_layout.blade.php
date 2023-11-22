<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ env('APP_NAME') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  {{-- <link href="{{ asset('assets/img/favicon.png')}}" rel="icon"> --}}
  {{-- <link href="{{ asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon"> --}}

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">

  {{-- Toastr Message --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">




</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ url('/') }}" class="logo d-flex align-items-center">
        {{-- <img src="assets/img/logo.png" alt=""> --}}
        <span class="d-none d-lg-block">Zahid Blogs</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name ?? 'Unknown' }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Auth::user()->email ?? 'test@gmail.com' }}</h6>
              {{-- <span>{{ Auth::user()->role ?? 'Test' }}</span> --}}
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-right"></i>
                     {{ __('Logout') }}
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ url('/') }}">
          <i class="bi bi-speedometer2"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#vendor-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people-fill"></i><span>Vendor</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="vendor-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('backend/vendors') }}">
              <i class="bi bi-circle"></i><span>List</span>
            </a>
          </li>
          <li>
            <a href="{{ url('backend/create-vendor') }}">
              <i class="bi bi-circle"></i><span>Add</span>
            </a>
          </li>
        </ul> --}}
      {{-- </li> --}}

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#users1-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people-fill"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="users1-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('backend/users') }}">
              <i class="bi bi-circle"></i><span>List</span>
            </a>
          </li>
          <li>
            <a href="{{ url('backend/create-user') }}">
              <i class="bi bi-circle"></i><span>Add</span>
            </a>
          </li>
        </ul>
      </li><!-- End Class --> --}}

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#classes-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-grid"></i><span>Category</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="classes-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('backend/categories') }}">
              <i class="bi bi-circle"></i><span>List</span>
            </a>
          </li>
          <li>
            <a href="{{ url('backend/create-category') }}">
              <i class="bi bi-circle"></i><span>Add</span>
            </a>
          </li>
        </ul>
      </li><!-- End Class -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#sub_categories-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-grid"></i><span>Sub Category</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="sub_categories-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('backend/sub-categories') }}">
              <i class="bi bi-circle"></i><span>List</span>
            </a>
          </li>
          <li>
            <a href="{{ url('backend/create-sub-category') }}">
              <i class="bi bi-circle"></i><span>Add</span>
            </a>
          </li>
        </ul>
      </li><!-- End Class -->




      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#breeds-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-grid"></i><span>Breed</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="breeds-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ url('backend/characteristics') }}">
                  <i class="bi bi-circle"></i><span>Breed Characteristics</span>
                </a>
              </li>
          <li>
            <a href="{{ url('backend/breeds') }}">
              <i class="bi bi-circle"></i><span>Breed List</span>
            </a>
          </li>
          <li>
            <a href="{{ url('backend/create-breed') }}">
              <i class="bi bi-circle"></i><span>Add Breed</span>
            </a>
          </li>
        </ul>
      </li><!-- End Class -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#blogs-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-megaphone"></i><span>Blog</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="blogs-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('backend/blogs') }}">
              <i class="bi bi-circle"></i><span>List</span>
            </a>
          </li>
          <li>
            <a href="{{ url('backend/create-blog') }}">
              <i class="bi bi-circle"></i><span>Add</span>
            </a>
          </li>
          <li>
            <a href="{{ url('backend/import-blog') }}">
              <i class="bi bi-circle"></i><span>Import</span>
            </a>
          </li>
        </ul>
      </li><!-- End Class -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/backend/settings') }}">
          <i class="bi bi-gear"></i><span>Site Builder</span>
        </a>
      </li>

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#students-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-buildings"></i><span>Product Type</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="students-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('backend/product-types') }}">
              <i class="bi bi-circle"></i><span>List</span>
            </a>
          </li>
          <li>
            <a href="{{ url('backend/create-product-type') }}">
              <i class="bi bi-circle"></i><span>Add</span>
            </a>
          </li>
        </ul>
      </li><!-- End students -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#universities-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-building"></i><span>University</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="universities-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('backend/universities') }}">
              <i class="bi bi-circle"></i><span>List</span>
            </a>
          </li>
          <li>
            <a href="{{ url('backend/create-university') }}">
              <i class="bi bi-circle"></i><span>Add</span>
            </a>
          </li>
        </ul>
      </li><!-- End students -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#providers-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-reception-1"></i><span>Provider</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="providers-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('backend/providers') }}">
              <i class="bi bi-circle"></i><span>List</span>
            </a>
          </li>
          <li>
            <a href="{{ url('backend/create-provider') }}">
              <i class="bi bi-circle"></i><span>Add</span>
            </a>
          </li>
        </ul>
      </li><!-- End students -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#markssheet-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-cart"></i><span>Product</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="markssheet-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('backend/products') }}">
              <i class="bi bi-circle"></i><span>List</span>
            </a>
          </li>
          <li>
            <a href="{{ url('backend/create-product') }}">
              <i class="bi bi-circle"></i><span>Add</span>
            </a>
          </li>
        </ul>
      </li><!-- End markssheet -->

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-envelope"></i>
          <span>Message List</span>
        </a>
      </li><!-- End Message List -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-megaphone"></i>
          <span>Announcements</span>
        </a>
      </li><!-- End Announcements -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#settings-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gear"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="settings-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

          <li>
            <a href="{{ url('backend/currencies') }}">
              <i class="bi bi-circle"></i><span>Currency</span>
            </a>
          </li>

          <li>
            <a href="{{ url('backend/countries') }}">
              <i class="bi bi-circle"></i><span>Country</span>
            </a>
          </li>
        </ul>
      </li><!-- End Settings --> --}}

    </ul>

  </aside><!-- End Sidebar-->

  @yield('admincontent')

  <!-- ======= Footer ======= -->
  {{-- <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Quick Inform - School Management System</span></strong>. All Rights Reserved
    </div>
    <div class="credits">Developed by <a href="#">Softwebies</a>
    </div>
  </footer><!-- End Footer --> --}}
  <!-- Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <form class="modal-content" action="{{ URL::to('backend/update-category') }}" method="post">
        @csrf
          <div class="modal-header">
              <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
              <button type="button" class="close  editCategoryModalCloseBtn" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <!-- Category name input -->
              <label for="editCategoryName">Category Name:</label>
              <input type="hidden" name="category_id" class="form-control" id="editCategoryId" required readonly>
              <input type="text" name="category_name" class="form-control" id="editCategoryName" required>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary editCategoryModalCloseBtn" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
  </div>
</div>


  <!-- Modal -->
  <div class="modal fade" id="editProductTypeModal" tabindex="-1" role="dialog" aria-labelledby="editProductTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" action="{{ URL::to('backend/update-product-type') }}" method="post">
          @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="editProductTypeModalLabel">Edit Product Type</h5>
                <button type="button" class="close  editProductTypeModalCloseBtn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Category name input -->
                <label for="editProductTypeName">Product Type Name:</label>
                <input type="hidden" name="product_type_id" class="form-control" id="editProductTypeId" required readonly>
                <input type="text" name="product_type_name" class="form-control" id="editProductTypeName" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary editCategoryModalCloseBtn" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
    </div>
  </div>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>

</body>

</html>
