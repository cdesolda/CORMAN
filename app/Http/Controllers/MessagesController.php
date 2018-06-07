<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\user;
use DB;
use Illuminate\Support\Facades\Crypt;


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


    /**
     * @param $id
     * @return mixed
     */
    public function show_messages($id)
    {
        $mess=DB::table('messages')
			->whereIn('messages.user_from', [Auth::user()->id, $id])
            ->whereIn('messages.user_to', [Auth::user()->id, $id])
            ->select('messages.*')
            ->get();

        $mess = json_decode($mess, true);

        for ($i = 0, $n = count($mess); $i < $n ; $i++) {

            if($mess[$i]['msg']!=""){

                $value=$mess[$i]['msg'];
                $value=decrypt($value);
                $mess[$i]['msg']=$value;
            }
        }
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
        return ($notifications_chat1);
    }
	

     public function send(Request $request, $id_to)
     {
         $message= $request->input('mex_box');

         $message=encrypt($message);

         DB::table('messages')->insertGetId(
            ['user_from' => Auth::user()->id,
                'user_to' =>$id_to,
                'msg'=> $message,
                'status' => '0',

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
	
	public function getUpdate()
    {
        $mess = DB::table('messages')
            ->where('messages.user_to', '=' , Auth::user()->id)
            ->where('messages.status', '=', '0')
            ->select('messages.*')
            ->get();

            $mess = json_decode($mess, true);

             for ($i = 0, $n = count($mess); $i < $n ; $i++) {

                 if($mess[$i]['msg']!=""){

                        $value=$mess[$i]['msg'];
                        $value=decrypt($value);
                        $mess[$i]['msg']=$value;
                    }


         }
            return($mess);

    }

    public function last_id()
    {
        $mess = DB::table('messages')
            ->where('messages.user_to', '=' , Auth::user()->id)
            ->select('messages.*')
            ->orderBy('id','desc')
            ->get();

        return($mess);

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
    public function showUploadFile(Request $request, $id_to)


    {

        $file = $request->file('file');
        $current_timestamp_by_mktime = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
        $ext = strtolower($file->getClientOriginalExtension());
        $file1 = $current_timestamp_by_mktime;
        $nome= $file->getClientOriginalName();
        $file2= $file1  . '_' . $nome;

        //Move Uploaded File
        $destinationPath = 'uploads';
        $file->move($destinationPath, $file2);

        DB::table('messages')->insertGetId(
            [  'user_from' => Auth::user()->id,
                'user_to' => $id_to,
                'msg' => '',
                'status' => '0',
                'attachment' => $file2,
            ]);
    }
		

}
