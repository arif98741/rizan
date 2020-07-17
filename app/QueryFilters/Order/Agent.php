<?php
namespace App\QueryFilters\Order;
use Closure;

class Agent
{
    public function handle($request, CLosure $next)
    {
        if( ! request()->has('agent_id'))
        {
            return $next($request);
        }elseif ( request()->has('agent_id') && request('agent_id') == '')
        {
            return $next($request);
        }

        $builder = $next($request);
        return $builder->where('agent_id',request('agent_id'));
    }
}
