<?php 
namespace App\Http\Controllers;

use App\Authentication\User;
use Auth;
use Illuminate\Routing\Controller;

class AuthFakeController extends Controller {

    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate()
    {

         $user = User::login('teste1','123');
        var_dump($user);
        $auth = Auth::login($user);
        var_dump(Auth::user());
        #var_dump(Auth::user()->id());
        if ($auth)
        {
            #return redirect()->intended('dashboard');
        }
    }

}