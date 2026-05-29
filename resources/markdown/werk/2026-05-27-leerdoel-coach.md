---
lede: een webtool die docenten dwingt hun leerdoel concreet te maken, in plaats van het voor ze te verzinnen.
tool_url: https://kayhardam.dev/tools/leerdoelen
code_url: https://github.com/kayhardam/kayhardam-site
---

# leerdoel-coach

## het probleem

een leerdoel opschrijven is makkelijk. een leerdoel opschrijven dat je dinsdag in de gymzaal kunt zien gebeuren is dat niet. "de leerling kan na de les goed samenwerken met andere leerlingen" — dat klinkt af, maar het wijst nergens naar. wat is "goed"? met wie? en hoe observeer je iets dat pas ná de les zou gebeuren? je kunt het niet aftekenen en niet bespreken met een leerling.

soms zit een doel er dichter tegenaan en valt het toch om. "de leerling leert hard en gericht gooien met een bal" heeft een gedrag en een activiteit, maar geen maat: hoe hard, hoe gericht, hoe vaak raak? het ziet er concreter uit dan het is.

een taalmodel maakt dit groter, niet kleiner. vraag een chatbot om een leerdoel en je krijgt vloeiende, grammaticaal correcte leegte terug. het ziet er afgewerkt uit, en juist daardoor stopt het denken — het levert de cliché's sneller aan dan een mens ze kan bedenken.

de vraag was dus niet of ik leerdoelen kon genereren. dat kan elk model. de vraag was of ik iets kon bouwen dat de gebruiker dwingt om concreet te worden, in plaats van die concreetheid voor hem te faken.

## de keuze die alles bepaalde

de makkelijke versie was duidelijk: prompt erin, mooi leerdoel eruit. ik heb 'm bewust niet gebouwd. een tool die het denkwerk overneemt, neemt ook de vaardigheid weg — en die vaardigheid, een doel concreet kunnen maken, is precies wat een docent nodig heeft.

dus koos ik het omgekeerde. de tool genereert niet, hij spiegelt. je loopt door een vaste structuur — gedrag, inhoud, voorwaarden, criterium — en wat je erin stopt, krijg je in scherpere vorm terug. niet beter dan je invoer verdient. vage invoer levert een eerlijke, vage spiegel op, geen gepolijst doel dat doet alsof het denkwerk al gedaan is.

garbage in, garbage out is hier geen bug maar het ontwerp. de gaten netjes opvullen zou precies de overtuigende leegte uit het vorige stuk opleveren — dus doet de tool dat niet.

## hoe het werkt

de tool is een wizard van zes stappen die de gebruiker langs de bouwstenen van een doel leidt: gedrag, inhoud, voorwaarden, criterium. die stappen draaien in de browser, in pure javascript — geen database, geen account, niets dat bewaard hoeft te worden. de invoer gaat naar een agent die er één zin van maakt: het leerdoel, en niets eromheen.

achter die agent zit de Laravel AI SDK, alleen op Anthropic, met haiku als standaardmodel — snel en goedkoop genoeg om binnen een harde limiet van vijf euro per maand te blijven. een persoonlijk project mag geen open kraan zijn.

het echte werk zat niet in de koppeling maar in de system-prompt. die heeft vijf hefbomen die de leegte uit het model duwen: een vakdidactische persona in plaats van een algemene assistent, output die aan een concrete activiteit gebonden is, gedrag dat je kunt waarnemen, een expliciete lijst verboden clichés, en handvatten voor po, vo én vso zodat het doel bij de juiste doelgroep past.

elke hefboom gaat hetzelfde gedrag tegen: een taalmodel wil graag mooi en algemeen klinken. de prompt dwingt het saai en specifiek te zijn. dat is achteraf het meeste werk geweest — niet de code, maar het temmen van de neiging tot wolligheid.

## wat ik eruit haalde

de tool doet één ding en doet dat eerlijk: hij dwingt je je doel scherper te maken en houdt op waar jouw denkwerk ophoudt. wat hij níét doet — coachen, doorvragen, je tekort gladstrijken — is even bewust als wat hij wel doet.

wat ik eruit haalde zit minder in de tool dan in het bouwen ervan. ik dacht dat een AI-tool maken vooral een kwestie van koppelen was. het bleek een kwestie van beperken: het model heeft geen tekort aan woorden, het heeft een tekort aan terughoudendheid, en die moet je er met de prompt in leggen.

er staat nog één hefboom open — een set voorbeelddoelen van mezelf als ijkpunt voor het model. tot die er is, leunt de tool op regels in plaats van op voorbeelden. dat is geen gebrek om te verbergen; gewoon de volgende stap.
