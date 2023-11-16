@extends('Backend.admin_layout')
@section("admincontent")


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Total Blogs</h5>

                  <div class="d-flex align-items-center">
                    <div class="ps-3">
                      <h6>{{ $totalBlogs }}</h6>
                      <span class="text-success small pt-1 fw-bold">Active</span> <span class="text-muted small pt-2 ps-1">{{ $totalActiveBlogs }}</span>
                      <span class="text-danger small pt-1 fw-bold">Inactive</span> <span class="text-muted small pt-2 ps-1">{{ $totalInactiveBlogs }}</span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Total Categories</h5>

                  <div class="d-flex align-items-center">
                    <div class="ps-3">
                      <h6>{{ $totalCategories }}</h6>
                      <span class="text-success small pt-1 fw-bold">Active</span> <span class="text-muted small pt-2 ps-1">{{ $totalActiveCategories }}</span>
                      <span class="text-danger small pt-1 fw-bold">Inactive</span> <span class="text-muted small pt-2 ps-1">{{ $totalInactiveCategories }}</span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->


          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->


@endsection