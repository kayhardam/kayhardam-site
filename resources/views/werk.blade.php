<x-layout
    title="{{ $case['title'] }} — kay hardam"
    description="{{ $case['lede'] }}"
    path="/werk/{{ $case['slug'] }}"
    type="article">
    <a href="/" class="font-mono text-[11px] tracking-wide font-semibold text-muted hover:text-fg">← terug</a>
    <article class="mt-12">
        <div class="font-mono text-xs text-muted font-bold mb-4">{{ $case['date_formatted'] }} · {{ $case['reading_time'] }} min lezen</div>
        <h1 class="text-[38px] md:text-[48px] font-extrabold tracking-[-0.03em] leading-tight mb-6">{{ $case['title'] }}</h1>
        <p class="text-[20px] leading-[1.5] text-muted max-w-[640px] mb-8">{{ $case['lede'] }}</p>

        @if (!empty($case['tags']))
        <ul class="flex flex-wrap gap-2 mb-12 font-mono text-[11px] tracking-wide">
            @foreach ($case['tags'] as $tag)
            <li class="px-2 py-1 border border-divider lowercase">{{ $tag }}</li>
            @endforeach
        </ul>
        @endif

        <div class="note-body text-[17px] leading-[1.65] max-w-[640px]">
            {!! $case['body'] !!}
        </div>

        @if ($case['tool_url'] || $case['code_url'])
        <footer class="mt-16 pt-8 border-t border-divider max-w-[640px] font-mono text-xs">
            <ul class="flex flex-wrap gap-x-6 gap-y-2">
                @if ($case['tool_url'])
                <li><a href="{{ $case['tool_url'] }}" class="text-muted hover:text-fg">probeer de tool →</a></li>
                @endif
                @if ($case['code_url'])
                <li><a href="{{ $case['code_url'] }}" class="text-muted hover:text-fg">code op github →</a></li>
                @endif
            </ul>
        </footer>
        @endif
    </article>
</x-layout>