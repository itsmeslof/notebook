<?php

namespace App\Http\Middleware;

use App\Models\StaticPage;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class MakeStaticPagesAvailableGlobally
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Schema::hasTable('static_pages')) {
            view()->share('staticPages', StaticPage::all());
        }

        return $next($request);
    }
}
