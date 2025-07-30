<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Upload Form</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-gradient-to-r from-blue-50 to-indigo-100 min-h-screen flex items-center gap-10 justify-center px-4">
        <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md">
            <h2 class="text-3xl font-bold text-center text-indigo-700 mb-6">Upload Your Image</h2>

            @if (session('success'))
                <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('addText.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-2">
                @csrf

                <div>
                    <input type="text" name="title1"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300"
                        placeholder="Text 1" value="{{ old('title1') }}">
                    @error('title1')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="text" name="title2"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300"
                        placeholder="Text 2" value="{{ old('title2') }}">
                    @error('title2')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="text" name="title3"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300"
                        placeholder="Text 3" value="{{ old('title3') }}">
                    @error('title3')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="text" name="title4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300"
                        placeholder="Text 4" value="{{ old('title4') }}">
                    @error('title4')
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
        <div>
            <img src="{{ session('image_path') ? asset('storage/' . session('image_path')) : 'https://media.istockphoto.com/id/1055079680/vector/black-linear-photo-camera-like-no-image-available.jpg?s=612x612&w=0&k=20&c=P1DebpeMIAtXj_ZbVsKVvg-duuL0v9DlrOZUvPG6UJk=' }}"
                alt="Uploaded Image">
        </div>




        <form action="{{ route('certificate.generate') }}" method="POST">
            @csrf
            <button type="submit">Generate Certificate</button>
        </form>
    </body>

</html>
