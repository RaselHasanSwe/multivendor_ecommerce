<div class="header-bottom sticky-content fix-top sticky-header">
    <div class="container">
        <div class="inner-wrap">
            <div class="header-left">
                <div class="dropdown category-dropdown has-border" data-visible="true">
                    <a href="#" class="category-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="true" data-display="static"
                        title="Browse Categories">
                        <i class="w-icon-category"></i>
                        <span>Browse Categories</span>
                    </a>
                    <div class="dropdown-box">
                        <ul class="menu vertical-menu category-menu">
                            @if(count($g_categories) > 0)
                                @foreach($g_categories as $gCategory)
                                    <li>
                                        <a href="{{ UrlHelper::url($gCategory) }}">
                                            <i class="w-icon-furniture"></i>{{$gCategory->name}}
                                        </a>
                                        @if(!empty($gCategory->subCategories) && count($gCategory->subCategories) > 0)
                                            @foreach($gCategory->subCategories as $gSubCategory)
                                                <ul class="megamenu type2">
                                                    <li class="row">
                                                        <div class="col-md-3 col-lg-3 col-6 {{count($gCategory->subCategories) == 1 ? 'pt-5' : ''}}">
                                                            <h4 class="menu-title">
                                                                <a href="{{ UrlHelper::url($gCategory, $gSubCategory)}}">{{$gSubCategory->name}}</a>
                                                            </h4>
                                                            @if(!empty($gSubCategory->innerCategories) && count($gSubCategory->innerCategories) > 0)
                                                                @foreach($gSubCategory->innerCategories as $gInnerCategory)
                                                                    <hr class="divider"/>
                                                                    <ul>
                                                                        <li>
                                                                            <a href="{{ UrlHelper::url($gCategory, $gSubCategory, $gInnerCategory)}}">{{$gInnerCategory->name}}</a>
                                                                        </li>
                                                                    </ul>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </li>
                                                </ul>
                                            @endforeach
                                        @endif
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <nav class="main-nav">
                    <ul class="menu active-underline">
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        @if(count($g_categories) > 0)
                            @foreach($g_categories as $gCategory)
                                <li>
                                    <a href="{{ UrlHelper::url($gCategory) }}">{{$gCategory->name}}</a>
                                    <ul class="megamenu">
                                        @if(!empty($gCategory->subCategories) && count($gCategory->subCategories) > 0)
                                            @foreach($gCategory->subCategories as $gSubCategory)
                                                <li>
                                                    <h4 class="menu-title"><a href="{{ UrlHelper::url($gCategory, $gSubCategory)}} ">{{$gSubCategory->name}}</a></h4>

                                                    @if(!empty($gSubCategory->innerCategories) && count($gSubCategory->innerCategories) > 0)
                                                        @foreach($gSubCategory->innerCategories as $gInnerCategory)
                                                            <ul>
                                                                <li><a href="{{ UrlHelper::url($gCategory, $gSubCategory, $gInnerCategory)}}">{{$gInnerCategory->name}}</a></li>

                                                            </ul>
                                                        @endforeach
                                                     @endif
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
