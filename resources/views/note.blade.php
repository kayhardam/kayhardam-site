<x-layout
    title="{{ $note['title'] }} — kay hardam"
    description="{{ $note['description'] }}"
    path="/notes/{{ $note['slug'] }}"
    type="article">

    <a href="/" class="font-mono text-[11px] tracking-wide font-semibold text-muted hover:text-fg">← terug</a>

    <article class="mt-12">
        <div class="font-mono text-xs text-muted font-bold mb-4">{{ $note['date'] }}</div>
        <h1 class="text-[38px] md:text-[48px] font-extrabold tracking-[-0.03em] leading-tight mb-8">{{ $note['title'] }}</h1>
        <div class="note-body text-[17px] leading-[1.65] max-w-[640px]">
            {!! $note['body'] !!}
        </div>
    </article>

</x-layout>