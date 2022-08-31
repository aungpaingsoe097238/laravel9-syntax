<div class="list-group">
    <a href="{{ route('home') }}" class="list-group-item list-group-item-action">Home</a>
    <a href="{{ route('test') }}" class="list-group-item list-group-item-action">Test Page</a>
</div>

<div class="py-3"></div>

<p class="small text-black-50 mb-1">Manage Post</p>
<div class="list-group">
    <a href="{{ route('post.index') }}" class="list-group-item list-group-item-action">Post Index</a>
    <a href="{{ route('post.create') }}" class="list-group-item list-group-item-action">Create Post</a>
</div>

<div class="py-3"></div>

<p class="small text-black-50 mb-1">Manage Category</p>
<div class="list-group">
    <a href="{{ route('category.index') }}" class="list-group-item list-group-item-action">Category Index</a>
    <a href="{{ route('category.create') }}" class="list-group-item list-group-item-action">Create Category</a>
</div>

<div class="py-3"></div>

{{--@if(Auth::user()->role === 'admin')--}}

@admin
<p class="small text-black-50 mb-1">Manage User</p>
<div class="list-group">
    <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action">User Index</a>
</div>
@endadmin

{{--@endif--}}



