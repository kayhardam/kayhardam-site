<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title>kay hardam — field notes</title>
        <link>{{ config('app.url') }}</link>
        <atom:link href="{{ config('app.url') }}/feed.xml" rel="self" type="application/rss+xml" />
        <description>Korte stukken vanuit lesgeven en bouwen.</description>
        <language>nl-NL</language>
        <lastBuildDate>{{ now()->toRfc822String() }}</lastBuildDate>
        @foreach($notes as $note)
        <item>
            <title>{{ $note['title'] }}</title>
            <link>{{ config('app.url') }}/notes/{{ $note['slug'] }}</link>
            <guid>{{ config('app.url') }}/notes/{{ $note['slug'] }}</guid>
            <pubDate>{{ \Illuminate\Support\Carbon::parse($note['date'])->toRfc822String() }}</pubDate>
            <description>
                <![CDATA[{!! $note['excerpt'] !!}]]>
            </description>
        </item>
        @endforeach
    </channel>
</rss>