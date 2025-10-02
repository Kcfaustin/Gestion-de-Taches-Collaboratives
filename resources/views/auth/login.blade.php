<x-guest-layout>
    <div class="w-full max-w-md mx-auto bg-white p-8 rounded-xl shadow-xl border border-gray-100">
        <!-- Header avec icône -->
        <div class="text-center mb-8">
            <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="bi bi-person-check text-blue-600 text-2xl"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Se connecter</h2>
            <p class="text-gray-600">Accédez à votre espace de travail</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-800 mb-2">
                    <i class="bi bi-envelope me-1"></i>Adresse email
                </label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-lg text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:bg-white focus:outline-none transition-all duration-200"
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
                       class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-lg text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:bg-white focus:outline-none transition-all duration-200"
                       placeholder="••••••••">
                @error('password')
                    <div class="mt-2 text-red-600 text-sm font-medium flex items-center">
                        <i class="bi bi-exclamation-triangle me-1"></i>{{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember"
                           class="w-4 h-4 text-blue-600 border-2 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                    <span class="ml-2 text-sm font-medium text-gray-700">Se souvenir de moi</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-sm font-medium text-blue-600 hover:text-blue-800 hover:underline">
                    Mot de passe oublié ?
                </a>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-200 shadow-lg hover:shadow-xl">
                <i class="bi bi-box-arrow-in-right me-2"></i>Se connecter
            </button>

            <!-- Register Link -->
            <div class="text-center pt-4 border-t border-gray-200">
                <p class="text-sm text-gray-600">
                    Pas encore de compte ?
                    <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-800 hover:underline">
                        Créer un compte
                    </a>
                </p>
            </div>
        </form>
    </div>
</x-guest-layout>
