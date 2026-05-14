<x-layout
    title="leerdoelen-generator — kay hardam"
    description="Genereer drie leerdoelen (motorisch, sociaal-affectief, cognitief) op basis van een activiteit en doelgroep. Open-source tool voor ALO-studenten."
    path="/tools/leerdoelen">

    <x-nav />

    {{-- Back to tools --}}
    <a href="/#tools" class="font-mono text-[11px] tracking-wide font-semibold text-muted hover:text-fg mb-6 inline-block">← tools</a>

    {{-- Tool header --}}
    <span class="inline-block bg-accent font-mono text-[11px] font-bold tracking-wide px-2.5 py-1 mb-3.5">tool / leerdoelen</span>
    <h1 class="text-[48px] md:text-[64px] font-extrabold tracking-[-0.045em] leading-[0.9] mb-4">leerdoelen-generator</h1>
    <p class="text-[17px] leading-[1.5] max-w-[520px] mb-10 font-medium">
        Drie leerdoelen op basis van een activiteit en doelgroep. Springplank, geen eindproduct.
    </p>

    {{-- Tool UI --}}
    <form method="POST" action="{{ route('tools.leerdoelen.generate') }}" class="space-y-7">
        @csrf

        {{-- activiteit & doelgroep --}}
        <div>
            <label for="activiteit-input" class="block font-mono text-[11px] tracking-wide font-semibold mb-2">
                activiteit & context
            </label>
            <p class="text-[14px] leading-[1.5] text-muted font-medium mb-2.5 max-w-[520px]">
                Beschrijf kort wat je gaat doen en met welke groep. <strong class="font-semibold">Geen leerlingnamen</strong> — gebruik "een leerling die..." of "de groep".
            </p>
            <textarea
                id="activiteit-input"
                name="activiteit"
                rows="4"
                placeholder="bijvoorbeeld: estafette in 4 teams, 45 minuten gymzaal"
                class="w-full border-2 border-fg p-4 text-[15px] font-medium font-sans bg-bg"
                required>{{ old('activiteit') }}</textarea>
        </div>

        {{-- niveau --}}
        <div>
            <label class="block font-mono text-[11px] tracking-wide font-semibold mb-2">
                niveau
            </label>
            <div class="flex gap-2 flex-wrap">
                @foreach (['PO', 'VO', 'VSO'] as $niveau)
                <label class="cursor-pointer">
                    <input
                        type="radio"
                        name="niveau"
                        value="{{ $niveau }}"
                        class="sr-only peer"
                        {{ old('niveau', 'PO') === $niveau ? 'checked' : '' }}>
                    <span class="inline-block border-2 border-fg px-5 py-2.5 text-[14px] font-medium peer-checked:bg-fg peer-checked:text-bg transition-colors">
                        {{ $niveau }}
                    </span>
                </label>
                @endforeach
            </div>
        </div>

        {{-- submit --}}
        <button
            type="submit"
            class="bg-accent text-fg px-[22px] py-3 text-sm font-bold tracking-tight cursor-pointer transition-colors hover:bg-accent-hover">
            genereer leerdoelen →
        </button>
    </form>

    {{-- output placeholder (gevuld in volgende stap) --}}

    <x-footer />

</x-layout>