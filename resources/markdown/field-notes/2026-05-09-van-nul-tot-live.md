# Van nul tot live in één dag

Vandaag begon ik aan kayhardam.dev. Tegen de avond stond de site online onder mijn eigen domein, met SSL, een werkende live demo, en een design dat ik nog steeds wil aankijken.

<!-- ## Wat werkte

- Bestaande toolchain. PHP 8.3, Node, Composer en Homebrew stonden er al, niks nieuws nodig.
- `composer create-project laravel/laravel` in plaats van de officiële `laravel new` installer. Die laatste hing in een loop op een update-prompt die niet weg te klikken was. De directe weg sloeg dat hele probleem over.
- `gh repo create` met `--source=. --remote=origin --push` deed in één commando wat anders drie stappen kost: GitHub-repo aanmaken, lokale checkout koppelen, eerste commit pushen.
- Laravel Cloud detecteert een Laravel-app automatisch. Repo selecteren, regio kiezen, deploy-knop, klaar. Eerste deploy in minder dan een minuut.
- Cloudflare DNS-only naar Laravel Cloud. Hun proxy uit, want Laravel Cloud heeft eigen edge. -->

## Wat ik bewaar voor volgende keer

De eerste deploy met vanille Laravel was belangrijker dan de eerste hero. DNS-propagatie liep in de achtergrond door terwijl ik aan het ontwerp werkte. Tegen de tijd dat de design-iteraties klaar waren, was de hele pijplijn — push naar GitHub, build op Laravel Cloud, deploy naar mijn domein — bewezen.

## Een ander ding

Eerste design-versie had geel op tien plekken. Tweede versie reduceerde naar vijf. Het oog ging weer naar de live demo waar het hoort, in plaats van overal tegelijk. Less is more is een cliché — dat maakt het niet onwaar.
