<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>novdev - Daftar Terpercaya & Blacklist</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #3498db;
            --success: #2ecc71;
            --danger: #e74c3c;
            --light: #ecf0f1;
            --dark: #2c3e50;
            --gray: #95a5a6;
            --admin: #f39c12;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            background-color: #f5f7fa;
            color: #333;
        }

        .container {
            max-width: 100%;
            padding: 15px;
        }

        header {
            background-color: var(--primary);
            color: white;
            padding: 20px 15px;
            text-align: center;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        header h1 {
            font-size: 1.5rem;
            margin-bottom: 5px;
        }

        header p {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .profile-card {
            background: white;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .profile-pic {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 15px;
            border: 3px solid var(--secondary);
            position: relative;
            z-index: 2;
        }

        .profile-info h2 {
            font-size: 1.1rem;
            margin-bottom: 5px;
            color: var(--dark);
            position: relative;
            z-index: 2;
        }

        .profile-info p {
            position: relative;
            z-index: 2;
        }

        .profile-info a {
            color: var(--secondary);
            text-decoration: none;
            font-size: 0.9rem;
            display: inline-block;
            margin-top: 3px;
            position: relative;
            z-index: 2;
        }

        .tabs {
            display: flex;
            margin-bottom: 15px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .tab {
            flex: 1;
            text-align: center;
            padding: 12px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s;
        }

        .tab.active {
            background-color: var(--primary);
            color: white;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .search-box {
            margin-bottom: 15px;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 12px 15px;
            padding-left: 40px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 0.95rem;
            background-color: white;
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
        }

        .list {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }

        .list-item {
            padding: 15px;
            border-bottom: 1px solid #eee;
            position: relative;
        }

        .list-item:last-child {
            border-bottom: none;
        }

        .list-item-title {
            font-weight: bold;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
        }

        .list-item-meta {
            font-size: 0.85rem;
            color: var(--gray);
            margin-bottom: 5px;
        }

        .list-item-desc {
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .list-item-link {
            color: var(--secondary);
            text-decoration: none;
            font-size: 0.85rem;
            display: inline-block;
            margin-top: 5px;
        }

        .id-badge {
            background: var(--primary);
            color: white;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-family: monospace;
            margin-left: 8px;
        }

        .status-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 0.7rem;
            padding: 3px 8px;
            border-radius: 4px;
            font-weight: bold;
        }

        .status-trusted {
            background-color: var(--success);
            color: white;
        }

        .status-blacklisted {
            background-color: var(--danger);
            color: white;
        }

        .status-admin {
            background-color: var(--admin);
            color: white;
            animation: pulse 2s infinite;
        }

        .no-results {
            text-align: center;
            padding: 30px 15px;
            color: var(--gray);
        }

        .register-btn {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: var(--success);
            color: white;
            text-align: center;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            margin-top: 20px;
            text-decoration: none;
        }

        .fab {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 56px;
            height: 56px;
            background-color: var(--success);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            z-index: 100;
        }

        /* Efek khusus untuk admin */
        .admin-card {
            position: relative;
            overflow: hidden;
        }

        .admin-card::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                to bottom right,
                rgba(243, 156, 18, 0.1),
                rgba(243, 156, 18, 0.3),
                rgba(243, 156, 18, 0.1)
            );
            transform: rotate(45deg);
            animation: shine 3s infinite;
            z-index: 1;
        }

        .admin-item {
            position: relative;
            overflow: hidden;
        }

        .admin-item::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(
                to bottom right,
                rgba(243, 156, 18, 0.05),
                rgba(243, 156, 18, 0.1),
                rgba(243, 156, 18, 0.05)
            );
            z-index: 1;
            pointer-events: none;
        }

        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .particle {
            position: absolute;
            background-color: var(--admin);
            border-radius: 50%;
            opacity: 0.6;
            animation: float linear infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 0.6;
            }
            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(243, 156, 18, 0.7);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(243, 156, 18, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(243, 156, 18, 0);
            }
        }

        @keyframes shine {
            0% {
                left: -100%;
            }
            20% {
                left: 100%;
            }
            100% {
                left: 100%;
            }
        }

        /* Styles for Firebase buttons and admin dashboard */
        .auth-buttons button {
            margin: 5px;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: var(--secondary);
            color: white;
        }

        .auth-buttons button:hover {
            opacity: 0.9;
        }

        .approve {
            background: var(--success);
            color: #fff;
        }
        .blacklist {
            background: var(--danger);
            color: #fff;
        }
        .pending {
            background: var(--admin);
            color: #fff;
        }
        #adminDashboard {
            margin-top: 20px;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Trust List</h1>
            <p>Daftar Penjual Terpercaya & Blacklist perdagangan online</p>
        </header>

        <div class="profile-card admin-card">
            <div class="particles" id="profileParticles"></div>
            <img src="profile.jpg" alt="Profil" class="profile-pic" id="profileImage">
            <div class="profile-info">
                <h2>Novdev</h2>
                <p>Admin pengelola trust dan blacklist</p>
                <a href="https://www.facebook.com/profile.php?id=61578458396695&mibextid=ZbWKwL" target="_blank">
                    <i class="fab fa-facebook"></i> Facebook Saya
                </a>
            </div>
        </div>

        <div class="tabs">
            <div class="tab active" onclick="showTab('trusted')">Terpercaya</div>
            <div class="tab" onclick="showTab('blacklisted')">Blacklist</div>
            <div class="tab" onclick="showTab('admin')">Admin</div>
        </div>

        <div id="trusted" class="tab-content active">
            <div class="search-box">
                <i class="fas fa-search search-icon"></i>
                <input type="text" id="trustedSearch" class="search-input" placeholder="Cari nama atau ID...">
            </div>
            <div class="list" id="trustedList">
                <!-- Data akan diisi oleh JavaScript -->
            </div>
        </div>

        <div id="blacklisted" class="tab-content">
            <div class="search-box">
                <i class="fas fa-search search-icon"></i>
                <input type="text" id="blacklistedSearch" class="search-input" placeholder="Cari nama...">
            </div>
            <div class="list" id="blacklistedList">
                <!-- Data akan diisi oleh JavaScript -->
            </div>
        </div>

        <div id="admin" class="tab-content">
            <div class="auth-buttons">
                <button onclick="loginGoogle()">Login Google</button>
                <button onclick="loginEmail()">Login Email</button>
                <button onclick="logout()">Logout</button>
            </div>
            <div id="adminDashboard" style="display:none;">
                <h2>Dashboard Admin</h2>
                <h3>Profil Menunggu Persetujuan</h3>
                <div id="pendingList"></div>
            </div>
        </div>

        <a href="#" class="register-btn" onclick="ajukanProfil()">
            <i class="fas fa-user-plus"></i> Daftarkan Profil
        </a>
    </div>

    <div class="fab" onclick="openWhatsAppApp()">
        <i class="fab fa-whatsapp" style="font-size: 24px;"></i>
    </div>

    <!-- Firebase SDK -->
    <script src="https://www.gstatic.com/firebasejs/10.12.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.12.0/firebase-auth-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.12.0/firebase-firestore-compat.js"></script>

    <script>
        // GANTI dengan konfigurasi Firebase project Anda
        const firebaseConfig = {
            apiKey: "AIzaSyA_D6U1D9avfscIGr7Yl1k0_5NgEJzdlt8",
            authDomain: "trustnblacklist.firebaseapp.com",
            projectId: "trustnblacklist",
            storageBucket: "trustnblacklist.appspot.com",
            messagingSenderId: "590325017453",
            appId: "1:590325017453:web:6a51de8f69e6c1cf704864"
        };

        const app = firebase.initializeApp(firebaseConfig);
        const auth = firebase.auth();
        const db = firebase.firestore();
        const ADMIN_EMAIL = "adminganteng@gmail.com"; // GANTI dengan email admin Anda

        // Fungsi untuk menampilkan tab
        function showTab(tabName) {
            document.querySelectorAll('.tab').forEach(tab => {
                tab.classList.remove('active');
            });
            document.querySelector(`.tab[onclick="showTab('${tabName}')"]`).classList.add('active');

            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.remove('active');
            });
            document.getElementById(tabName).classList.add('active');

            // Load data when tab is shown
            if (tabName === 'trusted' || tabName === 'blacklisted') {
                loadDataFirestore();
            } else if (tabName === 'admin') {
                // Check if user is logged in and is admin before loading admin dashboard
                auth.onAuthStateChanged(user => {
                    if (user && user.email === ADMIN_EMAIL) {
                        document.getElementById("adminDashboard").style.display = "block";
                        loadPendingProfiles();
                    } else {
                        document.getElementById("adminDashboard").style.display = "none";
                        alert("Anda tidak memiliki akses admin.");
                        showTab('trusted'); // Redirect to trusted tab if not admin
                    }
                });
            }
        }

        // Fungsi untuk membuat partikel
        function createParticles(container, count = 15) {
            container.innerHTML = ''; // Clear existing particles
            for (let i = 0; i < count; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');

                // Random size between 2px and 5px
                const size = Math.random() * 3 + 2;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;

                // Random position
                particle.style.left = `${Math.random() * 100}%`;
                particle.style.top = `${Math.random() * 100}%`;

                // Random animation duration
                const duration = Math.random() * 3 + 2;
                particle.style.animationDuration = `${duration}s`;

                container.appendChild(particle);
            }
        }

        // Login Google
        function loginGoogle() {
            const provider = new firebase.auth.GoogleAuthProvider();
            auth.signInWithPopup(provider).catch(err => alert(err.message));
        }

        // Login Email
        function loginEmail() {
            const email = prompt("Masukkan email:");
            const password = prompt("Masukkan password:");
            if (email && password) {
                auth.signInWithEmailAndPassword(email, password).catch(err => alert(err.message));
            }
        }

        // Logout
        function logout() {
            auth.signOut();
            document.getElementById("adminDashboard").style.display = "none";
            showTab('trusted'); // Redirect to trusted tab after logout
        }

        // Ajukan Profil
        function ajukanProfil() {
            const name = prompt("Nama Penjual:");
            const link = prompt("Link Facebook/Profil:");
            const note = prompt("Catatan:");

            if (name && link && note) {
                db.collection("profiles").add({
                    name: name,
                    link: link,
                    note: note,
                    status: "pending",
                    date: new Date().toISOString()
                }).then(() => {
                    alert("Profil berhasil diajukan! Menunggu persetujuan admin.");
                }).catch(err => {
                    alert("Error: " + err.message);
                });
            } else {
                alert("Semua kolom harus diisi!");
            }
        }

        // Load data terpercaya & blacklist dari Firestore
        async function loadDataFirestore() {
            const trustedListElement = document.getElementById('trustedList');
            const blacklistedListElement = document.getElementById('blacklistedList');

            trustedListElement.innerHTML = '';
            blacklistedListElement.innerHTML = '';

            const snapshot = await db.collection("profiles").where("status", "!=", "pending").get();
            if (snapshot.empty) {
                trustedListElement.innerHTML = `
                    <div class="no-results">
                        <i class="fas fa-info-circle" style="font-size: 2rem; margin-bottom: 10px;"></i>
                        <p>Belum ada data penjual terpercaya</p>
                    </div>
                `;
                blacklistedListElement.innerHTML = `
                    <div class="no-results">
                        <i class="fas fa-info-circle" style="font-size: 2rem; margin-bottom: 10px;"></i>
                        <p>Belum ada data blacklist</p>
                    </div>
                `;
                return;
            }

            snapshot.forEach(doc => {
                const item = doc.data();
                const itemElement = document.createElement('div');
                itemElement.className = item.status === 'ADMIN' ? 'list-item admin-item' : 'list-item';

                const statusBadge = item.status === 'ADMIN' ?
                    `<span class="status-badge status-admin">ADMIN</span>` :
                    `<span class="status-badge status-trusted">TERPERCAYA</span>`;

                itemElement.innerHTML = `
                    ${item.status === 'ADMIN' ? '<div class="particles"></div>' : ''}
                    <div class="list-item-title">
                        ${item.name}
                        ${item.id ? `<span class="id-badge">${item.id}</span>` : ''}
                    </div>
                    <div class="list-item-meta">
                        <i class="fas fa-calendar-alt"></i> ${item.date ? new Date(item.date).toLocaleDateString() : 'N/A'}
                    </div>
                    <div class="list-item-desc">
                        ${item.note || 'Tidak ada deskripsi'}
                    </div>
                    <a href="${item.link}" target="_blank" class="list-item-link">
                        <i class="fas fa-external-link-alt"></i> Kunjungi Profil
                    </a>
                    ${statusBadge}
                `;

                if (item.status === "trusted" || item.status === "ADMIN") {
                    trustedListElement.appendChild(itemElement);
                    if (item.status === 'ADMIN') {
                        createParticles(itemElement.querySelector('.particles'), 10);
                    }
                } else if (item.status === "blacklisted") {
                    blacklistedListElement.appendChild(itemElement);
                }
            });
        }

        // Load pending profiles for admin
        async function loadPendingProfiles() {
            const pendingList = document.getElementById("pendingList");
            pendingList.innerHTML = "<p>Loading...</p>";
            const snapshot = await db.collection("profiles").where("status", "==", "pending").get();
            pendingList.innerHTML = "";

            if (snapshot.empty) {
                pendingList.innerHTML = "<p>Tidak ada data pending</p>";
                return;
            }

            snapshot.forEach(doc => {
                const item = doc.data();
                const div = document.createElement("div");
                div.className = "list-item pending";
                div.innerHTML = `
                    <div class="list-item-title">${item.name}</div>
                    <div class="list-item-meta">${item.date ? new Date(item.date).toLocaleDateString() : 'N/A'}</div>
                    <div class="list-item-desc">${item.note || 'Tidak ada deskripsi'}</div>
                    <a href="${item.link}" target="_blank" class="list-item-link">Kunjungi Profil</a><br>
                    <button class="approve" onclick="approveProfile('${doc.id}', 'trusted')">✔ Approve</button>
                    <button class="blacklist" onclick="approveProfile('${doc.id}', 'blacklisted')">✖ Blacklist</button>
                `;
                pendingList.appendChild(div);
            });
        }

        // Approve/Blacklist profile
        async function approveProfile(docId, status) {
            await db.collection("profiles").doc(docId).update({ status: status });
            alert("Profil berhasil diubah menjadi " + status.toUpperCase());
            loadPendingProfiles();
            loadDataFirestore();
        }

        // Fungsi pencarian daftar terpercaya
        function searchTrusted() {
            const searchTerm = document.getElementById('trustedSearch').value.toLowerCase();
            const trustedListElement = document.getElementById('trustedList');
            const items = trustedListElement.getElementsByClassName('list-item');
            let found = false;

            Array.from(items).forEach(item => {
                const name = item.querySelector('.list-item-title').textContent.toLowerCase();
                const id = item.querySelector('.id-badge') ? item.querySelector('.id-badge').textContent.toLowerCase() : '';
                const note = item.querySelector('.list-item-desc').textContent.toLowerCase();

                if (name.includes(searchTerm) || id.includes(searchTerm) || note.includes(searchTerm)) {
                    item.style.display = 'block';
                    found = true;
                } else {
                    item.style.display = 'none';
                }
            });

            const noResultsDiv = trustedListElement.querySelector('.no-results');
            if (!found && !noResultsDiv) {
                trustedListElement.innerHTML += `
                    <div class="no-results">
                        <i class="fas fa-search" style="font-size: 2rem; margin-bottom: 10px;"></i>
                        <p>Tidak ditemukan hasil untuk "${searchTerm}"</p>
                    </div>
                `;
            } else if (found && noResultsDiv) {
                noResultsDiv.remove();
            }
        }

        // Fungsi pencarian daftar blacklist
        function searchBlacklisted() {
            const searchTerm = document.getElementById('blacklistedSearch').value.toLowerCase();
            const blacklistedListElement = document.getElementById('blacklistedList');
            const items = blacklistedListElement.getElementsByClassName('list-item');
            let found = false;

            Array.from(items).forEach(item => {
                const name = item.querySelector('.list-item-title').textContent.toLowerCase();
                const note = item.querySelector('.list-item-desc').textContent.toLowerCase();

                if (name.includes(searchTerm) || note.includes(searchTerm)) {
                    item.style.display = 'block';
                    found = true;
                } else {
                    item.style.display = 'none';
                }
            });

            const noResultsDiv = blacklistedListElement.querySelector('.no-results');
            if (!found && !noResultsDiv) {
                blacklistedListElement.innerHTML += `
                    <div class="no-results">
                        <i class="fas fa-search" style="font-size: 2rem; margin-bottom: 10px;"></i>
                        <p>Tidak ditemukan hasil untuk "${searchTerm}"</p>
                    </div>
                `;
            } else if (found && noResultsDiv) {
                noResultsDiv.remove();
            }
        }

        // Fungsi untuk membuka WhatsApp
        function openWhatsAppApp() {
            const phoneNumber = "6285185917217"; // Ganti dengan nomor WhatsApp Anda
            const message = "Halo, saya ingin mendaftarkan profil saya ke Trust list";
            window.open(`https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`, '_blank');
        }

        // Jalankan saat halaman dimuat
        window.onload = function() {
            // Buat partikel untuk profile card admin
            const profileParticles = document.getElementById('profileParticles');
            createParticles(profileParticles, 20);

            loadDataFirestore();

            // Tambahkan event listener untuk pencarian
            document.getElementById('trustedSearch').addEventListener('input', searchTrusted);
            document.getElementById('blacklistedSearch').addEventListener('input', searchBlacklisted);

            // Jika ada parameter ID di URL
            const urlParams = new URLSearchParams(window.location.search);
            const idParam = urlParams.get('id');
            if (idParam) {
                document.getElementById('trustedSearch').value = idParam;
                showTab('trusted');
                searchTrusted();
            }
        };

        // Auth listener
        auth.onAuthStateChanged(user => {
            if (user) {
                if (user.email === ADMIN_EMAIL) {
                    document.getElementById("adminDashboard").style.display = "block";
                    loadPendingProfiles();
                } else {
                    document.getElementById("adminDashboard").style.display = "none";
                }
            } else {
                document.getElementById("adminDashboard").style.display = "none";
            }
        });
    </script>
</body>
</html>
