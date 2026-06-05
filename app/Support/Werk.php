<?php

namespace App\Support;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Yaml\Yaml;

/**
 * @phpstan-type WerkItem array{
 *     date: string,
 *     date_formatted: string,
 *     slug: string,
 *     title: string,
 *     lede: string,
 *     tags: list<string>,
 *     tool_url: string|null,
 *     code_url: string|null,
 *     reading_time: int,
 *     body: string,
 * }
 */
class Werk
{
    /**
     * @return Collection<int, WerkItem>
     */
    public static function all(): Collection
    {
        $directory = resource_path('markdown/werk');

        if (! File::isDirectory($directory)) {
            return collect();
        }

        // Larastan false positive op Collection-value via map() — larastan/larastan#2137
        // @phpstan-ignore return.type
        return collect(File::files($directory))
            ->map(fn ($file) => self::parse($file))
            ->sortByDesc('date')
            ->values();
    }

    /**
     * @return WerkItem|null
     */
    public static function find(string $slug): ?array
    {
        return self::all()->firstWhere('slug', $slug);
    }

    /**
     * @return WerkItem
     */
    private static function parse(SplFileInfo $file): array
    {
        $content = file_get_contents($file->getPathname());
        [$frontmatter, $markdown] = self::splitFrontmatter($content);

        $filename = $file->getFilenameWithoutExtension();
        $markdownTrimmed = trim($markdown);
        [$title, $body] = array_pad(explode("\n\n", $markdownTrimmed, 2), 2, '');

        return [
            'date' => substr($filename, 0, 10),
            'date_formatted' => Carbon::parse(substr($filename, 0, 10))
                ->locale('nl')
                ->isoFormat('D MMMM YYYY'),
            'slug' => substr($filename, 11),
            'title' => ltrim($title, '# '),
            'lede' => $frontmatter['lede'] ?? '',
            'tags' => $frontmatter['tags'] ?? [],
            'tool_url' => $frontmatter['tool_url'] ?? null,
            'code_url' => $frontmatter['code_url'] ?? null,
            'reading_time' => self::readingTime($markdownTrimmed),
            'body' => MarkdownParser::toHtml(trim($body)),
        ];
    }

    /**
     * @return array{array<string, mixed>, string}
     */
    private static function splitFrontmatter(string $content): array
    {
        if (! str_starts_with($content, "---\n")) {
            return [[], $content];
        }

        $end = strpos($content, "\n---\n", 4);

        if ($end === false) {
            return [[], $content];
        }

        $yaml = substr($content, 4, $end - 4);
        $body = substr($content, $end + 5);

        return [Yaml::parse($yaml) ?? [], $body];
    }

    private static function readingTime(string $markdown): int
    {
        $words = str_word_count(strip_tags($markdown));

        return max(1, (int) ceil($words / 200));
    }
}
