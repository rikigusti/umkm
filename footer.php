</main>
    <!-- Konten Utama End -->

    <!-- [START JAVASCRIPT MODAL UTILITY] 
         Modal kustom adalah pengganti fungsi alert() dan confirm() yang dilarang.
    -->
    <!-- Notifikasi/Modal Kustom HTML -->
    <div id="custom-modal" class="fixed inset-0 bg-black bg-opacity-50 z-[100] hidden items-center justify-center p-4" onclick="this.classList.add('hidden')">
        <div class="bg-white p-6 rounded-xl shadow-2xl max-w-sm w-full transform transition-all duration-300 scale-100" onclick="event.stopPropagation()">
            <h3 id="modal-title" class="text-xl font-bold text-red-600 mb-2"></h3>
            <p id="modal-message" class="text-gray-700"></p>
            <button onclick="document.getElementById('custom-modal').classList.add('hidden')" class="mt-4 w-full bg-red-500 text-white py-2 rounded-lg hover:bg-red-600 transition duration-150">Tutup</button>
        </div>
    </div>

    <!-- Definisi Fungsi JS Modal -->
    <script>
        // Fungsi untuk menampilkan modal kustom yang dipanggil dari seluruh halaman
        function showCustomModal(message, title = "Notifikasi") {
            const modal = document.getElementById('custom-modal');
            if (modal) {
                document.getElementById('modal-title').textContent = title;
                document.getElementById('modal-message').textContent = message;
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            } else {
                 console.error("Custom modal element not found.");
            }
        }
        // Ekspos ke window agar dapat diakses dari modul lain
        window.showCustomModal = showCustomModal;
    </script>
    <!-- [END JAVASCRIPT MODAL UTILITY] -->


    <!-- [START HTML FOOTER] -->
    <footer class="bg-gray-800 mt-12 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-400">
            <p>&copy; 2025 IFINITY STUDIO.</p>
            <div class="flex justify-center space-x-4 mt-3">
                <a href="#" class="text-gray-400 hover:text-red-500 transition duration-150">
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4 11.5h-1v4h-2v-4H8.5V10h4v2.5H16v1z"/></svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-red-500 transition duration-150">
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm3 8h-2V7h-3v3H8v2h2v4h3v-4h2v-2z"/></svg>
                </a>
            </div>
        </div>
    </footer>
    <!-- [END HTML FOOTER] -->

</body>
</html>