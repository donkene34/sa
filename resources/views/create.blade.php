@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>deposer une annonce</h1>
        <hr>
        <form method="post" action="{{ route('ad.store') }}" >
            @csrf
            <div class="from-group">
                <label for="title">Titre de l'annonce</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" aria-describedby="title">
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
             @enderror
            </div>
            <div class="form-group">
                <label for="decrition">Description de l'annonce</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="localisation">localisation</label>
            <input type="text" name="localisation" class="form-control @error('localisation') is-invalid @enderror" value="{{ old('localisation') }}">
            @error('localisation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
             @enderror
            </div>
            <div class="form_group">
                <label for="price">price</label>
            <input type="text" name="price" class="form-control @error('price')@enderror" value="{{ old('price') }}">
            @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            @guest
                <h1 class="mt-5">Vos information</h1>
                <div class="from-group">
                    <label for="nom">Votre nom</label>
                <input type="text" name="name" id="title" class="form-control @error('name') is-invalid @enderror" value="{{ old('title') }}" aria-describedby="title">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror
                </div>
                <div class="from-group">
                    <label for="email">email</label>
                <input type="email" name="email" id="email" class="form-control @error('name') is-invalid @enderror" value="{{ old('title') }}" aria-describedby="title">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror
                </div>
                <div class="from-group">
                    <label for="mdp">mdp</label>
                <input type="password" name="password" id="password" class="form-control @error('name') is-invalid @enderror" value="{{ old('title') }}" aria-describedby="title">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror
                </div>

                <div class="from-group">
                    <label for="cmdp">cmdp</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('name') is-invalid @enderror" value="{{ old('title') }}" aria-describedby="title">
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror
                </div>
            @endguest
            </div>
            <button type="submit" class="btn btn-outline-primary mt-5">soumettre votre annonce</button>
        </form>
    </div>
@endsection
