<x-layout
    title="{{ $werk['title'] }} — kay hardam"
    description="{{ $werk['lede'] }}"
    path="/werk/{{ $werk['slug'] }}"
    type="article">
    <a href="/" class="font-mono text-[11px] tracking-wide font-semibold text-muted hover:text-fg">← terug</a>
    <article class="mt-12">
        <div class="font-mono text-xs text-muted font-bold mb-4">
            {{ $werk['date_formatted'] }} · {{ $werk['reading_time'] }} min lezen
        </div>
        <h1 class="text-[38px] md:text-[48px] font-extrabold tracking-[-0.03em] leading-tight mb-8">{{ $werk['title'] }}</h1>
        @if($werk['lede'])
        <p class="text-[19px] text-muted leading-[1.5] max-w-[640px] mb-10">{{ $werk['lede'] }}</p>
        @endif
        @if($werk['tool_url'] || $werk['code_url'])
        <div class="flex flex-wrap gap-3 mb-12 font-mono text-[11px] tracking-wide font-semibold">
            @if($werk['tool_url'])
            <a href="{{ $werk['tool_url'] }}" class="inline-flex items-center gap-2 border border-fg bg-fg text-bg px-4 py-3 hover:bg-bg hover:text-fg transition-colors">
                bekijk de tool <span aria-hidden="true">↗</span>
            </a>
            @endif
            @if($werk['code_url'])
            <a href="{{ $werk['code_url'] }}" class="inline-flex items-center gap-2 border border-fg text-fg px-4 py-3 hover:bg-fg hover:text-bg transition-colors">
                code op github <span aria-hidden="true">↗</span>
            </a>
            @endif
        </div>
        @endif
        <div class="note-body text-[17px] leading-[1.65] max-w-[640px]">
            {!! $werk['body'] !!}
        </div>
    </article>
</x-layout>