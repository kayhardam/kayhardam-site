<?php

namespace App\Support;

use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\MarkdownConverter;
use Tempest\Highlight\CommonMark\HighlightExtension;
use Tempest\Highlight\Highlighter;
use Tempest\Highlight\Themes\CssTheme;

class MarkdownParser
{
    private static ?MarkdownConverter $converter = null;

    public static function toHtml(string $markdown): string
    {
        $html = self::converter()->convert($markdown)->getContent();

        return self::hoistImageCaptions($html);
    }

    private static function hoistImageCaptions(string $html): string
    {
        return preg_replace_callback(
            '/<p><img([^>]*?)\s+title="([^"]*)"([^>]*?)><\/p>/',
            fn ($m) => '<figure><img'.rtrim($m[1].$m[3]).'><figcaption>'.$m[2].'</figcaption></figure>',
            $html,
        );
    }

    private static function converter(): MarkdownConverter
    {
        if (self::$converter === null) {
            $environment = new Environment([
                'heading_permalink' => [
                    'min_heading_level' => 2,
                    'max_heading_level' => 4,
                    'insert' => 'after',
                    'symbol' => '#',
                    'html_class' => 'anchor',
                    'id_prefix' => '',
                    'fragment_prefix' => '',
                    'title' => 'Link naar deze sectie',
                ],
            ]);

            $environment->addExtension(new CommonMarkCoreExtension);
            $environment->addExtension(new HeadingPermalinkExtension);
            $environment->addExtension(new GithubFlavoredMarkdownExtension);
            $environment->addExtension(new HighlightExtension(
                new Highlighter(new CssTheme),
            ));

            self::$converter = new MarkdownConverter($environment);
        }

        return self::$converter;
    }
}
