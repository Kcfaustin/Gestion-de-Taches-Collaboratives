<x-guest-layout>
    <div class="w-full max-w-md mx-auto bg-transparent p-8 rounded-lg shadow-lg border border-gray-200">
        <h2 class="text-3xl font-extrabold text-center text-blue-600 mb-6">Se connecter</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-5">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="mt-1 block w-full px-4 py-3 bg-white border border-blue-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-5">
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <input id="password" type="password" name="password" required
                       class="mt-1 block w-full px-4 py-3 bg-white border border-blue-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between mb-6">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="rounded text-blue-600 focus:ring-blue-500">
                    <span class="ml-2 text-sm text-gray-600">Se souvenir de moi</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:underline">Mot de passe oublié ?</a>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg hover:bg-blue-700 transition">
                Se connecter
            </button>
        </form>
    </div>
</x-guest-layout>
