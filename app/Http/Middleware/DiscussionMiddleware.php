<?php

namespace App\Http\Middleware;

use App\Models\DiscussionVisit;
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
        if (auth()->user() && auth()->user()->hasVerifiedEmail() && $discussion) {
            DiscussionVisit::create([
                'user_id' => auth()->user()->id,
                'discussion_id' => $discussion->id,
                'meta' => [
                    'ip' => $request->ip(),
                    'browser' => $request->header('User-Agent')
                ]
            ]);
        }
        return $next($request);
    }
}
