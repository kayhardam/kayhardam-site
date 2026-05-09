<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kay hardam — open-source tools voor bewegingsonderwijs</title>
    <meta name="description" content="Open-source tools voor bewegingsonderwijs, gebouwd door een docent die ze zelf gebruikt.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Canonical URL --}}
    <link rel="canonical" href="https://kayhardam.dev/">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://kayhardam.dev/">
    <meta property="og:title" content="kay hardam — open-source tools voor bewegingsonderwijs">
    <meta property="og:description" content="Open-source tools voor bewegingsonderwijs, gebouwd door een docent die ze zelf gebruikt.">
    <meta property="og:image" content="https://kayhardam.dev/og-image.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="nl_NL">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="kay hardam — open-source tools voor bewegingsonderwijs">
    <meta name="twitter:description" content="Open-source tools voor bewegingsonderwijs, gebouwd door een docent die ze zelf gebruikt.">
    <meta name="twitter:image" content="https://kayhardam.dev/og-image.png">
</head>
<body>
    <div class="max-w-3xl mx-auto px-6 md:px-10 py-10 md:py-12">

        {{-- Top nav --}}
        <nav class="flex justify-between items-center mb-12 font-mono text-[11px] tracking-wide font-semibold">
            <span>kayhardam.dev</span>
            <div class="space-x-4 text-muted font-medium">
                <a href="#about">over</a>
                <a href="#tools">tools</a>
                <a href="#notes">notes</a>
            </div>
        </nav>

        {{-- Hero --}}
        <h1 class="text-[64px] md:text-[88px] font-extrabold tracking-[-0.045em] leading-[0.9] mb-4">kay hardam</h1>
        <p class="text-[17px] leading-[1.5] max-w-[520px] mb-10 font-medium">
            Open-source tools voor bewegingsonderwijs, gebouwd door een docent die ze zelf gebruikt.
        </p>

        {{-- Live demo lab --}}
        <div class="bg-fg text-bg p-7 max-w-[520px]">
            <div class="font-mono text-[11px] text-accent tracking-wide font-semibold mb-4">// live demo · prompt-generator</div>
            <div id="prompt-output" class="text-[24px] font-bold leading-[1.25] tracking-[-0.015em] mb-6">
                Klik de knop voor een random bewegingsprompt voor je les.
            </div>
            <button id="prompt-button"
                type="button"
                class="bg-accent text-fg px-[22px] py-3 text-sm font-bold tracking-tight cursor-pointer transition-colors hover:bg-accent-hover">
                geef me een prompt →
            </button>
            <div class="font-mono text-[11px] text-muted-light tracking-wide mt-[18px]">
                een klein voorbeeld van wat ik bouw. de echte tools staan hieronder.
            </div>
        </div>

        {{-- 01 / over --}}
        <section id="about" class="mt-[60px] pt-[34px] border-t-2 border-fg">
            <span class="inline-block bg-accent font-mono text-[11px] font-bold tracking-wide px-2.5 py-1 mb-3.5">01 / over</span>
            <h2 class="text-[38px] font-extrabold tracking-[-0.03em] leading-none mb-2">de docent achter de tools</h2>
            <p class="text-sm leading-[1.55] text-muted font-medium max-w-[520px] mb-7">Waarom deze site bestaat — en voor wie.</p>
            <p class="text-[15px] leading-[1.65] font-medium max-w-[560px] mb-3.5">
                Vakleerkracht sport in het voortgezet speciaal onderwijs. Ik werk dagelijks met jongeren met complexe gedragsvragen, momenteel bij RENN4. 
                <!-- Mijn werk gaat over één ding: een veilige, voorspelbare plek waar sport iets in gang kan zetten. -->
            </p>
            <p class="text-[15px] leading-[1.65] font-medium max-w-[560px]">
                Deze site is de andere helft. De apps zijn mijn eigen oefening in design en development met AI. Sport-tools zijn de logische keuze — daar liggen mijn pijnpunten. 
                <!-- Of ik wil er niet voor betalen, of het bestaande is niet goed genoeg. -->
            </p>
        </section>

        {{-- 02 / tools --}}
        <section id="tools" class="mt-[60px] pt-[34px] border-t-2 border-fg">
            <span class="inline-block bg-accent font-mono text-[11px] font-bold tracking-wide px-2.5 py-1 mb-3.5">02 / tools</span>
            <h2 class="text-[38px] font-extrabold tracking-[-0.03em] leading-none mb-2">wat ik bouw</h2>
            <p class="text-sm leading-[1.55] text-muted font-medium max-w-[520px] mb-7">Kleine open-source apps. Gebouwd in het openbaar, gebruikt in mijn eigen lessen.</p>
            <p class="text-[15px] leading-[1.65] font-medium max-w-[560px]">
                Eerste apps zijn in aanbouw. Verschijnen hier als ze werken — volg ze ondertussen op <a href="https://github.com/kayhardam" class="font-bold underline decoration-2 underline-offset-[3px]">github</a>.
            </p>
        </section>

        {{-- 03 / field notes --}}
        <section id="notes" class="mt-[60px] pt-[34px] border-t-2 border-fg">
            <span class="inline-block bg-accent font-mono text-[11px] font-bold tracking-wide px-2.5 py-1 mb-3.5">03 / field notes</span>
            <h2 class="text-[38px] font-extrabold tracking-[-0.03em] leading-none mb-2">field notes</h2>
            <p class="text-sm leading-[1.55] text-muted font-medium max-w-[520px] mb-7">Korte stukken vanuit lesgeven en bouwen. Geplaatst als er iets te zeggen is.</p>
            <p class="text-[15px] leading-[1.65] font-medium max-w-[560px]">
                Nog niks gepubliceerd. De eerste komt eraan.
            </p>
        </section>

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