# Home redesign — werkgevers-portfolio

Plan opgesteld 29 mei 2026. Doel: home zo aanvullen dat `/werk/leerdoel-coach` vindbaar wordt en de portfolio-intentie zichtbaar is voor een hiring manager EdTech/sport-tech die in tien seconden besluit of 'ie verder leest.

Geen rewrite. Aanvulling op de bestaande `home.blade.php` op basis van de brutalist-optimal mockup uit de review-chat.

## Wijzigingen op een rij

| # | Wijziging | Status |
|---|-----------|--------|
| 1 | Live-demo-blok → case-spotlight | te bouwen |
| 2 | Nieuwe sectie `03 / werk` tussen tools en field notes | te bouwen |
| 3 | Field notes hernummeren naar `04 / field notes` | te bouwen |
| 4 | `x-footer` aanvullen met linkedin/github/email | te bouwen |
| — | Dev-aim-paragraaf in `01 / over` | **on hold** — voor later beslissen |

## Wat niet wijzigt

Hero (h1 + tagline), `01 / over` copy, `02 / tools` (cards + Muybridge), de gele pills met rugnummering, de overall typografie en kleuren. De fundering klopt; dit is aanvulling, geen herziening.

## Lens

Bij elke beslissing: *leesbaar voor een hiring manager EdTech/sport-tech, in tien seconden?* Niet bouwen wat niet aan die test bijdraagt.

---

## Stap 1 — case-spotlight (vervangt prompt-demo)

**Waarom.** De prompt-demo claimt het kostbaarste vastgoed (direct onder hero) voor het meest spelende stukje content. Met de portfolio-koers (werkgevers, niet toevallige bezoekers) is een case-bridge sterker: show-don't-tell, maar met substantie in plaats van JS-truc.

**Trade-off die expliciet gemaakt moet worden.** Je verliest de speelse interactiviteit. Twee opties om mee te nemen:
- Demo helemaal weg (huidig plan).
- Demo verschuiven naar onderaan `/tools`-pagina (alternatief). Niet onderdeel van deze stap, maar overweeg vóór commit.

### Route-aanpassing

In `routes/web.php`, de home-closure:

```php
Route::get('/', function () {
    return view('home', [
        'notes' => FieldNotes::all(),
        'werk' => Werk::all(),
        'featured' => Werk::find('leerdoel-coach'),
    ]);
});
```

### Blade-vervanging

In `resources/views/home.blade.php`, vervang het hele `{{-- Live demo lab --}}`-blok door:

```blade
{{-- Case-spotlight --}}
@if ($featured)
<div class="bg-fg text-bg p-7 max-w-[520px]">
    <div class="font-mono text-[11px] text-accent tracking-wide font-semibold mb-4">// uitgelicht · case study</div>
    <h3 class="text-[30px] font-extrabold tracking-[-0.025em] leading-[1.05] mb-3">{{ $featured['title'] }}</h3>
    <p class="text-[15px] leading-[1.55] mb-5">{{ $featured['lede'] }}</p>
    <div class="flex flex-wrap gap-2.5 mb-4">
        <a href="/werk/{{ $featured['slug'] }}" class="bg-accent text-fg px-[18px] py-[11px] font-mono text-[11px] font-bold tracking-wide hover:bg-accent-hover transition-colors">lees de case →</a>
        @if ($featured['tool_url'])
        <a href="{{ $featured['tool_url'] }}" class="border border-bg text-bg px-[17px] py-[10px] font-mono text-[11px] font-bold tracking-wide hover:bg-bg hover:text-fg transition-colors">probeer de tool ↗</a>
        @endif
    </div>
    <div class="font-mono text-[11px] text-muted-light tracking-wide">
        case · {{ $featured['reading_time'] }} min lezen · live
    </div>
</div>
@endif
```

### Verificatie

Refresh `/`. Verwacht: zwart vak met geel `// uitgelicht · case study`-label, `leerdoel-coach` als h3, de lede, twee knoppen (lees de case → gaat naar `/werk/leerdoel-coach`; probeer de tool ↗ gaat naar `/tools/leerdoelen`), en onderaan `case · 4 min lezen · live`.

---

## Stap 2 — sectie `03 / werk`

**Waarom.** Een hiring manager scant nu over → tools → notes. Daar tussenin hoort werk: cases die laten zien *hoe* je bouwt en wat je leerde. Tools tonen het product, werk toont het vakmanschap. Die volgorde matcht hoe een hiring manager evalueert.

**Visueel ritme** bewust afwijkend van tools (Muybridge-spike) en notes (jaartal): chapter-nummer `01` in mono extrabold links. Drie verschillende ritmes voor drie verschillende intenties — een scanner ziet meteen welk type content het is.

### Blade-insert

Direct ná de `{{-- 02 / tools --}}`-sectie, vóór `{{-- 03 / field notes --}}`:

```blade
{{-- 03 / werk --}}
<section id="werk" class="mt-[60px] pt-[34px] border-t-2 border-fg">
    <span class="inline-block bg-accent font-mono text-[11px] font-bold tracking-wide px-2.5 py-1 mb-3.5">03 / werk</span>
    <h2 class="text-[38px] font-extrabold tracking-[-0.03em] leading-none mb-2">wat ik bouwde, en wat ik leerde</h2>
    <p class="text-sm leading-[1.55] text-muted font-medium max-w-[520px] mb-7">Cases over de beslissingen achter de tools — het werk vóór de code.</p>
    @forelse ($werk as $case)
    <article class="grid grid-cols-[64px_1fr] gap-5 py-5 items-start {{ !$loop->first ? 'border-t border-divider' : '' }}">
        <div class="font-mono text-[22px] font-extrabold tracking-[-0.02em] pt-1">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
        <div>
            <div class="font-mono text-[11px] font-semibold tracking-wide text-muted mb-1.5">case · {{ $case['reading_time'] }} min lezen</div>
            <h3 class="text-base font-extrabold tracking-[-0.01em] mb-2">
                <a href="/werk/{{ $case['slug'] }}" class="hover:underline decoration-2 underline-offset-[3px]">{{ $case['title'] }}</a>
            </h3>
            <div class="text-[15px] leading-[1.6] text-fg-soft font-medium max-w-[560px]">
                {{ $case['lede'] }}
            </div>
        </div>
    </article>
    @empty
    <p class="text-[15px] leading-[1.65] font-medium max-w-[560px]">
        Eerste case komt eraan.
    </p>
    @endforelse
</section>
```

### Verificatie

Refresh `/`. Verwacht: `03 / werk` pill, h2 *"wat ik bouwde, en wat ik leerde"*, en de leerdoel-coach case-card met `01` mono links, `case · 4 min lezen` label, titel als link naar `/werk/leerdoel-coach`, en de lede eronder.

---

## Stap 3 — field notes hernummeren

Triviale tekst-wijziging in `home.blade.php`. In de `{{-- 03 / field notes --}}`-sectie, alleen de pill-tekst veranderen:

```diff
- <span class="inline-block bg-accent ...">03 / field notes</span>
+ <span class="inline-block bg-accent ...">04 / field notes</span>
```

Eventueel ook de subtitel iets actiever — *"Korte stukken vanuit lesgeven en bouwen — het denkwerk achter de tools."* in plaats van *"Geplaatst als er iets te zeggen is."* Kleine polish, niet verplicht voor deze sprint.

---

## Stap 4 — footer met contact

Eerst kijken wat er nu in `x-footer` staat — niet aannemen:

```
cat resources/views/components/footer.blade.php
```

Op basis daarvan: drie links toevoegen (LinkedIn, GitHub, mailto). Voorgestelde lay-out:

- linker-kolom: naam + rol (mono)
- rechter-kolom: drie links als mono small caps met `↗` of `→`
- privacy-zin onderin (waarschijnlijk al aanwezig)

**Vóór je aan stap 4 begint, klaarleggen:**

- LinkedIn-URL (volledig)
- GitHub-URL (waarschijnlijk `https://github.com/kayhardam`)
- contact-email

---

## Test-impact

`HomepageTest` zal mogelijk falen als 'ie nu asserties heeft op de prompt-demo elementen (`#prompt-output`, `#prompt-button`). Eerste actie volgende sessie:

```
cat tests/Feature/HomepageTest.php
```

Verwijderen wat de demo testte; eventueel een nieuwe assertion dat de case-spotlight rendert (`Werk::find('leerdoel-coach')` correct doorkomt op `/`).

---

## Open beslissingen voor volgende sessie

1. **Prompt-demo helemaal weg, of verschuiven naar `/tools`-pagina?** Actief beslissen vóór commit.
2. **Dev-aim-paragraaf in `01 / over`** — voor nu uit het plan (twijfel). Later beslissen of 'm er expliciet bij komt, in welke toon, en op welke positie.
3. **Sectie 03/werk subtitel** — *"Cases over de beslissingen achter de tools — het werk vóór de code."* werkt, maar mag scherper als je een betere zin vindt.
4. **Subtitel field notes** — meegenomen polish of laten?

---

## Niet vergeten van vorige sessie

- `leerdoel-voor-na.svg` (in de chat van 29 mei gemaakt) nog invoegen in `2026-05-27-leerdoel-coach.md` via je figure-conventie. Apart commit-checkpoint na deze sprint.

---

## Volgorde-advies

Stap 4 (footer) kan parallel met of vóór stap 1-3 — het is een aparte file. Stap 1-3 raken allemaal `home.blade.php` en hebben elkaar minimaal nodig. Logische bouwvolgorde: 2 → 1 → 3 → 4. Eén commit per stap.
