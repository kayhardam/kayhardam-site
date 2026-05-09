const PROMPTS = [
    "warming-up voor 8 kinderen, leeftijd 7–9, focus op samenwerking, materiaal: pionnen + zachte ballen, 10 minuten",
    "tikkertje-variant voor groep 6, max 5 minuten, nadruk op luisteren naar instructies",
    "spel voor 12 leerlingen VSO cluster 4, na pauze, hoog energieniveau, doel: zelfregulatie oefenen",
    "circuit met 4 stations voor 16 kinderen, focus: balans + coördinatie, 25 minuten",
    "samenwerkingsopdracht zonder competitie, groep 5, in tweetallen, met 1 bal per groepje",
    "cooling-down met ademhalingsoefening, 10 leerlingen, na intensieve les, 5 minuten",
    "rustig uitloopspel voor het einde van de les, 12 leerlingen, materialen uit de kast",
    "activerende warming-up zonder materiaal, snel uitlegbaar, klas die onrustig binnenkomt",
    "doelgericht spel voor motorische ontwikkeling, leeftijd 9–11, in tweetallen, 12 minuten",
    "afsluitingsspel waarin leerlingen elkaar feedback geven, groep 7, met 2 hoepels en 1 bal",
];

let lastIndex = -1;

function pickRandom() {
    if (PROMPTS.length <= 1) return PROMPTS[0] ?? "";

    let index;
    do {
        index = Math.floor(Math.random() * PROMPTS.length);
    } while (index === lastIndex);

    lastIndex = index;
    return PROMPTS[index];
}

export function initPromptGenerator() {
    const button = document.getElementById("prompt-button");
    const output = document.getElementById("prompt-output");

    if (!button || !output) return;

    button.addEventListener("click", () => {
        output.textContent = pickRandom();
        output.classList.remove("text-muted");
        button.textContent = "nog één →";
    });
}
