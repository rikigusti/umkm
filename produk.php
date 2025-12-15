<?php 
// Sertakan header (HTML pembuka, Navigasi, CSS, dan Setup)
include 'header.php'; 
?>

<!-- [START HTML PRODUK SECTION] -->
<section>
    <h2 class="text-4xl font-extrabold text-gray-900 text-center mb-12">Menu Populer Kami</h2>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Kartu Menu 1: Rendang -->
        <div class="interactive-card bg-white rounded-xl shadow-lg overflow-hidden">
            <img src="https://placehold.co/600x400/10b981/ffffff?text=Rendang" alt="Gambar Rendang Sapi" class="w-full h-48 object-cover">
            <div class="p-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Rendang Sapi</h3>
                <p class="text-red-600 font-semibold mb-3">Rp 55.000</p>
                <p class="text-gray-600 text-sm">Masakan daging dengan bumbu santan dan rempah khas Minang.</p>
            </div>
        </div>

        <!-- Kartu Menu 2: Sate Lilit -->
        <div class="interactive-card bg-white rounded-xl shadow-lg overflow-hidden">
            <img src="https://placehold.co/600x400/22c55e/ffffff?text=Sate+Lilit" alt="Gambar Sate Lilit Bali" class="w-full h-48 object-cover">
            <div class="p-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Sate Lilit Bali</h3>
                <p class="text-red-600 font-semibold mb-3">Rp 45.000</p>
                <p class="text-gray-600 text-sm">Sate khas Bali yang dililitkan pada batang serai.</p>
            </div>
        </div>

        <!-- Kartu Menu 3: Nasi Goreng -->
        <div class="interactive-card bg-white rounded-xl shadow-lg overflow-hidden">
            <img src="https://placehold.co/600x400/f59e0b/ffffff?text=Nasi+Goreng" alt="Gambar Nasi Goreng Spesial" class="w-full h-48 object-cover">
            <div class="p-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Nasi Goreng Spesial</h3>
                <p class="text-red-600 font-semibold mb-3">Rp 35.000</p>
                <p class="text-gray-600 text-sm">Nasi yang digoreng dengan bumbu rahasia, dilengkapi telur mata sapi.</p>
            </div>
        </div>
         <!-- Kartu Menu 4: Gado-Gado -->
        <div class="interactive-card bg-white rounded-xl shadow-lg overflow-hidden">
            <img src="https://placehold.co/600x400/3b82f6/ffffff?text=Gado-Gado" alt="Gambar Gado-Gado Betawi" class="w-full h-48 object-cover">
            <div class="p-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Gado-Gado Betawi</h3>
                <p class="text-red-600 font-semibold mb-3">Rp 30.000</p>
                <p class="text-gray-600 text-sm">Campuran sayuran rebus dengan siraman saus kacang kental.</p>
            </div>
        </div>
    </div>
</section>
<!-- [END HTML PRODUK SECTION] -->

<?php 
// Sertakan footer (HTML penutup, Modal, dan Utility JS)
include 'footer.php'; 
?>