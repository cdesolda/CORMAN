<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\user;
use DB;


class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('chat.search');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function stampa_utenti()
    {
        if (Auth::check())
        {
            // The user is logged in...

        $data = DB::table('conversation')
            ->where('conversation.user_one', '=', Auth::user()->id)
            ->join('users', 'users.id','=','conversation.user_two')
            ->select('users.*')
            ->get();
        return view('chat.messages', compact('data'));
        }
    }


	public function showuser($id)
    {
        $profile = DB::table('users')
            ->join('roles','users.role_id', '=', 'roles.id')
			->join('affiliations','users.affiliation_id', '=', 'affiliations.id')
            ->where('users.id', '=', $id)
            ->select('users.id', 'users.first_name', 'users.last_name', 'users.email', 'users.picture_path', 'roles.name as user_role', 'affiliations.name as user_affiliation')
            ->get();
        return($profile);
    }


	public function show_messages($id)
    {
        $mess=DB::table('messages')
			->whereIn('messages.user_from', [Auth::user()->id, $id])
            ->whereIn('messages.user_to', [Auth::user()->id, $id])
            ->select('messages.*')
            ->get();
        return($mess);
    }

    public function show_conversations()
    {
        $conversation = DB::table('conversation')
            ->where('conversation.user_one', '=', Auth::user()->id)
            ->join('users', 'users.id','=','conversation.user_two')
            ->select('users.*')
            ->orderBy('last_messages', 'desc')
            ->get();
        return ($conversation);
    }
	
	public function show_notifications_chat()
    {
        $notifications_chat1 = DB::table('messages')
            ->where('messages.user_to', '=', Auth::user()->id)
			->where('messages.status', '=', "0")
            ->select('messages.user_from')
            ->GroupBy('messages.user_from')
            ->get();
			
		//$notifications_chat = count($notifications_chat1);
        return ($notifications_chat1);
    }
	

     public function send(Request $request, $id_to)
     {
         $message= $request->input('mex_box');

         DB::table('messages')->insertGetId(
            ['user_from' => Auth::user()->id,
                'user_to' =>$id_to,
                'msg'=> $message,
                'status' => '0',

            ]);

    }

    //FUNZIONE CHE INSERISCE IL NOME DEL FILE NEL CAMPO ATTACHMENT DELLA TABELLA MESSAGES
    public function send_attach($id_to, $attach)
    {

      DB::table('messages')->insertGetId(
            ['user_from' => Auth::user()->id,
                'user_to' =>$id_to,
                'msg'=> '',
                'status' => '0',
                'attachment' => $attach,
            ]);


    }

   public function insert_conversations($id_to)
    {
        DB::table('conversation')
            ->whereIn('.user_one', [Auth::user()->id, $id_to])
            ->whereIn('user_two', [Auth::user()->id, $id_to])
            ->delete();



        DB::table('conversation')->insertGetId(
                 ['user_one' => Auth::user()->id,
                'user_two' =>$id_to,
            ]);


        DB::table('conversation')->insertGetId(
            ['user_two' => Auth::user()->id,
                'user_one' =>$id_to,
            ]);

    }


     public function search(Request $request)
    {
        if ($request->ajax()){
            $output="";

            $customers=DB::table('users') ->where('id', '!=', Auth::user()->id)
                                          ->Where('first_name','LIKE','%'.$request->messages.'%')
                                          ->orWhere('last_name','LIKE','%'.$request->messages.'%')
                                          ->where('id', '!=', Auth::user()->id)->get();
            if($customers)
            {
                foreach ($customers as $key => $customer)

                 $output.='<div class="col-md-12">'.'<a onclick="showUsers('.$customer->id.')" href="#">'.'<div class="row" id="divShowUser">'.
                     '<div class="col-xs-2"><img src="'.$customer->picture_path.'" width="50" height="50" alt="User Picture" style="border-radius:100%; margin: 3px"></div>'.
                     '<div class="col-xs-10" style="padding:15px; ">&nbsp'.$customer->first_name.' '.$customer->last_name.'</div>'.'</div>'.
                     '</a>'.'</div>';
            }
            return Response($output);

        }

    }

	 public function seen($id)
    {
        DB::table('messages')
            ->where('id','=', $id)
            ->update(
            [
                'status' => '1',
            ]);


    }

    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //FUNZIONE PER COPIARE IL FILE NELLA CARTELLA 'UPLOADS'
    public function showUploadFile(Request $request){
        $file = $request->file('file');

/*
        //Display File Name
        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';

        //Display File Extension
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';

        //Display File Real Path
        echo 'File Real Path: '.$file->getRealPath();
        echo '<br>';

        //Display File Size
        echo 'File Size: '.$file->getSize();
        echo '<br>';

        //Display File Mime Type
        echo 'File Mime Type: '.$file->getMimeType();*/

        //Move Uploaded File
        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());

        echo "<a href='http://127.0.0.1:8000/chat'>Link</a>";

        }

    //return view('chat.search');



}
