<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Generate Certificate</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="max-w-md w-full bg-white p-6 rounded-lg shadow-lg">

        @if (session('status') === 'processing')
            <div id="statusBox" class="mb-4 p-4 text-green-800 bg-green-100 border border-green-300 rounded">
                Your certificate is being generated. Please wait...
            </div>

            <div id="downloadBox" class="hidden mb-4 p-4 bg-blue-100 border border-blue-300 rounded text-center">
                <a id="downloadLink" href="#" download
                    class="inline-block py-2 px-4 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    Download Certificate
                </a>
                <div class="mt-4">
                    <img id="certificatePreview" src="" alt="Certificate Preview"
                        class="mx-auto rounded shadow max-w-full" />
                </div>
            </div>

            <script>
                const pollInterval = 5000;

                function checkCertificate() {
                    fetch("{{ route('certificate.check') }}", {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            }
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.file) {
                                // Hide the generating message
                                document.getElementById('statusBox').style.display = 'none';

                                // Show the download box and preview image
                                const downloadBox = document.getElementById('downloadBox');
                                downloadBox.classList.remove('hidden');
                                const filePath = `/storage/${data.file}`;
                                document.getElementById('downloadLink').href = filePath;
                                document.getElementById('certificatePreview').src = filePath;
                            } else {
                                setTimeout(checkCertificate, pollInterval);
                            }
                        })
                        .catch(err => {
                            console.error('Error checking certificate:', err);
                            setTimeout(checkCertificate, pollInterval);
                        });
                }

                checkCertificate();
            </script>
        @endif

        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Generate Certificate</h2>

        <form method="POST" action="{{ route('certificate.generate') }}">
            @csrf
            <button type="submit"
                class="w-full py-3 px-6 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700 transition duration-300">
                Generate Certificate
            </button>
        </form>

    </div>
</body>

</html>
