<x-app-layout>
    <h1 class="text-2xl font-bold text-center mb-4">Your Stamp Collection</h1>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-4">
        @foreach ($stamps as $stamp)
            <div class="p-4 border rounded-lg shadow-md 
                        {{ $stamp->collected ? 'bg-green-100 border-green-500' : 'bg-gray-100 border-gray-300' }}">
                
                <!-- Stamp Icon & Title -->
                <div class="flex flex-col items-center">
                    <div class="w-20 h-20 flex items-center justify-center rounded-full 
                                {{ $stamp->collected ? 'bg-green-500' : 'bg-gray-300' }}">
                        <span class="text-white text-lg font-bold">{{ $stamp->number }}</span>
                    </div>
                    <h2 class="mt-2 text-lg font-semibold">Stamp #{{ $stamp->number }}</h2>
                </div>

                <!-- Status Text -->
                <p class="mt-2 text-center text-sm 
                          {{ $stamp->collected ? 'text-green-700' : 'text-gray-500' }}">
                    {{ $stamp->collected ? '✅ Collected' : '❌ Not Collected' }}
                </p>

                <!-- Show "Scan QR Code" button only for uncollected stamps -->
                @if (!$stamp->collected)
                    <button onclick="startScanner({{ $stamp->id }})" 
                            class="mt-3 w-full bg-blue-500 text-white py-2 rounded">
                        Scan QR Code
                    </button>
                @endif
            </div>
        @endforeach
    </div>

    <!-- QR Scanner Modal -->
    <div id="qr-modal" class="fixed inset-0 bg-gray-900 bg-opacity-75 hidden flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-80 text-center">
            <h2 class="text-lg font-bold mb-4">Scan QR Code</h2>
            <div id="my-qr-reader"></div>
            <button onclick="closeScanner()" class="mt-4 bg-red-500 text-white py-2 px-4 rounded">Close</button>
        </div>
    </div>

    <!-- QR Code Scanner JavaScript -->
    <script src="https://unpkg.com/html5-qrcode"></script>

    <script>
        let qrScanner = null;

        function startScanner(stampId) {
            document.getElementById('qr-modal').classList.remove('hidden');

            if (!qrScanner) {
                qrScanner = new Html5QrcodeScanner("my-qr-reader", { fps: 10, qrbox: 250 });

                qrScanner.render((decodedText) => {
                    alert("Scanned QR Code: " + decodedText);
                    window.location.href = decodedText;  // Redirect to the scanned URL
                });
            }
        }

        function closeScanner() {
            document.getElementById('qr-modal').classList.add('hidden');

            if (qrScanner) {
                qrScanner.clear();
                qrScanner = null; // Reset scanner instance
            }
        }
    </script>
</x-app-layout>
