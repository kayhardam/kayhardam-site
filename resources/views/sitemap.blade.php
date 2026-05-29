<?= '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>https://kayhardam.dev/</loc>
        <lastmod>{{ now()->toDateString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>https://kayhardam.dev/tools/team-shuffler</loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>https://kayhardam.dev/tools/leerdoelen</loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    @foreach ($werk as $case)
    <url>
        <loc>https://kayhardam.dev/werk/{{ $case['slug'] }}</loc>
        <lastmod>{{ $case['date'] }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach
</urlset>