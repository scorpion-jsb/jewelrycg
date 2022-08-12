$(function() {
    /* Product sorting */
    var categoryId = '';

    const search = function() {
        var searchWord = $('#search').val();

        $.ajax({
            url: "{{ url('/searchCategory') }}",
            data: {
                q: searchWord,
                category: categoryId
            },
            success: function(data) {
                $('div.product-container').html(data);
            }
        })
    }

    $('li.category').click(function() {
        var _this = this;
        $('ul.category-container').find('li.category').each(function() {
            $(this).removeClass('active');
            $(_this).addClass('active');
        });

        categoryId = $(_this).attr('data-category');
        $('#category_id').val(categoryId);

        search();
    });
})
