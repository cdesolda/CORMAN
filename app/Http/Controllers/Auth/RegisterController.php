<?php

namespace App\Http\Controllers\Auth;
use Image;
use App\User;
use App\Author;
use App\Role;
use App\Affiliation;
use App\Topic;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/syncronize';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['bail','required','regex:/^[A-Za-z\- ]+$/','max:255','unique_with:users,last_name'], //Don't remove the space!
            'last_name' => ['bail','required','regex:/^[A-Za-z\-àéèìòù ]+$/','max:255'], //Don't remove the space!
            'birth_date' => 'bail|required|date|after:01/01/1900|before:01/01/2000',
            'email' => 'bail|required|email|unique:users|max:255',
            'password' => 'bail|required|confirmed|min:6|max:255',
            'password_confirmation' => 'bail|required',
            'profilePic' => 'bail|image|max:15000',
            'role' => 'required|exists:roles,name',
            'affiliation' => 'required|filled',
            'topics.*' => 'filled|max:50',
            'personal_link' => 'bail|nullable|url|max:1620'
        ]);
       
    }
 

    // Method overriding for custom form, (original method in Illuminate\Foundation\Auth\RegistersUsers;)
    public function showRegistrationForm(){

         // Retrieve data for register view from DB
         $affiliationList = Affiliation::all()->sortBy('name');
         $roleList = Role::all();
         $topicList = Topic::all();
         
 
        return view('auth.registration',[
          'affiliationList' => $affiliationList,
          'roleList' => $roleList,
          'topicList' => $topicList
         ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $formData)
    {
        //dd($formData);
        $newUser = new User;
        
        // Fill User Model fields
        $newUser->first_name = ucwords($formData['first_name']);
        $newUser->last_name = ucwords($formData['last_name']);
        $newUser->birth_date = $formData['birth_date'];
        $newUser->email = strtolower($formData['email']);
        $newUser->password = bcrypt($formData['password']);
        $newUser->reference_link = $formData['personal_link'];
        
        //Handling Profile picture  
        if( isset($formData['profilePic'])){
            $file = $formData['profilePic'];
            if( $file->isValid() ){
                
                $hashName =  "/".md5($file->path().date('c'));
                $fileName = $hashName . "." . $file->getClientOriginalExtension();
                $filePath = 'images/profilePictures' . $fileName;
                Image::make($file)->fit(200)->save($filePath);
                $newUser->picture_path = $filePath;
            }
        }else{
            $newUser->picture_path = "images/profilePictures/default.png"; //TODO replace default path in database table
        }
  

        //Search and retrieve the affiliation from db
        $affiliationInput = ucwords($formData['affiliation']);
        $affiliation = Affiliation::where('name',$affiliationInput)->first();
        //Check if the affiliation is already in the db, otherwise create a new one and attach to the user
        if( $affiliation != null){
            $newUser->affiliation_id = $affiliation->id;
        }
        else
        {
            $newAffiliation = new Affiliation;
            $newAffiliation->name = $affiliationInput;
            $newAffiliation->save();
            
            $newUser->affiliation_id = $newAffiliation->id;
        }
        
        //Set and retrieve the associated id with role name (from the form)
        $roleInput = $formData['role'];
        $newUser->role_id = Role::where('name',$roleInput)->first()->id;

        $newUser->save();

        // Create a new author and link with this user
        $authorName = $newUser->first_name." ". $newUser->last_name;
        $newAuthor = Author::firstOrNew(['name' => $authorName]);
        $newAuthor->user_id = $newUser->id;
        $newAuthor->save();
        
        // Handling topics  
        if (array_key_exists('topics',$formData)){
            $topicInputList = $formData['topics'];
            foreach( $topicInputList as $topicKey => $topicInput ){
                $topicInput = strtolower($topicInput);
                //Search and retrieve the topic from db
                $topic = Topic::where('name', $topicInput)->first();
                //Check if the topic is already in the db, otherwise create a new one and attach to the user
                if($topic != null){
                    $newUser->topics()->attach($topic->id);
                }
                else{
                    $newTopic = new Topic;
                    $newTopic->name = $topicInput;
                    $newTopic->save();

                    $newUser->topics()->attach($newTopic->id);
                }
            }
        }
        return $newUser;
    }
}
