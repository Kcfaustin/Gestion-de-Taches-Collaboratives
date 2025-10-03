<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Scripts -->
    @if(app()->environment('production'))
        <!-- Fallback CSS - Try multiple paths -->
        @if(file_exists(public_path('build/assets/app-Dydjg6F-.css')))
            <link rel="stylesheet" href="{{ secure_asset('build/assets/app-Dydjg6F-.css') }}">
        @elseif(file_exists(public_path('build/assets/app.css')))
            <link rel="stylesheet" href="{{ secure_asset('build/assets/app.css') }}">
        @elseif(file_exists(public_path('build/app.css')))
            <link rel="stylesheet" href="{{ secure_asset('build/app.css') }}">
        @endif
        
        <!-- Fallback JS - Try multiple paths -->
        @if(file_exists(public_path('build/assets/js-K89dAo7v.js')))
            <script type="module" src="{{ secure_asset('build/assets/js-K89dAo7v.js') }}"></script>
        @elseif(file_exists(public_path('build/assets/js.js')))
            <script type="module" src="{{ secure_asset('build/assets/js.js') }}"></script>
        @elseif(file_exists(public_path('build/js.js')))
            <script type="module" src="{{ secure_asset('build/js.js') }}"></script>
        @endif
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body>
    @include('navbar')
    <header class="bg-blue-500 text-white py-16">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold">Contactez-nous</h1>
            <p class="mt-4 text-lg">Vous avez des questions ou des suggestions ? Nous sommes là pour vous aider.</p>
        </div>
    </header>

    <main class="py-8">
        <div class="container mx-auto px-4">
            <div class="bg-white p-6 shadow-md rounded-md max-w-lg mx-auto">
                <h2 class="text-2xl font-bold text-center mb-4">Formulaire de Contact</h2>
                <form action="/send-message" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-medium mb-2">Nom</label>
                        <input type="text" id="name" name="name" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                        <input type="email" id="email" name="email" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
                        <textarea id="message" name="message" rows="4" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    @include('footer')
</body>
</html>
