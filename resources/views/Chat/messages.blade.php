@extends ('Layout.main')
@section('head')
<link rel="stylesheet" href="{{ url('css/Chat/messages.css') }}">
@endsection
@section('content')
<div class="row box_msg"  id="box_msg">
    <div class="col-md-4 pull-left" id="fix">
        <hr>
        <div id="box_users">
            <form class="form-inline order-md-2 order-3 my-lg-12 col-md-12" >
                <input class="form-control col-sm-12" type="text" data id="search" name="search" placeholder="Search Users" aria-label="Search User">&nbsp
            </form>
            <div id="result_search">
            </div>
            <h4 align="center" id="cv" class="colorFont">Conversations</h4>
            <hr>
            <div id="conversations" class="displayNone">  </div>
        </div>
    </div>
    <div class="col-md-8 pull-right" id="main_welcome">
        <div class="col-sm-12" align="center" style="padding: 150px">
            <img src="images/logo_corman.png" height="100" width="100" alt="CORMAN Logo"><br>
            <h4 align="center" class="colorFont">Start a new conversation</h4>
            <p align="center" class="colorFont">Connect, share and start to build new knowledge right now!</p>
        </div>
    </div>
    <div class="col-md-8 pull-right displayNone" id="main">
        <div class="row">
            <div class="col-md-8 msg_main">
                <hr>
                <h4 class="user_name"></h4>
                <hr>
                <div id="finestra">
                    <div id="mex">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div  id="cv2" class="col-xs-1 col-md-1 btn-group" >
                        <button type="button" class="btn btn-outline fa fa-paperclip fa-lg" id="open_modal"></button>
                    </div>
                    <div class="col-xs-11 col-md-11 pull-left" id="area_mex">
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
                        <div class="col-md-12" style="margin:10px; font-size:0.8125em">
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
@endsection

@section('script')
<script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript">
    $('#search').on('keyup',function(){
    
        carattere=$(this).val();
        if(carattere=="" || carattere==" " || carattere=="  " || carattere=="   " || carattere=="    ")
        {
            $('#result_search').html("");
        }
        else {
    
            $ricerca = $(this).val();
    
            var url1 = '{{URL::to('messages')}}';
            $.ajax({
    
                type: 'get',
                url: url1,
                data: {'messages': $ricerca},
                success: function (data) {
                    //console.log(data);
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
    
        $.ajax({
    
            type: 'get',
            url: url1,
    
            success: function (data) {
                // console.log(data);
                 $('.user_name').html(data[0]["first_name"]+" "+data[0]["last_name"]);
                 $('#user_email').html('<a href="mailto:'+ data[0]["email"] + '">'+data[0]["email"]+'</a>');
    	         $('#user_affiliations').html(data[0]["user_affiliation"]);
                 $('#user_role').html(data[0]["user_role"]);
                 $('#user_picture_path').attr("src",data[0]["picture_path"]);
                 $('#bt').html('<button onclick="send('+data[0]["id"]+')" class="btn btn-primary" id="bt">Send</button>');
				 
				 var d = new Date();
				var n = d.getTime();
     
                //INSERIAMO NEL MODAL IL FORM IN BASE ALL'UTENTE SELEZIONATO
                var url= '{{URL::to('chat')}}';
                $('#send_file').html('<br> <h3 align="center">Select file to send to '+data[0]["first_name"]+" "+data[0]["last_name"] +'</h3>'+
                    '<br><form id="invio" action="'+url+'/'+data[0]["id"]+'" method="POST" enctype="multipart/form-data" target="my_iframe" onsubmit="send_message('+data[0]["id"]+')">' +
                    '    {{csrf_field()}}' +
    	            '    <div class="text-center">'+
                    '    <input id="attach" type="file" name="file">' +
                    '    <button class="btn btn-info" type="submit">Send File</button>' +
    	            '    </div>'+
                    '    </form> <br>');

                $('#area_mex').html(''+
                    '<form id="invio" action="'+url+'/send/'+data[0]["id"]+'" method="POST" enctype="multipart/form-data" target="my_iframe" onsubmit="send_message('+data[0]["id"]+')">' +
                    '  {{csrf_field()}}' +
					' <div class="row">'+
                    '  <div class="col-sm-10 col-md-10"><input id="mex_box" name="mex_box" class="form-control" autocomplete="off"  style="height:50px" required></div>' +
                    '  <div class="col-sm-2 col-md-2 btn-group" ><button class="btn btn-primary">Send</button></div>' +
                    ' </div></form>' );
    
                var x=data[0]["id"];
                $('#non_letti' + x).html("");
    
            }
        });
        $('#mex').html("");
        show_messages(id); 
    }
</script>

<script>
    function conversione(data){
        var data_mex = data.substring(0, data.length - 8);
        var anno=data_mex.substring(0, 4);
        var mese=data_mex.substring(5,7);
        var giorno=data_mex.substring(8, 10);
    
        var ora=data.substring(11,16);
        ora=ora.bold();
    
        var new_data = ora + " [" + giorno + "/" + mese + "/"+anno+"]";
        return new_data;
    }
</script>

<script type="text/javascript">
	var schermata=0;
    function show_messages(id){
		schermata=id;
        $('#mex').html("");
        var url2 = '{{URL::to('chat')}}/messages/'+id;
    
        $.ajax({
    
            type: 'get',
            url: url2,
            success: function (data) {
                //console.log(data);
                msg = data;
                var num_non_letti=0;
                var i=0;
    
                if(data.length==0){
    
                    $('#mex').html("<p id='no_messages' class='colorFont' align='center'>You have no message with the user! Start the conversation!</p>");
                }

                for (var i = 0; i < data.length; i++) {
    
                    var old_data=data[i]["date"];
                    data_convertita=conversione(old_data);
                         if (i == data.length - 1) {
    
                             if (data[i]["user_from"] == <?php echo Auth::user()->id; ?>) {
                                 var x = data[i]["user_to"];
                                 //CONTROLLA SE L'UTIMO MESSAGGIO E' UN ALLEGATO
                                 if(data[i]["msg"]==""){
    						        $('#last_mex_date'+ x).html(data_convertita);
                                    $('#last_mex' + x).html(data[i]["attachment"]);
    
                                 }
                                 else {
    						        $('#last_mex_date'+ x).html(data_convertita);
                                    $('#last_mex' + x).html(data[i]["msg"]);
                                 }
    
                             }
                             else {
    
                                 var x = data[i]["user_from"];
    
                                 //CONTROLLA SE L'UTIMO MESSAGGIO E' UN ALLEGATO
                                 if(data[i]["msg"]==""){
									$('#last_mex_date'+ x).html(data_convertita);
                                    $('#last_mex' + x).html(data[i]["attachment"]);
                                 }
                                 else {
										$('#last_mex_date'+ x).html(data_convertita);
										$('#last_mex' + x).html(data[i]["msg"]);
                                 }
    
                             }
                         }
                         var to = data[i]["user_to"];
                         if (data[i]["user_from"] == <?php echo Auth::user()->id; ?>) {
    
                             if (data[i]["msg"] == "") {
                                 // QUANTO INVIA UN ALLEGATO IL CAMPO MSG = 0, QUINDI NON DEVE USCIRE L'ALLEGATO FILE
    		
                                 $('#mex').append('<div class="col-lg-10  pull-right">' +
                                     ' <div class="rightMsg" title="'+data[i]["date"]+'">' +
                                     ' <div align="center"><a href="{{url('/uploads')}}'+ '/'+data[i]["attachment"]+'" download><span class="fa fa-file fa-3x" style="color:white"></span><br><font size="3" color="white">'+ data[i]["attachment"]+'</font></a></div>'+
                                     ' </div></div>' + '<br> <p class="colorFont rightDate">' + data_convertita+ '</p></div><br>');
                             }
                             else {
                                 $('#mex').append('<div class="col-lg-10 pull-right">' +
                                 ' <div class="rightMsg" title="'+data[i]["date"]+'">' + data[i]["msg"] +
                                 ' </div></div>' +'<br><p class="colorFont rightDate">' + data_convertita + '</p><br>');
                             }
                         }
                         else {
    
                             if (data[i]["msg"] == "") {
                                 // QUANTO INVIA UN ALLEGATO IL CAMPO MSG = 0, QUINDI NON DEVE USCIRE L'ALLEGATO FILE
    
                                 $('#mex').append('<div class="col-lg-10 pull-left">' +
                                 '  <div  class="leftMsg">'+
                                 '  <div align="center"><a href="{{url('/uploads')}}'+ '/'+ data[i]["attachment"]+'" download><span class="fa fa-file fa-3x"></span><br><font size="3" color="black">'+ data[i]["attachment"]+'</font></a></div>'+
                                 '  </div></div></div>' +'<br> <p class="colorFont leftDate">' + data_convertita+ '</p>'+
                                 '<br>');
                             }
                             else {
                                 $('#mex').append('<div class="col-lg-10 pull-left">' +
                                 '<div class="leftMsg">' + data[i]["msg"] +
                                 ' </div></div><br> <p class="colorFont leftDate">' + data_convertita+ '</p><br>');
                             }
    
                             //Conta messaggi non letti
                             if (data[i]["status"] == 0) {
    
                                 num_non_letti++;
                                 console.log(num_non_letti);
                                 seen(data[i]["id"]);
                             }
    
                         }
                     }
                     var objDiv = document.getElementById("finestra");
                     objDiv.scrollTop = objDiv.scrollHeight;
                 }  
        });  
		show_notifications_chat();
    }
</script>


<script>
   function send_message(id) {

	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth() + 1; //January is 0!
	var yyyy = today.getFullYear();

	if (dd < 10) {
		dd = '0' + dd
	}

	if (mm < 10) {
		mm = '0' + mm
	}

	today = dd + '/' + mm + '/' + yyyy;
	var d = new Date(); // for now
	var a = d.getHours(); // => 9
	var b = d.getMinutes(); // =>  30
	if (b < 10) {
		b = '0' + b;

	}
	var c = d.getSeconds() + 1; // => 51

	var ora = a + ':' + b;
	ora = ora.bold();
	var data = ora + ' [' + today + ']';


	var message = $('#mex_box').val();


	if(message==""){

        var attach=$('input#attach').val();
        //RICAVIAMO IL NOME DEL FILE E LO MANDIAMO AL CONTROLLER PER POTERLO INSERIRE NEL DB
        attach = attach.slice(12);
        $('#mex').append('<div class="col-lg-10  pull-right">' +
            ' <div class="rightMsg">Hai inviato il file: ' + attach+ '</div>' +
            ' </div>' + '<br> <p class="colorFont rightDate">' + data + '</p><br>');

    }
    else {
        $('#mex').append('<div class="col-lg-10  pull-right">' +
            ' <div class="rightMsg">' + message + '</div>' + ' </div>' + '<br> <p class="colorFont rightDate">' + data + '</p><br>');

    }

	insert_conversations(id);
	var objDiv = document.getElementById("finestra");
	objDiv.scrollTop = objDiv.scrollHeight;
	refresh_conversation();
	show_notifications_chat();
	no_messages.style.display = 'none';
	


};
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    function show_conversation() {
    
		show_notifications_chat();
        $('#conversations').html("");

        var url2 = '{{URL::to('chat')}}/conversations';
   
        $.ajax({
            type: 'get',
            url: url2,
            success: function (data) {
                //console.log(data);
       
                for (var i = 0; i < data.length; i++) {
                    $('#conversations').append('<a href="#" id="'+data[i]["id"]+'" onclick="showUsers('+data[i]["id"]+')">' +
                    ' <div class="row color" style="margin-top: 5px;">' +
    				' <div class="col-2 pull-left"  style="margin:15px; ">' +
    				' <img src="'+data[i]["picture_path"]+'" width="50" height="50" alt="User Picture" style="border-radius:100%; margin-left: 15px">' +
    				' </div>' +
    				' <div class="col-5 pull-right" style="margin-top:15px;">' +
    				' <b>'+data[i]["first_name"] + ' ' + data[i]["last_name"]+' ' + ' <font size="4" color="red"><b id="non_letti'+data[i]["id"]+'"></font></b>'+''+'</b>' +
    				' <p class="colorFont overText"  id="last_mex' +data[i]["id"]+'"></p>' +
    				' </div>' +
    				' <div class="col-4"  style="margin-top:15px; text-align:center">' +
    				' <b class="colorFont" Style="font-size:0.625em;" id="last_mex_date' + data[i]["id"]+ '"></b>' +
    				' </div></div></a>');
                    var utente2=data[i]["id"];
                    (show_messages_conversation(utente2));
                }
				$("#mex_box").val('');

            }
        })
    }
    
</script>


<script type="text/javascript">
    function refresh_conversation() {
    
		show_notifications_chat();
		
    

        var url2 = '{{URL::to('chat')}}/conversations';
   
        $.ajax({
            type: 'get',
            url: url2,
            success: function (data) {
                //console.log(data);
				
				var elem = document.getElementById(data[0]["id"]);
				if(elem){
					document.getElementById(data[0]["id"]).remove();
				}


				     //var id=data[0]["id"];
				    //$("#+data[0]['id"]+'").fadeIn(5000);

                    $('#conversations').prepend('<a href="#" id="'+data[0]["id"]+'" onclick="showUsers('+data[0]["id"]+')">' +
                    ' <div class="row color" style="margin-top: 5px;">' +
    				' <div class="col-2 pull-left"  style="margin:15px; ">' +
    				' <img src="'+data[0]["picture_path"]+'" width="50" height="50" alt="User Picture" style="border-radius:100%; margin-left: 15px">' +
    				' </div>' +
    				' <div class="col-5 pull-right" style="margin-top:15px;">' +
    				' <b>'+data[0]["first_name"] + ' ' + data[0]["last_name"]+' ' + ' <font size="4" color="red"><b id="non_letti'+data[0]["id"]+'"></font></b>'+''+'</b>' +
    				' <p class="colorFont overText"  id="last_mex' +data[0]["id"]+'"></p>' +
    				' </div>' +
    				' <div class="col-4"  style="margin-top:15px; text-align:center">' +
    				' <b class="colorFont" Style="font-size:0.625em;" id="last_mex_date' + data[0]["id"]+ '"></b>' +
    				' </div></div></a>');
                    //var utente2=data[0]["id"];
                    (show_messages_conversation(data[0]["id"]));


                

                document.getElementById("invio").reset();
            }
        })
    }
    
</script>
<script type="text/javascript">
    function insert_conversations(id) {
    
        var url2 = '{{URL::to('chat')}}/conversations/add/'+id;
        //console.log(url2);
        $.ajax({
            type: 'get',
            url: url2,
            success: function (data) {
                //console.log(data);
            }
        })
 
    };   
</script>

<script>
    function seen(id) {
    
        var url2 = '{{URL::to('chat')}}/seen/' + id;
        //console.log(url2);
        $.ajax({
            type: 'get',
            url: url2,
            success: function (data) {
                //console.log(data);
    
            }
        })
    
        show_notifications_chat();
    
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
            //console.log(data);
            msg = data;
            var num_non_letti=0;
            var i=0;
                    for (var i = 0; i < data.length; i++) {
                        var old_data=data[i]["date"];
                        data_convertita=conversione(old_data);
                    var to = data[i]["user_to"];
                    if (data[i]["user_from"] == <?php echo Auth::user()->id; ?>) {
    
                    }
                    else {
                            //Conta messaggi non letti
                            if(data[i]["status"]== 0){
    
                            num_non_letti++;
                            console.log(num_non_letti);
    
							}
							}
    
                            if(i==data.length-1){
    
                            if (data[i]["user_from"] == <?php echo Auth::user()->id; ?>) {
    
                             var x = data[i]["user_to"];
                                 if(data[i]["msg"]==""){
                                     //CONTROLLA SE L'UTIMO MESSAGGIO E' UN ALLEGATO
                                     $('#last_mex' + x).html(data[i]["attachment"]);
                                     $('#last_mex_date'+ x).html(data_convertita);
    
                                }
    
                            else{
                                 $('#last_mex' + x).html(data[i]["msg"]);
                                 $('#last_mex_date'+ x).html(data_convertita);
    				   
    
                                 }
                            }
    
                            else{
    
                             var x = data[i]["user_from"];
                                if(data[i]["msg"]==""){
                                    //CONTROLLA SE L'UTIMO MESSAGGIO E' UN ALLEGATO
    
                                    $('#last_mex' + x).html(data[i]["attachment"]);
                                    $('#last_mex_date'+ x).html(data_convertita);

                                }
                                else {
                                    $('#last_mex' + x).html(data[i]["msg"]);
                                    //Inserimento data e ora ultimo messaggio  data[i]["date"]
                                    $('#last_mex_date'+ x).html(data_convertita);
                                }
    
                            }
    
                            }
    
                            $('#non_letti' + x).html("");
    
                            if(num_non_letti>0){
    
                            $('#non_letti' + x).html(num_non_letti);
    
                            }
    
                        $('#conversations').fadeIn(500);
    
                    }
            }
    
        });
    }   
</script>

<script type="text/javascript">
    
	window.onload = function(){ 
    show_notifications_chat();
    show_conversation();
	last_id();
    };
</script>


<script>
        function getUpdate(id_mex) {
            var url = '{{URL::to('chat')}}/getUpdate';
            $.ajax({
                type: 'get',
                url: url,
                async: false,
                success: function (data) {
                    //console.log(data);
                    var i=data.length-1;
                    if(data.length>0){
                       if(data[i]["id"]>id_mex){
                          refresh_conversation();
                           ultimo_mex_id=data[i]["id"];
                           if(data[i]["user_from"]==schermata){
                               seen(data[i]["id"]);
                               if (data[i]["msg"] == "") {
                                   // QUANTO INVIA UN ALLEGATO IL CAMPO MSG = 0, QUINDI NON DEVE USCIRE L'ALLEGATO FILE
                                   $('#mex').append('<div class="col-lg-10 pull-left">' +
                                       '  <div  class="leftMsg">'+
                                       '  <div align="center"><a href="{{url('/uploads')}}'+ '/'+ data[i]["attachment"]+'" download><span class="fa fa-file fa-3x"></span><br><font size="3" color="black">'+ data[i]["attachment"]+'</font></a></div>'+
                                       '  </div></div></div>' +'<br> <p class="colorFont leftDate">' + data_convertita+ '</p>'+
                                       '<br>');
									   
                               }
                               else {
                                   $('#mex').append('<div class="col-lg-10 pull-left">' +
                                       '<div class="leftMsg">' + data[i]["msg"] +
                                       ' </div></div><br> <p class="colorFont leftDate">' + data_convertita + '</p><br>');

                               }
                               var objDiv = document.getElementById("finestra");
                               objDiv.scrollTop = objDiv.scrollHeight;
                           }
                       }
                    }
                }
            });
        }
</script>

<script>
    var ultimo_mex_id=0;
    function last_id() {
        var url = '{{URL::to('chat')}}/last_id';
        $.ajax({
            type: 'get',
            url: url,
            async: false,
            success: function (data) {
            if(data.length>0){
                ultimo_mex_id = data[0]["id"];
                 }
            }
        });
    }
</script>

<!-- REFRESH FUNCTION -->

<script type="text/javascript">
    setInterval(function() {

        getUpdate(ultimo_mex_id);
    }, 5000);
</script>
<script>
    //GESTIONE DEL MODAL
    var modal = document.getElementById('myModal');
    // Get the button that opens the modal
    var btn = document.getElementById("open_modal");
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
@endsection