@extends('Backend.admin_layout')
@section("admincontent")


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Blog Detail</h1>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <h2>{{ $blog->title }}</h2>
              <h5>ID: {{ $blog->id }}</h5>
              <p class="mt-3"><a href="{{ url('blog',$blog->slug) }}">View Blog</a></p>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#seo_meta">SEO Meta</button>
                  </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#description">Description</button>
                </li>


              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">


                  <h5 class="card-title">Blog Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Category Name</div>
                    <div class="col-lg-9 col-md-8">{{ $blog->categories->category_name ?? '' }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Sub Category</div>
                    <div class="col-lg-9 col-md-8">{{ $blog->sub_categories->sub_category_name ?? '' }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Breed Name</div>
                    <div class="col-lg-9 col-md-8"><a href="{{ url('backend/show-breed/'.$blog->breeds->id) ?? '#' }}">{{ $blog->breeds->breed_name ?? '' }}</a></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Blog Title</div>
                    <div class="col-lg-9 col-md-8">{{ $blog->title }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Created By</div>
                    <div class="col-lg-9 col-md-8">{{ $blog->users->name }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Tags</div>
                    <div class="col-lg-9 col-md-8">{{ $blog->tags }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Thumbnail</div>
                    <div class="col-lg-9 col-md-8"><img src="{{ asset($blog->thumbnail) }}" style="width: 60px; height: 60px;" alt=""></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Created At</div>
                    <div class="col-lg-9 col-md-8">{{ $blog->created_at }}</div>
                  </div>


                </div>

                <div class="tab-pane fade profile-edit pt-3" id="description">

                    <h5 class="card-title">Blog Description</h5>
                    <div class="row mb-3">
                      {{-- <h5 class="card-title">Description</h5> --}}
                  <p class="small fst-italic">{{ $blog->description }}</p>

                    </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="seo_meta">

                    <h5 class="card-title">SEO Details</h5>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Title</div>
                        <div class="col-lg-9 col-md-8">{{ $blog->seo_title }}</div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Keywords</div>
                        <div class="col-lg-9 col-md-8">{{ $blog->seo_keywords }}</div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">URl</div>
                        <div class="col-lg-9 col-md-8"><a href="{{ $blog->url }}" target="_blank">URL</a></div>
                      </div>
                    <div class="row mb-3">
                      <h5 class="card-title">Description</h5>
                  <p class="small fst-italic">{{ $blog->seo_description }}</p>

                    </div>

                </div>


              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->


  @endsection
