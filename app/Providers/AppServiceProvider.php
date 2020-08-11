<?php

namespace App\Providers;

use App\Country;
use App\Memberships;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use function foo\func;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        View::composer('welcome',function ($view) {
            if (session('is_logged') && session('role') != 1) {

                $membership = Memberships::where('idusers', session('idUser'))->get();

                $lenght = $membership->count() - 1;


                $date = date('F j Y', time());

                $start_date = strtotime($date);

                $active = 0;
                if ($lenght >= 0) {


                    $end_date = strtotime($membership[$lenght]->datum_isteka);


                    if ($start_date >= $end_date) {

                        session()->put('active', false);

                        // $userModel->updateIsActive($_SESSION['idUser'],$_SESSION['active']);
                        $user = User::find(session('idUser'));
                        $user->is_active = session('active');
                        $user->save();
                    } else {
                        $active = 1;
                    }


                    $view->with('membership', $membership);
                    $view->with('active', $active);
                    $view->with('end_date', $end_date);
                    $view->with('lenght', $lenght);
                    $view->with('start_date', $start_date);
                }
                if($lenght==-1)
                {
                    $view->with('active', $active);
                   // $view->with('end_date', $end_date);
                    $view->with('lenght', $lenght);
                 //   $view->with('start_date', $start_date);

                }
            }


                $view->with('allCountry', DB::table('country')->get());
        });

    }
}
