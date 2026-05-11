<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <title>team-shuffler — kay hardam</title>
    <meta name="description" content="Maak willekeurige teams. Plak namen, kies aantal teams, klaar. Open-source tool voor bewegingsonderwijs.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="canonical" href="https://kayhardam.dev/tools/team-shuffler">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://kayhardam.dev/tools/team-shuffler">
    <meta property="og:title" content="team-shuffler — kay hardam">
    <meta property="og:description" content="Maak willekeurige teams. Plak namen, kies aantal teams, klaar.">
    <meta property="og:image" content="https://kayhardam.dev/og-image.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="nl_NL">
</head>

<body>
    <div class="max-w-3xl mx-auto px-6 md:px-10 py-10 md:py-12">

        {{-- Top nav --}}
        <nav class="flex justify-between items-center mb-12 font-mono text-[11px] tracking-wide font-semibold">
            <a href="/">kayhardam.dev</a>
            <div class="space-x-4 text-muted font-medium">
                <a href="/#about">over</a>
                <a href="/#tools">tools</a>
                <a href="/#notes">notes</a>
            </div>
        </nav>

        {{-- Back to tools --}}
        <a href="/#tools" class="font-mono text-[11px] tracking-wide font-semibold text-muted hover:text-fg mb-6 inline-block">← tools</a>

        {{-- Tool header --}}
        <span class="inline-block bg-accent font-mono text-[11px] font-bold tracking-wide px-2.5 py-1 mb-3.5">tool / team-shuffler</span>
        <h1 class="text-[48px] md:text-[64px] font-extrabold tracking-[-0.045em] leading-[0.9] mb-4">team-shuffler</h1>
        <p class="text-[17px] leading-[1.5] max-w-[520px] mb-10 font-medium">
            Plak namen, kies aantal teams. Klaar.
        </p>

        {{-- Tool UI placeholder --}}
        <div class="bg-fg text-bg p-7">
            <div class="font-mono text-[11px] text-accent tracking-wide font-semibold mb-4">// in aanbouw</div>
            <div class="text-[18px] font-bold leading-[1.4]">
                De interface komt in de volgende commit.
            </div>
        </div>

        {{-- Footer --}}
        <footer class="mt-[60px] pt-[22px] border-t-2 border-fg flex justify-between items-center font-mono text-[11px] text-muted font-bold">
            <span>kayhardam.dev · 2026</span>
            <span>
                <a href="https://github.com/kayhardam" class="text-fg underline decoration-1 underline-offset-2">github</a>
                ·
                <a href="mailto:hardamkay@gmail.com" class="text-fg underline decoration-1 underline-offset-2">mail</a>
            </span>
        </footer>

    </div>
</body>

</html>