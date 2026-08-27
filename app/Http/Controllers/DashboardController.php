<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $latestNews = News::query()
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->take(3)
            ->get();

        $tickerNews = News::query()
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->take(10)
            ->get();

        return view('dashboard.index', [
            'user' => $user,
            'latestNews' => $latestNews,
            'tickerNews' => $tickerNews,
        ]);
    }
}