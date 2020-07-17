<?php


namespace App\QueryFilters\Order;
use Closure;

class Orderno
{
    public function handle($request, CLosure $next)
    {
        if( ! request()->has('order_no'))
        {
            return $next($request);
        }elseif ( request()->has('order_no') && request('order_no') == '')
        {
            return $next($request);
        }

        $builder = $next($request);
        return $builder->where('order_no',request('order_no'));
    }
}
