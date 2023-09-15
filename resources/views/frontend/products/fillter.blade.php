<div class="sidebar-content scrollable">
    <!-- Start of Sticky Sidebar -->
    <div class="sticky-sidebar">
        <div class="filter-actions">
            <label>Filter :</label>
            <a href="#" class="btn btn-dark btn-link filter-clean">Clean All</a>
        </div>
        <!-- Start of Collapsible widget -->
        <div class="widget widget-collapsible">
            <h3 class="widget-title"><label>All Categories</label></h3>
            <ul class="widget-body filter-items search-ul">
                @if (count($g_categories) > 0)
                    @foreach ($g_categories as $all_category)
                        <li><a href="{{ UrlHelper::url($all_category) }}">{{ $all_category['name'] }}</a></li>
                    @endforeach
                @endif
            </ul>
        </div>
        <!-- End of Collapsible Widget -->

        <!-- Start of Collapsible Widget -->
        <div class="widget widget-collapsible">
            <h3 class="widget-title"><label>Price</label></h3>
            <div class="widget-body">
                <form class="price-range" id="minMaxPrice">
                    <input type="hidden" name="category_url" id="category_url"
                        value="{{ UrlHelper:: url($all_category) }}">
                    <input type="number" name="min_price" id="min_price" class="min_price text-center"
                        placeholder="$min"><span class="delimiter">-</span><input type="number" name="max_price"
                        id="max_price" class="max_price text-center" placeholder="$max"><button type="button"
                        onclick="searchByPrice()" class="btn btn-primary btn-rounded">Go</button>
                </form>
            </div>
        </div>
        <!-- End of Collapsible Widget -->

        <!-- Start of Collapsible Widget -->
        <div class="widget widget-collapsible">
            <h3 class="widget-title"><label>Size</label></h3>
            <ul class="widget-body filter-items item-check mt-1">
                @foreach ($g_all_sizes as $all_size)
                    <li class="size-status" id="{{ $all_size->id }}"><a href="#">{{ $all_size->name }}</a></li>
                @endforeach
            </ul>
        </div>
        <!-- End of Collapsible Widget -->

        <!-- Start of Collapsible Widget -->
        <div class="widget widget-collapsible">
            <h3 class="widget-title"><label>Color</label></h3>
            <ul class="widget-body filter-items item-check mt-1">
                @foreach ($g_all_colors as $all_color)
                    <li class="color-status" id="{{ $all_color->id }}"><a href="#">{{ $all_color->name }}</a></li>
                @endforeach
            </ul>
        </div>
        <!-- End of Collapsible Widget -->
    </div>
    <!-- End of Sidebar Content -->
</div>
