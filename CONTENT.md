# CONTENT.md

All site copy as plain-text reference. **NL is primary, EN is secondary.** Every section has both languages — when one is updated, the other should follow.

When a string lives both here and in a Blade template, this file is the source of truth. Update here first, then the template.

`[TODO]` markers indicate copy that needs Kay's input before going live — placeholder language gives shape but isn't ready as-is.

---

## Site meta

| | NL | EN |
|---|---|---|
| `<html lang>` | `nl` | `en` |
| Title | kay hardam — vakleerkracht sport, indie tools | kay hardam — sports teacher, indie tools |
| Meta description | VSO sport-tools en lesgeef-experimenten, gebouwd vanuit RENN4 met Laravel en AI. | Special-needs PE tools and teaching experiments, built from RENN4 with Laravel and AI. |
| Open Graph image | `/og-image.png` (TODO: ontwerp) | same |

---

## Hero

Full viewport on first paint. Mono label, then large display name, then short intro paragraph, then live demo block.

### NL

- **mono-label**: `WAT IS DIT`
- **display**: `kay hardam`
- **intro**: vakleerkracht sport in het nederlandse VSO. bouw open-source sport- en lesgeef-tools, leer laravel from scratch, documenteer wat ik onderweg leer.
- **demo block mono-label**: `LIVE DEMO / SPORT-PROMPT GENERATOR`
- **demo CTA**: `genereer een prompt →`
- **demo regenerate**: `nog één`
- **demo footnote**: deze prompts komen uit een vaste pool. de echte tools krijgen straks slimmere logica.

### EN

- **mono-label**: `WHAT IS THIS`
- **display**: `kay hardam`
- **intro**: sports teacher in dutch special-needs education. building open-source PE and teaching tools, learning laravel from scratch, documenting what I learn along the way.
- **demo block mono-label**: `LIVE DEMO / SPORT PROMPT GENERATOR`
- **demo CTA**: `generate a prompt →`
- **demo regenerate**: `another one`
- **demo footnote**: these prompts come from a fixed pool. the actual tools will have smarter logic later.

---

## About

### NL

- **mono-label**: `OVER MIJ`
- **display**: `vakleerkracht, indie bouwer`
- **body**: `[TODO]` — jouw verhaal in 2–4 alinea's. Bouwstenen die ik weet en die je kunt gebruiken of weggooien:
  - vakleerkracht sport in het VSO, momenteel bij RENN4
  - bouw open-source sport- en lesgeef-tools als oefening in design + development met AI
  - leer laravel zonder eerdere PHP-ervaring; dit is de eerste site die je vanaf nul opzet
  - waarom dit, voor wie, wat je hoopt dat eruit komt — dat moet uit jou komen

### EN

- **mono-label**: `ABOUT ME`
- **display**: `sports teacher, indie builder`
- **body**: `[TODO]` — translate the NL once you've written it.

---

## Tools

Section listing the open-source apps Kay builds. Each tool gets a card with name, one-sentence description, link to its own GitHub repo.

### NL

- **mono-label**: `WAT IK BOUW`
- **display**: `tools en experimenten`
- **intro**: kleine open-source apps voor sport en lesgeven, gebouwd om iets specifieks op te lossen — geen sass, geen accounts, geen tracking. elk in een eigen repo.

### EN

- **mono-label**: `WHAT I BUILD`
- **display**: `tools and experiments`
- **intro**: small open-source apps for sports and teaching, built to solve something specific — no SaaS, no accounts, no tracking. each in its own repo.

### Tool cards

`[TODO]` — voor elke tool een blok als deze. Begin met de tools die je nu al hebt of binnenkort gaat publiceren.

```
- name:        [bv. lesplan-shuffler]
- repo:        github.com/kayhardam/[app-naam]
- status:      WIP / live / archived
- one-liner NL: [korte beschrijving, max 12 woorden]
- one-liner EN: [translation]
```

Voorbeeld-format:
- name: lesplan-shuffler
- repo: github.com/kayhardam/lesplan-shuffler
- status: WIP
- one-liner NL: schudt willekeurige sport-warming-ups voor VSO-groepen
- one-liner EN: shuffles random PE warm-ups for special-needs groups

---

## Field notes

Ruwe notes terwijl ik bouw en leer. Niet polished. Bedoeld voor mezelf en wie er iets aan heeft.

### NL

- **mono-label**: `VELDNOTITIES`
- **display**: `wat ik onderweg leer`
- **intro**: korte ongepolijste notities terwijl ik laravel leer en tools bouw. geen tutorials, wel eerlijke voortgang.

### EN

- **mono-label**: `FIELD NOTES`
- **display**: `what I learn on the way`
- **intro**: short unpolished notes while I learn laravel and build tools. not tutorials, just honest progress.

### Note format

Elke note is een markdown file in `resources/views/field-notes/`, met filename pattern:

```
YYYY-MM-DD-slug.md
```

Voorbeeld: `2026-05-09-laravel-cloud-dns.md`

Note frontmatter (eerste regels van het bestand):

```markdown
---
title_nl: laravel cloud DNS via cloudflare
title_en: laravel cloud DNS via cloudflare
date: 2026-05-09
---

[note body in markdown, NL primary; EN translation optional voor early notes]
```

### Empty state

Als er nog geen notes zijn:

- **NL**: nog niks geschreven. komt eraan.
- **EN**: nothing written yet. coming.

---

## Footer

Minimaal, indie. Geen nieuwsbrief, geen socials anders dan GitHub, geen "powered by".

### NL

- **left**: `kay hardam` (lowercase, mono)
- **center**: `built with laravel + ai · [year]`
- **right links**: `github` · `email` · `license`

### EN

- **left**: `kay hardam`
- **center**: `built with laravel + ai · [year]`
- **right links**: `github` · `email` · `license`

### Footer values

- **github**: `https://github.com/kayhardam`
- **email**: `[TODO: welk e-mailadres wil je publiek? hardamkay@gmail.com of een aliased adres?]`
- **license**: `MIT` (link naar `LICENSE` file in repo)

---

## Microcopy

### Language toggle

Position: top-right corner, sticky on scroll. Shows both languages, active one in highlighter yellow.

```
NL | EN
```

(Active language in `--color-accent`, inactive in `--color-fg` at lower opacity.)

### Navigation

Sticky top, minimal. Mono-label style, lowercase.

- NL: `over` · `tools` · `notities` · `contact`
- EN: `about` · `tools` · `notes` · `contact`

### 404 / Not found

- **NL display**: `404 — niet gevonden`
- **NL body**: deze pagina bestaat niet (meer). ga terug naar de [hoofdpagina].
- **EN display**: `404 — not found`
- **EN body**: this page doesn't exist (anymore). go back to [home].

### Error fallback (algemeen)

- **NL**: er ging iets mis. probeer 't opnieuw, of stuur me een mail als 't blijft hangen.
- **EN**: something went wrong. try again, or email me if it keeps happening.

---

## Update log

Bijhouden welke secties wanneer zijn herschreven, zodat we nooit kwijt zijn welk Engels welke Nederlandse versie volgt.

| Date | Section | Note |
|---|---|---|
| 2026-05-09 | initial | first draft committed |
