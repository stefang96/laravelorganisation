<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table='users';
    protected $primaryKey='idusers';
    public $timestamps=false;


 public function country()
 {
    return $this->hasOne('App\Country','idcountry','idcountry');
 }

    public function news()
    {
        return $this->hasMany('App\News','idusers','idusers');
    }

    public function allUsersWithCountry()
    {
        return $this->with('country')->paginate('5');
    }
    public function allUsers()
    {
        return $this->all();
    }
    public function findUser($id)
    {
        return $this->find($id);
    }

    public function updateUser(Request $request,$id)
    {
        if($request['approve'])
        {
            $approve=1;
        }
        else
        {
            $approve=0;
        }

        if($request['is_active'])
        {
            $is_active=1;
        }
        else
        {
            $is_active=0;
        }

        $user=$this->find($id);
        $user->first_name=$request['first_name'];
        $user->last_name=$request['last_name'];
        $user->gender=$request['gender'];
        $user->phone_number=$request['phone_number'];
        $user->city=$request['city'];
        $user->password=$request['password'];
        $user->is_active=$is_active;
        $user->user_type=$request['tip_korisnika'];
        $user->jmbg=$request['jmbg'];
        $user->personal_number=$request['personal_number'];
        $user->approve=$approve;
        $user->idcountry=$request['country'];

        $user->save();
    }

    public function destroyUser($id)
    {
       $this->find($id)->news()->delete();

    }

    public function filterMembers(Request $request,$id)
    {
        $search=$request->get('search');
        $country=$request->get('country');


        switch ($id)
        {
            case 1:
                return $this->with('country')
                    ->where('idcountry','=',$country)->where(function ($query) use ($search)
                    {

                        $query->where('email', 'like', '%' . $search . '%')
                            ->orWhere('first_name', 'like', '%' . $search . '%')->orWhere('last_name', 'like', '%' . $search . '%');


                    })->paginate(5)->appends('search',$search)->appends('country',$country);
                break;
            case 2:
                return $this->with('country')
                    ->where(function ($query) use ($search)
                    {

                        $query->where('email', 'like', '%' . $search . '%')
                            ->orWhere('first_name', 'like', '%' . $search . '%')->orWhere('last_name', 'like', '%' . $search . '%');

                    })->paginate(5)->appends('search',$search);
                break;
            case 3:
                return $this->with('country')
                    ->where('idcountry','=',$country)
                    ->paginate(5)->appends('country',$country);
                break;
            case 4:
                return $this->allUsersWithCountry();
                break;
        }
    }
}
