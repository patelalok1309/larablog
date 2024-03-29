<div class="col-md-4">
    <div class="col-md-12 nopadding">
        <div class="blog1-sidebar-box">
            <div class="image-holder"><img src="{{ getSiteOwnerAvatar() }}" alt="owner avatar" class="img-responsive" />
            </div>
            <div class="text-box-inner">
                <h5 class="uppercase dosis">About me</h5>
                <p>{{ getSiteOption('site_owner_bio') }}</p>
                <br />
                <div class="clearfix"></div>
                <ul class="blog1-social-icons">
                    <li><a href="{{ getSiteOption('site_owner_social_links.twiiter') }}"><i
                                class="fa fa-twitter"></i></a></li>
                    <li><a href="{{ getSiteOption('site_owner_social_links.facebook') }}"><i
                                class="fa fa-facebook"></i></a></li>
                    <li><a href="{{ getSiteOption('site_owner_social_links.instagram') }}"><i
                                class="fa fa-instagram"></i></a></li>
                    <li><a href="{{ getSiteOption('site_owner_social_links.linkedin') }}"><i
                                class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!--end author info-->

    <div class="col-md-12 nopadding">
        <div class="blog1-sidebar-box">
            <div class="text-box-inner">
                <h5 class="uppercase dosis">Search</h5>
                <div class="clearfix"></div>
                <form action="{{ route('search.submit') }}" method="POST">
                    @csrf
                    <input class="blog1-sidebar-serch_input" type="search" placeholder="Search Blog Post" name="searchInput">
                    <input name="" value="Submit" class="blog1-sidebar-serch-submit" type="submit">
                </form>
            </div>
        </div>
    </div>
    <!--end sidebar box-->


    <div class="col-md-12 nopadding">
        <div class="blog1-sidebar-box">
            <div class="text-box-inner">
                <h5 class="uppercase dosis">Categories</h5>
                <div class="clearfix"></div>
                <ul class="category-links">
                    @forelse ($categories as $category)
                        <li><a href="{{ route('category-post', [$category->slug]) }}">{{ $category->name }}</a></li>
                    @empty
                        <p> No Categories Available </p>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
    <!--end sidebar box-->

    <div class="col-md-12 nopadding">
        <div class="blog1-sidebar-box">
            <div class="text-box-inner">
                <h5 class="uppercase dosis">Latest Posts</h5>
                <div class="clearfix"></div>

                @forelse ($latestPosts as $post)
                    <div class="blog1-sidebar-posts">
                        <div class="image-left">
                            <img src="{{ $post->url }}" alt="{{ $post->title }}" width="80px" />
                        </div>
                        <div class="text-box-right">
                            <h6 class="less-mar3 uppercase dosis nopadding">
                                <a href="{{ route('single.post', [$post->slug]) }}">{{ $post->title }}</a>
                            </h6>
                            <div class="post-info">
                                <span>
                                    By
                                    <a href="{{ route('author-post', [$post->user->slug]) }}">
                                        {{ $post->user->name }}
                                    </a>
                                    {{ $post->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
    <!--end sidebar box-->

    <div class="col-md-12 nopadding">
        <div class="blog1-sidebar-box">
            <div class="text-box-inner">
                <h5 class="uppercase dosis">Tags</h5>
                <div class="clearfix"></div>
                <ul class="tags">
                    @forelse ($sidebarTags as $sidebarTag)
                        <li>
                            <a href="{{ route('tag-post', [$sidebarTag->slug]) }}">
                                {{ $sidebarTag->name }}
                            </a>
                        </li>
                    @empty
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
    <!--end sidebar box-->

    <div class="col-md-12 nopadding">
        <div class="blog1-sidebar-box">
            <div class="text-box-inner">
                <h5 class="uppercase dosis">Newsletter</h5>
                <div class="clearfix"></div>
                <input class="blog1-sidebar-serch_input" type="search" placeholder="Email Address">
                <input name="" value="Submit" class="blog1-sidebar-serch-submit" type="submit">
            </div>
        </div>
    </div>
    <!--end sidebar box-->

    <div class="col-md-12 nopadding">
        <div class="blog1-sidebar-box">
            <div class="text-box-inner">
                <h5 class="uppercase dosis">Featured Works</h5>
                <div class="clearfix"></div>
                <ul class="sidebar-works">
                    <li><a href="#"><img src="http://placehold.it/90x90" alt="" /></a></li>
                    <li><a href="#"><img src="http://placehold.it/90x90" alt="" /></a></li>
                    <li class="last"><a><img src="http://placehold.it/90x90" alt="" /></a></li>
                    <li><a href="#"><img src="http://placehold.it/90x90" alt="" /></a></li>
                    <li><a href="#"><img src="http://placehold.it/90x90" alt="" /></a></li>
                    <li class="last"><a href="#"><img src="http://placehold.it/90x90" alt="" /></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--end sidebar box-->

</div>
