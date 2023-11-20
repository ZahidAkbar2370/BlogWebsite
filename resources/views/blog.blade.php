@extends("layout")


@section('metaTitle', $blog->seo_title)
@section('metaDescription', $blog->seo_description)
@section('metaKeywords', $blog->seo_keywords)
@section('metaUrl', $blog->url)

@section("content")

    
    <div class="container-fluid">
        <div class="row p-3">
            <div class="col-md-12">
                <h3>{{ $blog->title }}</h3>
                <small>{{ $blog->tags }}</small>
            </div>

            <div class="col-md-9 col-sm-12">
                <img class="blog-image w-100 mt-4" src="{{ asset($blog->thumbnail) }}"></a>


                <div class="col-md-12 col-sm-12 mt-5">
                    <h3>Description</h3>
                    <div>{!! htmlspecialchars_decode($blog->description) !!}</div>
                </div>
            </div>

            <div class="col-3 d-none d-md-block">
                <div class="col-12">
                    <h3>Feature Blogs</h3>
                </div>
                @if(!empty($randomBlogs))
                    @foreach($randomBlogs as $blog)
                        <div class="col-12 mb-3">
                            <div class="card">
                                <a href="{{ url('blog',$blog->slug) }}"><img class="blog-image w-100" src="{{ asset($blog->thumbnail) }}"></a>
                                <div class="p-2">
                                    <small>{{ $blog->tags }}</small>
                                    <a href="{{ url('blog',$blog->slug) }}" class="blog-title"><h5>{{ $blog->title }}</h5></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            
        </div>
    </div>




    @endsection