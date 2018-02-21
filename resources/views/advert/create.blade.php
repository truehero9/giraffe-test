@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card card-default">
                    <div class="card-header advert-main">{{ $advert ? 'Editing' : 'Creating' }} Advert</div>

                    <div class="card-body advert-description">
                        <form action="{{ route('advert.create', $advert ? $advert->id : '') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input id="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" value="{{ $advert ? $advert->title : old('title') }}">

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" rows="5" name="description">{{ $advert ? $advert->description : old('description') }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <input type="submit" class="btn btn-success" value="{{ $advert ? 'Update' : 'Create' }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
