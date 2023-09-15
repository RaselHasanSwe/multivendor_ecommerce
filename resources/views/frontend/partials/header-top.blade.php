<div class="header-top">
    <div class="container">
        <div class="header-left">
            <p class="welcome-msg">Welcome to Wolmart Store message or remove it!</p>
        </div>
        <div class="header-right">
            <a href="blog.html" class="d-lg-show">Blog</a>
            <a href="{{route('contact.us')}}" class="d-lg-show">Contact Us</a>

            @guest
                <a href="{{ route('login') }}"><i class="w-icon-account"></i>Sign In</a>
                <span class="delimiter">/</span>
                <a href="{{ route('login') }}">Register</a>
            @endguest
            @auth
                <a href="{{ route('user.account') }}" class="d-lg-show">My Account</a>
            @endauth
        </div>
    </div>
</div>
