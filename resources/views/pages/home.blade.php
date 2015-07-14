@extends('app')

@section('content')
<div class="blog-header">
    <h1 class="blog-title">Dev Notebook</h1>
    <p class="lead blog-description">Trying to keep all my notes in one place.</p>
</div>

<div class="row">
    <div class="col-sm-8 blog-main">
        @if(count($posts))
            @foreach($posts as $post)
                <div class="blog-post">
                    <h3>{!! link_to("/posts/$post->slug", $post->title) !!}</h3>
                    <p class="blog-post-meta">{{ $post->created_at->format('F jS, Y') }}</p>
                </div><!-- /.blog-post -->
            @endforeach
        @endif
    </div><!-- /.blog-main -->

    @include('partials.blog-sidebar')

</div><!-- /.row -->
@stop
