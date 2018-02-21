@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card card-default">
                    <div class="card-header advert-main">
                        {{ $advert->title }}
                    </div>

                    <div class="card-body advert-description">
                        {!! nl2br(e($advert->description)) !!}
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        Author:
                        <span class="advert-author">
                            {{ $advert->author->username }}
                        </span>

                        <span class="created float-right">
                            {{ $advert->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
            </div>

            @if($advert->isAuthor())
                <div class="col-md-3 advert-edit-panel">
                    <div class="dropdown-menu" style="display: inline-block; top: 0; padding: 20px">
                        <a href="{{ route('advert.create', $advert->id) }}" class="btn btn-primary btn-block">
                            Update
                        </a>

                        <form style="margin-top: 10px" action="{{ route('advert.delete', $advert->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-block">Delete</button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
