<div class="sidebar-widget widget-category-2 mb-50">
    <h5 class="section-title style-1 mb-30">Category</h5>
    <ul>
        @foreach ($categories as $cat)
            <li>
                <a href="shop-grid-right.html"> <img
                        src="assets/imgs/theme/icons/category-1.svg"
                        alt=""/>{{ $cat->title }}</a><span
                    class="count">{{ $cat->posts()->count() }}</span>
            </li>
        @endforeach
    </ul>
</div>
