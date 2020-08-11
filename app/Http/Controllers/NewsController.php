<?php

namespace App\Http\Controllers;

use App\News;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $news=new News();
        $user=new User();

      $result_us=$news->allNewsUsers();
      $users=$user->allUsers();

       return view('news.index',compact('result_us','users'));
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
        $news=new News();
        $news->storeNews($request);
        return redirect('news');

        //id je session('id') tj onaj korisnik koji je registrovan!
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

        $news=new News();
        $news=$news->editNews($id);
        return view('news.edit',compact('news'));
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

        $news=new News;
        $news->updateNews($request,$id);
        return redirect('news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news=new News;
        $news->destroyNews($id);
        return redirect('news');
    }


    public function filterNews($id,Request $request)
    {
        $search = $request->get('search');
        $startDate = $request->get('startDate');
        $endDate = $request->get('endDate');
        $user = $request->get('user');
        if(!empty($startDate) && !empty($endDate))
        {
            $startDate=date('Y-m-d',strtotime($startDate));
            $endDate=date('Y-m-d',strtotime($endDate));
        }

         $page=$request->get('page');
        $users=new User();
        $users =$users->allUsers();
        $news=new News();


        if (empty($page)) {

            if ($id == 0) {
                $result_us = $news->filterNews($id,$search);

            } elseif ($id == 1) {

                if (empty($user))
                {
                    $result_us = $news->filterNews($id,$search,$startDate,$endDate);
                }
                else
                {
                    $result_us = $news->filterNews($id,$search,$startDate,$endDate,$user);
                }


                 }
            elseif ($id == 2) {

                if(empty($search))
                {
                    if(empty($user))
                    {
                        $result_us = $news->filterNews($id);

                    }
                    else{
                        $result_us = $news->filterNews($id,null,null,null,$user);
                    }}
                else
                {
                    if(empty($user))
                    {
                        $result_us = $news->filterNews($id,$search,null,null,null);
                    }
                    else
                    {
                        $result_us = $news->filterNews($id,$search,null,null,$user);

                    }
                }


            }
            $view = view('tables/tableNews', compact('result_us'));
            return $view;

        } else {

            if ($id == 0) {
                $result_us = $news->filterNews($id,$search);

            } elseif ($id == 1) {

                if (empty($user))
                {
                    $result_us = $news->filterNews($id,$search,$startDate,$endDate);
                }
                else
                {
                    $result_us = $news->filterNews($id,$search,$startDate,$endDate,$user);
                }


            }
            elseif ($id == 2) {

                if(empty($search))
                {
                    if(empty($user))
                    {
                        $result_us = $news->filterNews($id);

                    }
                    else{
                        $result_us = $news->filterNews($id,null,null,null,$user);
                    }}
                else
                {
                    if(empty($user))
                    {
                        $result_us = $news->filterNews($id,$search,null,null,null);
                    }
                    else
                    {
                        $result_us = $news->filterNews($id,$search,null,null,$user);

                    }
                }


            }

                return view('news.index', compact('result_us', 'users'));


        }

    }

}
