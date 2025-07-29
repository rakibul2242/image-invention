<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-50 to-indigo-100 min-h-screen flex items-center justify-center px-4">
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md">
        <h2 class="text-3xl font-bold text-center text-indigo-700 mb-6">Upload Your Image</h2>

        @if (session('success'))
            <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <div>
                <label for="title" class="block text-sm font-semibold text-gray-700 mb-1">Title</label>
                <input type="text" name="title" id="title"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300"
                    placeholder="Enter image title" value="{{ old('title') }}">
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="file" class="block text-sm font-semibold text-gray-700 mb-1">Select Image</label>
                <input type="file" name="file" id="file"
                    class="w-full file:px-4 file:py-2 file:bg-indigo-600 file:text-white file:rounded-md file:border-none border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300">
                @error('file')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-2">
                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                    Upload
                </button>
            </div>
        </form>
    </div>
</body>
</html>
