@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card card-default">
                <div class="card-header">Adverts</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row text-center">
                        @if($adverts->count())
                            @foreach($adverts as $advert)
                                <div class="card col-6" style="margin-bottom: 30px; padding: 0">
                                    <h5 class="card-header">
                                        <a href="{{ route('advert.show', $advert->id) }}">
                                            {{ $advert->title }}
                                        </a>
                                    </h5>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ str_limit($advert->description, 120) }}</h5>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            Ads not created
                        @endif
                    </div>

                    @if($adverts->count())
                        <div class="container">
                            <div class="row">
                                <nav class="advert-pagination">
                                    {{ $adverts->links() }}
                                </nav>
                            </div>
                        </div>

                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-3">
            @guest
                @include('login-form')
            @else
                <a href="{{ route('advert.create') }}" class="btn btn-block btn-secondary">Create Ad</a>
            @endguest
        </div>
    </div>
</div>
@endsection
