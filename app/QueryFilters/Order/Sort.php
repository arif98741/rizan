<?php


namespace App\QueryFilters\Order;
use Closure;

class Sort
{
    public function handle($request, CLosure $next)
    {
        if(! request()->has('sort'))
        {
            return $next($request);
        }
        $builder = $next($request);
        return $builder->orderBy('orders.id',request('sort'));
    }
}
