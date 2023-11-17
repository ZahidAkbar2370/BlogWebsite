@extends("layout")
@section("content")


    <div class="container-fluid" style="background-color: #e9eef2">
        <div class="row p-5">
            <div class="col-md-6 col-sm-12 col-lg-6">
                <img class="w-100" src="{{ asset('main_image.png') }}" alt="">
            </div>

            <div class="col-md-6 col-sm-12">
               <div class="ml-3 mb-5">
                    <h3>Welcome to Zahid Blogs</h3>
                    <p>Looking to explore the world with your best friend? Our site offers pet friendly travel tips, wellness, nutrition and training recommendations, all curated to make your journey enjoyable for both you and your four-legged companion.</p>
               </div>

               <div class="ml-3 mb-5">
                <h3>Our Commitment</h3>
                <p>We’re committed to providing reliable travel advice and educational content to make sure you and your furry companion travel safely and comfortably. Trust us for the inside scoop on all your pet friendly travel and wellness needs.</p>
           </div>

           <div class="ml-3 mb-5">
            <h3>Looking Ahead</h3>
            <p>Looking ahead, we’re excited to unlock a world of top-notch, pet friendly accommodations for you and your best friend. We’re committed to making every tail-wagging adventure possible so you and your four-legged friends can explore the world safely and joyfully.</p>
       </div>
            </div>
        </div>
    </div>





    
    <div class="container-fluid">
        <div class="row p-5">
            <div class="col-md-12">
                <h3>Feature Blogs</h3>
            </div>
            @if(!empty($blogs))
                @foreach($blogs as $blog)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <a href="{{ url('blog',$blog->slug) }}"><img class="home-blog-image w-100" src="{{ asset($blog->thumbnail) }}"></a>
                            <div class="p-2">
                                <small>{{ $blog->tags ?? "not tags" }}</small>
                                <a href="{{ url('blog',$blog->slug) }}" class="blog-title"><h5>{{ $blog->title }}</h5></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>








    @endsection



