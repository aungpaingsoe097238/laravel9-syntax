<div class="d-flex justify-content-between align-items-center">

    <form action="{{ route('page.index') }}" method="get" class="d-flex">
        <input type="text" name="keyword"  class="form-control d-inline-block">
        <button class="btn btn-secondary">Search</button>
    </form>
</div>
<div>
    <div class="list-group my-3">
        @foreach($categories as $category)
            <a href="{{ route('page.category',$category->slug) }}" class="list-group-item nav-link {{ request()->url() === route('page.category',$category->slug) ? 'active' : '' }}">{{ $category->title }}</a>
        @endforeach
    </div>
    <div class="list-group my-3">
        @foreach($recentPosts as $recentPost)
            <a href="{{ route('page.detail',$recentPost->slug) }}" class="list-group-item nav-link  {{ request()->url() === route('page.detail',$recentPost->slug) ? 'active' : '' }}">{{ $recentPost->title }}</a>
        @endforeach
    </div>
</div>
