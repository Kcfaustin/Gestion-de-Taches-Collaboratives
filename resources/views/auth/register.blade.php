<x-guest-layout>
    <div class="w-full max-w-md mx-auto bg-white p-6 rounded-lg shadow-md sm:mt-10">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Créer un compte</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                       class="mt-1 block w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-500">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                       class="mt-1 block w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-500">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <input id="password" type="password" name="password" required
                       class="mt-1 block w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-500">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                       class="mt-1 block w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-500">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
                S'inscrire
            </button>
        </form>
    </div>
</x-guest-layout>
