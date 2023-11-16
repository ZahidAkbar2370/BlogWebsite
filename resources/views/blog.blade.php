@extends("layout")
@section("content")

    
    <div class="container-fluid">
        <div class="row p-5">
            <div class="col-12">
                <h3>{{ $blog->title }}</h3>
                <small>{{ $blog->tags }}</small>
            </div>

            <div class="col-9">
                <img class="blog-image w-100" src="{{ asset($blog->thumbnail) }}"></a>

                <div class="col-12 mt-5">
                    <p>{{ $blog->description }}</p>
                </div>
            </div>

            <div class="col-3">
                <div class="col-12">
                    <h3>Feature Blogs</h3>
                </div>
                @if(!empty($randomBlogs))
                    @foreach($randomBlogs as $blog)
                        <div class="col-12">
                            <div class="card">
                                <a href="{{ url('blog',$blog->id) }}"><img class="blog-image w-100" src="{{ asset($blog->thumbnail) }}"></a>
                                <div class="p-2">
                                    <small>{{ $blog->tags }}</small>
                                    <a href="{{ url('blog',$blog->id) }}" class="blog-title"><h5>{{ $blog->title }}</h5></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            
        </div>
    </div>




    @endsection