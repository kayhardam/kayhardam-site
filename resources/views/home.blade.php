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

    <x-footer />

</x-layout>