<x-app-layout :page-title="'Order #' . $order->id">
    <meta name="_token" content="{{csrf_token()}}" />
    <link rel="stylesheet" href="{{ asset('dropzone/css/dropzone.css') }}">
    <style>
        label.required::after {
            content:"*";
            color:red;
        }
        
        .select-option {
            padding: 0.375rem 0.75rem 0.375rem 0.75rem;
            -moz-padding-start: calc(0.75rem - 3px);
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin-bottom: 0.5rem;
            cursor: pointer;
        }

        .select-option.selected {
            border-color: #198754;
        }

        .was-validated .required .invalid {
            border-color: #dc3545;
            padding-right: calc(1.5em + 0.75rem);
            background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e);
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }

        .was-validated .required .valid {
            border-color: #198754;
            padding-right: calc(1.5em + 0.75rem);
            background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%23198754' d='M2.3 6.73.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e);
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }

    </style>
    <div class="container">
        <div class="col-lg-8 col-md-10 py-9 mx-auto checkout-wrap">
            <h1 class="fw-800 mb-3">Thanks for shopping with us!</h1>
            <p>We appreciate your order, we’re currently processing it. So hang tight, and we’ll send you confirmation
              very soon!</p>
            <div class="order-items-card border-bottom py-4 mb-5">
                <div class="row">
                    <div class="col-lg-3 col-6 mb-2">
                        <div class="w-100 fs-18 fw-600">Order number</div>
                        <div class="fs-14 text-primary">#{{ $order->order_id }}</div>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <div class="w-100 fs-18 fw-600">Payment status</div>
                        <div class="fs-14 ">
                            {{ ucwords(Config::get('constants.oder_payment_status')[$order->status_payment]) }}</div>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <div class="w-100 fs-18 fw-600">Date created</div>
                        <div class="fs-14 ">{{ date('F d, Y', strtotime($order->created_at)) }}</div>
                    </div>
                  
                    @if (count($requirements) == 0 || Session::get('message') != null)
                    <div class="col-lg-3 col-6 mb-2">
                        <div class="w-100 fs-18 fw-600">Est Deliver Date</div>
                        <div class="fs-14 ">{{ date('F d, Y h:i A', strtotime($order->original_delivery_time)) }}</div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="order-items-card pb-4">
                <div class="row">
                    <div class="col-lg-2 col-3">
                        <img src="{{ $order->service->thumb->getImageOptimizedFullName(150) }}" alt=""
                            class="thumbnail border w-100">
                    </div>
                    <div class="col-lg-10 col-9">
                        <div class="order-item-title fs-24 py-2 fw-600">
                            {{ $order->service->name }}
                        </div>
                        <div class="order-item-qty-price fs-16 pb-2">
                            <span class="fw-600">Price</span>
                            ${{ number_format($order->package_price, 2) }}
                        </div>
                        <div class="is_downloadable fw-600 fs-16">
                            @php
                                $orderStatus = Config::get('constants.service_order_status');
                            @endphp
                            <div class="d-flex mt-2">
                                <span class="d-block" data-item-id="{{ $order->id }}">
                                    @foreach ($orderStatus as $key => $status)
                                        @if ($key != 0)
                                            @if ($order->status == $key)
                                                {{ 'Status: ' . $status }}
                                            @endif
                                        @endif
                                    @endforeach
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if (count($requirements) > 0)
            @if(Session::get('message') != null)
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
            @else
            <form id="question-form" class="needs-validation" action="{{ route('services.answer') }}" method="post" enctype="multipart/form-data" novalidate>
                @csrf
                <label class="fs-3 mb-4">Questions</label> 
                <input type="hidden" name="order_id" value="{{ $order->id }}">
                @foreach ($requirements as $requirement)
                <div class="row mb-3">
                    <label class="fs-4 mb-2 {{ $requirement->required ? "required" : "" }}" for="answer-{{$requirement->id}}">- {{ $requirement->question }}</label>
                    @if($requirement->type == 0)
                    <div class="form-group">
                        <textarea type="text" class="form-control" id="answer-{{$requirement->id}}" data-id="{{$requirement->id}}" name="answer[]" placeholder="Type question here" {{ $requirement->required ? "required" : "" }}></textarea>
                    </div>
                    @elseif($requirement->type == 1)
                    <div class="form-group {{ $requirement->required ? "required" : "" }}">
                        <input class="answer" type="hidden" id="answer-{{$requirement->id}}" data-id="{{$requirement->id}}" name="answer[]">
                        <div class="form-control invalid attach-dropzone dropzone attach-{{$requirement->id}}" data-id="{{$requirement->id}}"></div>
                    </div>
                    @elseif($requirement->type == 2)
                    <div class="form-group {{ $requirement->required ? "required" : "" }}">
                        <input class="answer" type="hidden" id="answer-{{$requirement->id}}" data-id="{{$requirement->id}}" name="answer[]">
                        @foreach($requirement->choices as $key => $choice)
                        <div class="select-option form-row-between invalid single">{{$choice->choice}}</div>
                        @endforeach
                    </div>
                    @else
                    <div class="form-group {{ $requirement->required ? "required" : "" }}">
                        <input class="answer" type="hidden" id="answer-{{$requirement->id}}" data-id="{{$requirement->id}}" name="answer[]">
                        @foreach($requirement->choices as $key => $choice)
                        <div class="select-option form-row-between invalid multi">{{$choice->choice}}</div>
                        @endforeach
                    </div>
                    @endif
                </div>
                @endforeach
                
                <div class="row">
                    <button type="submit" class="btn btn-primary">Save</button> 
                </div>
            </form>
            @endif
            @endif
      </div>
@section('js')
<script src="{{ asset('dropzone/js/dropzone.js') }}"></script>
<script>
    var uploadedFileData = [];
    Dropzone.autoDiscover = false;
    $(document).ready(function() {
        $(".attach-dropzone").dropzone({
            method:'post',
            url: "{{ route('seller.file.store') }}",
            dictDefaultMessage: "Select File",
            paramName: "file",
            maxFilesize: 2,
            clickable: true,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success: function(file, response) {
                var answerInput = $($(this)[0].element).parent().find(".answer");
                var inputDiv = $($(this)[0].element).parent().find(".attach-dropzone");
                var lastFiles = answerInput.val() ? answerInput.val().split(',') : [];
                lastFiles.push(response.id);

                answerInput.val(lastFiles.join(','));
                response.requirementId = answerInput.data("id");
                uploadedFileData.push(response);
                inputDiv.removeClass("invalid").removeClass("valid").addClass("valid");
            },
            removedfile: function(file) {
                var answerInput = $($(this)[0].element).parent().find(".answer");
                var inputDiv = $($(this)[0].element).parent().find(".attach-dropzone");
                for(var i=0;i<uploadedFileData.length;++i){
                    if(!uploadedFileData[i]) {
                        continue;
                    }
                    if(uploadedFileData[i].file_original_name + "." + uploadedFileData[i].extension==file.name && uploadedFileData[i].requirementId == answerInput.data("id")) {
                        $.ajax({
                            url: `/seller/file/destroy/${uploadedFileData[i].id}`,
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                            success: function(result) {
                                var lastValue = answerInput.val().split(',');
                                var removed = lastValue.filter((item) => item != uploadedFileData[i].id);
                                answerInput.val(removed);
                                $(file.previewElement).remove();
                                uploadedFileData.splice(i, 1)

                                if (removed.length == 0) {  
                                    inputDiv.removeClass("invalid").removeClass("valid").addClass("invalid");
                                }
                            },
                            error: function(error) {
                                return false;
                            }
                        });
                        break;
                    }
                }
            }
        })

        $('.select-option.multi').click(function () {
            $(this).toggleClass("selected")
            if ($(this).parent().find('.selected').length == 0) {
                $(this).parent().children().addClass("invalid")
            } else {
                $(this).parent().children().removeClass("invalid")
            }

            setInput(this);
        })

        $('.select-option.single').click(function () {
            if ($(this).hasClass("selected")) {
                $(this).parent().children().removeClass("selected")
            } else {
                $(this).parent().children().removeClass("selected")
                $(this).addClass("selected")
            }

            if ($(this).parent().find('.selected').length == 0) {
                $(this).parent().children().addClass("invalid")
            } else {
                $(this).parent().children().removeClass("invalid")
            }

            setInput(this);
        })

        $('#question-form').submit(function (event) {
            if ($(this).find('.required .invalid').length) {
                event.preventDefault();
                event.stopPropagation();
            }
            
            $(this).addClass('was-validated');
        })
    })

    function setInput(item) {
        var inputItem = $(item).parent().find('input.answer');
        items = $(item).parent().find('.selected');
        if (items.length == 0) {
            inputItem.val("");
        } else if(items.length == 1) {
            inputItem.val(items.text());
        } else {
            itemTexts = [];
            for (const one of items) {
                itemTexts.push($(one).text());
            }
            inputItem.val(itemTexts.join(','));
        } 
    }
</script>
@endsection

</x-app-layout>
