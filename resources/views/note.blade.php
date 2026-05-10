<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <title>{{ $note['title'] }} — kay hardam</title>
    <meta name="description" content="{{ $note['description'] }}">

    <link rel="canonical" href="https://kayhardam.dev/notes/{{ $note['slug'] }}">

    <meta property="og:type" content="article">
    <meta property="og:url" content="https://kayhardam.dev/notes/{{ $note['slug'] }}">
    <meta property="og:title" content="{{ $note['title'] }} — kay hardam">
    <meta property="og:description" content="{{ $note['description'] }}">
    <meta property="og:image" content="https://kayhardam.dev/og-image.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="nl_NL">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $note['title'] }} — kay hardam">
    <meta name="twitter:description" content="{{ $note['description'] }}">
    <meta name="twitter:image" content="https://kayhardam.dev/og-image.png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="max-w-3xl mx-auto px-6 md:px-10 py-10 md:py-12">

        <a href="/" class="font-mono text-[11px] tracking-wide font-semibold text-muted hover:text-fg">← terug</a>

        <article class="mt-12">
            <div class="font-mono text-xs text-muted font-bold mb-4">{{ $note['date'] }}</div>
            <h1 class="text-[38px] md:text-[48px] font-extrabold tracking-[-0.03em] leading-tight mb-8">{{ $note['title'] }}</h1>
            <div class="note-body text-[17px] leading-[1.65] max-w-[640px]">
                {!! $note['body'] !!}
            </div>
        </article>

    </div>
</body>
</html>