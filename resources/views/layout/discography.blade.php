<?php
//dd($discography);
?>
@extends('home')

@section('main')
<div class="grid mt-4">
    <?php
    foreach ($discography as $disco) : ?>
    
        <div class="card grid-item col col-sm-6 col-md-4 mb-3">
            <img src="{{ $disco['cover']->url }}" class="card-img-top" alt="{{ $disco['artist_name'] }}" width="200" height="200"/>
            <div class="card-body">
                <h2 class="card-title">{{ $disco['artist_name'] }}</h2>
                <p class="card-text">{{ $disco['name'] }}</p>
                <small class="text-muted">Año: {{ $disco['released'] }}</small>
            </div>
        </div>
    <?php 
    endforeach ?>
</div>
@endsection