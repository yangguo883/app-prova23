<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8" />
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

<div class="bg-white rounded-lg shadow-lg max-w-md w-full p-8">
    <h2 class="text-3xl font-extrabold text-center mb-6 text-gray-900">Login</h2>

    {{-- Messaggi di conferma --}}
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-800 rounded border border-green-300">
            {{ session('success') }}
        </div>
    @endif

    {{-- Messaggi di errore --}}
    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 text-red-800 rounded border border-red-300">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Messaggio di errore personalizzato --}}
    @if(session('error'))
        <div class="mb-6 p-4 bg-red-100 text-red-800 rounded border border-red-300">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="/login" class="space-y-5">
        @csrf
        <div>
            <label for="email" class="block mb-1 font-semibold text-gray-700">Email</label>
            <input 
                type="email" 
                name="email" 
                id="email"
                required 
                placeholder="Inserisci la tua email"
                class="w-full rounded-md border border-gray-300 p-3 focus:outline-none focus:ring-2 focus:ring-green-500 shadow-sm"
            >
        </div>

        <div>
            <label for="password" class="block mb-1 font-semibold text-gray-700">Password</label>
            <input 
                type="password" 
                name="password" 
                id="password"
                required 
                placeholder="Password"
                class="w-full rounded-md border border-gray-300 p-3 focus:outline-none focus:ring-2 focus:ring-green-500 shadow-sm"
            >
        </div>

        <button 
            type="submit" 
            class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-md transition"
        >
            Accedi
        </button>
    </form>

    <div class="mt-6 text-center text-gray-700">
        <a href="/register" class="text-green-600 hover:underline font-medium">Non hai un account? Registrati</a>
    </div>
</div>

</body>
</html>
