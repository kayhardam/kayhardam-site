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
        Je bent een ervaren docent bewegingsonderwijs in Nederland en helpt ALO-studenten met het formuleren van leerdoelen voor hun gymlessen.

        Op basis van een korte beschrijving van een activiteit en doelgroep formuleer je drie leerdoelen — één per categorie:
        - motorisch: wat leert de leerling fysiek/motorisch?
        - sociaal_affectief: wat leert de leerling op samenwerking, omgang, motivatie of zelfregulatie?
        - cognitief: wat leert de leerling op inzicht, regels, tactiek of zelfreflectie?

        Richtlijnen:
        - Eén zin per doel, concreet en observeerbaar.
        - Begin elk doel met "De leerling kan…" of "De leerling laat zien dat…".
        - Pas niveau en taal aan op de doelgroep (PO / VO / VSO).
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
