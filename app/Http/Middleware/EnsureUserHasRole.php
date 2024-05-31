<?php
 
// namespace App\Http\Middleware;
 
// use Closure;
// use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Response;
 
// class RoleCheckAfterSession

namespace App\Http\Middleware;
 
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
 
class EnsureUserHasRole
{
    function __construct() {
        file_put_contents('/tmp/penible',"toto 0\n", FILE_APPEND);
    }

        /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // if (! $request->user()->hasRole($role)) {
            $token = $request->session()->get('triethic');
        file_put_contents('/tmp/penible', "2\n", FILE_APPEND);
        // }
 
        return $next($request);
    }


    // /**
    //  * Handle an incoming request.
    //  *
    //  * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
    //  */
    // public function handle(Request $request, Closure $next): Response
    // {
       
    //     $token = $request->session()->get('triethic')['roles'];
    //     file_put_contents('/tmp/penible', $token . "2\n", FILE_APPEND);

    //     // if (Auth::loginUsingId(230, $remember = true);) {
    //     // // $token2 = (new Collection(Auth::User()))->toArray(); // Get 'token' from the request
    //     // file_put_contents('/tmp/penible', "2\n", FILE_APPEND);}
    //     if (!isset($token)) {
    //         file_put_contents('/tmp/penible', "toto 1\n", FILE_APPEND);
    //         return redirect('/'); // Redirect to home if the token is invalid
    //     }
        
    //     return $next($request);
    // }

}