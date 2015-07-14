@extends('app')

@section('content')
<div class="row">

    <div class="col-sm-8 blog-main">
        <div class="blog-post">
            <h2 class="blog-post-title">{{ $post->title }}</h2>
            <p class="blog-post-meta">{{ $post->created_at->format('F jS, Y') }}</p>
            <div class="parse-code">{!! $post->body !!}</div>
        </div><!-- /.blog-post -->
    </div><!-- /.blog-main -->

    @include('partials.blog-sidebar')

</div><!-- /.row -->
@stop