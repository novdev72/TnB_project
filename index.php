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
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Trust list</h1>
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
            <div class="tab" onclick="showTab('blacklist')">Blacklist</div>
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

        <div id="blacklist" class="tab-content">
            <div class="search-box">
                <i class="fas fa-search search-icon"></i>
                <input type="text" id="blacklistSearch" class="search-input" placeholder="Cari nama...">
            </div>
            
            <div class="list" id="blacklistList">
                <!-- Data akan diisi oleh JavaScript -->
            </div>
        </div>

        <a href="#" class="register-btn" onclick="openWhatsApp()">
            <i class="fas fa-user-plus"></i> Daftarkan Profil
        </a>
    </div>

    <div class="fab" onclick="openWhatsApp()">
        <i class="fab fa-whatsapp" style="font-size: 24px;"></i>
    </div>

    <!-- Perubahan utama di sini: -->
    <script>
        // Memuat data.js dengan parameter versi untuk menghindari cache
        const script = document.createElement('script');
        script.src = 'data.js?v=' + Date.now();
        document.body.appendChild(script);
    </script>

    <script>
        // Fungsi untuk menampilkan tab
        function showTab(tabName) {
            // Update tab aktif
            document.querySelectorAll('.tab').forEach(tab => {
                tab.classList.remove('active');
            });
            document.querySelector(`.tab[onclick="showTab('${tabName}')"]`).classList.add('active');
            
            // Update konten aktif
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.remove('active');
            });
            document.getElementById(tabName).classList.add('active');
        }

        // Fungsi untuk membuat partikel
        function createParticles(container, count = 15) {
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

        // Fungsi untuk memuat dan menampilkan data
        function loadData() {
            const trustedListElement = document.getElementById('trustedList');
            const blacklistListElement = document.getElementById('blacklistList');
            
            // Kosongkan list
            trustedListElement.innerHTML = '';
            blacklistListElement.innerHTML = '';
            
            // Filter data berdasarkan status
            const trustedData = data.filter(item => item.status === 'trusted');
            const adminData = data.filter(item => item.status === 'ADMIN');
            const blacklistData = data.filter(item => item.status === 'blacklist');
            
            // Gabungkan admin dengan trusted (jika ingin admin muncul di tab trusted)
            const combinedTrustedData = [...adminData, ...trustedData];
            
            // Tampilkan data terpercaya + admin
            if (combinedTrustedData.length > 0) {
                combinedTrustedData.forEach(item => {
                    const itemElement = document.createElement('div');
                    itemElement.className = item.status === 'ADMIN' ? 'list-item admin-item' : 'list-item';
                    
                    if (item.status === 'ADMIN') {
                        // Tambahkan partikel untuk admin
                        const particlesDiv = document.createElement('div');
                        particlesDiv.className = 'particles';
                        createParticles(particlesDiv, 10);
                        itemElement.appendChild(particlesDiv);
                    }
                    
                    const statusBadge = item.status === 'ADMIN' ? 
                        '<span class="status-badge status-admin">ADMIN</span>' : 
                        '<span class="status-badge status-trusted">TERPERCAYA</span>';
                    
                    itemElement.innerHTML += `
                        <div class="list-item-title">
                            ${item.nama}
                            ${item.id ? `<span class="id-badge">${item.id}</span>` : ''}
                        </div>
                        <div class="list-item-meta">
                            <i class="fas fa-calendar-alt"></i> ${item.date || 'N/A'}
                        </div>
                        <div class="list-item-desc">
                            ${item.note || 'Tidak ada deskripsi'}
                        </div>
                        <a href="${item.link}" target="_blank" class="list-item-link">
                            <i class="fas fa-external-link-alt"></i> Kunjungi Profil
                        </a>
                        ${statusBadge}
                    `;
                    trustedListElement.appendChild(itemElement);
                });
            } else {
                trustedListElement.innerHTML = `
                    <div class="no-results">
                        <i class="fas fa-info-circle" style="font-size: 2rem; margin-bottom: 10px;"></i>
                        <p>Belum ada data penjual terpercaya</p>
                    </div>
                `;
            }
            
            // Tampilkan data blacklist
            if (blacklistData.length > 0) {
                blacklistData.forEach(item => {
                    const itemElement = document.createElement('div');
                    itemElement.className = 'list-item';
                    itemElement.innerHTML = `
                        <div class="list-item-title">
                            ${item.nama}
                        </div>
                        <div class="list-item-meta">
                            <i class="fas fa-calendar-alt"></i> ${item.date || 'N/A'}
                        </div>
                        <div class="list-item-desc">
                            ${item.note || 'Tidak ada deskripsi'}
                        </div>
                        <a href="${item.link}" target="_blank" class="list-item-link">
                            <i class="fas fa-external-link-alt"></i> Kunjungi Profil
                        </a>
                        <span class="status-badge status-blacklisted">BLACKLIST</span>
                    `;
                    blacklistListElement.appendChild(itemElement);
                });
            } else {
                blacklistListElement.innerHTML = `
                    <div class="no-results">
                        <i class="fas fa-info-circle" style="font-size: 2rem; margin-bottom: 10px;"></i>
                        <p>Belum ada data blacklist</p>
                    </div>
                `;
            }
            
            // Tambahkan event listener untuk pencarian
            document.getElementById('trustedSearch').addEventListener('input', searchTrusted);
            document.getElementById('blacklistSearch').addEventListener('input', searchBlacklist);
        }

        // Fungsi pencarian daftar terpercaya
        function searchTrusted() {
            const searchTerm = document.getElementById('trustedSearch').value.toLowerCase();
            const trustedData = data.filter(item => item.status === 'trusted');
            const adminData = data.filter(item => item.status === 'ADMIN');
            const combinedData = [...adminData, ...trustedData];
            
            const filteredData = combinedData.filter(item => 
                item.nama.toLowerCase().includes(searchTerm) || 
                (item.id && item.id.toLowerCase().includes(searchTerm)) ||
                (item.note && item.note.toLowerCase().includes(searchTerm))
            );
            
            const trustedListElement = document.getElementById('trustedList');
            trustedListElement.innerHTML = '';
            
            if (filteredData.length > 0) {
                filteredData.forEach(item => {
                    const itemElement = document.createElement('div');
                    itemElement.className = item.status === 'ADMIN' ? 'list-item admin-item' : 'list-item';
                    
                    if (item.status === 'ADMIN') {
                        // Tambahkan partikel untuk admin
                        const particlesDiv = document.createElement('div');
                        particlesDiv.className = 'particles';
                        createParticles(particlesDiv, 10);
                        itemElement.appendChild(particlesDiv);
                    }
                    
                    const statusBadge = item.status === 'ADMIN' ? 
                        '<span class="status-badge status-admin">ADMIN</span>' : 
                        '<span class="status-badge status-trusted">TERPERCAYA</span>';
                    
                    itemElement.innerHTML += `
                        <div class="list-item-title">
                            ${item.nama}
                            ${item.id ? `<span class="id-badge">${item.id}</span>` : ''}
                        </div>
                        <div class="list-item-meta">
                            <i class="fas fa-calendar-alt"></i> ${item.date || 'N/A'}
                        </div>
                        <div class="list-item-desc">
                            ${item.note || 'Tidak ada deskripsi'}
                        </div>
                        <a href="${item.link}" target="_blank" class="list-item-link">
                            <i class="fas fa-external-link-alt"></i> Kunjungi Profil
                        </a>
                        ${statusBadge}
                    `;
                    trustedListElement.appendChild(itemElement);
                });
            } else {
                trustedListElement.innerHTML = `
                    <div class="no-results">
                        <i class="fas fa-search" style="font-size: 2rem; margin-bottom: 10px;"></i>
                        <p>Tidak ditemukan hasil untuk "${searchTerm}"</p>
                    </div>
                `;
            }
        }

        // Fungsi pencarian daftar blacklist
        function searchBlacklist() {
            const searchTerm = document.getElementById('blacklistSearch').value.toLowerCase();
            const blacklistData = data.filter(item => item.status === 'blacklist');
            const filteredData = blacklistData.filter(item => 
                item.nama.toLowerCase().includes(searchTerm) || 
                (item.note && item.note.toLowerCase().includes(searchTerm))
            );
            
            const blacklistListElement = document.getElementById('blacklistList');
            blacklistListElement.innerHTML = '';
            
            if (filteredData.length > 0) {
                filteredData.forEach(item => {
                    const itemElement = document.createElement('div');
                    itemElement.className = 'list-item';
                    itemElement.innerHTML = `
                        <div class="list-item-title">
                            ${item.nama}
                        </div>
                        <div class="list-item-meta">
                            <i class="fas fa-calendar-alt"></i> ${item.date || 'N/A'}
                        </div>
                        <div class="list-item-desc">
                            ${item.note || 'Tidak ada deskripsi'}
                        </div>
                        <a href="${item.link}" target="_blank" class="list-item-link">
                            <i class="fas fa-external-link-alt"></i> Kunjungi Profil
                        </a>
                        <span class="status-badge status-blacklisted">BLACKLIST</span>
                    `;
                    blacklistListElement.appendChild(itemElement);
                });
            } else {
                blacklistListElement.innerHTML = `
                    <div class="no-results">
                        <i class="fas fa-search" style="font-size: 2rem; margin-bottom: 10px;"></i>
                        <p>Tidak ditemukan hasil untuk "${searchTerm}"</p>
                    </div>
                `;
            }
        }

        // Fungsi untuk membuka WhatsApp
        function openWhatsApp() {
            const phoneNumber = "6285185917217"; // Ganti dengan nomor WhatsApp Anda
            const message = "Halo, saya ingin mendaftarkan profil saya ke Trust list";
            window.open(`https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`, '_blank');
        }

        // Jalankan saat halaman dimuat
        window.onload = function() {
            // Buat partikel untuk profile card admin
            const profileParticles = document.getElementById('profileParticles');
            createParticles(profileParticles, 20);
            
            loadData();
            
            // Jika ada parameter ID di URL
            const urlParams = new URLSearchParams(window.location.search);
            const idParam = urlParams.get('id');
            if (idParam) {
                document.getElementById('trustedSearch').value = idParam;
                searchTrusted();
            }
        };
    </script>
</body>
</html