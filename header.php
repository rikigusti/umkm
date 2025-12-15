<?php
    // [START PHP GLOBAL VARIABLE]
    // Tentukan judul halaman, jika belum diatur di file PHP yang menyertakan header ini
    $page_title = $page_title ?? "Kuliner Nusantara - Gerbang Rasa Indonesia";
    // [END PHP GLOBAL VARIABLE]
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <!-- Memuat Tailwind CSS CDN untuk styling yang menarik dan responsif -->
     <link rel="icon" type="image/png" href="asset/images/Logo.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* [START CSS STYLES] 
           Catatan: Dalam proyek nyata dengan XAMPP, CSS ini akan dipindahkan ke folder css/style.css
        */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #fefcfb; /* Warna latar belakang krem muda */
        }
        .nav-link { transition: all 0.15s ease; }
        .nav-link:hover { background-color: #fee2e2; }
        .nav-link.active {
            background-color: #ef4444; /* Merah cerah */
            color: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
        }
        .interactive-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .interactive-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(239, 68, 68, 0.3), 0 4px 6px -2px rgba(239, 68, 68, 0.1);
        }
        /* [END CSS STYLES] */
    </style>
    <script>
        // [START JAVASCRIPT GLOBAL HANDLER]
        // Menangani penanda navigasi aktif dan toggle menu mobile
        document.addEventListener('DOMContentLoaded', () => {
            const currentPath = window.location.pathname.split('/').pop() || 'index.php';
            const links = document.querySelectorAll('.nav-link');
            links.forEach(link => {
                const linkHref = link.getAttribute('href').split('/').pop();
                if (linkHref === currentPath) {
                    link.classList.add('active');
                }
            });

            // Toggle menu mobile (Hamburger button)
            const menuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            if (menuButton) {
                menuButton.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });
        // [END JAVASCRIPT GLOBAL HANDLER]
    </script>
    
    <!-- [START FIREBASE SETUP - PENGGANTI KONEKSI MySQL/PDO] 
         Ini adalah inisialisasi database persistent yang diizinkan di lingkungan ini.
    -->
    <script type="module">
        // Import modul-modul Firebase
        import { initializeApp } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-app.js";
        import { getAuth, signInAnonymously, signInWithCustomToken, onAuthStateChanged } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-auth.js";
        import { getFirestore, setLogLevel } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-firestore.js";
        
        // Atur level logging Firestore
        setLogLevel('debug');

        // Mengambil konfigurasi dan token otentikasi dari lingkungan
        const firebaseConfig = typeof __firebase_config !== 'undefined' ? JSON.parse(__firebase_config) : null;
        const initialAuthToken = typeof __initial_auth_token !== 'undefined' ? __initial_auth_token : null;
        const appId = typeof __app_id !== 'undefined' ? __app_id : 'default-app-id';
        let db, auth;
        let userId = null;
        let isAuthReady = false;

        // Inisialisasi dan Otentikasi Firebase
        if (firebaseConfig) {
            const app = initializeApp(firebaseConfig);
            auth = getAuth(app);
            db = getFirestore(app);

            onAuthStateChanged(auth, async (user) => {
                if (user) { userId = user.uid; } 
                // Coba otentikasi jika belum ada pengguna
                if (!user) {
                    try {
                        if (initialAuthToken) {
                            await signInWithCustomToken(auth, initialAuthToken);
                        } else {
                            await signInAnonymously(auth);
                        }
                        userId = auth.currentUser?.uid || crypto.randomUUID();
                    } catch (error) {
                        console.error("Firebase Auth Error:", error);
                        userId = crypto.randomUUID(); // Fallback ID
                    }
                }
                isAuthReady = true; 
            });
        } else {
            console.error("Firebase configuration not found. Running without DB.");
            isAuthReady = true; 
        }

        // Ekspos variabel global ke window agar dapat diakses oleh contact.php
        window.db = db;
        window.getUserId = () => userId;
        window.getAppId = () => appId;
        window.isAuthReady = () => isAuthReady;
    </script>
    <!-- [END FIREBASE SETUP - PENGGANTI KONEKSI MySQL/PDO] -->

</head>
<body class="min-h-screen flex flex-col">

    <!-- [START HTML NAVIGATION] -->
    <header class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo/Nama Situs -->
                <div class="flex-shrink-0">
                    <a href="index.php" class="text-3xl font-extrabold text-red-600 tracking-tight transition duration-300 hover:text-red-800">
                        Infinity <span class="text-gray-900">Food Nusantara</span>
                    </a>
                </div>
                <!-- Navigasi Desktop -->
                <nav class="hidden md:flex space-x-4">
                    <a href="index.php" class="nav-link px-4 py-2 rounded-full text-lg font-medium text-gray-700 hover:bg-red-100">Beranda</a>
                    <a href="produk.php" class="nav-link px-4 py-2 rounded-full text-lg font-medium text-gray-700 hover:bg-red-100">Produk</a>
                    <a href="about.php" class="nav-link px-4 py-2 rounded-full text-lg font-medium text-gray-700 hover:bg-red-100">Tentang Kami</a>
                    <a href="gallery.php" class="nav-link px-4 py-2 rounded-full text-lg font-medium text-gray-700 hover:bg-red-100">Galeri</a>
                    <a href="contact.php" class="nav-link px-4 py-2 rounded-full text-lg font-medium text-gray-700 hover:bg-red-100">Kontak</a>
                </nav>
                <!-- Tombol Menu Mobile -->
                <button id="mobile-menu-button" type="button" class="md:hidden p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none transition duration-150">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" /></svg>
                </button>
            </div>
        </div>
        <!-- Menu Mobile -->
        <div id="mobile-menu" class="hidden md:hidden pb-4">
            <a href="index.php" class="nav-link block px-3 py-2 text-base font-medium text-gray-700 hover:bg-red-100">Beranda</a>
            <a href="produk.php" class="nav-link block px-3 py-2 text-base font-medium text-gray-700 hover:bg-red-100">Produk</a>
            <a href="about.php" class="nav-link block px-3 py-2 text-base font-medium text-gray-700 hover:bg-red-100">Tentang Kami</a>
            <a href="gallery.php" class="nav-link block px-3 py-2 text-base font-medium text-gray-700 hover:bg-red-100">Galeri</a>
            <a href="contact.php" class="nav-link block px-3 py-2 text-base font-medium text-gray-700 hover:bg-red-100">Kontak</a>
        </div>
    </header>
    <!-- [END HTML NAVIGATION] -->

    <!-- Konten Utama Start -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">