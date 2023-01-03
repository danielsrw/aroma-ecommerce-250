<div class="col-xl-3 col-lg-4 col-md-5">
    <div class="sidebar-categories">
        <div class="head">Browse Categories</div>
        <ul class="main-categories">
            <li class="common-filter">
                <form action="#">
                    @php
                        // $category = new Category();
                        $menu=App\Models\Category::getAllParentWithChild();
                    @endphp
                    @if($menu)
                        <ul>
                            @foreach($menu as $cat_info)
                                @if($cat_info->child_cat->count()>0)
                                    <li class="filter-list">
                                        <a href="{{route('product-cat',$cat_info->slug)}}" style="color: black">
                                            {{$cat_info->title}}
                                        </a>
                                        <ul>
                                            @foreach($cat_info->child_cat as $sub_menu)
                                                <li>
                                                    <a href="{{route('product-sub-cat',[$cat_info->slug,$sub_menu->slug])}}">
                                                        {{$sub_menu->title}}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li class="filter-list">
                                        <a href="{{route('product-cat',$cat_info->slug)}}">{{$cat_info->title}}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @endif
                </form>
            </li>
        </ul>
    </div>
    <div class="sidebar-filter">
        <div class="top-filter-head">Product Brands</div>
        <div class="common-filter">
            <ul>
                @php
                    $brands=DB::table('brands')->orderBy('title','ASC')->where('status','active')->get();
                @endphp
                @foreach($brands as $brand)
                    <li class="filter-list">
                        <a href="{{ route('product-brand',$brand->slug) }}" style="color: black">
                            {{ $brand->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="common-filter">
            <div class="head">Color</div>
            <ul>
                <li class="filter-list"><input class="pixel-radio" type="radio" id="black" name="color"><label for="black">Black<span>(29)</span></label></li>
                <li class="filter-list"><input class="pixel-radio" type="radio" id="balckleather" name="color"><label for="balckleather">Black
                    Leather<span>(29)</span></label></li>
                <li class="filter-list"><input class="pixel-radio" type="radio" id="blackred" name="color"><label for="blackred">Black
                    with red<span>(19)</span></label></li>
                <li class="filter-list"><input class="pixel-radio" type="radio" id="gold" name="color"><label for="gold">Gold<span>(19)</span></label></li>
                <li class="filter-list"><input class="pixel-radio" type="radio" id="spacegrey" name="color"><label for="spacegrey">Spacegrey<span>(19)</span></label></li>
            </ul>
        </div>
        <div class="common-filter">
            <div class="head">Price</div>
            <div class="price-range-area">
                <div id="price-range"></div>
                <div class="value-wrapper d-flex">
                <div class="price">Price:</div>
                <span>$</span>
                <div id="lower-value"></div>
                <div class="to">to</div>
                <span>$</span>
                <div id="upper-value"></div>
                </div>
            </div>
        </div>
    </div>
</div>
