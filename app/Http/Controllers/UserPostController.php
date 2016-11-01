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
        $labinfos = Lab::all();
        return view('user.index', compact('labinfos'));
    }
    
    public function filter($lab_name = null){
        
        if (!is_null($lab_name)) {
            $filter_lab = User::where('name', $lab_name)->first();
            if ($filter_lab) {
                $labinfos = $filter_lab->labs()->orderBy('created_at', 'desc')->get();
            }
        }
        
        else {
            
             $labinfos = Lab::all();
       
        }
         return view('user.filterindex', compact('labinfos'));
    }
    
    public function search(Request $request)
    {
        
        $from = $request->input('from');
        $to = $request->input('to');
        
        $input = Lab::whereBetween('created_at', [$from, $to])->get();
        
        // return $input;
        return view('user.filterdate', compact('input'));
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

}
