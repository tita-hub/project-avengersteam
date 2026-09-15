<?php

namespace App\Http\Controllers;

use App\Models\News;

class DashboardController extends Controller
{
    public function index()
    {
        $latestNews = News::query()
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->take(6)
            ->get();

        $tickerNews = News::query()
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->take(10)
            ->get();

        return view('dashboard.index', [
            'latestNews' => $latestNews,
            'tickerNews' => $tickerNews,
        ]);
    }
}