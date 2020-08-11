<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class News extends Model
{


    protected $table='news';

    protected $primaryKey='idnews';

    public $timestamps=false;

    public function user()
    {
        return $this->belongsTo('App\User','idusers','idusers');
    }

    public function allNewsUsers()
    {
        return $this->with('user')->paginate(4);
    }
    public function allNews()
    {
        return $this->all();
    }
    public function storeNews(Request $request)
    {
        $this->title=$request['title'];
        $this->description=$request['description'];
        $this->short_description=$request['short_description'];
        $this->idusers=session('idUser');
        $this->date=date('Y-m-d',time());
        $this->save();
    }
    public function updateNews(Request $request,$id)
    {
        $user=$this->find($id);
        $user->title=$request['title'];
        $user->description=$request['description'];
        $user->short_description=$request['short_description'];
        $user->save();
    }
    public function destroyNews($id)
    {
        $news=$this->find($id);
        $news->delete();
    }
    public function editNews($id)
    {
     return $this->with('user')->where('idnews',$id)->get();
    }
    public function filterNews($id,$search=null,$startDate=null,$endDate=null,$user=null)
    {
        switch ($id)
        {
            case 0:

                return $this->with('user')->where('title', 'like', '%' . $search . '%')
                    ->orWhere('short_description', 'like', '%' . $search . '%')->
                paginate(4)->
                appends('search',$search);

                break;
            case 1:
                if($user==null)
                {
                    return $this->with('user')->whereBetween('date',[$startDate,$endDate])->where(function ($query) use ($search){

                        $query->where('title', 'like', '%' . $search . '%')->orWhere('short_description', 'like', '%' . $search . '%');
                    })->paginate(4)->appends('search',$search)->appends('startDate',$startDate)->appends('endDate',$endDate);

                }
                else
                {
                return $this->with('user')->whereBetween('date',[$startDate,$endDate])->where('idusers','=',$user)->where(function ($query) use ($search){

                    $query->where('title', 'like', '%' . $search . '%')->orWhere('short_description', 'like', '%' . $search . '%');
                })->paginate(4)->appends('search',$search)->appends('startDate',$startDate)->appends('endDate',$endDate)->appends('user',$user);

                }


                break;
            case 2:

                if($search==null)
                {
                    if($user==null)
                    {
                        return $this->allNewsUsers();
                    }
                    else
                    {
                        return $this->with('user')->where('idusers','=',$user)->paginate(4)->appends('user',$user);
                    }
                }
                else
                {
                    if($user==null)
                    {
                        return $this->with('user')->where(function ($query) use ($search){

                            $query->where('title', 'like', '%' . $search . '%')->orWhere('short_description', 'like', '%' . $search . '%');
                        })->paginate(4)->appends('search',$search);
                    }
                    else
                    {
                        return $this->with('user')->where('idusers','=',$user)->where(function ($query) use ($search){

                            $query->where('title', 'like', '%' . $search . '%')->orWhere('short_description', 'like', '%' . $search . '%');
                        })->paginate(4)->appends('search',$search)->appends('user',$user);
                    }
                }
                break;

        }
    }




}
