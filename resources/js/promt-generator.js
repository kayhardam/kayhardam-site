const PROMPTS = [
    "30 seconden plank — kies je positie",
    "10 burpees, en een glimlach erbij",
    "jumping jacks tot het liedje uit is",
    "5 keer diep in en uit ademen",
    "loop één minuut door de zaal, stilletjes",
    "rek je rug, je nek, je schouders",
    "drink water — echt, nu",
    "doe een squat per goed antwoord",
    "pas een bal naar de stilste in de groep",
    "sluit je ogen, hou je balans op één been",
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
    });
}
