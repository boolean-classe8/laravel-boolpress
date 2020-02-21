@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>{{ $post->title }}</h1>
                @if(!empty($post->cover_image))
                    <img src="{{ asset('storage/' . $post->cover_image) }}" alt="{{ $post->title }} - immagine di copertina">
                @endif
                <div class="post-content">
                    {{ $post->content }}
                </div>
                <p><em>{{ $post->author }}</em></p>
            </div>
        </div>
    </div>
@endsection
