## Blade components

Sinds de layout-dedupe leeft de gedeelde HTML-shell in components:

- `<x-layout title="..." description="..." path="/..." type="website">` — head met meta tags, body, max-w-3xl container. Slot voor pagina-content.
- `<x-nav />` — top-nav met links naar `/`, `/#about`, `/#tools`. Opt-in.
- `<x-footer />` — footer met github + mail. Opt-in.

Bestanden in `resources/views/components/`. Props in component-files via `@props([...])`.

## Design

Diep-donker Tahoe. De volledige richting + rationale (waarom blauw/violet, glas-discipline, de Muybridge-handtekening) staat in `docs/design-richting.md` — die is leidend. Hieronder alleen wat de implementatie moet weten.

### Tokens

`design-richting.md` noemt de tokens conceptueel (`paper`, `ink`, `acc`); in `resources/css/app.css` leven ze als `@theme`-`--color-*`-namen, zodat Tailwind v4 de utilities genereert (`bg-bg`, `text-fg`, `bg-accent`). Mapping:

- `paper` → `--color-bg` — achtergrond (#12173a)
- `card` → `--color-card` — paneel / kaart (#1b2150)
- `ink` → `--color-fg` — tekst (#eef0ff)
- `muted` → `--color-muted` — secundaire tekst, mono labels
- `line` → `--color-divider` — rand / divider
- `acc` → `--color-accent` — blauw, primair (nav, knoppen, links)
- `acc2` → `--color-accent-2` — violet, alleen beweging

Waarden staan in `app.css`; niet hier dupliceren. `--color-fg-soft`, `--color-muted-light` en `--color-accent-hover` zijn voorlopige donkere waarden — scherpstellen per component.

### Accent-discipline

Blauw draagt: nav, knoppen, links, ▸. Violet licht alléén op bij beweging — geen statisch violet. Accent blijft spaarzaam, ~5% van het beeld. Kruipt het naar tag-pills, link-underlines, footer-links of helper-text, dan is het van accent naar decoratie gegleden. Dat is de val.

### Glas

Spaarzaam, en alléén op de echte site: nav + kaarten, doorschijnend boven een blauw→violet-verloop. Intensiteit: zie `design-richting.md`.

### Casing

- Display headings: **lowercase** ("kay hardam", "wat ik bouw")
- Body, paragrafen: **sentence case** ("Vakleerkracht sport in het...")
- Mono labels: **lowercase** met letter-spacing (~0.04em) ("01 / over", "// live demo · prompt-generator")
- Inline links in body: zoals omringende tekst

### Hoeken

Zachte radius — ~8px op kaarten, ~7px op knoppen en pills. Vervangt de oude no-border-radius-regel. Per component met arbitrary values (`rounded-[8px]`); tokeniseren als het patroon vaak genoeg terugkomt.

### Type-aanpak

Geen vaste type-scale-tokens. Tailwind defaults + arbitrary values per gebruik. Bijvoorbeeld:

- Hero h1: `text-[64px] md:text-[88px]` (homepage), `text-[48px] md:text-[64px]` (tool-detail)
- Section h2: `text-[38px]`
- Body: `text-[15px]`
- Lead/hero-subtitle: `text-[17px]`
- Helper-text onder labels: `text-[14px]`
- Mono labels: `text-[11px]`

Houdt flexibiliteit; maten kunnen tijdens de redesign schuiven. Tokeniseren als patronen het verdienen.

### Casing

- Display headings: **lowercase** ("kay hardam", "wat ik bouw")
- Body, paragrafen: **sentence case** ("Vakleerkracht sport in het...")
- Mono labels: **lowercase** met letter-spacing (~0.04em) ("01 / over", "// live demo · prompt-generator")
- Inline links in body: zoals omringende tekst

### Edges

Geen `border-radius`. Brutalist commitment. Section-pills, lab-block, buttons — allemaal scherp. Eén ronde corner ergens kraakt het hele systeem.

### Type-aanpak

Geen vaste type-scale-tokens. Tailwind defaults + arbitrary values per gebruik. Bijvoorbeeld:

- Hero h1: `text-[64px] md:text-[88px]` (homepage), `text-[48px] md:text-[64px]` (tool-detail)
- Section h2: `text-[38px]`
- Body: `text-[15px]`
- Lead/hero-subtitle: `text-[17px]`
- Helper-text onder labels: `text-[14px]`
- Mono labels: `text-[11px]`

Houdt flexibiliteit. Tokeniseren als patronen vaak genoeg terugkomen om te verdienen.

## Code-conventies

- Tailwind utility-first inline. Custom utilities via `@utility` alleen bij ≥5× repetitie.
- CSS custom properties via `@theme` voor tokens. Worden auto-generated als utilities (`bg-accent`, `text-muted`, etc.).
- **JS — juiste gereedschap per interactie.**
    - **Vanilla inline JS** (default) voor stateless één-shot interacties: input → bereken → render. In de Blade view, in `<script>` binnen de `<x-layout>` slot. Voorbeeld: team-shuffler, bewegingsprompt-generator (homepage).
    - **Alpine.js** alleen bij echte reactieve UI-state: multi-step, live two-way binding, conditionele secties. Component in `resources/js/`, geregistreerd via `Alpine.data()` in `app.js`, gekoppeld met `x-data`. Enige gebruiker nu: leerdoel-coach (6-staps GIVC-wizard).
    - Alpine laadt globaal, dus het zit al in elke bundle. "Vanilla als default" is een keuze voor code-eenvoud, niet voor bytes.
- Locale: NL primair in markup en copy. EN volgt als de site er om vraagt.
- Honest empty states: als een sectie nog leeg is, zég dat. Geen placeholder-cards die fake gewicht geven.

### Vite tijdens dev

**Tailwind v4 genereert classes on-demand uit source-scans.** Nieuwe utility-combos die je in views toevoegt komen pas in de CSS als `npm run dev` draait. Anders blijft de browser hangen op een oude build en lijken nieuwe classes geen effect te hebben.

Vuistregel: `npm run dev` draait altijd in een tweede terminal-tab tijdens werk. Bij onverklaarbare missing styles is dit het eerste om te checken.

## Git-commits

Conventional commits: `feat`/`fix`/`refactor`/`chore`/`docs` met optionele scope. Imperatief, kort, zelf-omschrijvend.

- ✓ `feat(tools): add team-shuffler with Fisher-Yates shuffle`
- ✓ `refactor(views): extract layout to blade components`
- ✓ `feat(seo): add sitemap.xml and robots.txt`
- ✗ `Added team shuffler thingy`
- ✗ `feat: implement team-shuffler with Fisher-Yates and round-robin distribution (closes #12)` (te lang, issue-refs)

Geen emojis. Geen issue-refs in subject. Body-paragraaf alleen als er echt iets uit te leggen valt.

### Niet onderhandelbaar

**NEVER include "Co-authored-by Claude" of soortgelijke AI-attributie** in commits, PRs, code-comments, README, file headers, of waar dan ook. Code is van mij. Sessies met Claude zijn tooling, geen co-authorship.

In publieke narrative — about-copy, blog — mág AI als bouwmaatje/sparringpartner wél openlijk genoemd worden. Dat is een ander register.

## Sessies met Claude Code

1. Laat eerst CLAUDE.md lezen
2. Eén focus-area per sessie (één feature, één refactor) — niet mixen, of expliciet aankondigen wanneer je hopt
3. Refereer tokens en sectie-namen bij naam
4. Commits volgen bovenstaande regels — geen attributie, geen ceremonie
5. **Working style**: stap voor stap, één commando of taak per beurt. Korte WAAROM-uitleg voor elke stap zodat ik leer, niet kopieer. Git-commits als natural checkpoints na elke werkende fase.

## Living document

Wanneer een token, conventie of beslissing verandert, update deze file in dezelfde commit als de code. Toekomstige sessies (Claude of mens) moeten kunnen reconstrueren wat de intent was zonder externe context.
