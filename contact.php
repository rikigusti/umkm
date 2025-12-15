<?php
// [START PHP SECTION]
// PHP untuk mengatur judul halaman
$page_title = "Kontak Kami - Penyimpanan Data Formulir"; 

// Sertakan header (HTML pembuka, Navigasi, dan Firebase Setup)
include 'header.php';
// [END PHP SECTION]
?>

<!-- [START JAVASCRIPT DATABASE LOGIC] 
     Logika pengiriman formulir menggunakan JavaScript Asynchronous untuk berkomunikasi dengan Firestore (pengganti PDO/MySQL).
-->
<script type="module">
    // Import modul Firestore yang dibutuhkan
    import { collection, addDoc } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-firestore.js";

    /**
     * Fungsi untuk menyimpan data kontak ke database Firestore.
     * @param {string} nama - Nama pengirim.
     * @param {string} email - Email pengirim.
     * @param {string} pesan - Isi pesan.
     */
    async function saveContactMessage(nama, email, pesan) {
        // Tunggu hingga otentikasi Firebase selesai (isAuthReady=true)
        while (!window.isAuthReady()) {
            await new Promise(resolve => setTimeout(resolve, 100));
        }

        if (!window.db) {
            window.showCustomModal("Database tidak dapat diakses. Mohon cek koneksi atau log konsol.", "Kesalahan DB");
            console.error("Firestore DB instance is missing.");
            return;
        }

        try {
            // Tentukan jalur koleksi publik untuk pesan kontak: /artifacts/{appId}/public/data/contact_messages
            const appId = window.getAppId();
            const contactCollectionRef = collection(window.db, `artifacts/${appId}/public/data/contact_messages`);

            // Objek data yang akan disimpan ke tabel/koleksi
            const newContact = {
                nama: nama,
                email: email,
                pesan: pesan,
                timestamp: new Date().toISOString(), // Waktu pengiriman
                userId: window.getUserId() // ID pengguna yang mengirim pesan
            };

            // Menambahkan dokumen baru (setara INSERT INTO di MySQL)
            const docRef = await addDoc(contactCollectionRef, newContact);

            window.showCustomModal(`Pesan Anda berhasil terkirim dan disimpan di database! (ID: ${docRef.id})`, "Pengiriman Sukses");
            
            // Bersihkan formulir setelah sukses
            document.getElementById('contactForm').reset();

        } catch (e) {
            console.error("Error adding document to Firestore: ", e);
            window.showCustomModal("Terjadi kesalahan saat menyimpan pesan Anda.", "Kesalahan Penyimpanan Database");
        }
    }

    // Listener untuk menangani pengiriman formulir (menggantikan action="contact.php" di PHP)
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('contactForm');
        const submitButton = document.getElementById('submitButton');

        form.addEventListener('submit', async (e) => {
            e.preventDefault(); // Mencegah submit default formulir HTML/PHP

            // Ambil nilai input
            const nama = document.getElementById('nama').value.trim();
            const email = document.getElementById('email').value.trim();
            const pesan = document.getElementById('pesan').value.trim();

            if (nama === "" || email === "" || pesan === "") {
                window.showCustomModal("Mohon lengkapi semua kolom formulir.", "Peringatan Validasi");
                return;
            }

            // Tampilkan loading state
            submitButton.disabled = true;
            submitButton.textContent = 'Mengirim...';
            submitButton.classList.add('bg-gray-400');
            submitButton.classList.remove('hover:bg-red-700');

            // Panggil fungsi penyimpanan database
            await saveContactMessage(nama, email, pesan);

            // Kembalikan ke normal state
            submitButton.disabled = false;
            submitButton.textContent = 'Kirim Pesan';
            submitButton.classList.remove('bg-gray-400');
            submitButton.classList.add('hover:bg-red-700');
        });
    });
</script>
<!-- [END JAVASCRIPT DATABASE LOGIC] -->


<!-- [START HTML FORM SECTION] -->
<section class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow-2xl">
    <h2 class="text-4xl font-extrabold text-red-600 text-center mb-6">Hubungi Kami</h2>
    <p class="text-center text-gray-600 mb-8">Kirimkan pertanyaan atau saran Anda. Data ini akan disimpan ke database persistent.</p>

    <!-- Formulir Kontak. action="" kosong karena ditangani oleh JavaScript -->
    <form id="contactForm" method="POST" action="" class="space-y-6">
        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500 transition duration-150" placeholder="Nama Anda">
        </div>
        
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
            <input type="email" id="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500 transition duration-150" placeholder="contoh@email.com">
        </div>

        <div>
            <label for="pesan" class="block text-sm font-medium text-gray-700 mb-1">Pesan Anda</label>
            <textarea id="pesan" name="pesan" rows="5" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500 transition duration-150" placeholder="Tulis pesan Anda di sini..."></textarea>
        </div>

        <button id="submitButton" type="submit" class="w-full bg-red-600 text-white font-bold py-3 rounded-xl shadow-md hover:bg-red-700 transition duration-300 transform hover:scale-[1.01]">
            Kirim Pesan
        </button>
    </form>
</section>
<!-- [END HTML FORM SECTION] -->

<?php 
// Menyertakan footer yang berisi penutup HTML dan modal kustom
include 'footer.php'; 
?>