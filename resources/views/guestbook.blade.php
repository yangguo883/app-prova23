<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8" />
    <title>Guestbook</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center py-10">

<div class="bg-white shadow-lg rounded-lg max-w-3xl w-full p-8">
    <h1 class="text-4xl font-extrabold text-center mb-8 text-gray-900">Guestbook</h1>

    {{-- Messaggi di conferma --}}
    @if(session('success'))
        <div class="mb-6 p-4 text-green-800 bg-green-100 rounded border border-green-300">
            {{ session('success') }}
        </div>
    @endif

    {{-- Messaggi di errore --}}
    @if ($errors->any())
        <div class="mb-6 p-4 text-red-800 bg-red-100 rounded border border-red-300">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/guestbook/add" class="mb-8">
        @csrf
        <label for="message" class="block mb-2 text-lg font-semibold text-gray-700">Scrivi un messaggio</label>
        <textarea 
            name="message" 
            id="message"
            rows="4" 
            required 
            placeholder="Scrivi qualcosa..." 
            class="w-full rounded-md border border-gray-300 p-3 focus:outline-none focus:ring-2 focus:ring-green-500 resize-none shadow-sm"
        ></textarea>
        <button 
            type="submit" 
            class="mt-4 w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-md transition"
        >
            Invia
        </button>
    </form>

    <form method="POST" action="/logout" class="mb-8">
        @csrf
        <button 
            type="submit" 
            class="w-full border border-gray-400 text-gray-700 hover:bg-gray-200 py-2 rounded-md font-medium transition"
        >
            Logout
        </button>
    </form>

    <h2 class="text-2xl font-bold mb-6 text-gray-900">Messaggi</h2>

    @if ($messages->isEmpty())
        <p class="text-gray-500 italic">Nessun messaggio ancora.</p>
    @else
        <ul class="space-y-4 max-h-96 overflow-y-auto">
            @foreach ($messages as $msg)
                <li class="bg-gray-50 rounded-lg p-4 shadow-sm border border-gray-200">
                    <p class="font-semibold text-green-700 mb-1">
                        {{ $msg->user->name }} <span class="text-gray-500 text-sm">({{ $msg->created_at->format('d/m/Y H:i') }})</span>:
                    </p>
                    <p class="text-gray-800 whitespace-pre-line">{{ $msg->message }}</p>
                </li>
            @endforeach
        </ul>
    @endif
</div>

</body>
</html>
