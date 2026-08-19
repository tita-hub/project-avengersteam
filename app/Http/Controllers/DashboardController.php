<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Facades\Artisan;

class DashboardController extends Controller
{
    public function index()
    {
        $news = News::query()->latest('published_at')->latest('id')->take(6)->get();

        return view('dashboard', compact('news'));
    }

    public function newsIndex()
    {
        $news = News::query()->latest('published_at')->latest('id')->paginate(6);
        return view('news.index', compact('news'));
    }

    public function newsShow(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function sync()
    {
        Artisan::call('news:sync', ['--limit' => 12]);
        return back()->with('success', 'Berita berhasil diperbarui dari Newsmaker.id.');
    }
}
