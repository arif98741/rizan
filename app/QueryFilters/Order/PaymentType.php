<?php


namespace App\QueryFilters\Order;
use Closure;

class PaymentType
{
    public function handle($request, CLosure $next)
    {
        if( ! request()->has('payment_type'))
        {
            return $next($request);
        }elseif ( request()->has('payment_type') && request('payment_type') == '')
        {
            return $next($request);
        }

        $builder = $next($request);
        return $builder->where('orders.order_type',request('payment_type'));
    }
}
