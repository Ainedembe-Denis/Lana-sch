<?php

namespace App\Http\Middleware;

use App\Constants\Status;
use App\Models\Page;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ActiveTemplateMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $viewShare['activeTemplate']     = activeTemplate();
        $viewShare['activeTemplateTrue'] = activeTemplate(true);
        view()->share($viewShare);

        $template = $viewShare['activeTemplate'];
        view()->composer([$template . 'partials.header', $template . 'partials.footer'], function ($view) use ($template) {
            $gen = Cache::get('pages_nav_ver', 0);
            $cacheKey = 'pages_nav_' . $gen . '_' . str_replace('.', '_', $template);
            $pages = Cache::remember($cacheKey, 3600, function () use ($template) {
                return Page::where('is_default', Status::NO)->where('tempname', $template)->orderBy('id', 'DESC')->get();
            });
            $view->with(['pages' => $pages]);
        });

        return $next($request);
    }
}
