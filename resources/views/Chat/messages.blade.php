@extends ('Layout.main')
@section('head')
<link rel="stylesheet" href="{{ url('css/Chat/messages.css') }}">
@endsection
@section('content')
<div class="row" style="margin-top: -2%;" id="box_msg">
    <div class="col-md-4 pull-left">
        <hr>
        <div id="box_users">
            <form class="form-inline order-md-2 order-3 my-lg-12 col-md-12" >
                <input class="form-control col-sm-12" type="text" data id="search" name="search" placeholder="Search Users" aria-label="Search User">&nbsp
            </form>
            <div id="result_search">
            </div>
            <h4 align="center" class="colorFont">Conversations</h4>
            <hr>
            <div id="conversations" style="display: none;">  </div>
        </div>
    </div>
    <div class="col-md-8 pull-right" id="main_welcome">
        <div class="col-sx-12" align="center" style="padding: 150px">
            <img src="images/logo_corman.png" height="100" width="100" alt="CORMAN Logo"><br>
            <h2 align="center" class="colorFont">Start a new conversation</h2>
            <p align="center" class="colorFont">Connect, share and start to build new knowledge right now!</p>
        </div>
    </div>
    <div class="col-md-8 pull-right" id="main" style="display:none;">
        <div class="row">
            <div class="col-md-8 msg_main">
                <hr>
                <h4 class="user_name">Messages</h4>
                <hr>
                <div id="finestra" style="height: 390px !important;  overflow-y: scroll;">
                    <div id="mex">
                    </div>
                </div>
                <hr>
                <div class="row" align="center">
                    <div class="col-md-8">
                        <textarea id="mex_box" name="mex_box" class="form-control" @keydown="inputHandler"></textarea>
                        </form>
                    </div>
                    <div class="col-md-4 btn-group" align="center" style="padding:10px";>
                        <button class="btn btn-outline fa fa-paperclip fa-lg" id="myBtn"></button>
                        <input type="file" id="my_file" style="display:none">
                        <button class="btn btn-primary" id="bt">Send</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 pull-right" id="user_info">
                <hr>
                <h4 align="center">User Information</h4>
                <hr>
                <div class="color">
                    <div class="row">
                        <div class="col-md-12" align="center">
                            <img id="user_picture_path" src="images/profilePictures/default.png" width="80"
                                height="80"
                                alt="User Picture">
                            <h4 class="user_name"></h4>
                            <hr>
                        </div>
                        <div class="col-md-12" style="margin:10px; font-size:13px">
                            <b>Email: </b><a id="user_email"></a><br>
                            <b>Role: </b><a id="user_role"></a><br>
                            <b>Affiliation: </b><i id="user_affiliations"></i><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--FRAME NASCOSTO UTILE PER NON VISUALIZZARE LA PAGINA BIANCA DOPO IL POST-->
<iframe name="my_iframe" style="width:0;height:0;border:0; border:none;"></iframe>
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <!-- In questo div verrà inserito il form in base all'utente selezionato -->
        <div id="send_file" align="center">
        </div>
        <br>
        <!--
            <?php
                echo Form::open(array('url' => '/chat','files'=>'true', 'onsubmit' => "send()"));
                echo 'Select the file to send.';
                echo Form::file('image', array('id' => 'attach'));
                echo Form::submit('Send File');
                echo Form::close(); ?> -->
        <br>
    </div>
</div>
<script>
    //GESTIONE DEL MODAL
    
    // Get the modal
    var modal = document.getElementById('myModal');
    
    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    
    
    
</script>
<!-- INIZIO JAVASCRIPT -->
<!-- START SCRIPT LIVE SEARCH -->
<script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript">
    $('#search').on('keyup',function(){
    
        carattere=$(this).val();
        if(carattere=="" || carattere==" " || carattere=="  " || carattere=="   " || carattere=="    ")
        {
    
            //alert('test');
            $('#result_search').html("");
        }
        else {
            //alert('test');
    
            $ricerca = $(this).val();
    
            var url1 = '{{URL::to('messages')}}';
    
            $.ajax({
    
                type: 'get',
                url: url1,
                data: {'messages': $ricerca},
                success: function (data) {
                    console.log(data);
                    $('#result_search').html(data);
                }
    
            });
        }
    });
    
</script>
<script type="text/javascript">
    function showUsers(id){
    
    show_notifications_chat();
            main_welcome.style.display = 'none';
         main.style.display = 'block';
    
        var url1 = '{{URL::to('chat')}}/profile/'+id;
    
        $('#mex').html("");
    
        //alert($ricerca);
        $.ajax({
    
            type: 'get',
            url: url1,
    
            success: function (data) {
                 console.log(data);
                 $('.user_name').html(data[0]["first_name"]+" "+data[0]["last_name"]);
                 $('#user_email').html('<a href="mailto:'+ data[0]["email"] + '">'+data[0]["email"]+'</a>');
    	$('#user_affiliations').html(data[0]["user_affiliation"]);
                 $('#user_role').html(data[0]["user_role"]);
                 $('#user_picture_path').attr("src",data[0]["picture_path"]);
    	
                $('#bt').html('<button onclick="send('+data[0]["id"]+')" class="btn btn-primary" id="bt">Send</button>');
    
    
                //INSERIAMO NEL MODAL IL FORM IN BASE ALL'UTENTE SELEZIONATO.
                var url= "http://127.0.0.1:8000/chat";
                $('#send_file').html('<br> <h3 align="center">Select file to send to '+data[0]["first_name"]+" "+data[0]["last_name"] +'</h3>'+
                    '<br><form action="'+url+'" method="POST" enctype="multipart/form-data" target="my_iframe" onsubmit="send('+data[0]["id"]+')">' +
                    '    {{csrf_field()}}' +
    	   '    <div class="text-center">'+
                    '    <input id="attach" type="file" name="image">' +
                    '    <button class="btn btn-info" type="submit">Send File</button>' +
    	   '    </div>'+
                    '    </form> <br>');
    
    
                var x=data[0]["id"];
                $('#non_letti' + x).html("");
    
            }
    
        });
    
     
         $('#mex').html("");
    
        show_messages(id);
    
    
    }
</script>
<script type="text/javascript">
    function show_messages(id){
    show_notifications_chat();
        $('#mex').html("");
       var url2 = '{{URL::to('chat')}}/messages/'+id;
    
        $.ajax({
    
            type: 'get',
            url: url2,
            success: function (data) {
                console.log(data);
                msg = data;
                var num_non_letti=0;
                var i=0;
    
                if(data.length==0){
    
                    $('#mex').html("<p class='colorFont' align='center'>You have no message with the user! Start the conversation!</p>");
                   // var id=data[i]["user_to"];
                    //insert_conversations(id);
    
                }
    
                 for (var i = 0; i < data.length; i++) {
    
    
    
                         //var from=data[i]["user_from"];
                         if (i == data.length - 1) {
    
                             if (data[i]["user_from"] == <?php echo Auth::user()->id; ?>) {
    
    
                                 var x = data[i]["user_to"];
    
                                 //CONTROLLA SE L'UTIMO MESSAGGIO E' UN ALLEGATO
                                 if(data[i]["msg"]==""){
    						$('#last_mex_date'+ x).html(data[i]["date"]);
                                     $('#last_mex' + x).html(data[i]["attachment"]);
    
    
                                 }
    
                                 else {
    						$('#last_mex_date'+ x).html(data[i]["date"]);
                                     $('#last_mex' + x).html(data[i]["msg"]);
                                 }
    
                             }
                             else {
    
                                 var x = data[i]["user_from"];
    
                                 //CONTROLLA SE L'UTIMO MESSAGGIO E' UN ALLEGATO
                                 if(data[i]["msg"]==""){
    						$('#last_mex_date'+ x).html(data[i]["date"]);
                                     $('#last_mex' + x).html(data[i]["attachment"]);
    
    
                                 }
    
                                 else {
    						$('#last_mex_date'+ x).html(data[i]["date"]);
                                     $('#last_mex' + x).html(data[i]["msg"]);
                                 }
    
                             }
    
    
                         }
    
                         var to = data[i]["user_to"];
                         if (data[i]["user_from"] == <?php echo Auth::user()->id; ?>) {
    
                             if (data[i]["msg"] == "") {
    
                                 // alert('allegato');
                                 // QUANTO INVIA UN ALLEGATO IL CAMPO MSG = 0, QUINDI NON DEVE USCIRE L'ALLEGATO FILE
    			
    
                                 $('#mex').append('<div class="col-md-10  pull-right" style="margin-top:10px">' +
                                      ' <div  style="float:right; background-color:#0084ff; padding:5px 15px 5px 15px;' +
                                      '  color:#333; border-radius:10px; color:#fff;" title="'+data[i]["date"]+'">' +
                                     '<div align="center"><a href="http://127.0.0.1:8000/uploads/'+ data[i]["attachment"]+'" download><span class="fa fa-file fa-3x" style="color:white"></span><br><font size="3" color=white>'+ data[i]["attachment"]+'</font></a></div>'+
                                     ' </div>' +
                                     '</div>' + '<br> <p class="colorFont" style="float:right; font-size:10px; margin-right:15px">' + data[i]["date"]+ '</p>'+
                                     ' </div><br>');
    
    
                             }
                             else {
                                 $('#mex').append('<div class="col-md-10  pull-right" style="margin-top:10px">' +
                                 ' <div  style="float:right; background-color:#0084ff; padding:5px 15px 5px 15px;' +
                                 '  color:#333; border-radius:10px; color:#fff;" title="'+data[i]["date"]+'">' + data[i]["msg"] +
                                 ' </div>' +   
                                 '</div>' +'<br> <p class="colorFont" style="float:right; font-size:10px; margin-right:15px">' + data[i]["date"]+ '</p>'+
                                 '<br>');
                             }
                         }
                         else {
    
                             if (data[i]["msg"] == "") {
    
                                 // alert('allegato');
                                 // QUANTO INVIA UN ALLEGATO IL CAMPO MSG = 0, QUINDI NON DEVE USCIRE L'ALLEGATO FILE
    
    
                                 $('#mex').append('<div class="col-md-10 pull-left"  style="margin-top:10px">' +
                                 '<div style="float:left; background-color:#F0F0F0; padding: 5px 15px 5px 15px;' +
                                 '  border-radius:10px; text-align:left; ">' + '<div style="float:left; background-color:#F0F0F0; padding: 5px 15px 5px 15px;' +
                                 '  border-radius:10px; text-align:left; margin-left:5px ">' +
                                 '<div align="center"><a href="http://127.0.0.1:8000/uploads/'+ data[i]["attachment"]+'" download><span class="fa fa-file fa-3x"></span><br><font size="3" color=black>'+ data[i]["attachment"]+'</font></a></div>'+
                                 ' </div>' +
                                 ' </div>' +
                                 ' </div>' +'<br> <p class="colorFont" style="float:left; font-size:10px; margin-left:15px">' + data[i]["date"]+ '</p>'+
                                 '<br>');
    
    
    
                             }
                             else {
    
    
                                 $('#mex').append('<div class="col-md-10 pull-left"  style="margin-top:10px">' +
                                 '<div style="float:left; background-color:#F0F0F0; padding: 5px 15px 5px 15px;' +
                                 '  border-radius:10px; text-align:left; ">' + data[i]["msg"] +
                                 ' </div>' +
                                 '' +
                                 ' </div>' +'<br> <p class="colorFont" style="float:left; font-size:10px; margin-left:15px">' + data[i]["date"]+ '</p>'+
                                 '<br>');
    					
                             }
    
                             //Conta messaggi non letti
                             if (data[i]["status"] == 0) {
    
                                 num_non_letti++;
                                 console.log(num_non_letti);
                                 seen(data[i]["id"]);
    
    
                             }
    
                         }
    
                         //alert('Scroll');
    
    
                     }
                     var objDiv = document.getElementById("finestra");
                     objDiv.scrollTop = objDiv.scrollHeight;
                 }
    
        });
    
    }
</script>
<script type="text/javascript">
    function send(id) {
    
    
    
             $('#mex').html("");
            var message=$('textarea#mex_box').val();
    
         var lastChar = message[message.length -1];
    
            if (lastChar=='?'){
                alert('Punto interrogativo');
            }
    
    
            //TROVIAMO IL PERCORSO
            var attach=$('input#attach').val();
    
    
            if (attach==''){
    
                var url2 = '{{URL::to('chat')}}/send/'+id+'/'+message;
    
            }
    
            else {
                //RICAVIAMO IL NOME DEL FILE E LO MANDIAMO AL CONTROLLER PER POTERLO INSERIRE NEL DB
                attach = attach.slice(12);
                var url2 = '{{URL::to('chat')}}/send/attach/'+id+'/'+attach;
    
            }
    
    
            document.getElementById('mex_box').value = '';
    
    
            insert_conversations(id);
    
            //$('#mex').html('');
            //show_messages(id);
    
    
        console.log(url2);
    
    
          $.ajax({
                type: 'get',
                url: url2,
                success: function (data) {
                    console.log(data);
                }
          })
    
    
    
       // $('#mex').html("");
       // alert('Messaggio inviato correttamente!');
    
    
        show_conversation();
       show_messages(id);
    show_notifications_chat();
    
          //showUsers(id_from);
    
    
           /* $.post('send', submit(function() {
                var message=$('textarea#mex_box').val();
                console.log(message);
                $.ajax({
    
                    type: "POST",
                    url: "send",
                    data: message,
                    success: function (data) {
    
                        console.log(data);
    
                    }
    
                })
    
            })*/
    
           /* var message = $('textarea#mex_box').val();
            document.getElementById('mex_box').value = '';
            console.log(message);
            alert(message);*/
    
     };
    
    
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    function show_conversation() {
    
    
    show_notifications_chat();
        conversations.style.display = 'none';
    
        $('#conversations').html("");
        var url2 = '{{URL::to('chat')}}/conversations';
        //console.log(url2);
    
    
        $.ajax({
            type: 'get',
            url: url2,
            success: function (data) {
                console.log(data);
    
    
                for (var i = 0; i < data.length; i++) {
    
                    $('#conversations').append('<a href="#" onclick="showUsers('+data[i]["id"]+')">' +
                
                         ' <div class="row" style="margin-top: 5px; background-color:#f3f3f3; ">' +
    				' <div class="col-2 pull-left"  style="margin:15px; ">' +
    				' <img src="'+data[i]["picture_path"]+'" width="50" height="50" alt="User Picture" style="border-radius:100%; margin-left: 15px">' +
    				' </div>' +
    				' <div class="col-5 pull-right" style="margin-top:15px;">' +
    				' <b>'+data[i]["first_name"] + ' ' + data[i]["last_name"]+' ' + ' <font size="4" color="red"><b id="non_letti'+data[i]["id"]+'"></font></b>'+''+'</b>' +
    				' <p class="colorFont overText"  id="last_mex' +data[i]["id"]+'"></p>' +
    				' </div>' +
    				' <div class="col-4 pull-right"  style="margin-top:15px; text-align:right">' +
    				' <b class="colorFont" Style="font-size:10px;" id="last_mex_date' + data[i]["id"]+ '"></b>' +
    				' </div>' +
                         ' </div>' +
                         ' </a>');
    
    
    
    
    
    
    
                    var utente2=data[i]["id"];
                    //alert(utente2);
                    (show_messages_conversation(utente2));
                    //data[i]["first_name"] + ' ' + data[i]["last_name"]+'<br></br>');
    
    
                }
                //show_messages(id);
                //alert("Conversazione caricate!");
                //$('#mex').html('');
    
    
    
    
    
    
    
    
                /*var utente2=data[0]["id"];
                alert(utente2);*/
    
            }
    
    
    
        })
    
       // alert('Caricamento conversazioni...');
    
    }
    
</script>
<script type="text/javascript">
    function insert_conversations(id) {
    
        var url2 = '{{URL::to('chat')}}/conversations/add/'+id;
        console.log(url2);
    
    
        $.ajax({
            type: 'get',
            url: url2,
            success: function (data) {
                console.log(data);
            }
        })
    /*
    
    
        $('#mex').html("");
        show_messages(id);
        //showUsers(id_from);*/
    
    
        /* $.post('send', submit(function() {
             var message=$('textarea#mex_box').val();
             console.log(message);
             $.ajax({
    
                 type: "POST",
                 url: "send",
                 data: message,
                 success: function (data) {
    
                     console.log(data);
    
                 }
    
             })
    
         })*/
    
        /* var message = $('textarea#mex_box').val();
         document.getElementById('mex_box').value = '';
         console.log(message);
         alert(message);*/
    
    };
    
</script>
<!-- REFRESH FUNCTION
    <script type="text/javascript">
            setInterval(function() {
                    show_conversation();
                }, 5000);
    </script>
    
    -->
<script>
    function seen(id) {
    show_notifications_chat();
        var url2 = '{{URL::to('chat')}}/seen/' + id;
        console.log(url2);
    
    
        $.ajax({
            type: 'get',
            url: url2,
            success: function (data) {
                console.log(data);
            }
        })
    }
    
</script>
<script>
    function show_messages_conversation(id){
    modal.style.display = "none";
        var url2 = '{{URL::to('chat')}}/messages/'+id;
    
        $.ajax({
    
            type: 'get',
            url: url2,
            success: function (data) {
            console.log(data);
            msg = data;
            var num_non_letti=0;
            var i=0;
    
                    for (var i = 0; i < data.length; i++) {
                    var to = data[i]["user_to"];
                    if (data[i]["user_from"] == <?php echo Auth::user()->id; ?>) {
    
                    }
                    else {
    
                            //Conta messaggi non letti
                            if(data[i]["status"]== 0){
    
                            num_non_letti++;
                            console.log(num_non_letti);
                            //seen(data[i]["id"]);
    
                            }
    
                            }
    
                            if(i==data.length-1){
    
                            if (data[i]["user_from"] == <?php echo Auth::user()->id; ?>) {
    
                             var x = data[i]["user_to"];
                                 if(data[i]["msg"]==""){
                                     //CONTROLLA SE L'UTIMO MESSAGGIO E' UN ALLEGATO
    						var v1 = data[i]["date"];
                                     $('#last_mex' + x).html(data[i]["attachment"]);
    						$('#last_mex_date'+ x).html(v1);
    
                                }
    
                            else{
                                 $('#last_mex' + x).html(data[i]["msg"]);
                                 $('#last_mex_date'+ x).html(data[i]["date"]);
    				   
    
                                 }
                            }
    
                            else{
    
                             var x = data[i]["user_from"];
                                if(data[i]["msg"]==""){
                                    //CONTROLLA SE L'UTIMO MESSAGGIO E' UN ALLEGATO
    
                                    $('#last_mex' + x).html(data[i]["attachment"]);
    					   $('#last_mex_date'+ x).html(data[i]["date"]);
    
    
                                }
    
                                else {
                                    $('#last_mex' + x).html(data[i]["msg"]);
                                    //Inserimento data e ora ultimo messaggio  data[i]["date"]
    					   $('#last_mex_date'+ x).html(data[i]["date"]);
                                }
    
                            }
    
                            }
    
                            $('#non_letti' + x).html("");
    
                            if(num_non_letti>0){
    
                            $('#non_letti' + x).html(num_non_letti);
    
                            }
    
                        $('#conversations').fadeIn(1300);
    
                    }
    
            }
    
        });
    
    
    }
    
</script>
<script type="text/javascript">
    window.onload = function(){ 
    show_notifications_chat();
    show_conversation();
    };
</script>
@endsection