<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use  DB;

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
        $data=DB::table('users')->where('token',$token)->first();
       if(empty($request->get('token'))){

          return response()->json(['code'=>501,'msg'=>"无token"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);

        }
         

        if(!($data->token)){

            //echo session::get('token');die;

             return response()->json(['code'=>502,'msg'=>"无效token"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);

        }

        if(time()-($data->token_time)>2*3600){

            return response()->json(['code'=>503,'msg'=>"token过期"])->setEncodingOptions(JSON_UNESCAPED_UNICODE);

        }
        
        return $next($request);
    }
   }