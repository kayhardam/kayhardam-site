<x-layout title="Leerdoel-coach">
    @php
    $activiteiten = config('beweegactiviteiten.activiteiten');
    $nietWaarneembaar = config('beweegactiviteiten.niet_waarneembaar');
    @endphp

    <main class="mx-auto max-w-2xl px-6 py-12 tool-leerdoel">

        <header class="mb-12">
            <p class="text-xs font-mono uppercase tracking-wider text-muted mb-4">tool / leerdoel-coach</p>
            <h1 class="text-3xl font-medium lowercase text-fg">leerdoel-coach</h1>
            <p class="mt-3 text-muted">Stap voor stap tot een didactisch onderbouwd leerdoel volgens de GIVC-structuur.</p>
        </header>

        <div
            x-data="leerdoelCoach({ activiteiten: {{ Js::from($activiteiten) }}, nietWaarneembaar: {{ Js::from($nietWaarneembaar) }} })"
            x-cloak
            class="space-y-8">

            <div class="flex items-center justify-between text-xs font-mono text-muted">
                <span x-text="`stap ${step} van 6`"></span>
                <span x-text="stepLabels[step - 1]"></span>
            </div>

            <section x-show="step === 1" class="space-y-6">
                <h2 class="text-xl font-medium lowercase">context</h2>
                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-muted mb-2">groep / leerjaar</label>
                    <input type="text" x-model="context.groep" placeholder="bv. groep 4"
                        class="w-full bg-transparent border-b border-divider py-2 focus:outline-none focus:border-fg">
                </div>
                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-muted mb-2">activiteit</label>
                    <select x-model="context.activiteit"
                        class="w-full bg-transparent border-b border-divider py-2 focus:outline-none focus:border-fg">
                        <option value="">— kies een activiteit —</option>
                        <template x-for="(act, key) in activiteiten" :key="key">
                            <option :value="key" x-text="act.naam"></option>
                        </template>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-muted mb-2">type doel</label>
                    <div class="flex gap-2">
                        <template x-for="t in ['reeksdoel', 'lesdoel']" :key="t">
                            <button type="button" @click="context.type = t"
                                :class="context.type === t ? 'bg-accent border-fg' : 'border-divider'"
                                class="px-4 py-2 text-sm border lowercase" x-text="t"></button>
                        </template>
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-mono uppercase tracking-wider text-muted mb-2">domein</label>
                    <div class="flex flex-wrap gap-2">
                        <template x-for="d in ['motorisch', 'cognitief', 'sociaal-emotioneel']" :key="d">
                            <button type="button" @click="context.domein = d"
                                :class="context.domein === d ? 'bg-accent border-fg' : 'border-divider'"
                                class="px-4 py-2 text-sm border lowercase" x-text="d"></button>
                        </template>
                    </div>
                </div>
            </section>

            <section x-show="step === 2" class="space-y-6">
                <h2 class="text-xl font-medium lowercase">gedrag</h2>
                <p class="text-sm text-muted">Welk actief, waarneembaar werkwoord beschrijft wat de leerling doet?</p>
                <input type="text" x-model="gedrag" placeholder="bv. afzetten"
                    class="w-full bg-transparent border-b border-divider py-2 focus:outline-none focus:border-fg">
                <div x-show="suggesties().length">
                    <p class="text-xs font-mono uppercase tracking-wider text-muted mb-2">suggesties</p>
                    <div class="flex flex-wrap gap-2">
                        <template x-for="w in suggesties()" :key="w">
                            <button type="button" @click="gedrag = w"
                                class="px-3 py-1 text-sm border border-divider hover:bg-accent hover:border-fg"
                                x-text="w"></button>
                        </template>
                    </div>
                </div>
                <p class="text-sm text-muted"><span class="font-mono text-xs uppercase tracking-wider">niet waarneembaar:</span> <span x-text="nietWaarneembaar.join(', ')"></span></p>
            </section>

            <section x-show="step === 3" class="space-y-6">
                <h2 class="text-xl font-medium lowercase">inhoud</h2>
                <p class="text-sm text-muted">Wat is de inhoud, zo concreet mogelijk? Welk lichaamsdeel, materiaal, beweegonderdeel?</p>
                <input type="text" x-model="inhoud" placeholder="bv. met twee voeten"
                    class="w-full bg-transparent border-b border-divider py-2 focus:outline-none focus:border-fg">
            </section>

            <section x-show="step === 4" class="space-y-6">
                <h2 class="text-xl font-medium lowercase">voorwaarden</h2>
                <p class="text-sm text-muted">Onder welke voorwaarden? Aanloop, ondergrond, hulpmiddel, groepering?</p>
                <input type="text" x-model="voorwaarden" placeholder="bv. uit een aanloop, in de trampoline"
                    class="w-full bg-transparent border-b border-divider py-2 focus:outline-none focus:border-fg">
            </section>

            <section x-show="step === 5" class="space-y-6">
                <h2 class="text-xl font-medium lowercase">criteria</h2>
                <p class="text-sm text-muted">Welke minimale prestatie is 'het lukt'?</p>
                <input type="text" x-model="criteria" placeholder="bv. gehurkt over een kast, landing op twee voeten"
                    class="w-full bg-transparent border-b border-divider py-2 focus:outline-none focus:border-fg">
            </section>

            <section x-show="step === 6" class="space-y-6">
                <h2 class="text-xl font-medium lowercase">jouw leerdoel</h2>
                <div class="bg-divider p-6 text-lg leading-relaxed">
                    <span x-text="dummyZin()"></span>
                </div>
                <div class="space-y-2 pt-4 border-t border-divider">
                    <p class="text-xs font-mono uppercase tracking-wider text-muted mb-2">componenten</p>
                    <div class="grid grid-cols-[24px_1fr] gap-x-3 gap-y-1 text-sm">
                        <span class="font-mono text-muted">G</span><span x-text="gedrag || '—'"></span>
                        <span class="font-mono text-muted">I</span><span x-text="inhoud || '—'"></span>
                        <span class="font-mono text-muted">V</span><span x-text="voorwaarden || '—'"></span>
                        <span class="font-mono text-muted">C</span><span x-text="criteria || '—'"></span>
                    </div>
                </div>
                <p class="text-xs font-mono text-muted">— synthese komt straks van claude —</p>
            </section>

            <div class="flex justify-between pt-8 border-t border-divider">
                <button type="button" @click="prev()" x-show="step > 1"
                    class="px-4 py-2 text-sm border border-divider hover:bg-divider">vorige</button>
                <span x-show="step === 1"></span>
                <button type="button" @click="next()" x-show="step < 6"
                    class="px-4 py-2 text-sm border border-fg bg-accent hover:bg-fg hover:text-bg">volgende</button>
                <button type="button" @click="reset()" x-show="step === 6"
                    class="px-4 py-2 text-sm border border-divider hover:bg-divider">opnieuw beginnen</button>
            </div>
        </div>
    </main>
</x-layout>
