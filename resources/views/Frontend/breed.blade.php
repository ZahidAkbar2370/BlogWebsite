@extends("layout")

@section("content")


    <div class="container">
        <div class="row p-3">
            <div class="col-md-12">
                <h3 class="text-primary">{{ $breed->breed_name }}</h3>
                <small>{{ $breed->categories->category_name ?? '' }}</small>
            </div>


                <div class="col-md-12 col-sm-12 mt-3">
                    <strong>Description</strong>
                    <div>{!! htmlspecialchars_decode($breed->breed_description) !!}</div>
                </div>




        </div>

        <div class="row p-3 mt-4">

            @if(!empty($breed->characteristics) && count($breed->characteristics) > 0)
                <div class="col-12">
                    <h3 class="card-title">Characteristics</h3>
                </div>
                @foreach($breed->characteristics as $characteristic)
                    <div class="col-3 mb-3">
                        {{-- <div class="card"> --}}
                            <div class="form-group">
                                <label for="">{{$characteristic->title}}</label>
                                <input type="range" class="w-100" value="{{$characteristic->value}}" readonly="true" disabled maxlength="100">
                            </div>
                        {{-- </div> --}}
                    </div>
                @endforeach
            @endif
        </div>
    </div>





    @endsection
