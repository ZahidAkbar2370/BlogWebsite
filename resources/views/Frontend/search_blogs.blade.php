@extends("layout")

@section("content")



    
    <div class="container-fluid">
        <div class="row p-5">
            <div class="col-12">
                <h3>Searched Blogs</h3>
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



