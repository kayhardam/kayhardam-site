<?php

namespace App\Support;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;

class FieldNotes
{
    public static function all(): Collection
    {
        $directory = resource_path('markdown/field-notes');

        if (!File::isDirectory($directory)) {
            return collect();
        }

        return collect(File::files($directory))
            ->map(fn($file) => self::parse($file))
            ->sortByDesc('date')
            ->values();
    }

    public static function find(string $slug): ?array
    {
        return self::all()->firstWhere('slug', $slug);
    }

    private static function parse(SplFileInfo $file): array
    {
        $content = file_get_contents($file->getPathname());
        [$title, $body] = array_pad(explode("\n\n", $content, 2), 2, '');
        $filename = $file->getFilenameWithoutExtension();
        $bodyTrimmed = trim($body);
        $firstParagraph = explode("\n\n", $bodyTrimmed, 2)[0];

        return [
            'date' => substr($filename, 0, 10),
            'date_formatted' => Carbon::parse(substr($filename, 0, 10))
                ->locale('nl')
                ->isoFormat('D MMMM YYYY'),
            'slug' => substr($filename, 11),
            'title' => ltrim($title, '# '),
            'description' => Str::limit($firstParagraph, 160),
            'excerpt' => MarkdownParser::toHtml($firstParagraph),
            'body' => MarkdownParser::toHtml($bodyTrimmed),
        ];
    }
}
