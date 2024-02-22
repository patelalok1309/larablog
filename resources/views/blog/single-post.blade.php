@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12 nopadding">
                <div class="blog1-post-holder">
                    <div class="text-box-inner">
                        <h4 class="dosis uppercase less-mar3">{{ $post->title }}</h4>
                        <br>
                        <img src="{{ $post->url }}" alt="thumbnail" class="img"
                            style="width:100%; margin-bottom:1rem;">
                        <br />
                        {!! $post->content !!}
                        <br>
                        <h4 class="dosis uppercase less-mar3"><a href="#">Aliquam ornare hendrerit augue</a>
                        </h4>
                        <br />
                        <ul class="iconlist dark">
                            <li><i class="fa fa-check"></i> Sed massa tellus aliquam rhoncus venenatis quis. </li>
                            <li><i class="fa fa-check"></i> Development dolor sit amet consectetur adipiscing elit
                                Phasellus </li>
                            <li><i class="fa fa-check"></i> Etiam dictum Nunc enim Sed massa tellus aliquam rhoncus
                                venenatis</li>
                            <li><i class="fa fa-check"></i> Magna eget scelerisque metus massa in neque sit
                                consectetur </li>
                        </ul>
                        <br />
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse et justo. Praesent
                            mattis commodo augue. Aliquam ornare hendrerit augue. Cras tellus. In pulvinar lectus a
                            est. Curabitur eget orci. Cras laoreet ligula. Etiam sit amet dolor. Vestibulum ante
                            ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nullam tellus
                            diam, volutpat</p>
                        <br />
                        <h4 class="dosis uppercase less-mar3"><a href="#">Share this article</a></h4>
                        <br />
                        <ul class="blog1-social-icons">
                            <li><a href="https://twitter.com/codelayers"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.facebook.com/codelayers"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                        <br />
                        <br />
                        <br />
                        <div class="blog1-post-info-box">
                            <div class="text-box border padding-3">
                                <div class="iconbox-medium left round overflow-hidden"><img src="{{ $post->user->avatar }}"
                                        alt="" class="img-responsive" />
                                </div>
                                <div class="text-box-right more-padding-2">
                                    <h4 class="uppercase dosis">{{ $post->user->name }}</h4>
                                    <p>{!! $post->user->bio !!}</p>
                                    <br />
                                    <a class="btn btn-border yellow-green btn-small-2 " href="#">Read more</a>
                                </div>
                            </div>
                        </div>
                        <!--end item-->
                        <div class="clearfix"></div>
                        <br />
                        <br />
                        <h4 class="dosis uppercase less-mar3"><a href="#">Related Posts</a></h4>
                        <br />
                        @forelse ($relatedPosts as $relatedPost)
                            <div class="col-md-4 bmargin">
                                <div class="image-holder">
                                    <a href="#">
                                        <img src="{{ $relatedPost->url }}" alt="related post thumbnail"
                                            class="img-responsive" />
                                    </a>
                                </div>
                                <div class="clearfix"></div>
                                <h5 class="dosis uppercase less-mar1">
                                    <a href="{{ route('single.post', [$relatedPost->slug]) }}">{{ $relatedPost->title }}</a>
                                </h5>
                                <div class="blog1-post-info">
                                    <span>By {{ $relatedPost->user->name }}</span>
                                    <span>{{ $relatedPost->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        @empty
                        @endforelse
                        <!--end item-->


                        <div class="clearfix"></div>
                        <br />
                        <br />
                        <h4 class="dosis uppercase less-mar3"><a href="#">3 Comments</a></h4>
                        <br />


                        @forelse ($post->comments as $comment)
                            <div class="blog1-post-info-box">
                                <div class="text-box border padding-3">
                                    <div class="iconbox-medium left round overflow-hidden"><img
                                            src="http://placehold.it/110x110" alt="" class="img-responsive" /></div>
                                    <div class="text-box-right more-padding-2">
                                        <h5 class="uppercase dosis less-mar2">{{ $comment->name }}</h5>
                                        <div class="blog1-post-info">
                                            <span>{{ $comment->created_at->diffForHumans() }}</span>
                                        </div>
                                        <p class="paddtop1">{{ $comment->comment }} </p>
                                        <br />
                                        <a class="btn btn-border yellow-green btn-small-2 " href="#comment-form"
                                            onclick="document.getElementById('comment_id').value = {{ $comment->id }}">Reply</a>

                                       @forelse ($comment->replies as $reply)
                                           @include('blog.partials._replies' , ['reply' => $reply])
                                       @empty
                                           <p>No replies on this comment</p>
                                       @endforelse
                                            
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse

                        <!--end item-->
                        <div class="clearfix"></div>
                        <a class="loadmore-but" href="#">Load more Comments</a>
                        <div class="smart-forms bmargin" id="comment-form">
                            <h4 class=" dosis uppercase">Post a Comment</h4>

                            <form method="post" action="{{ route('comment.store', [$post->id]) }}" id="smart-form">
                                @csrf
                                <input type="hidden" id="comment_id" name="comment_id" value="">
                                <div>
                                    <div class="section">
                                        <label class="field prepend-icon">
                                            <input type="text" name="name" id="name" class="gui-input"
                                                placeholder="Enter name">
                                            <span class="field-icon"><i class="fa fa-user"></i></span>
                                            @error('name')
                                                <span class="invalid-feedback text-danger " role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </label>
                                    </div>
                                    <!-- end section -->

                                    <div class="section">
                                        <label class="field prepend-icon">
                                            <input type="email" name="email" id="email" class="gui-input"
                                                placeholder="Email address">
                                            <span class="field-icon"><i class="fa fa-envelope"></i></span>
                                            @error('email')
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </label>
                                    </div>
                                    <!-- end section -->

                                    <div class="section">
                                        <label class="field prepend-icon">
                                            <textarea class="gui-textarea" id="comment" name="comment" placeholder="Enter comment"></textarea>
                                            <span class="field-icon"><i class="fa fa-comments"></i></span>
                                            @error('comment')
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </label>
                                    </div>
                                    <!-- end section -->

                                    <div class="result"></div>
                                    <!-- end .result  section -->

                                </div>
                                <!-- end .form-body section -->
                                <div class="form-footer">
                                    <button type="submit" data-btntext-sending="Sending..."
                                        class="button btn-primary yellow-green">Submit</button>
                                    <button type="reset" class="button"> Cancel </button>
                                </div>
                                <!-- end .form-footer section -->
                            </form>
                        </div>
                        <!-- end .smart-forms section -->
                    </div>
                </div>
            </div>
            <!--end post-->

        </div>
        <!--end left item-->

    </div>
    <!--end main bg-->
    <div class="clearfix"></div>
@endsection

@section('scripts')
    <script></script>
@endsection
