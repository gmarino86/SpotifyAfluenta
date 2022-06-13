<?php
//dd($discography);
?>
@extends('home')

@section('main')
<div class="grid mt-4">
    <?php
    foreach ($discography as $disco) : ?>
    
        <div class="card grid-item mb-2">
            <img src="{{ $disco['cover']->url }}" class="card-img-top" alt="{{ $disco['artist_name'] }}" width="200" height="200"/>
            <div class="card-body">
                <h2 class="card-title">{{ $disco['artist_name'] }}</h2>
                <a href="{{ $disco['url_spotify'] }}">{{ $disco['name'] }}</a>
                <hr>
                <small class="text-muted">Año lanzamiento: {{ $disco['released'] }}</small>
            </div>
        </div>
    <?php 
    endforeach ?>
</div>
@endsection