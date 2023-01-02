<div class="col-lg-4">
    <div class="blog_right_sidebar">
        <aside class="single_sidebar_widget search_widget">
            <form action="{{ route('blog.search') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search Posts">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="lnr lnr-magnifier"></i>
                        </button>
                    </span>
                </div>
            </form>
            <div class="br"></div>
        </aside>
        <aside class="single_sidebar_widget author_widget">
            <img class="author_img rounded-circle" src="{{ asset('frontend/img/blog/author.png') }}" alt="">
            <h4>Charlie Barber</h4>
            <p>Senior blog writer</p>
            <div class="social_icon">
                <a href="#">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#">
                    <i class="fab fa-github"></i>
                </a>
                <a href="#">
                  <i class="fab fa-behance"></i>
                </a>
            </div>
            <p>Boot camps have its supporters andit sdetractors. Some people do not understand why you should
                have to spend money on boot camp when you can get. Boot camps have itssuppor ters andits
                detractors.
            </p>
            <div class="br"></div>
        </aside>
        <aside class="single_sidebar_widget popular_post_widget">
            <h3 class="widget_title">Popular Posts</h3>
            @foreach($recent_posts as $post)
                <div class="media post_item">
                    <img src="{{ $post->photo }}" alt="{{ $post->title }}">
                    <div class="media-body">
                        <a href="#">
                            <h3>{{ $post->title }}</h3>
                        </a>
                        @php 
                            $author_info=DB::table('users')->select('name')->where('id',$post->added_by)->get();
                        @endphp
                        <p>{{ $post->created_at->format('d M, y') }}</p>
                        <p>
                            @foreach($author_info as $data)
                                @if($data->name)
                                    {{ $data->name }}
                                @else
                                    Anonymous
                                @endif
                            @endforeach
                        </p>
                    </div>
                </div>
            @endforeach
            <div class="br"></div>
        </aside>
        <aside class="single_sidebar_widget ads_widget">
            <a href="#">
                <img class="img-fluid" src="{{ asset('frontend/img/blog/add.jpg') }}" alt="">
            </a>
            <div class="br"></div>
        </aside>
        <aside class="single_sidebar_widget post_category_widget">
            <h4 class="widget_title">Post Catgories</h4>
            <ul class="list cat-list">
                @if(!empty($_GET['category']))
                    @php 
                        $filter_cats = explode(',',$_GET['category']);
                    @endphp
                @endif
                <form action="{{route('blog.filter')}}" method="POST">
                    @csrf
                    {{-- @foreach(Helper::postCategoryList('posts') as $cat) --}}
                    @foreach($posts as $cat)
                    <li>
                            <a href="{{ route('blog.category',$cat->slug) }}" class="d-flex justify-content-between">
                                <p>{{ $cat->title }}</p>
                            </a>
                        </li>
                    @endforeach
                </form>
            </ul>
            <div class="br"></div>
        </aside>
        <aside class="single-sidebar-widget newsletter_widget">
            <h4 class="widget_title">Newsletter</h4>
            <p>
                Here, I focus on a range of items and features that we use in life without giving them a second thought.
            </p>
            <div class="form-group d-flex flex-row">
                <form method="POST" action="{{route('subscribe')}}" class="input-group">
                    @csrf
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </div>
                    </div>
                    <input type="email" name="email" class="form-control" id="inlineFormInputGroup" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
                </form>
                <button type="submit" class="bbtns">Subcribe</button>
            </div>
            <p class="text-bottom">You can unsubscribe at any time</p>
            <div class="br"></div>
        </aside>
        <aside class="single-sidebar-widget tag_cloud_widget">
            <h4 class="widget_title">Tag Clouds</h4>
            <ul class="list">
                @if(!empty($_GET['tag']))
                    @php 
                        $filter_tags=explode(',',$_GET['tag']);
                    @endphp
                @endif
                <form action="{{route('blog.filter')}}" method="POST">
                    @csrf
                    {{-- @foreach(Helper::postTagList('posts') as $tag) --}}
                    @foreach($posts as $tag)
                        <li>
                            <a href="{{route('blog.tag', $tag->title)}}">{{$tag->title}}</a>
                        </li>
                    @endforeach
                </form>
            </ul>
        </aside>
    </div>
</div>