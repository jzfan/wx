@extends('wx.main')

@section('title')
{{ $article->title }}
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h3 class="card-title text-center">
            <p class='text-left inline-block'>
            {{ $article->title }}
            </p>
        </h3>
        
        <div class="alert alert-secondary">
            <div class="container d-flex align-items-center">
                <img src="{{ $user->avatar }}" class="w-25 p-2 rounded-circle">
                <span class='flex-grow-1'>{{ $user->name }}</span>
                <button class='btn btn-danger btn-sm'>联系Ta</button>
            </div>
        </div>

        <h6 class="card-subtitle mb-2 text-muted text-right">{{ $article->created_at->diffForHumans() }}</h6>
        <div class="card-text mt-4">
            <?php
    $Parsedown = new Parsedown();
    echo $Parsedown->text($article->content); 
    ?>
    </div>
    </div>
</div>
@endsection