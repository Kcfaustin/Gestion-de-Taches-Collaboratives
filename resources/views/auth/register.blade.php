<x-guest-layout>
    <div class="w-full max-w-md mx-auto bg-white p-8 rounded-xl shadow-xl border border-gray-100">
        <!-- Header avec icône -->
        <div class="text-center mb-8">
            <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="bi bi-person-plus text-green-600 text-2xl"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Créer un compte</h2>
            <p class="text-gray-600">Rejoignez notre plateforme de gestion de tâches</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-800 mb-2">
                    <i class="bi bi-person me-1"></i>Nom complet
                </label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                       class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-lg text-gray-900 placeholder-gray-500 focus:border-green-500 focus:bg-white focus:outline-none transition-all duration-200"
                       placeholder="Votre nom complet">
                @error('name')
                    <div class="mt-2 text-red-600 text-sm font-medium flex items-center">
                        <i class="bi bi-exclamation-triangle me-1"></i>{{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-800 mb-2">
                    <i class="bi bi-envelope me-1"></i>Adresse email
                </label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                       class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-lg text-gray-900 placeholder-gray-500 focus:border-green-500 focus:bg-white focus:outline-none transition-all duration-200"
                       placeholder="votre@email.com">
                @error('email')
                    <div class="mt-2 text-red-600 text-sm font-medium flex items-center">
                        <i class="bi bi-exclamation-triangle me-1"></i>{{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-semibold text-gray-800 mb-2">
                    <i class="bi bi-lock me-1"></i>Mot de passe
                </label>
                <input id="password" type="password" name="password" required
                       class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-lg text-gray-900 placeholder-gray-500 focus:border-green-500 focus:bg-white focus:outline-none transition-all duration-200"
                       placeholder="••••••••">
                @error('password')
                    <div class="mt-2 text-red-600 text-sm font-medium flex items-center">
                        <i class="bi bi-exclamation-triangle me-1"></i>{{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-semibold text-gray-800 mb-2">
                    <i class="bi bi-shield-check me-1"></i>Confirmer le mot de passe
                </label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                       class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-lg text-gray-900 placeholder-gray-500 focus:border-green-500 focus:bg-white focus:outline-none transition-all duration-200"
                       placeholder="••••••••">
            </div>

            <!-- Terms and Conditions -->
            <div class="flex items-start">
                <input id="terms" type="checkbox" required
                       class="w-4 h-4 text-green-600 border-2 border-gray-300 rounded focus:ring-green-500 focus:ring-2 mt-1">
                <label for="terms" class="ml-2 text-sm font-medium text-gray-700">
                    J'accepte les
                    <a href="#" class="text-green-600 hover:text-green-800 hover:underline">conditions d'utilisation</a>
                    et la
                    <a href="#" class="text-green-600 hover:text-green-800 hover:underline">politique de confidentialité</a>
                </label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-200 shadow-lg hover:shadow-xl">
                <i class="bi bi-person-check me-2"></i>Créer mon compte
            </button>

            <!-- Login Link -->
            <div class="text-center pt-4 border-t border-gray-200">
                <p class="text-sm text-gray-600">
                    Vous avez déjà un compte ?
                    <a href="{{ route('login') }}" class="font-medium text-green-600 hover:text-green-800 hover:underline">
                        Se connecter
                    </a>
                </p>
            </div>
        </form>
    </div>
</x-guest-layout>
