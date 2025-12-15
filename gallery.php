<?php 
// Sertakan header (HTML pembuka, Navigasi, CSS, dan Setup)
include 'header.php'; 
?>

<!-- [START HTML GALLERY SECTION] -->
<section>
    <h2 class="text-4xl font-extrabold text-gray-900 text-center mb-12">Galeri Keindahan Kuliner</h2>
    <p class="text-xl text-gray-600 text-center mb-10">Keindahan visual yang sebanding dengan kelezatannya.</p>

    <!-- Grid untuk menampilkan gambar-gambar galeri -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <!-- Item Galeri 1: Sate -->
        <div class="interactive-card overflow-hidden rounded-xl shadow-lg aspect-square">
            <img src="https://placehold.co/600x600/ef4444/ffffff?text=Sate+Ayam" alt="Foto Sate Ayam" class="w-full h-full object-cover">
        </div>
        <!-- Item Galeri 2: Soto -->
        <div class="interactive-card overflow-hidden rounded-xl shadow-lg aspect-square">
            <img src="https://placehold.co/600x600/f59e0b/ffffff?text=Soto" alt="Foto Semangkuk Soto" class="w-full h-full object-cover">
        </div>
        <!-- Item Galeri 3: Tumpeng -->
        <div class="interactive-card overflow-hidden rounded-xl shadow-lg aspect-square">
            <img src="https://placehold.co/600x600/3b82f6/ffffff?text=Nasi+Tumpeng" alt="Foto Nasi Tumpeng" class="w-full h-full object-cover">
        </div>
        <!-- Item Galeri 4: Sambal -->
        <div class="interactive-card overflow-hidden rounded-xl shadow-lg aspect-square">
            <img src="https://placehold.co/600x600/10b981/ffffff?text=Aneka+Sambal" alt="Foto Aneka Sambal" class="w-full h-full object-cover">
        </div>
    </div>
</section>
<!-- [END HTML GALLERY SECTION] -->

<?php 
// Sertakan footer (HTML penutup, Modal, dan Utility JS)
include 'footer.php'; 
?>