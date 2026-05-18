export function leerdoelCoach({ activiteiten, nietWaarneembaar }) {
    return {
        activiteiten,
        nietWaarneembaar,
        step: 1,
        stepLabels: [
            "context",
            "gedrag",
            "inhoud",
            "voorwaarden",
            "criteria",
            "synthese",
        ],
        context: {
            groep: "",
            activiteit: "",
            type: "reeksdoel",
            domein: "motorisch",
        },
        gedrag: "",
        inhoud: "",
        voorwaarden: "",
        criteria: "",
        next() {
            if (this.step < 6) this.step++;
        },
        prev() {
            if (this.step > 1) this.step--;
        },
        reset() {
            this.step = 1;
            this.context = {
                groep: "",
                activiteit: "",
                type: "reeksdoel",
                domein: "motorisch",
            };
            this.gedrag = this.inhoud = this.voorwaarden = this.criteria = "";
        },
        suggesties() {
            const act = this.activiteiten[this.context.activiteit];
            return act ? act.werkwoorden : [];
        },
        dummyZin() {
            const prefix =
                this.context.type === "reeksdoel"
                    ? "Aan het einde van de lessenreeks"
                    : "Aan het einde van deze les";
            const groep = this.context.groep
                ? `kunnen de leerlingen van ${this.context.groep}`
                : "kunnen de leerlingen";
            const ged = this.gedrag || "...";
            const inh = this.inhoud || "...";
            const voor = this.voorwaarden || "...";
            const crit = this.criteria || "...";
            return `${prefix} ${groep} ${voor} ${ged}, ${inh}, ${crit}.`;
        },
    };
}
