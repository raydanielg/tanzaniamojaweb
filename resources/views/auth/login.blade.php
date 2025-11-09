<x-guest-layout>
    <div class="space-y-8">
        <div class="text-center space-y-2">
            <h1 class="text-3xl font-semibold text-white">Karibu tena!</h1>
            <p class="text-sm text-white/70">Ingia kwa kutumia akaunti yako ili kuendelea.</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div class="space-y-2">
                <label for="email" class="block text-sm font-medium text-white">Username / Email</label>
                <input
                    id="email"
                    type="text"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="Ingiza username au barua pepe"
                    class="w-full rounded-lg border border-white/20 bg-white/10 text-white placeholder:text-white/50 focus:border-emerald-300 focus:ring-2 focus:ring-emerald-400/60 transition"
                >
                <x-input-error :messages="$errors->get('email')" class="text-sm text-rose-200" />
            </div>

            <div class="space-y-2">
                <label for="password" class="block text-sm font-medium text-white">Nenosiri</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="Ingiza nenosiri"
                    class="w-full rounded-lg border border-white/20 bg-white/10 text-white placeholder:text-white/50 focus:border-emerald-300 focus:ring-2 focus:ring-emerald-400/60 transition"
                >
                <x-input-error :messages="$errors->get('password')" class="text-sm text-rose-200" />
            </div>

            <div class="flex items-center justify-between text-sm">
                <label for="remember_me" class="inline-flex items-center gap-2 text-white/80">
                    <input id="remember_me" type="checkbox" class="rounded border-white/40 bg-white/10 text-emerald-400 focus:ring-emerald-400/60" name="remember">
                    <span>Kumbuka kifaa hiki</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-emerald-200 hover:text-emerald-100 transition">Umesahau nenosiri?</a>
                @endif
            </div>

            <button type="submit" class="w-full rounded-lg bg-emerald-500 py-2.5 text-white font-semibold shadow-lg shadow-emerald-900/40 hover:bg-emerald-400 transition">
                Ingia
            </button>
        </form>
    </div>
</x-guest-layout>
