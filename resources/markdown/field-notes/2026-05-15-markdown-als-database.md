# Markdown als database

Field notes op deze site liggen niet in een database. Ze liggen als Markdown-bestanden in een map. De Laravel-reflex was `make:model FieldNote -m` — tabel, migration, formulier. Voor één type content met één auteur is dat overkill.

Een note is één bestand: `2026-05-09-van-nul-tot-live.md` in `resources/markdown/field-notes/`. De eerste 10 karakters zijn de datum, de rest is de slug. De eerste regel is de titel, daarna een lege regel, dan de body in Markdown. Geen YAML-frontmatter, geen `---` blok — de bestandsnaam _is_ de metadata.

De parse-logica is een class van zo'n 30 regels:

```php
private static function parse($file): array
{
    $content = file_get_contents($file->getPathname());
    [$title, $body] = array_pad(explode("\n\n", $content, 2), 2, '');
    $filename = $file->getFilenameWithoutExtension();

    return [
        'date' => substr($filename, 0, 10),
        'slug' => substr($filename, 11),
        'title' => ltrim($title, '# '),
        'body' => Str::markdown(trim($body)),
    ];
}
```

Geen Eloquent, geen migrations, geen seeders. Een nieuwe note publiceren is een .md plaatsen en deployen.

Dit werkt zolang ik de enige auteur ben en geen tags of full-text search nodig heb. Zodra dat verandert, komt er een tabel. Tot dan: een map met bestanden.
