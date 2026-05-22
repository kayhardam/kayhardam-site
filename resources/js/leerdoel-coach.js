export function leerdoelCoach({ activiteiten, nietWaarneembaar, csrf }) {
    return {
        activiteiten,
        nietWaarneembaar,
        csrf,
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
        leerdoel: "",
        loading: false,
        error: "",
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
            this.leerdoel = "";
            this.loading = false;
            this.error = "";
        },
        suggesties() {
            const act = this.activiteiten[this.context.activiteit];
            return act ? act.werkwoorden : [];
        },
        async synthesize() {
            this.loading = true;
            this.error = "";
            this.leerdoel = "";

            try {
                const response = await fetch("/tools/leerdoelen", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json",
                        "X-CSRF-TOKEN": this.csrf,
                    },
                    body: JSON.stringify({
                        context: this.context,
                        gedrag: this.gedrag,
                        inhoud: this.inhoud,
                        voorwaarden: this.voorwaarden,
                        criteria: this.criteria,
                    }),
                });

                const data = await response.json();

                if (!response.ok) {
                    this.error =
                        data.error || "Er ging iets mis bij het synthetiseren.";
                    return;
                }

                this.leerdoel = data.leerdoel;
            } catch (e) {
                this.error = "Geen verbinding. Probeer opnieuw.";
            } finally {
                this.loading = false;
            }
        },
    };
}
