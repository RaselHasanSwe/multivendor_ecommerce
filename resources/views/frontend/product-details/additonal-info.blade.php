<div class="tab tab-nav-boxed tab-nav-underline product-tabs">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a href="#product-tab-description" class="nav-link active">Description</a>
        </li>
        <li class="nav-item">
            <a href="#product-tab-specification" class="nav-link">Specification</a>
        </li>
        <li class="nav-item">
            <a href="#product-tab-vendor" class="nav-link">Vendor Info</a>
        </li>
        <li class="nav-item">
            <a href="#product-tab-reviews" class="nav-link">Customer Reviews (3)</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="product-tab-description">
            {!! $products->short_description  !!}
        </div>
        <div class="tab-pane" id="product-tab-specification">
            {!! $products->full_description  !!}
        </div>
        <div class="tab-pane" id="product-tab-vendor">
            <div class="row mb-3">
                <div class="col-md-6 mb-4">
                    <figure class="vendor-banner br-sm">
                        <img src="{{ asset('frontend') }}/assets/images/products/vendor-banner.jpg"
                            alt="Vendor Banner" width="610" height="295"
                            style="background-color: #353B55;" />
                    </figure>
                </div>
                <div class="col-md-6 pl-2 pl-md-6 mb-4">
                    <div class="vendor-user">
                        <figure class="vendor-logo mr-4">
                            <a href="#">
                                <img src="{{ asset('frontend') }}/assets/images/products/vendor-logo.jpg"
                                    alt="Vendor Logo" width="80" height="80" />
                            </a>
                        </figure>
                        <div>
                            <div class="vendor-name"><a href="#">Jone Doe</a></div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 90%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="#" class="rating-reviews">(32 Reviews)</a>
                            </div>
                        </div>
                    </div>
                    <ul class="vendor-info list-style-none">
                        <li class="store-name">
                            <label>Store Name:</label>
                            <span class="detail">OAIO Store</span>
                        </li>
                        <li class="store-address">
                            <label>Address:</label>
                            <span class="detail">Steven Street, El Carjon, CA 92020, United
                                States (US)</span>
                        </li>
                        <li class="store-phone">
                            <label>Phone:</label>
                            <a href="#tel:">1234567890</a>
                        </li>
                    </ul>
                    <a href="vendor-dokan-store.html"
                        class="btn btn-dark btn-link btn-underline btn-icon-right">Visit
                        Store<i class="w-icon-long-arrow-right"></i></a>
                </div>
            </div>
            <p class="mb-5"><strong class="text-dark">L</strong>orem ipsum dolor sit amet,
                consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.
                Venenatis tellus in metus vulputate eu scelerisque felis. Vel pretium
                lectus quam id leo in vitae turpis massa. Nunc id cursus metus aliquam.
                Libero id faucibus nisl tincidunt eget. Aliquam id diam maecenas ultricies
                mi eget mauris. Volutpat ac tincidunt vitae semper quis lectus. Vestibulum
                mattis ullamcorper velit sed. A arcu cursus vitae congue mauris.
            </p>
            <p class="mb-2"><strong class="text-dark">A</strong> arcu cursus vitae congue
                mauris. Sagittis id consectetur purus
                ut. Tellus rutrum tellus pellentesque eu tincidunt tortor aliquam nulla.
                Diam in
                arcu cursus euismod quis. Eget sit amet tellus cras adipiscing enim eu. In
                fermentum et sollicitudin ac orci phasellus. A condimentum vitae sapien
                pellentesque
                habitant morbi tristique senectus et. In dictum non consectetur a erat. Nunc
                scelerisque viverra mauris in aliquam sem fringilla.</p>
        </div>
        <div class="tab-pane" id="product-tab-reviews">
            <div class="row mb-4">
                <div class="col-xl-4 col-lg-5 mb-4">
                    <div class="ratings-wrapper">
                        <div class="avg-rating-container">
                            <h4 class="avg-mark font-weight-bolder ls-50">3.3</h4>
                            <div class="avg-rating">
                                <p class="text-dark mb-1">Average Rating</p>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 60%;"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="#" class="rating-reviews">(3 Reviews)</a>
                                </div>
                            </div>
                        </div>
                        <div
                            class="ratings-value d-flex align-items-center text-dark ls-25">
                            <span
                                class="text-dark font-weight-bold">66.7%</span>Recommended<span
                                class="count">(2 of 3)</span>
                        </div>
                        <div class="ratings-list">
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <div class="progress-bar progress-bar-sm ">
                                    <span></span>
                                </div>
                                <div class="progress-value">
                                    <mark>70%</mark>
                                </div>
                            </div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 80%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <div class="progress-bar progress-bar-sm ">
                                    <span></span>
                                </div>
                                <div class="progress-value">
                                    <mark>30%</mark>
                                </div>
                            </div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 60%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <div class="progress-bar progress-bar-sm ">
                                    <span></span>
                                </div>
                                <div class="progress-value">
                                    <mark>40%</mark>
                                </div>
                            </div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 40%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <div class="progress-bar progress-bar-sm ">
                                    <span></span>
                                </div>
                                <div class="progress-value">
                                    <mark>0%</mark>
                                </div>
                            </div>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 20%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <div class="progress-bar progress-bar-sm ">
                                    <span></span>
                                </div>
                                <div class="progress-value">
                                    <mark>0%</mark>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 mb-4">
                    <div class="review-form-wrapper">
                        <h3 class="title tab-pane-title font-weight-bold mb-1">Submit Your
                            Review</h3>
                        <p class="mb-3">Your email address will not be published. Required
                            fields are marked *</p>
                        <form action="#" method="POST" class="review-form">
                            <div class="rating-form">
                                <label for="rating">Your Rating Of This Product :</label>
                                <span class="rating-stars">
                                    <a class="star-1" href="#">1</a>
                                    <a class="star-2" href="#">2</a>
                                    <a class="star-3" href="#">3</a>
                                    <a class="star-4" href="#">4</a>
                                    <a class="star-5" href="#">5</a>
                                </span>
                                <select name="rating" id="rating" required=""
                                    style="display: none;">
                                    <option value="">Rate…</option>
                                    <option value="5">Perfect</option>
                                    <option value="4">Good</option>
                                    <option value="3">Average</option>
                                    <option value="2">Not that bad</option>
                                    <option value="1">Very poor</option>
                                </select>
                            </div>
                            <textarea cols="30" rows="6"
                                placeholder="Write Your Review Here..." class="form-control"
                                id="review"></textarea>
                            <div class="row gutter-md">
                                <div class="col-md-6">
                                    <input type="text" class="form-control"
                                        placeholder="Your Name" id="author">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control"
                                        placeholder="Your Email" id="email_1">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" class="custom-checkbox"
                                    id="save-checkbox">
                                <label for="save-checkbox">Save my name, email, and website
                                    in this browser for the next time I comment.</label>
                            </div>
                            <button type="submit" class="btn btn-dark">Submit
                                Review</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="tab tab-nav-boxed tab-nav-outline tab-nav-center">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#show-all" class="nav-link active">Show All</a>
                    </li>
                    <li class="nav-item">
                        <a href="#helpful-positive" class="nav-link">Most Helpful
                            Positive</a>
                    </li>
                    <li class="nav-item">
                        <a href="#helpful-negative" class="nav-link">Most Helpful
                            Negative</a>
                    </li>
                    <li class="nav-item">
                        <a href="#highest-rating" class="nav-link">Highest Rating</a>
                    </li>
                    <li class="nav-item">
                        <a href="#lowest-rating" class="nav-link">Lowest Rating</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="show-all">
                        <ul class="comments list-style-none">
                            <li class="comment">
                                <div class="comment-body">
                                    <figure class="comment-avatar">
                                        <img src="{{ asset('frontend') }}/assets/images/agents/1-100x100.png"
                                            alt="Commenter Avatar" width="90" height="90">
                                    </figure>
                                    <div class="comment-content">
                                        <h4 class="comment-author">
                                            <a href="#">John Doe</a>
                                            <span class="comment-date">March 22, 2021 at
                                                1:54 pm</span>
                                        </h4>
                                        <div class="ratings-container comment-rating">
                                            <div class="ratings-full">
                                                <span class="ratings"
                                                    style="width: 60%;"></span>
                                                <span
                                                    class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <p>pellentesque habitant morbi tristique senectus
                                            et. In dictum non consectetur a erat.
                                            Nunc ultrices eros in cursus turpis massa
                                            tincidunt ante in nibh mauris cursus mattis.
                                            Cras ornare arcu dui vivamus arcu felis bibendum
                                            ut tristique.</p>
                                        <div class="comment-action">
                                            <a href="#"
                                                class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                <i class="far fa-thumbs-up"></i>Helpful (1)
                                            </a>
                                            <a href="#"
                                                class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                <i class="far fa-thumbs-down"></i>Unhelpful
                                                (0)
                                            </a>
                                            <div class="review-image">
                                                <a href="#">
                                                    <figure>
                                                        <img src="{{ asset('frontend') }}/assets/images/products/default/review-img-1.jpg"
                                                            width="60" height="60"
                                                            alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                            data-zoom-image="assets/images/products/default/review-img-1-800x900.jpg" />
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="comment">
                                <div class="comment-body">
                                    <figure class="comment-avatar">
                                        <img src="{{ asset('frontend') }}/assets/images/agents/2-100x100.png"
                                            alt="Commenter Avatar" width="90" height="90">
                                    </figure>
                                    <div class="comment-content">
                                        <h4 class="comment-author">
                                            <a href="#">John Doe</a>
                                            <span class="comment-date">March 22, 2021 at
                                                1:52 pm</span>
                                        </h4>
                                        <div class="ratings-container comment-rating">
                                            <div class="ratings-full">
                                                <span class="ratings"
                                                    style="width: 80%;"></span>
                                                <span
                                                    class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <p>Nullam a magna porttitor, dictum risus nec,
                                            faucibus sapien.
                                            Ultrices eros in cursus turpis massa tincidunt
                                            ante in nibh mauris cursus mattis.
                                            Cras ornare arcu dui vivamus arcu felis bibendum
                                            ut tristique.</p>
                                        <div class="comment-action">
                                            <a href="#"
                                                class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                <i class="far fa-thumbs-up"></i>Helpful (1)
                                            </a>
                                            <a href="#"
                                                class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                <i class="far fa-thumbs-down"></i>Unhelpful
                                                (0)
                                            </a>
                                            <div class="review-image">
                                                <a href="#">
                                                    <figure>
                                                        <img src="{{ asset('frontend') }}/assets/images/products/default/review-img-2.jpg"
                                                            width="60" height="60"
                                                            alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                            data-zoom-image="assets/images/products/default/review-img-2.jpg" />
                                                    </figure>
                                                </a>
                                                <a href="#">
                                                    <figure>
                                                        <img src="{{ asset('frontend') }}/assets/images/products/default/review-img-3.jpg"
                                                            width="60" height="60"
                                                            alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                            data-zoom-image="assets/images/products/default/review-img-3.jpg" />
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="comment">
                                <div class="comment-body">
                                    <figure class="comment-avatar">
                                        <img src="{{ asset('frontend') }}/assets/images/agents/3-100x100.png"
                                            alt="Commenter Avatar" width="90" height="90">
                                    </figure>
                                    <div class="comment-content">
                                        <h4 class="comment-author">
                                            <a href="#">John Doe</a>
                                            <span class="comment-date">March 22, 2021 at
                                                1:21 pm</span>
                                        </h4>
                                        <div class="ratings-container comment-rating">
                                            <div class="ratings-full">
                                                <span class="ratings"
                                                    style="width: 60%;"></span>
                                                <span
                                                    class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <p>In fermentum et sollicitudin ac orci phasellus. A
                                            condimentum vitae
                                            sapien pellentesque habitant morbi tristique
                                            senectus et. In dictum
                                            non consectetur a erat. Nunc scelerisque viverra
                                            mauris in aliquam sem fringilla.</p>
                                        <div class="comment-action">
                                            <a href="#"
                                                class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                <i class="far fa-thumbs-up"></i>Helpful (0)
                                            </a>
                                            <a href="#"
                                                class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                <i class="far fa-thumbs-down"></i>Unhelpful
                                                (1)
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane" id="helpful-positive">
                        <ul class="comments list-style-none">
                            <li class="comment">
                                <div class="comment-body">
                                    <figure class="comment-avatar">
                                        <img src="{{ asset('frontend') }}/assets/images/agents/1-100x100.png"
                                            alt="Commenter Avatar" width="90" height="90">
                                    </figure>
                                    <div class="comment-content">
                                        <h4 class="comment-author">
                                            <a href="#">John Doe</a>
                                            <span class="comment-date">March 22, 2021 at
                                                1:54 pm</span>
                                        </h4>
                                        <div class="ratings-container comment-rating">
                                            <div class="ratings-full">
                                                <span class="ratings"
                                                    style="width: 60%;"></span>
                                                <span
                                                    class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <p>pellentesque habitant morbi tristique senectus
                                            et. In dictum non consectetur a erat.
                                            Nunc ultrices eros in cursus turpis massa
                                            tincidunt ante in nibh mauris cursus mattis.
                                            Cras ornare arcu dui vivamus arcu felis bibendum
                                            ut tristique.</p>
                                        <div class="comment-action">
                                            <a href="#"
                                                class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                <i class="far fa-thumbs-up"></i>Helpful (1)
                                            </a>
                                            <a href="#"
                                                class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                <i class="far fa-thumbs-down"></i>Unhelpful
                                                (0)
                                            </a>
                                            <div class="review-image">
                                                <a href="#">
                                                    <figure>
                                                        <img src="{{ asset('frontend') }}/assets/images/products/default/review-img-1.jpg"
                                                            width="60" height="60"
                                                            alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                            data-zoom-image="assets/images/products/default/review-img-1.jpg" />
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="comment">
                                <div class="comment-body">
                                    <figure class="comment-avatar">
                                        <img src="{{ asset('frontend') }}/assets/images/agents/2-100x100.png"
                                            alt="Commenter Avatar" width="90" height="90">
                                    </figure>
                                    <div class="comment-content">
                                        <h4 class="comment-author">
                                            <a href="#">John Doe</a>
                                            <span class="comment-date">March 22, 2021 at
                                                1:52 pm</span>
                                        </h4>
                                        <div class="ratings-container comment-rating">
                                            <div class="ratings-full">
                                                <span class="ratings"
                                                    style="width: 80%;"></span>
                                                <span
                                                    class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <p>Nullam a magna porttitor, dictum risus nec,
                                            faucibus sapien.
                                            Ultrices eros in cursus turpis massa tincidunt
                                            ante in nibh mauris cursus mattis.
                                            Cras ornare arcu dui vivamus arcu felis bibendum
                                            ut tristique.</p>
                                        <div class="comment-action">
                                            <a href="#"
                                                class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                <i class="far fa-thumbs-up"></i>Helpful (1)
                                            </a>
                                            <a href="#"
                                                class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                <i class="far fa-thumbs-down"></i>Unhelpful
                                                (0)
                                            </a>
                                            <div class="review-image">
                                                <a href="#">
                                                    <figure>
                                                        <img src="{{ asset('frontend') }}/assets/images/products/default/review-img-2.jpg"
                                                            width="60" height="60"
                                                            alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                            data-zoom-image="assets/images/products/default/review-img-2-800x900.jpg" />
                                                    </figure>
                                                </a>
                                                <a href="#">
                                                    <figure>
                                                        <img src="{{ asset('frontend') }}/assets/images/products/default/review-img-3.jpg"
                                                            width="60" height="60"
                                                            alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                            data-zoom-image="assets/images/products/default/review-img-3-800x900.jpg" />
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane" id="helpful-negative">
                        <ul class="comments list-style-none">
                            <li class="comment">
                                <div class="comment-body">
                                    <figure class="comment-avatar">
                                        <img src="{{ asset('frontend') }}/assets/images/agents/3-100x100.png"
                                            alt="Commenter Avatar" width="90" height="90">
                                    </figure>
                                    <div class="comment-content">
                                        <h4 class="comment-author">
                                            <a href="#">John Doe</a>
                                            <span class="comment-date">March 22, 2021 at
                                                1:21 pm</span>
                                        </h4>
                                        <div class="ratings-container comment-rating">
                                            <div class="ratings-full">
                                                <span class="ratings"
                                                    style="width: 60%;"></span>
                                                <span
                                                    class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <p>In fermentum et sollicitudin ac orci phasellus. A
                                            condimentum vitae
                                            sapien pellentesque habitant morbi tristique
                                            senectus et. In dictum
                                            non consectetur a erat. Nunc scelerisque viverra
                                            mauris in aliquam sem fringilla.</p>
                                        <div class="comment-action">
                                            <a href="#"
                                                class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                <i class="far fa-thumbs-up"></i>Helpful (0)
                                            </a>
                                            <a href="#"
                                                class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                <i class="far fa-thumbs-down"></i>Unhelpful
                                                (1)
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane" id="highest-rating">
                        <ul class="comments list-style-none">
                            <li class="comment">
                                <div class="comment-body">
                                    <figure class="comment-avatar">
                                        <img src="{{ asset('frontend') }}/assets/images/agents/2-100x100.png"
                                            alt="Commenter Avatar" width="90" height="90">
                                    </figure>
                                    <div class="comment-content">
                                        <h4 class="comment-author">
                                            <a href="#">John Doe</a>
                                            <span class="comment-date">March 22, 2021 at
                                                1:52 pm</span>
                                        </h4>
                                        <div class="ratings-container comment-rating">
                                            <div class="ratings-full">
                                                <span class="ratings"
                                                    style="width: 80%;"></span>
                                                <span
                                                    class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <p>Nullam a magna porttitor, dictum risus nec,
                                            faucibus sapien.
                                            Ultrices eros in cursus turpis massa tincidunt
                                            ante in nibh mauris cursus mattis.
                                            Cras ornare arcu dui vivamus arcu felis bibendum
                                            ut tristique.</p>
                                        <div class="comment-action">
                                            <a href="#"
                                                class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                <i class="far fa-thumbs-up"></i>Helpful (1)
                                            </a>
                                            <a href="#"
                                                class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                <i class="far fa-thumbs-down"></i>Unhelpful
                                                (0)
                                            </a>
                                            <div class="review-image">
                                                <a href="#">
                                                    <figure>
                                                        <img src="{{ asset('frontend') }}/assets/images/products/default/review-img-2.jpg"
                                                            width="60" height="60"
                                                            alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                            data-zoom-image="assets/images/products/default/review-img-2-800x900.jpg" />
                                                    </figure>
                                                </a>
                                                <a href="#">
                                                    <figure>
                                                        <img src="{{ asset('frontend') }}/assets/images/products/default/review-img-3.jpg"
                                                            width="60" height="60"
                                                            alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                            data-zoom-image="assets/images/products/default/review-img-3-800x900.jpg" />
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane" id="lowest-rating">
                        <ul class="comments list-style-none">
                            <li class="comment">
                                <div class="comment-body">
                                    <figure class="comment-avatar">
                                        <img src="{{ asset('frontend') }}/assets/images/agents/1-100x100.png"
                                            alt="Commenter Avatar" width="90" height="90">
                                    </figure>
                                    <div class="comment-content">
                                        <h4 class="comment-author">
                                            <a href="#">John Doe</a>
                                            <span class="comment-date">March 22, 2021 at
                                                1:54 pm</span>
                                        </h4>
                                        <div class="ratings-container comment-rating">
                                            <div class="ratings-full">
                                                <span class="ratings"
                                                    style="width: 60%;"></span>
                                                <span
                                                    class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <p>pellentesque habitant morbi tristique senectus
                                            et. In dictum non consectetur a erat.
                                            Nunc ultrices eros in cursus turpis massa
                                            tincidunt ante in nibh mauris cursus mattis.
                                            Cras ornare arcu dui vivamus arcu felis bibendum
                                            ut tristique.</p>
                                        <div class="comment-action">
                                            <a href="#"
                                                class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                <i class="far fa-thumbs-up"></i>Helpful (1)
                                            </a>
                                            <a href="#"
                                                class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                <i class="far fa-thumbs-down"></i>Unhelpful
                                                (0)
                                            </a>
                                            <div class="review-image">
                                                <a href="#">
                                                    <figure>
                                                        <img src="{{ asset('frontend') }}/assets/images/products/default/review-img-3.jpg"
                                                            width="60" height="60"
                                                            alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                            data-zoom-image="assets/images/products/default/review-img-3-800x900.jpg" />
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
