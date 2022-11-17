<x-app-layout page-title="chat">
@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/swipe.min.css') }}" data-hs-appearance="default" as="style" type="text/css">
<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
<style>
.chat-container {
    padding-top:80px;
} 
.list-group>a:hover {
    background:#f0f2f5
}
.data>span{
    margin-right:10px;
}

i{
    font-size:20px;
}
</style>
@endsection 

<div class="layout chat-container">
    <div class="sidebar" id="sidebar">
        <div class="container">
            <div class="col-md-12">
                <div class="tab-content">
                    <div id="discussions" class="tab-pane fade active show">
                        <div class="search">
                          
                        </div>
                        <input type="hidden" id="seller" value="{{$seller}}" />
                        <div class="discussions">
                            <h1>Discussions</h1>
                            <div class="list-group" id="chats" role="tablist">
                                @foreach($side_info as $info)
                                    <a  class="filterDiscussions all unread single active"  data-toggle="list" role="tab" data-id="{{$info->id}}">
                                        <img class="avatar-md" src="{{asset('assets/img/avatar.png')}}" data-toggle="tooltip" data-placement="top" title="Janette" alt="avatar">
                                        <input type="hidden" name="client_id" id="client_id" value="{{$info->id}}"/>
                                        <div class="new bg-yellow">
                                            <span>+7</span>
                                        </div>
                                        <div class="data">
                                            <h5>{{$info->first_name}} {{$info->last_name}}</h5>
                                            <!-- <span>Mon</span> -->
                                            <p>{{$info->message}}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="main">
        <div class="tab-content" id="nav-tabContent">
            <!-- Start of Babble -->
            <div class="babble tab-pane fade active show" id="list-chat" role="tabpanel" aria-labelledby="list-chat-list">
                <!-- Start of Chat -->
                <div class="chat" id="chat1">
                    <div class="top">
                        <div class="container">
                            <div class="col-md-12">
                                <div class="inside">
                                    <a href="#"><img class="avatar-md" src="{{asset('assets/img/avatar.png')}}" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar"></a>
                                    <div class="status">
                                        <i class="material-icons online">fiber_manual_record</i>
                                    </div>
                                    <div class="data">
                                        <h5><a href="#">Keith Morris</a></h5>
                                        <span>Active now</span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="user_name" value="{{auth()->user()->first_name.' '.auth()->user()->last_name}}"/>
                    <div class="content" id="content">
                        <div class="container">
                            <div class="col-md-12" id="chat-content">
                                
                                @foreach($chat_content as $content)
                                    @if($content->message != null)
                                        @if(auth()->user()->first_name.' '.auth()->user()->last_name == $content->name)
                                            <div class="message me">
                                                <div class="text-main">
                                                    <div class="text-group me">
                                                        <div class="text me">
                                                            <p>{{$content->message}}</p>
                                                        </div>
                                                    </div>
                                                    <span>{{$content->updated_at}}</span>
                                                </div>
                                            </div>
                                        @else 
                                            <div class="message">
                                                <img class="avatar-md" src="{{asset('assets/img/avatar.png')}}" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">
                                                <div class="text-main">
                                                    <div class="text-group">
                                                        <div class="text">
                                                            <p>{{$content->message}}</p>
                                                        </div>
                                                    </div>
                                                    <span>{{$content->updated_at}}</span>
                                                </div>
                                            </div>
                                        @endif
                                    @endif    
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="col-md-12">
                            <div class="bottom">
                                <form class="position-relative w-100">
                                    <textarea id="chat_input" class="form-control" placeholder="Start typing for reply..." rows="1"></textarea>
                                    <a class="btn emoticons" style="padding-top:18px;"><i class="fas fa-smile" aria-hidden="false"></i></a>
                                    <button type="button" class="btn send"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                </form>
                               
                                <!-- <label>
                                    <input type="file">
                                    <span class="btn attach d-sm-block d-none"><i class="material-icons">attach_file</i></span>
                                </label>  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- Layout -->
@section('js')
    <script type="text/javascript">
        var client_id = document.getElementById('seller').value;
        $('document').ready(function () {
            
            $("#chat-content").animate({scrollTop: $('#chat-content').prop("scrollHeight")}, 1000); // Scroll the chat output div

            $('.filterDiscussions').click(function(){
                client_id = $(this).attr('data-id');
                $.ajax({
                    type: 'GET',
                    url: "{{ route('chat.clientId') }}",
                    data: {
                        "client_id": $(this).attr('data-id')
                    },
                    dataType: "json",
                    success: (result) => {
                         const contentTab = $("div#content #chat-content");
                         contentTab.html("");
                        $.each(result.chat_content, function(key, value){
                             if(value.message !=null){
                                if($('#user_name').val() == value.name){
                                    var message = '';
                                    message += '<div class="message me">'+ '<div class="text-main">' + '<div class="text-group me">' + '<div class="text me">' + '<p>' + value.message + '</p></div></div>' + '<span>' + value.updated_at + '</span></div></div>';
                                    contentTab.append(message);
                                }else{
                                    var message = '';
                                    message +='<div class="message">'+ '<div class="text-main">' + '<div class="text-group">' + '<div class="text">' + '<p>' + value.message + '</p></div></div>' + '<span>' + value.updated_at + '</span></div></div>';
                                    contentTab.append(message);
                                }
                             }
                        });
       
                    },
                    error: (resp) => {
                        var result = resp.responseJSON;
                        if (result.errors && result.message) {
                            alert(result.message);
                            return;
                        }
                    }
                });
            })
        });

       
    

        // Websocket
        let ws = new WebSocket("{{env('RATCHET_HOST')}}:{{env('RATCHET_PORT')}}");
        ws.onopen = function (e) {
            // Connect to websocket
            console.log('Connected to websocket');
            ws.send(
                JSON.stringify({
                    'type': 'socket',
                    'user_id': '{{auth()->id()}}'
                })
            );

            // Bind onkeyup event after connection
            $('#chat_input').on('keyup', function (e) {
                if (e.keyCode === 13 && !e.shiftKey) {
                    let chat_msg = $(this).val();
                    ws.send(
                        JSON.stringify({
                            'type': 'chat',
                            'user_id': '{{auth()->id()}}',
                            'user_name': '{{auth()->user()->first_name.' '.auth()->user()->last_name}}',
                            'chat_msg': chat_msg,
                            'dest_id' : client_id,
                        })
                    );
                    let content = `<div class='message me'><div class='text-main'><div class='text-group me'><div class='text me'><p>${chat_msg}</p></div></div><span>${getDateFormat()}</span></div></div>`;
                    $('#chat-content').append(content);
                    $(this).val('');
                    console.log('{{auth()->id()}} sent ' + chat_msg);
                }
            });
        };
        ws.onerror = function (e) {
            // Error handling
            console.log(e);
            alert('Check if WebSocket server is running!');
        };
        ws.onclose = function(e) {
            console.log(e);
            alert('Check if WebSocket server is running!');
        };
        ws.onmessage = function (e) {
          console.trace(e);
            let json = JSON.parse(e.data);
                    if(json.dest_id == {{auth()->id()}}){
                    switch (json.type) {
                    case 'chat':
                        $('#chat-content').append(json.msg); // Append the new message received
                        $("#chat-content").animate({scrollTop: $('#chat-content').prop("scrollHeight")}, 1000); // Scroll the chat output div
                        console.log("Received " + json.msg);
                        break;
                    case 'socket':
                        $('#chat-content').append(json.msg);
                        console.log("Received " + json.msg);
                        break;
                }}
        };

        function getDateFormat() {
            var d = new Date,
                dformat = [d.getFullYear(),
                            d.getMonth()+1,
                            d.getDate()
                            ].join('-')+' '+
                            [d.getHours(),
                            d.getMinutes()].join(':');
            return dformat;
        }
    </script>
@endsection  
   
  

</x-app-layout>