<?php

namespace App\Http\Controllers;

use App\User;
use Image;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserRegistrationController extends Controller
{
    public  function  showRegistrationForm()
    {
        if (Auth::user()->role == 'Admin') {
            return view('admin.users.registration-form');
        } else {
            return redirect('/home');
        }
    }

    public  function  userSave(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $users = User::all();

        return view('admin.users.user-list', compact('users'));

//        $this->guard()->login($user);
//
//        return $this->registered($request, $user)
//            ?: redirect($this->redirectPath());
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
            'role' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string','min:13', 'max:13'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'     => $data['name'],
            'role'     => $data['role'],
            'email'    => $data['email'],
            'mobile'   => $data['mobile'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function  userList()
    {
        if (Auth::user()->role == 'Admin'){
            $users = User::all();
            return view('admin.users.user-list',compact('users'));
        }else{
            return redirect('/home');
        }

    }

    public function userProfile($userId)
    {
        $user = User::find($userId);

        return view('admin.users.profile',compact('user'));
        //return $user;
    }

    public  function changeUserInfo($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.change-user-info',compact('user'));
    }

    public  function  userInfoUpdate(Request $request)
    {
        $this->validate($request,[
            'name' =>   'required|string|max:255',
            'mobile' => 'required|string|max:13|min:13',
            'email' =>  'required|string|max:255|email',
        ]);
        $user = User::find($request->user_id);
        $user->name =  $request->name;
        $user->mobile =  $request->mobile;
        $user->email =  $request->email;
        $user->save();

        return  redirect("/user-profile/$request->user_id")->with('message','Information Successfully Update ');

    }

    public  function  changeUserAvatar($id)
    {
        $user = User::find($id);
        return view('admin.users.change-user-avatar',compact('user'));
    }

    public  function  updateUserPhoto(Request  $request)
    {
        $user = User::find($request->user_id);

        $file = $request->file('avatar');
        $imageName = $file->getClientOriginalName();
        $directory = 'admin/assets/avatar/';
        $imageUrl = $directory.$imageName;
        //$file->move($directory,$imageUrl);

        Image::make($file)->resize(300,300)->save( $imageUrl);

        $user->avatar = $imageUrl;
        $user -> save();

        return redirect('/user-profile/$request->user_id')
            ->with('message','Photo update successfully');

    }

    public function changeUserPassword($id)
    {
        $user = User::find($id);
        return view('admin.users.change-user-password',compact('user'));
    }

    public function userPasswordUpdate(Request $request)
    {
        $this->validate($request,[
            'new_password'  => 'required|string|min:8'
        ]);
       $oldPassword = $request->password;
       $user = User::find($request->user_id);

       if (Hash::check($oldPassword, $user->password)){
           $user->password = Hash::make($request->new_password);
           $user->save();

           return redirect('/user-profile/$request->user_id')
               ->with('message','Password  updated successfully');
       }else{
            return  back()->with('error_message','Old Password Doesnt Match, Please Try Again ......') ;
       }
    }


}
