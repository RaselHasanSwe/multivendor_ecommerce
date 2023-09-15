<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ (\Request::route()->getName() == 'admin.dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}"><i class="la la-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
            </li>
            <li class="nav-item"><a href="#"><i class="la la-terminal"></i><span class="menu-title" data-i18n="Starter kit">Categories</span></a>
                <ul class="menu-content">
                    <li class="{{ (\Request::route()->getName() == 'admin.category.create') ? 'active': '' }}"><a class="menu-item" href="{{ route('admin.category.create') }}"><i></i><span data-i18n="1 column">Create Category</span></a></li>
                    <li class="{{ (\Request::route()->getName() == 'admin.category.index' || \Request::route()->getName() == 'admin.category.edit') ? 'active': '' }}"><a class="menu-item" href="{{ route('admin.category.index') }}"><i></i><span data-i18n="2 columns">Categories</span></a></li>
                    <li class="{{ (\Request::route()->getName() == 'admin.subcategory.create') ? 'active': '' }}"><a class="menu-item" href="{{ route('admin.subcategory.create') }}"><i></i><span data-i18n="1 column">Create Sub Category</span></a></li>
                    <li class="{{ (\Request::route()->getName() == 'admin.subcategory.index') ? 'active': '' }}" ><a class="menu-item" href="{{ route('admin.subcategory.index') }}"><i></i><span data-i18n="2 columns">Sub Categories</span></a></li>
                    <li class="{{ (\Request::route()->getName() == 'admin.inner.category.create') ? 'active': '' }}"><a class="menu-item" href="{{ route('admin.inner.category.create') }}"><i></i><span data-i18n="1 column">Create Inner Category</span></a></li>
                    <li class="{{ (\Request::route()->getName() == 'admin.inner.category.index') ? 'active': '' }}" ><a class="menu-item" href="{{ route('admin.inner.category.index') }}"><i></i><span data-i18n="2 columns">Inner Categories</span></a></li>
                </ul>
            </li>


            <li class="nav-item"><a href="#"><i class="la la-eyedropper"></i><span class="menu-title" data-i18n="Starter kit">Colors & Size</span></a>
                <ul class="menu-content">

                    <li class="{{ (\Request::route()->getName() == 'admin.color.create') ? 'active' : '' }}"><a href="{{ route('admin.color.create') }}"><span data-i18n="2 columns"> Create Color</a>
                    </li>

                    <li class="{{ (\Request::route()->getName() == 'admin.color.index') ? 'active' : '' }}"><a href="{{ route('admin.color.index') }}"><span data-i18n="2 columns"> Colors</a>
                    </li>

                    <li class="{{ (\Request::route()->getName() == 'admin.size.create') ? 'active' : '' }}"><a href="{{ route('admin.size.create') }}"><span data-i18n="2 columns"> Create Size</a>
                    </li>

                    <li class="{{ (\Request::route()->getName() == 'admin.size' || \Request::route()->getName() == 'admin.size.edit') ? 'active': '' }}"><a class="menu-item" href="{{ route('admin.size') }}"><span data-i18n="2 columns">Size</a></li>

                </ul>
            </li>

            <li class="nav-item {{request()->is('admin/product') ? 'menu-collapsed-open open' : '' }} {{ request()->is('admin/product/*') ? 'menu-collapsed-open open' : '' }}"><a href="#"><i class="la la-moon-o"></i><span class="menu-title" data-i18n="Starter kit">Products</span></a>
                <ul class="menu-content">
                    <li class="{{ (\Request::route()->getName() == 'admin.product.create') ? 'active': '' }}">
                        <a class="menu-item" href="{{ route('admin.product.create') }}"><i></i><span data-i18n="1 column">Create Product</span></a>
                    </li>
                    <li class="{{ (\Request::route()->getName() == 'admin.product.index') ? 'active': '' }}">
                        <a class="menu-item" href="{{ route('admin.product.index') }}"><i></i><span data-i18n="1 column">All Products</span></a>
                    </li>
                    <li class="{{ (\Request::route()->getName() == 'admin.products.active') ? 'active': '' }}">
                        <a class="menu-item" href="{{ route('admin.products.active') }}"><i></i><span data-i18n="1 column">Active Products</span></a>
                    </li>
                    <li class="{{ (\Request::route()->getName() == 'admin.products.requested') ? 'active': '' }}">
                        <a class="menu-item" href="{{ route('admin.products.requested') }}"><i></i><span data-i18n="1 column">Requested Products</span></a>
                    </li>
                    <li class="{{ (\Request::route()->getName() == 'admin.products.rejected') ? 'active': '' }}">
                        <a class="menu-item" href="{{ route('admin.products.rejected') }}"><i></i><span data-i18n="1 column">Rejected Products</span></a>
                    </li>
                    <li class="{{ (\Request::route()->getName() == 'admin.products.hidden') ? 'active': '' }}">
                        <a class="menu-item" href="{{ route('admin.products.hidden') }}"><i></i><span data-i18n="1 column">Hidden Products</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ (\Request::route()->getName() == 'admin.coupon.index') ? 'active' : '' }}"><a href="{{ route('admin.coupon.index') }}"><i class="la la-tag"></i><span class="menu-title" data-i18n="Dashboard">Coupon</span></a>
            </li>

            <li class="nav-item {{ (\Request::route()->getName() == 'admin.contact.index') ? 'active' : '' }}"><a href="{{ route('admin.contact.index') }}"><i class="la la-user"></i><span class="menu-title" data-i18n="Dashboard">Contact</span></a>
            </li>

            <li class="nav-item"><a href="#"><i class="la la-file-code-o"></i><span class="menu-title" data-i18n="Starter kit">Pages</span></a>
                <ul class="menu-content">
                    <li class="{{ (\Request::route()->getName() == 'admin.about-us') ? 'active': '' }}"><a class="menu-item" href="{{ route('admin.about-us') }}"><i></i><span data-i18n="1 column">About Us</span></a></li>

                    <li class="{{ (\Request::route()->getName() == 'admin.contact-info') ? 'active': '' }}"><a class="menu-item" href="{{ route('admin.contact-info') }}"><i></i><span data-i18n="1 column">Contact Info</span></a></li>

                    <li class="{{ (\Request::route()->getName() == 'admin.faqs.index') ? 'active': '' }}"><a class="menu-item" href="{{ route('admin.faqs.index') }}"><i></i><span data-i18n="1 column">FAQ</span></a></li>


                    <li class="{{ (\Request::route()->getName() == 'admin.privacy-policy') ? 'active': '' }}"><a class="menu-item" href="{{ route('admin.privacy-policy') }}"><i></i><span data-i18n="1 column">Privacy Policy</span></a></li>

                    <li class="{{ (\Request::route()->getName() == 'admin.use-of-term') ? 'active': '' }}"><a class="menu-item" href="{{ route('admin.use-of-term') }}"><i></i><span data-i18n="1 column">Term of Use</span></a></li>

                    <li class="{{ (\Request::route()->getName() == 'admin.refund-policy') ? 'active': '' }}"><a class="menu-item" href="{{ route('admin.refund-policy') }}"><i></i><span data-i18n="1 column">Refund & Return Policy</span></a></li>
                    <li class="{{ (\Request::route()->getName() == 'admin.icons') ? 'active': '' }}"><a class="menu-item" href="{{ route('admin.icons') }}"><i></i><span data-i18n="1 column">LA Icons</span></a></li>

                </ul>
            </li>

            <li class="nav-item"><a href="#"><i class="la la-file-code-o"></i><span class="menu-title" data-i18n="Starter kit">Slider</span></a>
                <ul class="menu-content">
                    <li class="{{ (\Request::route()->getName() == 'admin.slider.create') ? 'active' : '' }}"><a href="{{ route('admin.slider.create') }}"><span data-i18n="2 columns"> Create Slider</a>
                    </li>

                    <li class="{{ (\Request::route()->getName() == 'admin.slider.index') ? 'active' : '' }}"><a href="{{ route('admin.slider.index') }}"><span data-i18n="2 columns">All Slider</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href="#"><i class="la la-users"></i><span class="menu-title" data-i18n="Starter kit">Vendors & Customers</span></a>
                <ul class="menu-content">

                    <li class="{{ (\Request::route()->getName() == 'admin.vendors') ? 'active' : '' }}"><a href="{{ route('admin.vendors') }}"><span data-i18n="2 columns"> Active Vendors</a>
                    </li>

                    <li class="{{ (\Request::route()->getName() == 'admin.deactive_vendors' || \Request::route()->getName() == 'admin.deactive_vendors') ? 'active': '' }}"><a class="menu-item" href="{{ route('admin.deactive_vendors') }}"><span data-i18n="2 columns">Deactive Vendors</a></li>

                    <li class="{{ (\Request::route()->getName() == 'admin.customers' || \Request::route()->getName() == 'admin.customers') ? 'active': '' }}"><a class="menu-item" href="{{ route('admin.customers') }}"><span data-i18n="2 columns">Customers</a></li>

                </ul>
            </li>
            <li class="nav-item"><a href="#"><i class="la la-cubes"></i><span class="menu-title" data-i18n="Starter kit">Orders</span></a>
                <ul class="menu-content">
                    <li class="{{ (\Request::route()->getName() == 'admin.order.index') ? 'active' : '' }}"><a href="{{ route('admin.order.index') }}"><span data-i18n="2 columns">All Orders</a></li>
                 </ul>
            </li>

            <li class="nav-item {{ (\Request::route()->getName() == 'admin.shipping.index') ? 'active' : '' }}"><a href="{{ route('admin.shipping.index') }}"><i class="la la-automobile"></i><span class="menu-title" data-i18n="Dashboard">Shpiing Method</span></a>
            </li>


            <li class="nav-item {{ (\Request::route()->getName() == 'admin.site-setting') ? 'active' : '' }}"><a href="{{ route('admin.site-setting') }}"><i class="la la-gear"></i><span class="menu-title" data-i18n="Dashboard">Website Setting</span></a>
            </li>
            <li class="nav-item {{ (\Request::route()->getName() == 'admin.vendor.profile') ? 'active' : '' }}"><a href="{{ route('admin.vendor.profile') }}"><i class="la la-user"></i><span class="menu-title" data-i18n="Dashboard">Vendor Profile</span></a></li>
            <li class="nav-item {{ (\Request::route()->getName() == 'admin.changePasswordPage') ? 'active' : '' }}"><a href="{{ route('admin.changePasswordPage') }}"><i class="la la-pencil-square-o"></i><span class="menu-title" data-i18n="Dashboard">Change Password</span></a>
            </li>

        </ul>
    </div>
</div>
