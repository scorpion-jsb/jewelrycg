<div>
    {!! $arrReviewListing->links() !!}
</div>

<style>
.star-ratings {
    unicode-bidi: bidi-override;
    color: #ccc;
    font-size: 30px;
    position: relative;
    margin: 0;
    padding: 0;
}

.star-ratings .fill-ratings {
    color: #387dff;
    padding: 0;
    position: absolute;
    z-index: 1;
    display: block;
    top: 0;
    left: 0;
    overflow: hidden;
}

.star-ratings .fill-ratings span {
    display: inline-block;
}

.star-ratings .empty-ratings {
    padding: 0;
    display: block;
    z-index: 0;
}



.rate-item .reviewer_name {
    font-size: 16px;
    font-weight: bold;
}

.rate-item .rated_date {
    margin: 4px 0 0 12px !important;
}
</style>



@foreach ($arrReviewListing as $review)
    <div class="user-review-item pb-2 mb-4">
        <div class="row">
            <div class="col-auto">
                <div class="d-flex align-items-center">
                    <img id="fileManagerPreview" src="{{ $review->user->uploads->getImageOptimizedFullName(100,100) }}" class="reviewer_avatar rounded-circle h-60px mr-5px">
                    <div class="review-details-meta">
                        <div class="fs-20 fw-600 reviewer_name w-100">{{ $review->user->first_name }} {{ $review->user->last_name }}</div>
                        <div class="star-ratings">
                            <div class="fill-ratings" style="width: {{ $review->rating * 100 / 5 }}%;">
                                <span>★★★★★</span>
                            </div>
                            <div class="empty-ratings">
                                <span>★★★★★</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10">
                <div class="row">
                    <div class="col-auto">
                        <div class="rated_date">Rated at {{ $review->updated_at }}</div>
                    </div>
                </div>
                <div>
                    {{ $review->review }}
                </div>
            </div>
        </div>
    </div>
@endforeach

<div>
    {!! $arrReviewListing->links() !!}
</div>

<script>
$('.star-ratings').each(function() {
    var star_rating_width = $('.fill-ratings span', this).width();
    $(this).width(star_rating_width);
});
</script>
