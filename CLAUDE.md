# CLAUDE.md

Reference for Claude Code sessions and future-me. Keep this in sync with reality — when something here drifts from the actual code, update this file in the same commit.

## Project

**kayhardam.dev** — personal indie portfolio site.

Built by Kay Hardam, a sports teacher (vakleerkracht) in Dutch special-needs education (currently RENN4). The site documents what I build: open-source sports- and teaching-tools, made as practice in design + development with AI, while learning Laravel from scratch with zero PHP background.

Single-page scroll. Dutch primary, English toggle. Sections: hero (with live demo), about, tools, field notes, footer.

## Stack

- **Laravel 13** (PHP 8.3+)
- **Blade** templating, **Tailwind v4** via Vite
- **Markdown** for field notes via `Str::markdown()` or `league/commonmark`
- **Self-hosted fonts** via `@fontsource/inter` and `@fontsource/jetbrains-mono`
- **No database** — SQLite default ships but is unused; site is purely render-time
- **Hosting**: Laravel Cloud (Starter plan, EU Central / Frankfurt)
- Hetzner VPS sandbox stays alive for separate experiments, not this site

## Design tokens

The visual system is **indie/brutalist** with a single accent color. Discipline matters here — the highlighter yellow only earns its punch by being scarce.

### Colors

```css
--color-bg:     #FBFAF5;  /* warm white, slight cream */
--color-fg:     #0F0F0F;  /* near-black, subtle warmth */
--color-accent: #F1FF26;  /* highlighter yellow, slightly chartreuse */
--color-muted:  #737373;  /* neutral gray for mono labels and secondary text */
```

**Single-accent rule**: yellow ONLY for emphasis (highlighted words, key CTAs, hover states). Never for backgrounds, borders, separators, or section fills. If yellow would appear on >5% of a viewport at any moment, it's wrong.

### Typography

- **Display**: Inter, weight 800–900, **lowercase**
- **Body**: Inter, weight 400–500, sentence case
- **Mono**: JetBrains Mono, for labels, code references, and metadata — typically uppercase with tracking

### Type scale (rem-based, mobile-first)

| Token | Value | Use |
|---|---|---|
| `display-xl` | 8rem (~128px) | hero only |
| `display-lg` | 5rem (~80px) | section openers |
| `display-md` | 3rem (~48px) | sub-section |
| `body` | 1.0625rem (~17px) | paragraph default |
| `small` | 0.875rem (~14px) | captions, footnotes |
| `mono-label` | 0.75rem (~12px) | uppercase, `letter-spacing: 0.08em` |

Mobile: shrink display-xl to ~5rem, display-lg to ~3rem. Body and mono-label stay constant.

### Casing rules

| Element | Case | Example |
|---|---|---|
| Display headings | all lowercase | `kay hardam`, `wat ik bouw` |
| Body copy | sentence case | `Vakleerkracht sport in het Nederlandse VSO.` |
| Mono labels | ALL UPPERCASE | `WAT IS DIT`, `SECTION 02 / TOOLS` |
| Links inline body | sentence case | `bekijk de repo →` |

### Spacing

- Section vertical padding: `py-24` mobile, `py-32` tablet+
- Body max-width: `~65ch` for readability
- Hero takes full viewport height on first paint (`min-h-screen`)

## File structure (target)

```
app/
  Http/Controllers/
    HomeController.php          single-page entry
resources/
  views/
    home.blade.php              full page composition
    components/
      hero.blade.php
      about.blade.php
      tools.blade.php
      field-notes.blade.php
      footer.blade.php
      lang-toggle.blade.php
    field-notes/                .md files, parsed at render-time
      2026-05-09-laravel-cloud-dns.md
  css/
    app.css                     Tailwind import + design tokens as CSS vars
  js/
    app.js                      Vite entry
    prompt-generator.js         vanilla JS, the live demo logic
routes/
  web.php                       single GET / → HomeController@index
```

## Code conventions

- **Blade components**: lowercase kebab-case (`<x-hero />`, `<x-field-note-list />`)
- **CSS custom properties** for tokens; Tailwind for layout/utilities
- **No JS framework** — vanilla JS for the prompt generator and language toggle
- **Tailwind v4 syntax**: tokens in `@theme` block in `app.css`, no `tailwind.config.js`
- **Locale**: NL is primary; EN strings live alongside in CONTENT.md and Blade conditionals (or a simple `$lang` variable; defer to whatever feels lightest)

## Git commit conventions

Lowercase imperative mood. Short, self-describing. Examples:

- `add hero section`
- `wire up prompt generator`
- `tweak yellow contrast on warm white`
- `field note: laravel cloud DNS gotchas`
- `fix mono-label letter-spacing`

No conventional-commits prefixes (`feat:`, `fix:`) — overkill for personal indie. Keep them small enough that the subject IS the description.

### Critical commit rule

**NEVER include "Co-authored-by Claude" or any AI attribution** anywhere — not in commits, PRs, code comments, README, file headers, or anywhere else. This is non-negotiable. Code is mine. Sessions with Claude are tooling, not co-authorship.

## Working with Claude Code

When starting a Claude Code session for this repo:

1. Have it load both `CLAUDE.md` and `CONTENT.md` first as context
2. Per-phase scope: one section, one feature, one fix per session — don't mix concerns
3. Reference design tokens by name in prompts (e.g. "use `--color-accent` for the highlight word")
4. Reference content blocks by section heading from CONTENT.md (e.g. "the hero NL copy")
5. Commits go through the conventions above — Claude Code respects the no-attribution rule

## Living document

This file gets updated as decisions evolve. If a token, convention, or section design changes, update CLAUDE.md in the same commit that changes the code. Future sessions — Claude or human — should be able to read this and reconstruct the project's intent without external context.
