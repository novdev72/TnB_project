 // Format data:
// - nama: Nama toko/penjual
// - link: Link Facebook
// - note: Catatan/deskripsi
// - id: ID unik (hanya untuk status trusted)
// - status: "trusted" atau "blacklist"
// - date: Tanggal (opsional)

const data = [
    // DAFTAR TERPERCAYA 
    {
        nama: "NovDev",
        link: "https://www.facebook.com/profile.php?id=61578458396695&mibextid=ZbWKwL",
        note: "Si atmin ngapain jir",
        id: "OWNER", //GTR123456789
        status: "ADMIN", //trusted
        date: "selamanya" 
    },
    {
        nama: "Andra birawa barokah",
        link: "https://www.facebook.com/andra.birawahbarokah?mibextid=ZbWKwL",
        note: "Terpercaya menangani payment direct debgan baik",
        id: "GTR132435468", //GTR123456789
        status: "trusted", //trusted
        date: "2025-08-11" 
    },
    
    // DAFTAR BLACKLIST 
    {
        nama: "Eal facht facht",
        link: "https://www.facebook.com/share/1C7kpKTh8S/",
        note: "penipuan berencana",
        status: "blacklist",
        date: "2025-08-03"
    },
    {
        nama: "Riko Ariansyah",
        link: "https://www.facebook.com/share/19aMwTa7jv/",
        note: "percobaan penipuan terhadap seller",
        status: "blacklist",
        date: "2025-08-03"
    },
    {
        nama: "Ucuptampan",
        link: "https://www.facebook.com/ucuptampan.2025?mibextid=ZbWKwL",
        note: "Scam membawa kabur dana",
        status: "blacklist",
        date: "2025-08-04"
    },
    {
         nama: "Babang nazriel ilham Efg",
         link: "https://www.facebook.com/wowbabang?mibextid=ZbWKwL",
        note: "Scam membawa kabur dana korban",
         status: "blacklist",
         date: "2025-08-06"
       },
            
    {
        nama: "Sptr ridho",
        link: "https://www.facebook.com/Altizy77?mibextid=ZbWKwL",
        note: "Scam membawa kabur dana 5k diembat🗿",
        status: "blacklist",
        date: "2025-08-07"
    }, 
        
    {
        nama: "Agus Mulya",
        link: "https://www.facebook.com/profile.php?id=61579126051775&mibextid=ZbWKwL",
        note: "Scam membawa kabur dana",
        status: "blacklist",
        date: "2025-08-07"
    },
{
        nama: "Scarlet Rz",
        link: "https://www.facebook.com/share/19JbpTYeEp/",
        note: "Scammer on mic roblox",
        status: "blacklist",
        date: "2025-08-08"
    },
  
];