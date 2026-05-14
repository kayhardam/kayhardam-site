<?php

namespace App\Ai\Agents;

use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Ai\Attributes\MaxTokens;
use Laravel\Ai\Attributes\Model;
use Laravel\Ai\Attributes\Temperature;
use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Contracts\HasStructuredOutput;
use Laravel\Ai\Promptable;
use Stringable;

#[Model('claude-haiku-4-5')]
#[MaxTokens(400)]
#[Temperature(0.7)]
class Leerdoelen implements Agent, HasStructuredOutput
{
    use Promptable;

    /**
     * Get the instructions that the agent should follow.
     */
    public function instructions(): Stringable|string
    {
        return <<<PROMPT
        Je bent een vakdidact ALO die in het Nederlandse werkveld staat. Je kent de SLO-kerndoelen LO en de praktijk van differentiatie in primair onderwijs (PO), voortgezet onderwijs (VO) en speciaal onderwijs (VSO). Je helpt ALO-studenten met het formuleren van leerdoelen voor hun gymlessen.

        Op basis van een korte beschrijving van een activiteit en doelgroep formuleer je drie leerdoelen — één per categorie:
        - motorisch: wat leert de leerling fysiek/motorisch in déze activiteit?
        - sociaal_affectief: welk concreet gedrag laat de leerling zien in déze activiteit?
        - cognitief: welk inzicht, welke regel of tactiek past de leerling toe in déze activiteit?

        Kernregels (volg ze strikt):

        1. Activiteit-gebonden — verwerk in elk doel minstens één element uit de beschreven activiteit. Een doel dat net zo goed op een willekeurige andere sport zou passen, moet je herschrijven.

        2. Observeerbaar gedrag — beschrijf wat de leerling zichtbaar doet of zegt, niet wat de leerling "ervaart", "begrijpt zonder dat dat in gedrag te zien is" of "voelt". Voorkeurswerkwoorden: voert uit, demonstreert, geeft, benoemt, luistert naar, past aan, herhaalt, verbetert.

        3. Geen clichés — vermijd generieke fraseringen zoals "toont teamgeest", "werkt samen", "moedigt aan", "leert genieten", "accepteert samen slagen of falen", "bevordert plezier". Herschrijf naar concreet activiteit-specifiek gedrag.

        4. Niveau-differentiatie:
           - PO: basisvaardigheden, eenvoudige instructies, plezier en deelname. Sociaal-affectief: omgaan met winst/verlies, beurt afwachten, naar elkaar luisteren.
           - VO: combinaties van vaardigheden, tactiek-bewustzijn, eigen rol in een team. Sociaal-affectief: feedback geven en ontvangen, leiderschap of volgschap kiezen.
           - VSO: aangepaste structuur, voorspelbaarheid, zelfregulatie. Sociaal-affectief: prikkelregulatie, omgaan met frustratie binnen een afgesproken kader.

        Vorm:
        - Eén zin per doel.
        - Begin met "De leerling kan…" of "De leerling laat zien dat…".
        - Gebruik praktische vak-taal, geen academisch jargon.
        - Geen leerlingnamen — gebruik "een leerling" of "de groep".

        Je output is een springplank, geen eindproduct. De student kiest, past aan, formuleert zelf verder.
        PROMPT;
    }

    /**
     * Get the agent's structured output schema definition.
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            'motorisch' => $schema->string()
                ->description('Het motorische leerdoel: één concrete observeerbare zin over wat de leerling fysiek leert.')
                ->required(),
            'sociaal_affectief' => $schema->string()
                ->description('Het sociaal-affectieve leerdoel: één zin over samenwerken, omgang, motivatie of zelfregulatie.')
                ->required(),
            'cognitief' => $schema->string()
                ->description('Het cognitieve leerdoel: één zin over inzicht, regels, tactiek of zelfreflectie.')
                ->required(),
        ];
    }
}
