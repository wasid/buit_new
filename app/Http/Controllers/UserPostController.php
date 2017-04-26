<?php

namespace App\Http\Controllers;
use App\Student;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Session;

use App\Lab;

use App\User;

use DB;

use Auth;

class UserPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLab()
    {
        $users = User::all();
        return view('user.getlab', compact('users'));
    }
    
    public function index()
    {
        $labname = User::lists('name','name')->all();
        $labinfos = Lab::all();
        return view('user.index', compact('labinfos', 'labname'));
    }
    
    public function filter($lab_name = null){

        $labname = User::lists('name','name')->all();

        if (!is_null($lab_name)) {
            $filter_lab = User::where('name', $lab_name)->first();
            if ($filter_lab) {
                $labinfos = $filter_lab->labs()->orderBy('created_at', 'desc')->get();
            }
        }
        
        else {
            
             $labinfos = Lab::all();
       
        }
         return view('user.filterindex', compact('labinfos', 'labname'));
    }
    
    // public function filterSearch($lab_name = null){
        
    //     if (!is_null($lab_name)) {
    //         $filter_lab = User::where('name', $lab_name)->first();
    //         if ($filter_lab) {
                
    //             $from = $request->input('from');
                
    //             $to = $request->input('to');
                
    //             $input = Lab::whereBetween('created_at', [$from, $to])->get();
                
    //             $labinfos = $filter_lab->labs()->orderBy('created_at', 'desc')->get();
    //         }
    //     }
        
    //      return view('user.filterindex', compact('labinfos'));
    // }
    
    public function search(Request $request)
    {
        $labname = User::lists('name','name')->all();
        
        $lab_name = $request->input('name');
        
        $user = User::where('name', $lab_name)->first();
        
            if(!is_null($user)){
            
                $from = $request->input('from');
                $to = $request->input('to');
                
                $input = $user->labs()->whereBetween('created_at', [$from, $to])->get();
        
                return view('user.filterdate', compact('input', 'labname'));
              
            }
            
            else{
            
                $from = $request->input('from');
                $to = $request->input('to');
                
                $input = Lab::whereBetween('created_at', [$from, $to])->get();
        
                return view('user.filterdate', compact('input', 'labname'));
            }
            
        }
        
    public function searchAll(Request $request){
        $input = $request->input('searchall');
        $labdata = Lab::where('cpu_name', $input)->orWhere('mac', $input)->orWhere('ip', $input)->get();
        
        return view('user.searchall', compact('labdata'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $input = $request->all();
        
        $user = Auth::user();
        
        $user->labs()->create($input);
        
        Session::flash('alert-info', 'Data Successfully Added!');
        
        return redirect()->back();;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $details = Lab::findOrFail($id);

        return view('user.show', compact('details'));
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
        $input = $request->all();
        
        Auth::user()->labs()->whereId($id)->first()->update($input);
        
        Session::flash('alert-success', 'Data Successfully Updated!');
            
        return redirect()->route('user.posts.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Auth::user()->labs()->whereId($id)->first()->delete();
        
        Session::flash('alert-danger', 'Data Successfully Deleted!');

        return redirect()->route('user.posts.index');

    }
    
    public function changePassword()
    {
        
        return view('user.changepassword');

    }
    
    public function newPassword(Request $request)
    {
        $this->validate($request, [
            
                    'old_password'	=> 'required',
					'password' 		=> 'required|different:old_password|min:6',
					'password_again'=> 'required|different:old_password|same:password'

            ]);
            
            $user = User::findOrFail(Auth::user()->id);
            $input = $request->input();
            //Change Password if password value is set
            if ($input['password'] != "") {
               //dd(bcrypt($input['password']));
               $input['password'] = bcrypt($input['password']);
            }
            $user->fill($input)->save();
            
        Session::flash('alert-info', 'Password Updated Successfully!');
        
        return redirect()->back();;

    }

}
