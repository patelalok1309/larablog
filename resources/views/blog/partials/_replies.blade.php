    {{-- <div class="blog1-post-info-box ">
        <div class="text-box border padding-3">
            <div class="iconbox-medium left round overflow-hidden">
            </div>
            <div class="text-box-right more-padding-2">
                <h5 class="uppercase dosis less-mar2">{{ $reply->name }}</h5>
                <div class="blog1-post-info"><span>{{ $reply->created_at->diffForHumans() }}</span></div>
                <p class="paddtop1">{{ $reply->comment }}</p>
                <br />
            </div>
        </div>
        <!--end item-->
        <div class="clearfix"></div> --}}

<style>
.comment-reply-box{
    border: 1px solid rgb(231, 231, 231);
}
</style>
    <div class="container margin-top1 comment-reply-box">
        <div class="content">
            reply by ,<h5 class="uppercase dosis less-mar2"> {{ $reply->name }}</h5>
            <div class="blog1-post-info"><span>{{ $reply->created_at->diffForHumans() }}</span></div>
            <p class="paddtop1">{{ $reply->comment }}</p>
        </div>
    </div>
    <div class="clearfix"></div>
