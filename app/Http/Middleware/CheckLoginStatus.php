<?php
namespace App\Http\Middleware;
use Closure;
use Session;
class CheckLoginStatus
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
        $session=session()->all();
        if(is_array($session) && count($session)>0)
        {
            if(!isset($session['LOGGED_ID']) && empty($session['LOGGED_ID']))
            {
                return redirect('/login');
            }
        }
        return $next($request);
    }
}
