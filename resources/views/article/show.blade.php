@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="text-center">
            {{ $article->title }}
        </h3>
    </div>
    <div class="card-body">
    <div class='text-center'>
    <img src="{{ $article->cover }}" class="img-fluid">
    </div>
        <?php
    $Parsedown = new Parsedown();
    echo $Parsedown->text($article->content); 
        ?>
    </div>
</div>
@endsection
