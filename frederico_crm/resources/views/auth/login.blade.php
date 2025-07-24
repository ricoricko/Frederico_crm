<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Frederico CRM</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Login to Frederico CRM</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="w-full px-3 py-2 border rounded-lg" value="{{ old('email') }}" required>
                 @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="w-full px-3 py-2 border rounded-lg" required>
            </div>
            <button type="submit" class="w-full bg-indigo-500 text-white py-2 rounded-lg hover:bg-indigo-600">Login</button>
        </form>
        <div class="mt-4 text-sm text-gray-600">
            <p>Dummy:</p>
            <p>Sales: sales@smart.com | Pass: password</p>
            <p>Manager: manager@smart.com | Pass: password</p>
        </div>
    </div>
</body>
</html>