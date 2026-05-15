# Field notes plan

Een serie korte technische notes over de reis van kayhardam.dev — vanaf de eerste live-deploy tot nu. Doel: ~300 woorden per note, één technisch punt per stuk, samen lezen als een organisch e-book.

Status per note: **idee** → **klad** → **live**.

---

## 1. Van nul tot live in één dag

- **slug:** `van-nul-tot-live`
- **status:** live (15 mei 2026)
- **kern:** Laravel 13 + Blade + Tailwind v4 + Vite, deploy op Laravel Cloud, geen DB.

## 2. Markdown als database

- **slug:** `markdown-als-database`
- **status:** idee
- **kern:** `FieldNotes` class parseert op datum-prefix in filename. Geen frontmatter, geen YAML, geen Eloquent.
- **haak:** Waarom een database als je één type content hebt en zelf de auteur bent?

## 3. Voornamen die nergens heen kunnen

- **slug:** `Voornamen die nergens heen kunnen`
- **status:** live (15 mei 2026)
- **kern:** De Team-shuffler vraagt om voornamen, dus alles draait client-side. Geen backend, geen storage, geen log. Fisher-Yates + VSO-constraint als feature-detail.
- **haak:** De eerste drempel voor een leerkracht is niet de werking maar wat hij moet invullen.
  Titel, slug, status, kern én haak veranderen allemaal — de hoek

## 4. Pest tegen Vite

- **slug:** `pest-tegen-vite`
- **status:** idee
- **kern:** `ViteManifestNotFoundException` blokkeert elke feature-test. Fix: `withoutVite()` in `TestCase::setUp()`.
- **haak:** Wat testing-environment fundamenteel anders maakt dan dev-environment.

## 5. Een AI-agent in twee bestanden

- **slug:** `een-ai-agent-in-twee-bestanden`
- **status:** idee
- **kern:** Laravel AI SDK install, `make:agent`, `claude-haiku-4-5`, hard cap $5/maand bij Anthropic, ~$0.002 per call.
- **haak:** Van "AI integreren" naar "twee files plus één env var".

## 6. Een agent leren spreken

- **slug:** `een-agent-leren-spreken`
- **status:** idee
- **kern:** Structured output via JsonSchema. 5-laags system prompt: persona, activiteit-gebondenheid, observeerbaar gedrag, anti-clichés, niveau-handvatten.
- **haak:** De eerste output was te clichématig — prompt-engineering als echt vak.

## 7. Domeintaal in de code

- **slug:** `domeintaal-in-de-code`
- **status:** idee
- **kern:** Naming convention — NL voor domain (Leerdoelen, vakdidact), EN voor infra (Model, Migration, Request).
- **haak:** Code als brug tussen werkveld en framework.

## 8. Geen tracking, geen accounts

- **slug:** `geen-tracking-geen-accounts`
- **status:** idee
- **kern:** Privacy als product-keuze. Mono-styled notice per tool, site-brede footer-stance, géén analytics of accounts.
- **haak:** Wat een "AI-tool" betekent als je niets opslaat.

## 9. Van demo naar probleem

- **slug:** `van-demo-naar-probleem`
- **status:** idee
- **kern:** Named rate limiter (10/uur/IP), Pest met `Agent::fake()` voor gratis tests, $5 cap als bovengrens.
- **haak:** Een demo wordt een product op het moment dat je je zorgen maakt om de elfde call.

---

## Werkwijze

- Eén note per sessie, samen schrijven.
- Chronologisch — de boog van #1 naar #9 vertelt de reis.
- Per note eerst kern + structuur bespreken, dan schrijven, dan polish, dan commit.
- Commit-pattern: `docs(notes): publish 'titel'` of `feat(notes): draft 'titel'`.
