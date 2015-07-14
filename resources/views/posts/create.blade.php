@extends('admin')

@section('content')
    <h1 class="page-header">Create a New Post</h1>

    <div class="row">
        <div class="col-md-8">

            {!! Form::open(['route' => 'posts.store']) !!}

            <div class="form-group">
                {!! Form::label('title', 'Title: ') !!}
                {!! Form::text('title', null, ['class' => 'form-control', 'autofocus', 'required' => 'required']) !!}
                {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
            </div>

            <div class="form-group">
                {!! Form::label('body', 'Body: ') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control', 'required' => 'required']) !!}
                {!! $errors->first('body', '<span class="text-danger">:message</span>') !!}
            </div>

            {!! Form::button('Save', ['type' => 'submit', 'class' => 'btn btn-default']) !!}

            {!! Form::close() !!}

        </div>

        <div class="col-md-3 col-md-offset-1 blog-sidebar">
            <div class="sidebar-module">
                <h4>Sidebar</h4>
                <p>We can have a sidebar here to pick categories and stuff for the post.</p>
            </div>
        </div>

    </div><!-- /.row -->

@endsection
