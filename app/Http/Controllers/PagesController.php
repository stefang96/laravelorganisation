<?php

namespace App\Http\Controllers;

use App\Country;
use App\Mail\SendEmail;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use function foo\func;
use function MongoDB\BSON\toJSON;

class PagesController extends Controller
{


    public function index()
    {

        return view('home');

    }

    public function about()
    {
        return view('about');
    }

    public function login(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'username' => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }




        $users=DB::table('users')->where([
            ['email',  $request['username']],
            ['password', $request['password']],
        ])->get();




        if($users->count()==0)
        {
            return response()->json(['errors'=>array('Pogresno email ili password')]);
        }
        else {

            foreach ($users as $user) {

                if ($user->approve == 1) {
                    session()->put('name', $user->first_name . '  ' . $user->last_name);
                    session()->put('role', $user->user_type);
                    session()->put('is_logged', true);
                    session()->put('idUser', $user->idusers);
                    session()->put('active', $user->is_active);
                } else {
                    return response()->json(['status' => '<b>Your account is waiting for our administrator approval.</b><br>Please check your email.']);
                }


            }

            return redirect('home');

        }

        }


    public function registration(Request $request)
    {

//is_active=0
        $validator = Validator::make($request->all(), [
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'jmbg' => 'required',
            'personal_number' => 'required',
            'city' => 'required',
            'phone_number' => 'required'

        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        else
        {


            if($request['approve'])
                $chb=true;
            else
                $chb=false;

            DB::table('users')->insert([
                ['email' => $request['email'],
                    'last_name' => $request['last_name'],
                    'first_name' => $request['first_name'],
                    'password' => $request['password'],
                    'jmbg' => $request['jmbg'],
                    'personal_number' => $request['personal_number'],
                    'city' => $request['city'],
                    'phone_number' => $request['phone_number'],
                    'idcountry' => $request['country'],
                    'approve' => $chb,
                    'is_active' => 0,
                    'gender' => $request['gender'],
                    'user_type' => $request['user_type']]
            ]);

        return response()->json(['status'=>'<b>Your account is successfull created </b><br> Wait for our administrator approval. Please check your email. ']);
        }





    }

    public function validateRegistration(Request $request)
    {

        if($request['name']=='jmbg')
        {

            $user=\App\User::all()->where('jmbg','=',$request['value']);
            $result=$user->count();
            if($result>0)
            {
                return response()->json(['validate'=>'Postoji registrovan clan sa unsenim JMBG!']);
            }
            else
            {
                return response()->json(['validate'=>false]);
            }
        }
        elseif ($request['name']=='email')
        {

            $user=\App\User::all()->where('email','=',$request['value']);
            $result=$user->count();
            if($result>0)
            {
                return response()->json(['validate'=>'Postoji registrovan clan sa unesenim mejlom!']);

            }
            else
            {
                if (filter_var($request['value'], FILTER_VALIDATE_EMAIL)){
                    return response()->json(['validate'=>false]); }
                else{
                    return response()->json(['validate'=>'Niste unijeli dobar email! <br> Please include @ in the email address! <br> <i>Example: someone@example.com </i>']);
                }
            }
        }
        elseif ($request['name']=='personal_number')
        {
            $user=\App\User::all()->where('personal_number','=',$request['value']);
            $result=$user->count();
            if($result>0)
            {
                return response()->json(['validate'=>'Postoji registrovan clan sa unsenim brojem licne!']);

            }
            else
            {
                return response()->json(['validate'=>false]);
            }
        }

    }


    public function logout()
    {
        session()->flush();

        return redirect('home');
    }

    public function newsPayments($id)
    {
        $result_us=DB::table('news')->join('users','news.idusers','=','users.idusers')->where('news.idusers',$id)->paginate(3,'p');
        $resultPayments=DB::table('membership')->select()->where('idusers',$id)->paginate(4,'q');
        $user=\App\User::all()->where('idusers',$id)->first();

        return view('newsAndPayments',compact('result_us','resultPayments','user'));
    }

    public function paymentOverview()
    {
        $broj=0;
        $id=1;
        $users= DB::table('users')->join('membership','users.idusers','=','membership.idusers')->orderBy('membership.idusers')->get();


        foreach ($users as $user)
        {

            if(!empty($user->datum_uplate) && $user->idusers!=$id)
            {
                $id=$user->idusers;
                $broj++;
            }
        }

//echo $broj;

       // $result_us1=DB::table('users')->select('*')->join('membership','users.idusers','=','membership.idusers')->orderByDesc('membership.datum_isteka' )->take($broj)->get();


        $result_us1=DB::select("select  *
            from  users
            join (
                SELECT *
                    from  membership
                    order by  membership.datum_isteka desc
                    limit ".$broj."
                 ) membership  ON users.idusers=membership.idusers
           ");

//return $result_us;
       return view('paymentOverview',compact('result_us1'));


    }
 public function waitingList()
 {
     $result=DB::table('users')->join('country','users.idcountry','country.idcountry')->where('approve',0)->paginate(4);

     return view('waitingList',compact('result'));
 }

 public function ajaxConfrimMembers(Request $request)
 {
     $user=\App\User::find($request['id']);
      $user->is_active=1;

      $user->save();

     return response()->json(['status'=>'true']);

 }

 public function ajaxSentMail(Request $request)
 {
     $link="http://localhost/laravelorganisation/index.php";
     foreach ($request['sent'] as $r)
     {
         //select * from users JOIN membership ON users.idusers=membership.idusers WHERE users.idusers=2 ORDER BY membership.datum_isteka DESC LIMIT 1
        // echo $r.'<br>';
         $user=DB::table('users')->join('membership','users.idusers','=','membership.idusers')->where('users.idusers',$r)->orderByDesc('membership.datum_isteka')->limit(1)->get();
  foreach ($user as $u)
      Mail::to("stefangrujicic50@yahoo.com")->send(new SendEmail('Vasa clanarina je istekla  <b>'.$u->datum_isteka.'</b> . <br> <b> Molimo vas da uplatite vasu clanarinu ! </b> <br> <p> Prijavite se: <a href=\"'.$link.'\">'.$link.'</a></p>','Vasa clanarina je istekla'));

     }
     return "true";
 }

 public  function allowMember($id)
 {

     $user=\App\User::find($id);
     $user->approve=1;
     $user->save();

     //ispisati mejl Admin je potvrdio vasu prijavu...
   //  Mail::to("stefangrujicic50@yahoo.com")->send(new SendEmail('Vasa clanarina je istekla  <b>'.$u->datum_isteka.'</b> . <br> <b> Molimo vas da uplatite vasu clanarinu ! </b> <br> <p> Prijavite se: <a href=\"'.$link.'\">'.$link.'</a></p>','Vasa clanarina je istekla'));

     return \redirect('waitingList');

 }

 public function filterNews($idUser,$id,Request $request)
 {
     $page=$request->get('page');
     $search = $request->get('search');
     $startDate = $request->get('startDate');
     $endDate = $request->get('endDate');

     if(!empty($startDate) && !empty($endDate))
     {
         $startDate=date('Y-m-d',strtotime($startDate));
         $endDate=date('Y-m-d',strtotime($endDate));
     }

     if(empty($page))
     {
         if($id==1)
         {  //start>0,end>0,search>0

             $result_us = DB::table('news')->join('users', 'news.idusers', '=', 'users.idusers')
                 ->whereBetween('news.date',[$startDate,$endDate])->where('news.idusers','=',$idUser)
                 ->where(function ($query) use ($search){

                 $query->where('news.title', 'like', '%' . $search . '%')->orWhere('news.short_description', 'like', '%' . $search . '%');

             })->paginate(4,'p')->appends('search',$search)->appends('startDate',$startDate)->appends('endDate',$endDate);

         }
         elseif ($id==2)
         {
             //start<0,end<0,search>0
             $result_us = DB::table('news')->join('users', 'news.idusers', '=', 'users.idusers')
                 ->where('news.idusers','=',$idUser)
                 ->where(function ($query) use ($search){

                     $query->where('news.title', 'like', '%' . $search . '%')->orWhere('news.short_description', 'like', '%' . $search . '%');

                 })->paginate(4,'p')->appends('search',$search);

         }
         elseif ($id==3)
         {//start>0,end>0,search<0
             $result_us = DB::table('news')->join('users', 'news.idusers', '=', 'users.idusers')
                 ->whereBetween('news.date',[$startDate,$endDate])->where('news.idusers','=',$idUser)
                 ->paginate(4,'p')->appends('startDate',$startDate)->appends('endDate',$endDate);

         }
         elseif ($id==4)
         {//start<0,end<0,search<0
             $result_us = DB::table('news')->join('users', 'news.idusers', '=', 'users.idusers')
                 ->where('news.idusers','=',$idUser)
                 ->paginate(4,'p')->appends('startDate',$startDate)->appends('endDate',$endDate);
         }

         $view = view('tables/tableMemberNews', compact('result_us'));
         return $view;
     }
     else
     {
         if($id==1)
         {  //start>0,end>0,search>0

             $result_us = DB::table('news')->join('users', 'news.idusers', '=', 'users.idusers')
                 ->whereBetween('news.date',[$startDate,$endDate])->where('news.idusers','=',$idUser)
                 ->where(function ($query) use ($search){

                     $query->where('news.title', 'like', '%' . $search . '%')->orWhere('news.short_description', 'like', '%' . $search . '%');

                 })->paginate(4,'p')->appends('search',$search)->appends('startDate',$startDate)->appends('endDate',$endDate);

         }
         elseif ($id==2)
         {
             //start<0,end<0,search>0
             $result_us = DB::table('news')->join('users', 'news.idusers', '=', 'users.idusers')
                 ->where('news.idusers','=',$idUser)
                 ->where(function ($query) use ($search){

                     $query->where('news.title', 'like', '%' . $search . '%')->orWhere('news.short_description', 'like', '%' . $search . '%');

                 })->paginate(4,'p')->appends('search',$search);

         }
         elseif ($id==3)
         {//start>0,end>0,search<0
             $result_us = DB::table('news')->join('users', 'news.idusers', '=', 'users.idusers')
                 ->whereBetween('news.date',[$startDate,$endDate])->where('news.idusers','=',$idUser)
                 ->paginate(4,'p')->appends('startDate',$startDate)->appends('endDate',$endDate);

         }
         elseif ($id==4)
         {//start<0,end<0,search<0
             $result_us = DB::table('news')->join('users', 'news.idusers', '=', 'users.idusers')
                 ->where('news.idusers','=',$idUser)
                 ->paginate(4,'p')->appends('startDate',$startDate)->appends('endDate',$endDate);
         }
          $resultPayments=DB::table('membership')->select()->where('idusers',$id)->paginate(4,'q');
         $user=\App\User::all()->where('idusers',$id)->first();

         return view('newsAndPayments',compact('result_us','resultPayments','user'));

     }


 }


    public function filterPayment($id,Request $request)
    {

        $page=$request->get('page');

        if(empty($page))
        {
            if($id==1)
            {   $resultPayments=DB::table('membership')->select()->where('idusers',$id)->paginate(4,'q');


            }
            elseif ($id==2)
            {
                //start>0,end>0,search<0
                $resultPayments=DB::table('membership')->select()->where('idusers',$id)->paginate(4,'q');

            }
            elseif ($id==3)
            {//start>0,end>0,search<0
                return $id;
            }
            elseif ($id==4)
            {//start<0,end<0,search<0
                return $id;
            }
            $view = view('tables/tableMemberNews', compact('result_us'));
            return $view;
        }
        else
        {
            if($id==1)
            {  //start>0,end>0,search>0
                return $id;
            }
            elseif ($id==2)
            {
                //start>0,end>0,search<0
                return $id;
            }
            elseif ($id==3)
            {//start>0,end>0,search<0
                return $id;
            }
            elseif ($id==4)
            {//start<0,end<0,search<0
                return $id;
            }
        }



    }





}
