<x-guest-layout>
    <div class="w-full max-w-md mx-auto bg-white p-8 rounded-xl shadow-xl border border-gray-100">
        <!-- Header avec icône -->
        <div class="text-center mb-8">
            <div class="bg-orange-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="bi bi-key text-orange-600 text-2xl"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Mot de passe oublié</h2>
            <p class="text-gray-600">Récupérez l'accès à votre compte</p>
        </div>

        <!-- Description -->
        <div class="mb-6 p-4 bg-blue-50 border-l-4 border-blue-400 rounded-r-lg">
            <p class="text-sm text-gray-700 leading-relaxed">
                <i class="bi bi-info-circle text-blue-500 me-2"></i>
                Saisissez votre adresse e-mail et nous vous enverrons un lien sécurisé pour réinitialiser votre mot de passe.
            </p>
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-400 rounded-r-lg">
                <p class="text-sm text-green-700 font-medium">
                    <i class="bi bi-check-circle text-green-500 me-2"></i>
                    {{ session('status') }}
                </p>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-800 mb-2">
                    <i class="bi bi-envelope me-1"></i>Adresse email
                </label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-lg text-gray-900 placeholder-gray-500 focus:border-orange-500 focus:bg-white focus:outline-none transition-all duration-200"
                       placeholder="votre@email.com">
                @error('email')
                    <div class="mt-2 text-red-600 text-sm font-medium flex items-center">
                        <i class="bi bi-exclamation-triangle me-1"></i>{{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-orange-600 hover:bg-orange-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-200 shadow-lg hover:shadow-xl">
                <i class="bi bi-send me-2"></i>Envoyer le lien de réinitialisation
            </button>

            <!-- Back to Login -->
            <div class="text-center pt-4 border-t border-gray-200">
                <p class="text-sm text-gray-600">
                    Vous vous souvenez de votre mot de passe ?
                    <a href="{{ route('login') }}" class="font-medium text-orange-600 hover:text-orange-800 hover:underline">
                        Retour à la connexion
                    </a>
                </p>
            </div>
        </form>
    </div>
</x-guest-layout>
