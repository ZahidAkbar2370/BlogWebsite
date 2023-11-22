@extends('Backend.admin_layout')
@section("admincontent")


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Breed Detail</h1>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <h2>{{ $breed->breed_name }}</h2>
              <h5>ID: {{ $breed->id }}</h5>
              <p class="mt-3"><a href="{{ url('breed',$breed->id) }}">View Breed</a></p>
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
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#description">Description</button>
                </li>


              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">


                  <h5 class="card-title">Breed Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Category Name</div>
                    <div class="col-lg-9 col-md-8">{{ $breed->categories->category_name }}</div>
                  </div>

                  @if(!empty($breed->characteristics) && count($breed->characteristics) > 0)
                  <h5 class="card-title">Characteristics</h5>
                    @foreach($breed->characteristics as $breedChart)
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">{{$breedChart->title}}</div>
                            <div class="col-lg-9 col-md-8">{{$breedChart->value}}</div>
                        </div>
                    @endforeach
                  @endif




                </div>

                <div class="tab-pane fade profile-edit pt-3" id="description">

                    <h5 class="card-title">Breed Description</h5>
                    <div class="row mb-3">
                      {{-- <h5 class="card-title">Description</h5> --}}
                  <p class="small fst-italic">{!! htmlspecialchars_decode($breed->breed_description) !!}</p>

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
