<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li><a href="{{ url('/users') }}">Users</a></li>
        <li><a href="{{ url('/users/create') }}">Add User</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li><a href="{{ url('/posts') }}">Posts</a></li>
        <li><a href="{{ url('/posts/create') }}">New Post</a></li>
    </ul>
</div>