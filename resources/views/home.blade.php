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
            Vakleerkracht sport in het voortgezet speciaal onderwijs. Ik werk dagelijks met jongeren met complexe gedragsvragen bij RENN4. Mijn werk gaat over één ding: een veilige, voorspelbare plek waar sport iets in gang kan zetten.
        </p>
        <p class="text-[15px] leading-[1.65] font-medium max-w-[560px]">
            Deze site is de andere helft. De apps zijn mijn eigen oefening in design en development met AI. Sport-tools — omdat sport mijn vak is.
        </p>
    </section>

    {{-- 02 / tools --}}
    <section id="tools" class="mt-[60px] pt-[34px] border-t-2 border-fg">
        <span class="inline-block bg-accent font-mono text-[11px] font-bold tracking-wide px-2.5 py-1 mb-3.5">02 / tools</span>
        <h2 class="text-[38px] font-extrabold tracking-[-0.03em] leading-none mb-2">wat ik bouw</h2>
        <p class="text-sm leading-[1.55] text-muted font-medium max-w-[520px] mb-7">Kleine open-source apps. Gebouwd in het openbaar.</p>
        <article class="grid grid-cols-[64px_1fr] gap-5 py-5 items-start">
            <div class="font-mono text-xs text-muted font-bold pt-1">01</div>
            <div>
                <h3 class="text-base font-extrabold tracking-[-0.01em] mb-2">
                    <a href="/tools/team-shuffler" class="hover:underline decoration-2 underline-offset-[3px]">team-shuffler</a>
                </h3>
                <div class="text-[15px] leading-[1.6] text-fg-soft font-medium max-w-[560px]">
                    Plak namen, kies aantal teams, klaar. Met optie om paren uit elkaar te houden — handig voor klassen waar bepaalde leerlingen even niet samen kunnen.
                </div>
            </div>
        </article>
    </section>

    {{-- 03 / field notes --}}
    <section id="notes" class="mt-[60px] pt-[34px] border-t-2 border-fg">
        <span class="inline-block bg-accent font-mono text-[11px] font-bold tracking-wide px-2.5 py-1 mb-3.5">03 / field notes</span>
        <h2 class="text-[38px] font-extrabold tracking-[-0.03em] leading-none mb-2">field notes</h2>
        <p class="text-sm leading-[1.55] text-muted font-medium max-w-[520px] mb-7">Korte stukken vanuit lesgeven en bouwen. Geplaatst als er iets te zeggen is.</p>
        @forelse ($notes as $note)
        <article class="grid grid-cols-[64px_1fr] gap-5 py-5 items-start {{ !$loop->first ? 'border-t border-divider' : '' }}">
            <div class="font-mono text-xs text-muted font-bold pt-1">{{ substr($note['date'], 0, 4) }}</div>
            <div>
                <h3 class="text-base font-extrabold tracking-[-0.01em] mb-2">
                    <a href="/notes/{{ $note['slug'] }}" class="hover:underline decoration-2 underline-offset-[3px]">{{ $note['title'] }}</a>
                </h3>
                <div class="text-[15px] leading-[1.6] text-fg-soft font-medium max-w-[560px]">
                    {!! $note['excerpt'] !!}
                </div>
            </div>
        </article>
        @empty
        <p class="text-[15px] leading-[1.65] font-medium max-w-[560px]">
            Nog niks gepubliceerd. De eerste komt eraan.
        </p>
        @endforelse
    </section>

    <x-footer />

</x-layout>