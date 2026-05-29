<x-layout
    title="kay hardam — vakleerkracht sport, open-source tools voor lesgeven"
    description="Vakleerkracht sport. Ik bouw open-source tools voor lesgeven en schrijf over wat ik onderweg leer.">

    <x-nav />

    {{-- Hero --}}
    <h1 class="text-[64px] md:text-[88px] font-extrabold tracking-[-0.045em] leading-[0.9] mb-4">kay hardam</h1>
    <p class="text-[17px] leading-[1.5] max-w-[520px] mb-10 font-medium">
        Vakleerkracht sport. Ik bouw open-source tools voor lesgeven en schrijf over wat ik onderweg leer.
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
            Vakleerkracht sport in het VSO bij RENN4. In mijn lessen staat plezier centraal. Relatie, structuur en voorspelbaarheid zijn daarvoor de basis.
        </p>
        <p class="text-[15px] leading-[1.65] font-medium max-w-[560px]">
            Deze site is de andere helft. De apps zijn mijn eigen oefening in design en development met AI. Sport-tools — omdat dat is wat ik elke dag doe.
        </p>
    </section>

    {{-- 02 / tools --}}
    <section id="tools" class="mt-[60px] pt-[34px] border-t-2 border-fg">
        <span class="inline-block bg-accent font-mono text-[11px] font-bold tracking-wide px-2.5 py-1 mb-3.5">02 / tools</span>
        <h2 class="text-[38px] font-extrabold tracking-[-0.03em] leading-none mb-2">wat ik bouw</h2>
        <p class="text-sm leading-[1.55] text-muted font-medium max-w-[520px] mb-7">Kleine open-source apps. Gebouwd in het openbaar.</p>
        <article class="tool-card grid grid-cols-[64px_1fr] gap-5 py-5 items-start">
            <x-muybridge color="#3a7fbf" />
            <div>
                <h3 class="text-base font-extrabold tracking-[-0.01em] mb-2">
                    <a href="/tools/team-shuffler" class="hover:underline decoration-2 underline-offset-[3px]">team-shuffler</a>
                </h3>
                <div class="text-[15px] leading-[1.6] text-fg-soft font-medium max-w-[560px]">
                    Plak namen, kies aantal teams, klaar. Met optie om paren uit elkaar te houden — handig voor klassen waar bepaalde leerlingen even niet samen kunnen.
                </div>
            </div>
        </article>
        <article class="tool-card grid grid-cols-[64px_1fr] gap-5 py-5 items-start border-t border-divider">
            <x-muybridge color="#d44a2e" />
            <div>
                <h3 class="text-base font-extrabold tracking-[-0.01em] mb-2">
                    <a href="/tools/leerdoelen" class="hover:underline decoration-2 underline-offset-[3px]">leerdoel-coach</a>
                </h3>
                <div class="text-[15px] leading-[1.6] text-fg-soft font-medium max-w-[560px]">
                    Bouwt een leerdoel via de GIVC-structuur — gedrag, inhoud, voorwaarden, criteria. Coach, geen generator.
                </div>
            </div>
        </article>
    </section>

    {{-- 03 / werk --}}
    <section id="werk" class="mt-[60px] pt-[34px] border-t-2 border-fg">
        <span class="inline-block bg-accent font-mono text-[11px] font-bold tracking-wide px-2.5 py-1 mb-3.5">03 / werk</span>
        <h2 class="text-[38px] font-extrabold tracking-[-0.03em] leading-none mb-2">wat ik bouwde, en wat ik leerde</h2>
        <p class="text-sm leading-[1.55] text-muted font-medium max-w-[520px] mb-7">Cases over de beslissingen achter de tools — het werk vóór de code.</p>
        @forelse ($werk as $case)
        <article class="grid grid-cols-[64px_1fr] gap-5 py-5 items-start {{ !$loop->first ? 'border-t border-divider' : '' }}">
            <div class="font-mono text-[22px] font-extrabold tracking-[-0.02em] pt-1">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
            <div>
                <div class="font-mono text-[11px] font-semibold tracking-wide text-muted mb-1.5">case · {{ $case['reading_time'] }} min lezen</div>
                <h3 class="text-base font-extrabold tracking-[-0.01em] mb-2">
                    <a href="/werk/{{ $case['slug'] }}" class="hover:underline decoration-2 underline-offset-[3px]">{{ $case['title'] }}</a>
                </h3>
                <div class="text-[15px] leading-[1.6] text-fg-soft font-medium max-w-[560px]">
                    {{ $case['lede'] }}
                </div>
            </div>
        </article>
        @empty
        <p class="text-[15px] leading-[1.65] font-medium max-w-[560px]">
            Eerste case komt eraan.
        </p>
        @endforelse
    </section>
    {{-- 03 / field notes --}}

    <x-footer />

</x-layout>