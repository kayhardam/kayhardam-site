<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <title>team-shuffler — kay hardam</title>
    <meta name="description" content="Maak willekeurige teams. Plak namen, kies aantal teams, klaar. Open-source tool voor lesgeven.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="canonical" href="https://kayhardam.dev/tools/team-shuffler">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://kayhardam.dev/tools/team-shuffler">
    <meta property="og:title" content="team-shuffler — kay hardam">
    <meta property="og:description" content="Maak willekeurige teams. Plak namen, kies aantal teams, klaar.">
    <meta property="og:image" content="https://kayhardam.dev/og-image.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="nl_NL">
</head>

<body>
    <div class="max-w-3xl mx-auto px-6 md:px-10 py-10 md:py-12">

        {{-- Top nav --}}
        <nav class="flex justify-between items-center mb-12 font-mono text-[11px] tracking-wide font-semibold">
            <a href="/">kayhardam.dev</a>
            <div class="space-x-4 text-muted font-medium">
                <a href="/#about">over</a>
                <a href="/#tools">tools</a>
                <a href="/#notes">notes</a>
            </div>
        </nav>

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

            {{-- submit --}}
            <button
                type="button"
                id="shuffle-button"
                class="bg-accent text-fg px-[22px] py-3 text-sm font-bold tracking-tight cursor-pointer transition-colors hover:bg-accent-hover">
                maak teams →
            </button>
        </div>

        {{-- output --}}
        {{-- output --}}
        <div class="mt-14 pt-7 border-t border-divider">
            <div class="font-mono text-[11px] tracking-wide font-semibold text-muted mb-4">resultaat</div>
            <div id="teams-output" class="space-y-4"></div>
        </div>

        {{-- Footer --}}
        <footer class="mt-[60px] pt-[22px] border-t-2 border-fg flex justify-between items-center font-mono text-[11px] text-muted font-bold">
            <span>kayhardam.dev · 2026</span>
            <span>
                <a href="https://github.com/kayhardam" class="text-fg underline decoration-1 underline-offset-2">github</a>
                ·
                <a href="mailto:hardamkay@gmail.com" class="text-fg underline decoration-1 underline-offset-2">mail</a>
            </span>
        </footer>

    </div>

    <script>
        (function() {
            const namesInput = document.getElementById('names-input');
            const apartInput = document.getElementById('apart-input');
            const teamsInput = document.getElementById('teams-input');
            const shuffleBtn = document.getElementById('shuffle-button');
            const output = document.getElementById('teams-output');

            const namesCountEl = document.getElementById('names-count');

            function updateNamesCount() {
                const count = namesInput.value
                    .split('\n')
                    .map(n => n.trim())
                    .filter(n => n.length > 0).length;
                namesCountEl.textContent = count;
            }

            namesInput.addEventListener('input', updateNamesCount);
            updateNamesCount(); // initial render

            shuffleBtn.addEventListener('click', () => {
                // 1. parse namen
                const names = namesInput.value
                    .split('\n')
                    .map(n => n.trim())
                    .filter(n => n.length > 0);

                const teamCount = parseInt(teamsInput.value, 10);

                // 2. parse constraints — paren die uit elkaar moeten
                const constraints = apartInput.value
                    .split('\n')
                    .map(line => line.split(',').map(n => n.trim().toLowerCase()).filter(n => n.length > 0))
                    .filter(pair => pair.length === 2);

                // 3. validatie
                if (names.length < 2) return renderMessage('Voeg minimaal 2 namen toe.');
                if (teamCount < 2) return renderMessage('Minimaal 2 teams.');
                if (names.length < teamCount) return renderMessage('Niet genoeg namen voor dit aantal teams.');

                // check: namen in constraints moeten ook in de namen-lijst staan
                const namesLower = names.map(n => n.toLowerCase());
                const unknown = [];
                constraints.forEach(pair => pair.forEach(n => {
                    if (!namesLower.includes(n) && !unknown.includes(n)) unknown.push(n);
                }));
                if (unknown.length > 0) {
                    return renderMessage(`Onbekend in 'houd uit elkaar': ${unknown.join(', ')}`);
                }

                // 4. shuffle-retry tot constraints kloppen
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
                // Fisher-Yates shuffle
                const shuffled = [...names];
                for (let i = shuffled.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [shuffled[i], shuffled[j]] = [shuffled[j], shuffled[i]];
                }
                // round-robin verdeling
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
                output.innerHTML = '';
                const p = document.createElement('p');
                p.className = 'font-mono text-[11px] tracking-wide font-semibold text-muted';
                p.textContent = text;
                output.appendChild(p);
            }
        })();
    </script>
</body>

</html>