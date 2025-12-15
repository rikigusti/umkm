<?php 
// Sertakan header (HTML pembuka, Navigasi, CSS, dan Setup)
include 'header.php'; 
?>

<!-- [START HTML HERO SECTION] -->
<section class="text-center py-20 bg-red-50 rounded-xl shadow-lg">
    <h1 class="text-5xl md:text-7xl font-extrabold text-red-700 mb-4">
        Gerbang Rasa Indonesia
    </h1>
    <p class="text-xl md:text-2xl text-gray-700 max-w-3xl mx-auto mb-8">
        Jelajahi keindahan dan kekayaan kuliner dari Sabang hingga Merauke.
    </p>
    <!-- Gambar Placeholder untuk Hero -->
    <img src="asset/images/sambal.png" height="50px" width="650px" alt="Ilustrasi Sambal dan Bumbu Khas Indonesia" class="mx-auto rounded-xl shadow-xl transition transform hover:scale-[1.01] duration-300">
    <div class="mt-10">
        <a href="produk.php" class="inline-block bg-red-600 text-white text-lg font-semibold px-8 py-3 rounded-full shadow-lg hover:bg-red-700 transition duration-300 transform hover:scale-105">
            Lihat Menu Populer
        </a>
    </div>
</section>
<!-- [END HTML HERO SECTION] -->

<!-- [START HTML FEATURE SECTION] -->
<section class="mt-16">
    <h2 class="text-4xl font-bold text-gray-900 text-center mb-10 border-b-4 border-red-500 inline-block pb-1">Mengapa Kami?</h2>
    <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white p-6 rounded-xl shadow-md border-t-4 border-red-500 interactive-card">
            <h3 class="text-2xl font-semibold text-gray-800 mb-3">Rasa Autentik</h3>
            <p class="text-gray-600">Kami menggunakan resep turun temurun dan bahan-bahan segar lokal.</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md border-t-4 border-red-500 interactive-card">
            <h3 class="text-2xl font-semibold text-gray-800 mb-3">Bahan Pilihan</h3>
            <p class="text-gray-600">Semua bahan dipilih dengan cermat, memastikan kualitas terbaik.</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md border-t-4 border-red-500 interactive-card">
            <h3 class="text-2xl font-semibold text-gray-800 mb-3">Warisan Budaya</h3>
            <p class="text-gray-600">Menyajikan sejarah dan kekayaan budaya Indonesia di meja Anda.</p>
        </div>
    </div>
</section>
<!-- [END HTML FEATURE SECTION] -->

<?php 
// Sertakan footer (HTML penutup, Modal, dan Utility JS)
include 'footer.php'; 
?>