<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreventBrowserBackHistory
{
    function __construct() {
        file_put_contents('/tmp/penible',"toto 4\n", FILE_APPEND);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if ($request->routeIs('welcome')) { // The route's name. In the article's case, the checkout page
            // if (str_contains($request->session()->previousUrl(), 'client')) { // The URL of the starting page. In our case the thank you page
                function __construct() {
                    file_put_contents('/tmp/penible',"toto 5\n", FILE_APPEND);
                }
                return response()->redirectToRoute('welcome'); // Redirect to home if the token is invalid
                  // $request->property (You can pass your request data here)
            // }
        // }
    }
}
