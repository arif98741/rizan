<?php


namespace App\QueryFilters\Supporter\To;
use Closure;

class To
{
    public function handle($request, CLosure $next)
    {
        if( ! request()->has('date'))
        {
            return $next($request);
        }elseif ( request()->has('date') && request('date') == '')
        {
            return $next($request);
        }

        $builder = $next($request);
        $start = request('date').' 00:00:00';
        $end = request('date').' 23:59:59';
        return $builder->whereBetween('supports.created_at',[$start,$end],'and');
    }
}
