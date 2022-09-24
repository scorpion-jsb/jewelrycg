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
    color: #ffc700;
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

.rate-item {
    border-bottom: 1px dotted #AAAAAA;
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
    <div class="rate-item pb-2 mb-4">
        <div class="d-flex align-items-center">
            <img class="reviewer_avatar rounded-circle h-40px mr-5px"
                src="{{ $review->user->uploads->getImageOptimizedFullName(100,100) }}"
            />
            <div class="reviewer_name">
                {{ $review->user->first_name }} {{ $review->user->last_name }}
            </div>
        </div>
        <div class="d-flex align-items-center ">
            <div class="star-ratings">
                <div class="fill-ratings" style="width: {{ $review->rating * 100 / 5 }}%;">
                    <span>★★★★★</span>
                </div>
                <div class="empty-ratings">
                    <span>★★★★★</span>
                </div>
            </div>

            <div class="rated_date">
                Rated at {{ $review->updated_at }}
            </div>
        </div>

        <div>
            {{ $review->review }}
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
