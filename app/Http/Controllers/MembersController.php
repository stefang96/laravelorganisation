<?php

namespace App\Http\Controllers;

use App\Country;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $country=new Country();
        $users=new User();

        $allCountry=$country->allCountry();
        $result_us=$users->allUsersWithCountry();


        return view('members.index',compact('result_us','allCountry'));
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
        return $request;
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
        $country=new Country();
        $user=new User();

        $result=$user->findUser($id);
        $allCountry=$country->allCountry();

        return view('members.edit',compact('result','allCountry'));
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

       $users=new User();

       $users->updateUser($request,$id);
        return redirect('members');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $user=new User();
         $user=$user->destroyUser($id);
         return redirect('members');
    }
    public function membership(Request $request)
    {

        return $request;

    }

    public function filterMembers($id,Request $request)
    {
        $c=new Country();
        $user=new User();

        $page=$request->get('page');
        $allCountry=$c->allCountry();
        $result_us=$user->filterMembers($request,$id);

        if(empty($page))
        {
            $view=view('tables/tableMembers',compact('result_us'));

            return $view;
        }
        else
        {
            return view('members.index',compact('result_us','allCountry'));
        }

    }

}
