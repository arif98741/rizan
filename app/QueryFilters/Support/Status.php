<?php


namespace App\QueryFilters\Supporter\Status;
use Closure;

class Status
{
    public function handle($request, CLosure $next)
    {
        if( ! request()->has('status'))
        {
            return $next($request);
        }elseif ( request()->has('status') && request('status') == '')
        {
            return $next($request);
        }

        $builder = $next($request);
        return $builder->where('supports.status',request('status'));
    }
}
