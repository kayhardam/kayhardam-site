<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kay hardam — vakleerkracht sport, indie tools</title>
    <meta name="description" content="VSO sport-tools en lesgeef-experimenten, gebouwd vanuit RENN4 met Laravel en AI.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <main class="min-h-screen max-w-7xl mx-auto px-6 md:px-12 lg:px-16 py-24 md:py-32">

        <p class="mono-label">wat is dit</p>

        <h1 class="display mt-8 text-[4rem] md:text-[6rem] lg:text-display-xl">
            kay hardam
        </h1>

        <p class="mt-12 max-w-2xl text-xl leading-relaxed">
            vakleerkracht sport in het nederlandse VSO. bouw open-source sport- en lesgeef-tools, leer laravel from scratch, documenteer wat ik onderweg leer.
        </p>

        <section class="mt-20 max-w-2xl border-2 border-fg p-8 md:p-12">
           <p class="mono-label">live demo / sport-prompt generator</p>
           
            <p id="prompt-output" class="mt-6 font-mono text-xl md:text-2xl leading-snug text-muted">
                klik op de knop om een prompt te genereren.
            </p>

            <button
                id="prompt-button"
                type="button"
                class="mt-8 inline-flex items-center gap-2 bg-accent border-2 border-fg px-6 py-3 font-medium transition-colors hover:bg-fg hover:text-accent"
            >
                genereer een prompt →
            </button>

            <p class="mt-8 text-sm text-muted">
                deze prompts komen uit een vaste pool. de echte tools krijgen straks slimmere logica.
            </p>
        </section>

    </main>
</body>
</html>