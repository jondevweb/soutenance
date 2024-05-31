<?php
 
namespace App\Http\Middleware;
 
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
 
class EnsureTokenIsValid
{
    function __construct() {
        file_put_contents('/tmp/penible',"toto 0\n", FILE_APPEND);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->session()->get('triethic')['token'];
        file_put_contents('/tmp/penible', $token . "2\n", FILE_APPEND);

        if (isset($token)) {
            file_put_contents('/tmp/penible', "toto 1\n", FILE_APPEND);
            return redirect()->route('client');
            // Redirect to home if the token is invalid
        } 
    }

}
