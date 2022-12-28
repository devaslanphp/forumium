<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DiscussionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $discussion = request()->route('discussion');
        if ($discussion && !$discussion->is_public && (!auth()->user() || !auth()->user()->hasVerifiedEmail())) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
