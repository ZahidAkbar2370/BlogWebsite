@if (!empty($allCharacteristic))
<div class="row p-3">

    <div class="col-12">
        <h3 class="card-title">Breed Characteristics</h3>
    </div>

    @foreach ($allCharacteristic as $characteristic )

    <div class="col-3">
        <div class="form-group">
            <label>{{ $characteristic->title }}</label>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" value="{{ $characteristic->id }}" name="breed_characteristics[]">
                <label class="form-check-label">Enable</label>
            </div>
        </div>
    </div>

    @endforeach

</div>

@endif
