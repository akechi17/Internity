@extends('layouts.dashboard')

@section('dashboard-content')
    <x-form.form formTitle="Kuisioner" formMethod="POST" spoofMethod="PUT"
        formAction="{{ route('reviews.users.update') }}">
        <x-slot:formBody>
            @foreach ($reviews as $review)
                <input type="hidden" name="reviews[id][]" value="{{ $review->id }}">
                <x-form.radio label="{{ $review->title }}" name="reviews[rating][]" value="{{ $review->rating }}">
                    <x-slot:checkboxItem>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="5" id="input-status-1"
                                {{ $review->rating == 5 ? 'checked' : '' }}>
                            <label class="form-check-label" for="input-status-1">Baik Sekali</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="4" id="input-status-2"
                                {{ $review->rating == 4 ? 'checked' : '' }}>
                            <label class="form-check-label" for="input-status-2">Baik</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="3" id="input-status-3"
                                {{ $review->rating == 3 ? 'checked' : '' }}>
                            <label class="form-check-label" for="input-status-2">Cukup</label>
                        </div><div class="form-check">
                            <input class="form-check-input" type="radio" value="2" id="input-status-4"
                                {{ $review->rating == 2 ? 'checked' : '' }}>
                            <label class="form-check-label" for="input-status-2">Kurang</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="1" id="input-status-5"
                                {{ $review->rating == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="input-status-2">Kurang Sekali</label>
                        </div>
                    </x-slot:checkboxItem>
                </x-form.radio>

                <x-form.input-base label="Saran" id="input-suggestion" type="text" name="reviews[body][]"
                    value="{{ $review->body }}" />
            @endforeach
        </x-slot:formBody>
    </x-form.form>
@endsection
