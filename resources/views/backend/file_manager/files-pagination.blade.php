<style>
    .file-manager-item {
        cursor: pointer;
        align-items: center;
    }

    .file-manager-item>img {
        width: 100px;
    }

    .file-manager-item>.card-body {
        width: 100%;
    }

    .file-manager-item-checked>.check-option {
        display: block !important;
    }

    .check-option {
        position: absolute;
        right: 12px;
        top: 12px;
        padding-top: 3px;
        background-color: #007593;
        color: white;
        width: 24px;
        height: 24px;
        text-align: center;
        border-radius: 50%;
    }

    .file-size {
        color: grey;
        position: absolute;
        right: 16px;
        bottom: 16px;
    }

    .file-created-at {
        color: rgb(158, 154, 154);
        text-align: center;
        margin-bottom: 4px;
    }
</style>

<div class="row">
    @foreach ($files as $file)
    <div class="col-md-3">
        <div class="card p-4 file-manager-item" id="item{{ $file->id }}" data-id="{{ $file->id }}"
            data-file-path="{{ $file->getImageOptimizedFullName(0, 150) }}">
            <div class="check-option d-none">✔</div>
            <span class="file-created-at">{{ date('F d, Y, h:i:s A', strtotime($file->created_at)) }}</span>
            @if ($file->type != 'image')
              <img src="{{ asset('assets/svg/brands/google-docs-icon.svg') }}" alt="">
            @else
              <img src="{{ $file->getImageOptimizedFullName() }}" class="card-img-top img-thumbnail" alt="{{ $file->file_name }}">
            @endif
            <div class="card-body">
                <h5 class="card-title text-center">{{ $file->getOriginalFileFullName() }}</h5>
                <span class="file-size">{{ $file->file_size }} KB</span>
            </div>
        </div>

    </div>
    @endforeach
    <div id="pagination">
        {{ $files->links() }}
    </div>
</div>

<script>
    $(function() {
        $('ul.pagination').find('li').each(function() {
            var link = $(this).find('a');

            if (link.length) {
                $(this).html(
                    `<span class="page-link" data-href="${$(link).attr('href')}">${$(link).text()}</span>`
                )
            }
        });
    })
</script>
