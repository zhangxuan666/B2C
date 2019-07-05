<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use DB;

class ApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


        $token=$request->input('token');
//        var_dump($token);die;
        $data=DB::table('users')->where('token',$token)->first();
//        var_dump($data);die;


       if(empty($request->get('token'))){

          echo "无token";die;

        }

        if(session('token')!=$request->input('token')){

           echo "无效Token";die;

        }

        if(time()-session('time')>2*3600){

           echo "token过期";die;

        }
        
        return $next($request);
    }
}
