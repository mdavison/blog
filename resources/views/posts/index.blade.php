@extends('admin')

@section('content')
    <h1 class="page-header">All Posts</h1>

    @if(count($posts))
        <table class="table">
            <thead>
            <th>Title</th>
            <th>Edit</th>
            <th>Delete</th>
            </thead>
            <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{!! link_to("/posts/{$post->id}", $post->title) !!}</td>
                    <td>{!! link_to("/posts/{$post->id}/edit", 'Edit') !!}</td>
                    <td>
                        {!! Form::open(array('method' => 'DELETE',
                                             'route' => array('posts.destroy', $post->id),
                                             'data-delete-object' => 'post',
                                             'data-delete-name' => $post->title)) !!}

                        <a href="#" class="bootbox-confirm">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a>

                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>There are no posts.</p>
    @endif
@stop