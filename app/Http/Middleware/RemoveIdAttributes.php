<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class RemoveIdAttributes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($response instanceof JsonResponse) {
            $data = $response->getData(true);

            $data = $this->removeIdAttributes($data);

            $response->setData($data);
        }

        return $response;
    }

    protected function removeIdAttributes(array $data): array
    {
        array_walk_recursive($data, function (&$value, $key) use (&$data){
            if (substr($key, -3) === '_id') {
                unset($data[$key]);
            }
        });

        return $data;
    }
    
}
