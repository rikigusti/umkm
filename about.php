<?php 
// Sertakan header (HTML pembuka, Navigasi, CSS, dan Setup)
include 'header.php'; 
?>

<!-- [START HTML ABOUT SECTION] -->
<section class="text-center">
    <h2 class="text-4xl font-extrabold text-gray-900 mb-12">Para Penjaga Warisan Rasa</h2>
    <p class="text-xl text-gray-600 mb-12 max-w-4xl mx-auto">
        Tim koki kami berdedikasi untuk menyajikan warisan kuliner Indonesia dengan sentuhan modern.
    </p>

    <div class="grid md:grid-cols-3 gap-10">
        <!-- Kartu Koki 1: Chef Adi Wijaya -->
        <div class="interactive-card bg-white p-6 rounded-xl shadow-lg border-b-4 border-red-500">
            <img src="https://placehold.co/200x200/ef4444/ffffff?text=Chef+Adi" alt="Foto Chef Adi Wijaya" class="w-32 h-32 rounded-full mx-auto object-cover border-4 border-red-200 mb-4">
            <h3 class="text-2xl font-bold text-gray-800 mb-1">Chef Adi Wijaya</h3>
            <p class="text-red-600 font-medium mb-3">Spesialis Masakan Sumatra</p>
            <p class="text-gray-600 text-sm">Berpengalaman 20 tahun dalam bumbu-bumbu Rendang dan masakan Padang.</p>
        </div>

        <!-- Kartu Koki 2: Chef Lina Santoso -->
        <div class="interactive-card bg-white p-6 rounded-xl shadow-lg border-b-4 border-red-500">
            <img src="https://placehold.co/200x200/f59e0b/ffffff?text=Chef+Lina" alt="Foto Chef Lina" class="w-32 h-32 rounded-full mx-auto object-cover border-4 border-red-200 mb-4">
            <h3 class="text-2xl font-bold text-gray-800 mb-1">Chef Lina Santoso</h3>
            <p class="text-red-600 font-medium mb-3">Pakar Masakan Jawa & Bali</p>
            <p class="text-gray-600 text-sm">Menguasai teknik memasak tradisional dari tanah Jawa dan Bali.</p>
        </div>

        <!-- Kartu Koki 3: Chef Tomi Putra -->
        <div class="interactive-card bg-white p-6 rounded-xl shadow-lg border-b-4 border-red-500">
            <img src="https://placehold.co/200x200/3b82f6/ffffff?text=Chef+Tomi" alt="Foto Chef Tomi" class="w-32 h-32 rounded-full mx-auto object-cover border-4 border-red-200 mb-4">
            <h3 class="text-2xl font-bold text-gray-800 mb-1">Chef Tomi Putra</h3>
            <p class="text-red-600 font-medium mb-3">Ahli Dessert Tradisional</p>
            <p class="text-gray-600 text-sm">Kreator di balik hidangan penutup yang menyegarkan khas Nusantara.</p>
        </div>
    </div>
</section>
<!-- [END HTML ABOUT SECTION] -->

<?php 
// Sertakan footer (HTML penutup, Modal, dan Utility JS)
include 'footer.php'; 
?>