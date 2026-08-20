<?php

return [
    'base_url' => env('NEWSMAKER_BASE_URL', ''),
    'more_news_url' => env('NEWSMAKER_MORE_URL', env('NEWSMAKER_BASE_URL', '')),
    'sync_interval_minutes' => env('NEWSMAKER_SYNC_MINUTES', 15),
    'max_articles' => env('NEWSMAKER_MAX_ARTICLES', 60),
    'dashboard_preview_count' => 3,
    'per_page' => 9,

    'selectors' => [
        'article_card'   => env('NEWSMAKER_SEL_CARD', 'article'),
        'title'          => env('NEWSMAKER_SEL_TITLE', 'h2 a'),
        'link'           => env('NEWSMAKER_SEL_LINK', 'h2 a'),
        'image'          => env('NEWSMAKER_SEL_IMAGE', 'img'),
        'excerpt'        => env('NEWSMAKER_SEL_EXCERPT', 'p'),
        'date'           => env('NEWSMAKER_SEL_DATE', 'time'),
    ],
];