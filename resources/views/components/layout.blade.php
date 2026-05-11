@props([
'title' => 'kay hardam',
'description' => 'Vakleerkracht sport. Ik bouw open-source tools voor lesgeven en schrijf over wat ik onderweg leer.',
'path' => '/',
'type' => 'website',
])

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="canonical" href="https://kayhardam.dev{{ $path }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="{{ $type }}">
    <meta property="og:url" content="https://kayhardam.dev{{ $path }}">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:image" content="https://kayhardam.dev/og-image.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="nl_NL">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title }}">
    <meta name="twitter:description" content="{{ $description }}">
    <meta name="twitter:image" content="https://kayhardam.dev/og-image.png">
</head>

<body>
    <div class="max-w-3xl mx-auto px-6 md:px-10 py-10 md:py-12">
        {{ $slot }}
    </div>
</body>

</html>