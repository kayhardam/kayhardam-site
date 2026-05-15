# Voornamen die nergens heen kunnen

De Team-shuffler vraagt om voornamen. Voor een leerkracht is dat reden om eerst te kijken wat er met die namen gebeurt.

De tool is één HTML-pagina met JavaScript. Geen backend, geen database, geen API-call. De voornamen die je intikt staan in een variabele in dit tabblad — sluit het en ze zijn weg.

Dat maakt de privacy-keuze geen marketingbelofte maar een architectuur-feit. Geen log om te wissen, geen storage om te ruimen — er is geen plek waar de namen heen kunnen.

Het algoritme is een Fisher-Yates shuffle met één VSO-constraint: twee leerlingen die je liever apart houdt — om dynamiek of geschiedenis — eindigen niet in hetzelfde team.

De keerzijde: geen accounts, geen "opslaan voor later", geen synchronisatie. Volgende les tik je de namen opnieuw in. Voor één klas, één moment, één browser is dat genoeg.
