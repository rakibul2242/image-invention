@section('title', 'Image Invention')
<x-layouts.app>
    <div class="min-h-screen bg-gray-100 p-6">
        <form wire:submit.prevent="generateImage">
            <div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow space-y-6">
                <h1 class="text-2xl font-bold text-gray-800">🧠 Image Invention</h1>

                <div class="space-y-1">
                    <label class="block font-medium text-gray-700">Upload Image</label>
                    <input type="file" wire:model="image" accept="image/*"
                        class="block w-full rounded-lg border border-gray-300 shadow-sm px-4 py-2 focus:ring focus:ring-blue-200">
                    @error('image')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-1">
                    <label class="block font-medium text-gray-700">Overlay Text</label>
                    <input type="text" wire:model.defer="text" placeholder="Enter overlay text"
                        class="w-full border rounded-lg shadow-sm px-4 py-2 focus:ring focus:ring-blue-200">
                    @error('text')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition disabled:opacity-50"
                        wire:loading.attr="disabled">
                        Generate Image
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-layouts.app>