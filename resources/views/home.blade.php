<x-layout
    title="kay hardam — vakleerkracht sport, open-source tools voor lesgeven"
    description="Vakleerkracht sport die open-source tools bouwt voor het onderwijs. Cases over de keuzes achter de code.">

    <x-nav />

    {{-- hero --}}
    <section class="pb-20">
        <div class="font-mono text-[11px] text-accent tracking-[0.18em] mb-8">/ 00 · kay hardam</div>
        <h1 class="text-[68px] md:text-[120px] font-extrabold tracking-[-0.05em] leading-[0.82] mb-8">kay<br>hardam<span class="text-accent">.</span></h1>
        <p class="text-[18px] md:text-[20px] leading-[1.5] font-medium max-w-[560px] mb-7">
            Vakleerkracht sport. Ik bouw open-source tools voor het onderwijs en schrijf de keuzes erachter op.
        </p>
        <div class="font-mono text-[11px] text-muted tracking-wide">geen tracking, geen onzin</div>
    </section>

    {{-- uitgelichte case --}}
    @if ($featured)
    <div class="tool-card bg-card text-fg rounded-2xl border border-divider p-7 max-w-[560px]">
        <x-muybridge color="var(--color-accent)" />
        <div class="font-mono text-[11px] text-accent tracking-wide font-semibold mt-4 mb-4">// uitgelicht · case study</div>
        <h3 class="text-[30px] font-extrabold tracking-[-0.025em] leading-[1.05] mb-3">{{ $featured['title'] }}</h3>
        <p class="text-[15px] leading-[1.55] text-muted mb-5">{{ $featured['lede'] }}</p>
        <div class="flex flex-wrap gap-2.5 mb-4">
            <a href="/werk/{{ $featured['slug'] }}" class="bg-accent text-bg rounded-lg px-[18px] py-[11px] font-mono text-[11px] font-bold tracking-wide hover:bg-accent-hover transition-colors">lees de case →</a>
            @if ($featured['tool_url'])
            <a href="{{ $featured['tool_url'] }}" class="border border-divider text-fg rounded-lg px-[17px] py-[10px] font-mono text-[11px] font-bold tracking-wide hover:border-accent hover:text-accent transition-colors">probeer de tool ↗</a>
            @endif
        </div>
        <div class="font-mono text-[11px] text-muted tracking-wide">
            case · {{ $featured['reading_time'] }} min lezen · live
        </div>
    </div>
    @endif

    {{-- 01 / over --}}
    <section id="about" class="mt-24 md:mt-32">
        <div class="font-mono text-[11px] text-accent tracking-[0.18em] mb-6">/ 01 · over</div>
        <h2 class="text-[40px] md:text-[56px] font-extrabold tracking-[-0.04em] leading-[0.95] mb-8 max-w-[640px]">de docent achter de tools</h2>
        <div class="max-w-[600px] space-y-4 text-[16px] md:text-[17px] leading-[1.7] font-medium">
            <p>ik geef lichamelijke opvoeding. Dat is mijn vak. Daarnaast leer ik bouwen — nu Laravel, vanaf nul, AI helpt.</p>
            <p>Waar dat precies naartoe gaat weet ik niet, en dat hoeft ook niet. Deze site is waar ik het uitzoek: kleine tools voor mijn eigen vak. Wat werkt blijft staan — met de keuzes erachter.</p>
        </div>
    </section>

    {{-- 02 / tools --}}
    <section id="tools" class="mt-24 md:mt-32">
        <div class="font-mono text-[11px] text-accent tracking-[0.18em] mb-6">/ 02 · tools</div>
        <h2 class="text-[40px] md:text-[56px] font-extrabold tracking-[-0.04em] leading-[0.95] mb-8 max-w-[640px]">wat ik bouw</h2>
        <div class="grid md:grid-cols-2 gap-5">
            <a href="/tools/team-shuffler" class="tool-card group block bg-card rounded-2xl border border-divider p-6 hover:border-accent transition-colors">
                <x-muybridge color="#3a7fbf" />
                <h3 class="text-lg font-extrabold tracking-[-0.01em] mt-4 mb-2 group-hover:text-accent transition-colors">team-shuffler</h3>
                <p class="text-[15px] leading-[1.6] text-muted">Plak namen, kies aantal teams, klaar. Met optie om paren uit elkaar te houden — handig voor klassen waar bepaalde leerlingen even niet samen kunnen.</p>
            </a>
            <a href="/tools/leerdoelen" class="tool-card group block bg-card rounded-2xl border border-divider p-6 hover:border-accent transition-colors">
                <x-muybridge color="#d44a2e" />
                <h3 class="text-lg font-extrabold tracking-[-0.01em] mt-4 mb-2 group-hover:text-accent transition-colors">leerdoel-coach</h3>
                <p class="text-[15px] leading-[1.6] text-muted">Bouwt een leerdoel via de GIVC-structuur — gedrag, inhoud, voorwaarden, criteria. Coach, geen generator.</p>
            </a>
        </div>
    </section>

    {{-- 03 / werk --}}
    <section id="werk" class="mt-24 md:mt-32">
        <div class="font-mono text-[11px] text-accent tracking-[0.18em] mb-6">/ 03 · werk</div>
        <h2 class="text-[40px] md:text-[56px] font-extrabold tracking-[-0.04em] leading-[0.95] mb-8 max-w-[640px]">wat ik bouwde, en wat ik leerde</h2>
        <div class="space-y-4">
            @forelse ($werk as $case)
            <a href="/werk/{{ $case['slug'] }}" class="group block bg-card rounded-2xl border border-divider p-6 hover:border-accent transition-colors">
                <div class="font-mono text-[11px] font-semibold tracking-wide text-muted mb-2">case · {{ $case['reading_time'] }} min lezen</div>
                <h3 class="text-lg font-extrabold tracking-[-0.01em] mb-2 group-hover:text-accent transition-colors">{{ $case['title'] }}</h3>
                <p class="text-[15px] leading-[1.6] text-muted">{{ $case['lede'] }}</p>
            </a>
            @empty
            <p class="text-[15px] leading-[1.65] font-medium text-muted">Eerste case komt eraan.</p>
            @endforelse
        </div>
    </section>

    <x-footer />

</x-layout>