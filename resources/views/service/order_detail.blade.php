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
    <div class="col-lg-11 col-md-10 py-9 mx-auto checkout-wrap">
        <div class="row">
            @include('includes.validation-form')
            @if (session('success'))
              <h4 class="text-center text-primary mt-3">
                  {{session('success')}}
              </h4>
            @endif
            <div class="col-9">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="fw-700">Order Started</h4>
                        @if ($order->status == 0)
                        <p class="p-0">Pending requirements in order to start job. Contact to <b>{{ $order->user->first_name . " " . $order->user->last_name }}</b> and let them know to submit the requirements.</p>
                        @else
                        <p class="p-0"><b>{{ $order->user->first_name . " " . $order->user->last_name }}</b> sent all the information you need so you can start working on this order. You got this!</p>
                        @endif
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="timeline-item pb-3 mb-3 border-bottom">
                            <i class="bi bi-clipboard-check p-1"></i>
                            <span class=""><b>{{ $order->user->first_name . " " . $order->user->last_name }}</b> placed the order {{ date('F d, Y h:i A', strtotime($order->created_at)) }}</span>
                        </div>
                        @if ($order->status != 0)
                        <div class="timeline-item pb-3 mb-3 border-bottom">
                            <i class="bi bi-clipboard-check p-1"></i>
                            <span class=""><b>{{ $order->user->first_name . " " . $order->user->last_name }}</b> sent the requirements {{ date('F d, Y h:i A', strtotime($order->original_delivery_time)) }}</span>
                        </div>

                          @if (count($answers) > 0)
                            <div class="card">
                              <div class="card-header fw-700">Requirements</div>
                              <div class="card-body">
                                @foreach ($answers as $answer)
                                  <div class="col">
                                    <h4>{{ $answer->requirement->delivery }}</h4>

                                    @if ($answer->requirement->type == 0)
                                      <p>{{ $answer->answer }}</p>

                                    @elseif ($answer->requirement->type == 1)
                                      <ul>
                                        @foreach ($answer->attaches as $attach)
                                          <li>
                                            <a href="/uploads/all/{{ $attach->file_name }}" download>
                                              {{ $attach->file_original_name . "." . $attach->extension }}
                                            </a>
                                          </li>                    
                                        @endforeach
                                      </ul>    

                                    @elseif ($answer->requirement->type == 2)
                                      <p>{{$answer->answer}}</p>
                                    @else
                                      <ul>
                                        @foreach ($answer->answers as $answer)
                                          <li><p>{{ $answer }}</p></li>
                                        @endforeach
                                      </ul>
                                    @endif
                                  </div>
                                @endforeach
                            </div>
                            </div>
                          @endif
                        @endif
                        <div class="timeline-item pb-3 mb-3 border-bottom">
                            <i class="bi bi-clipboard-check p-1"></i>
                            <span class="">The order started {{ date('F d, Y h:i A', strtotime($order->original_delivery_time)) }}</span>
                        </div>
                        <div class="timeline-item pb-3 mb-3 border-bottom">
                            <i class="bi bi-clipboard-check p-1"></i>
                            <span class="">Your delivery date was updated to {{ date('F d, Y h:i A', strtotime($order->original_delivery_time)) }}</span>
                        </div>

                        @if (count($deliveries) > 0)
                        <div class="timeline-item pb-3 mb-3 border-bottom">
                            <i class="bi bi-clipboard-check p-1"></i>
                            <span class="">You dellvered the order {{ date('F d, Y h:i A', strtotime($order->original_delivery_time)) }}</span>
                        </div>
                        @endif

                        @foreach ($deliveries as $key => $delivery)
                        <div class="card">
                          <div class="card-header">Deliver #{{$key + 1}}</div>
                          <div class="card-body">
                            <p>{!! $delivery->message !!}</p>
                            <ul>
                              @foreach ($delivery->attaches as $attach)
                                <li>
                                  <a href="/uploads/all/{{ $attach->file_name }}" download>
                                    {{ $attach->file_original_name . "." . $attach->extension }}
                                  </a>
                                </li>                    
                              @endforeach
                            </ul> 
                          </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                
            </div>
            <div class="col-3">
                <div class="card mb-4 time-left">
                    <div class="card-body">
                        @if ($order->status == 1 || $order->status == 2)
                          <div class="col-md-12" id="count_title">
                            Time left to deliver
                          </div>
                          <div class="col-md-12 d-flex justify-content-between align-items-center my-2">
                            <div class="d-flex flex-column align-items-center" style="width: 23%;">
                              <h5 id="count_day">00</h5>
                              <p class="opacity-70 mb-0">Days</p>
                            </div>
                            <div class="bg-black opacity-70" style="width: 1px; height: 30px;"></div>
                            <div class="d-flex flex-column align-items-center" style="width: 23%;">
                              <h5 id="count_hour">00</h5>
                              <p class="opacity-70 mb-0">Hours</p>
                            </div>
                            <div class="bg-black opacity-70" style="width: 1px; height: 30px;"></div>
                            <div class="d-flex flex-column align-items-center" style="width: 23%;">
                              <h5 id="count_min">00</h5>
                              <p class="opacity-70 mb-0">Minutes</p>
                            </div>
                            <div class="bg-black opacity-70" style="width: 1px; height: 30px;"></div>
                            <div class="d-flex flex-column align-items-center" style="width: 23%;">
                              <h5 id="count_sec">00</h5>
                              <p class="opacity-70 mb-0">Seconds</p>
                            </div>
                          </div>
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deliverModal">
                            Deliver Now
                          </button>
                        @elseif ($order->status == 0)
                        <div class="col-md-12">
                          Didn't receive requirement yet
                        </div>
                        @elseif ($order->status == 3)
                        <div class="col-md-12">
                          Order canceled
                        </div>
                        @elseif ($order->status == 4)
                        <div class="col-md-12">
                          Delivered
                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deliverModal">
                          Deliver again
                        </button>
                        @elseif ($order->status == 5)
                        <div class="col-md-12">
                          Completed
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card mb-4 order-details">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <img src="{{ $order->service->thumb->getImageOptimizedFullName(150) }}" alt="" class="thumbnail border w-100">
                            </div>
                            <div class="col-9">
                                <h4>{{ $order->service->name }}</h4>
                                <span class="d-block rounded border" data-item-id="{{ $order->id }}">
                                    {{ 'Status: ' . Config::get('constants.service_order_status')[$order->status] }}
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(Session::get('message') != null)
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
        @endif
        @if (count($requirements) > 0 && $order->status == 0)
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
    </div>
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
