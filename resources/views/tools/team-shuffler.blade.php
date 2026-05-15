<x-layout
    title="team-shuffler — kay hardam"
    description="Maak willekeurige teams. Plak namen, kies aantal teams, klaar. Open-source tool voor lesgeven."
    path="/tools/team-shuffler">

    <x-nav />

    {{-- Back to tools --}}
    <a href="/#tools" class="font-mono text-[11px] tracking-wide font-semibold text-muted hover:text-fg mb-6 inline-block">← tools</a>

    {{-- Tool header --}}
    <span class="inline-block bg-accent font-mono text-[11px] font-bold tracking-wide px-2.5 py-1 mb-3.5">tool / team-shuffler</span>
    <h1 class="text-[48px] md:text-[64px] font-extrabold tracking-[-0.045em] leading-[0.9] mb-4">team-shuffler</h1>
    <p class="text-[17px] leading-[1.5] max-w-[520px] mb-10 font-medium">
        Plak namen, kies aantal teams. Klaar.
    </p>

    {{-- Tool UI --}}
    <div class="space-y-7">
        {{-- namen --}}
        <div>
            <label for="names-input" class="block font-mono text-[11px] tracking-wide font-semibold mb-2">
                namen
            </label>
            <p class="text-[14px] leading-[1.5] text-muted font-medium mb-2.5 max-w-[520px]">
                Eén naam per regel. Plak gerust een hele lijst — lege regels worden genegeerd.
            </p>
            <textarea
                id="names-input"
                rows="8"
                placeholder="daan&#10;noor&#10;jesse&#10;..."
                class="w-full border-2 border-fg p-4 text-[15px] font-medium font-sans bg-bg"></textarea>
            <div class="mt-2 font-mono text-[11px] tracking-wide font-semibold text-muted">
                <span id="names-count">0</span> namen herkend
            </div>
        </div>

        {{-- houd uit elkaar --}}
        <div>
            <label for="apart-input" class="block font-mono text-[11px] tracking-wide font-semibold mb-2">
                houd uit elkaar <span class="text-muted font-normal">(optioneel)</span>
            </label>
            <p class="text-[14px] leading-[1.5] text-muted font-medium mb-2.5 max-w-[520px]">
                Twee namen per regel, gescheiden door een komma. Bijvoorbeeld: <span class="font-mono">daan, noor</span>
            </p>
            <textarea
                id="apart-input"
                rows="4"
                placeholder="daan, noor&#10;jesse, sam"
                class="w-full border-2 border-fg p-4 text-[15px] font-medium font-sans bg-bg"></textarea>
        </div>

        {{-- aantal teams --}}
        <div>
            <label for="teams-input" class="block font-mono text-[11px] tracking-wide font-semibold mb-2">
                aantal teams
            </label>
            <input
                type="number"
                id="teams-input"
                min="2"
                max="20"
                value="2"
                class="w-24 border-2 border-fg p-3 text-[15px] font-medium font-sans bg-bg">
        </div>

        {{-- submit + privacy --}}
        <div>
            <button
                type="button"
                id="shuffle-button"
                class="bg-accent text-fg px-[22px] py-3 text-sm font-bold tracking-tight cursor-pointer transition-colors hover:bg-accent-hover">
                maak teams →
            </button>
            <p class="mt-3 font-mono text-[11px] tracking-wide font-medium text-muted leading-[1.6] max-w-[520px]">
                Namen blijven in je browser. Niks gaat weg. Niks wordt bewaard.
            </p>
        </div>
    </div>

    {{-- output --}}
    <div id="teams-result" class="hidden mt-14 pt-7 border-t border-divider">
        <div class="font-mono text-[11px] tracking-wide font-semibold text-muted mb-4">resultaat</div>
        <div id="teams-output" class="space-y-4"></div>
    </div>

    <x-footer />

    <script>
        (function() {
            const namesInput = document.getElementById('names-input');
            const apartInput = document.getElementById('apart-input');
            const teamsInput = document.getElementById('teams-input');
            const shuffleBtn = document.getElementById('shuffle-button');
            const output = document.getElementById('teams-output');
            const result = document.getElementById('teams-result');
            const namesCountEl = document.getElementById('names-count');

            function updateNamesCount() {
                const count = namesInput.value
                    .split('\n')
                    .map(n => n.trim())
                    .filter(n => n.length > 0).length;
                namesCountEl.textContent = count;
            }

            namesInput.addEventListener('input', updateNamesCount);
            updateNamesCount();

            shuffleBtn.addEventListener('click', () => {
                const names = namesInput.value
                    .split('\n')
                    .map(n => n.trim())
                    .filter(n => n.length > 0);

                const teamCount = parseInt(teamsInput.value, 10);

                const constraints = apartInput.value
                    .split('\n')
                    .map(line => line.split(',').map(n => n.trim().toLowerCase()).filter(n => n.length > 0))
                    .filter(pair => pair.length === 2);

                if (names.length < 2) return renderMessage('Voeg minimaal 2 namen toe.');
                if (teamCount < 2) return renderMessage('Minimaal 2 teams.');
                if (names.length < teamCount) return renderMessage('Niet genoeg namen voor dit aantal teams.');

                const namesLower = names.map(n => n.toLowerCase());
                const unknown = [];
                constraints.forEach(pair => pair.forEach(n => {
                    if (!namesLower.includes(n) && !unknown.includes(n)) unknown.push(n);
                }));
                if (unknown.length > 0) {
                    return renderMessage(`Onbekend in 'houd uit elkaar': ${unknown.join(', ')}`);
                }

                const maxAttempts = 100;
                let teams = null;

                for (let attempt = 0; attempt < maxAttempts; attempt++) {
                    const candidate = makeTeams(names, teamCount);
                    if (constraintsSatisfied(candidate, constraints)) {
                        teams = candidate;
                        break;
                    }
                }

                if (!teams) {
                    return renderMessage('Kon geen verdeling vinden die alle paren uit elkaar houdt. Probeer meer teams of minder paren.');
                }

                renderTeams(teams);
            });

            function makeTeams(names, teamCount) {
                const shuffled = [...names];
                for (let i = shuffled.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [shuffled[i], shuffled[j]] = [shuffled[j], shuffled[i]];
                }
                const teams = Array.from({
                    length: teamCount
                }, () => []);
                shuffled.forEach((name, idx) => {
                    teams[idx % teamCount].push(name);
                });
                return teams;
            }

            function constraintsSatisfied(teams, constraints) {
                return constraints.every(([a, b]) => {
                    return !teams.some(team => {
                        const lowered = team.map(n => n.toLowerCase());
                        return lowered.includes(a) && lowered.includes(b);
                    });
                });
            }

            function renderTeams(teams) {
                result.classList.remove('hidden');
                output.innerHTML = '';
                teams.forEach((team, i) => {
                    const card = document.createElement('div');
                    card.className = 'border-2 border-fg p-5';

                    const label = document.createElement('div');
                    label.className = 'font-mono text-[11px] tracking-wide font-semibold text-muted mb-3';
                    label.textContent = `team ${i + 1} · ${team.length} ${team.length === 1 ? 'speler' : 'spelers'}`;
                    card.appendChild(label);

                    const list = document.createElement('ul');
                    list.className = 'space-y-1';
                    team.forEach(name => {
                        const li = document.createElement('li');
                        li.className = 'text-[15px] font-medium';
                        li.textContent = name;
                        list.appendChild(li);
                    });
                    card.appendChild(list);

                    output.appendChild(card);
                });
            }

            function renderMessage(text) {
                result.classList.remove('hidden');
                output.innerHTML = '';
                const p = document.createElement('p');
                p.className = 'font-mono text-[11px] tracking-wide font-semibold text-muted';
                p.textContent = text;
                output.appendChild(p);
            }
        })();
    </script>

</x-layout>