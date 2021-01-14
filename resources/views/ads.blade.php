@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($ads as $ad)
            <div class="card mb-5">
                <img src="" alt="" class="card-img-top">
                <div class="card-body">
                <h5 class="card-title">{{ $ad->title }}</h5>
                <small>{{ Carbon\Carbon::parse($ad->created_at)->diffForHumans() }}</small>
                <p class="card-text text-info">{{ $ad->localisation }}</p>
                <p class="card-text">{{ $ad->description }}</p>
                <a href="#" class="btn btn-primary">voir l'annonce</a>
                <a href="#" class="btn btn-primary">contacter le client</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
