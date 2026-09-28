<?php
$produk = [  
    [
        "nama" => "Monitor ROG 360hz", 
        "kategori" => "Monitor",  
        "harga" => 8800000, 
        "stok" => 4
    ],

    [
        "nama" => "Laptop LOQ Gamink",
        "kategori" => "Laptop",    
        "harga" => 16500000, 
        "stok" => 3
    ],
    
    [
        "nama" => "Mouse OLIKE Wireless",
        "kategori" => "Aksesoris",
        "harga" => 45000,
        "stok" => 12

    ],

    [
        "nama" => "Keyboard Logitech Membran",
        "kategori" => "Aksesoris",
        "harga" => 50000,
        "stok" => 0
    ],

    [
        "nama" => "IEM Studio",
        "kategori" => "Audio",
        "harga" => 1200000,
        "stok" => 5
    ],

    [
        "nama" => "TEAMGROUP Flashdisk 5TB",
        "kategori" => "Storage",
        "harga" => 8500000,
        "stok" => 0
    ],



];

function rupiah($angka) {
    return "Rp" . number_format($angka, 0, ",", ".");
}

function hitungDiskon($harga, $persen) {
    $potongan = $harga * $persen / 100;
    return $harga - $potongan;
}

$jumlah = count($produk);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #fdf6ee;
            color: #3b2f2f;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            padding: 0 20px;
        }

        header {
            background: #ffffff;
            border-bottom: 2px solid #f0e2d0;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 0;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            color: #e07a3f;
        }

        nav a {
            margin-left: 20px;
            color: #6b5a4a;
            text-decoration: none;
            font-size: 14px;
        }

        nav a:hover {
            color: #e07a3f;
        }

        .head {
            background: #2f7f79;
            color: white;
            padding: 50px 30px;
            border-radius: 16px;
            margin: 30px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .head-gambar {
            width: 200px;
            height: 200px;
            flex-shrink: 0;
        }

        .head small {
            color: #cdeeea;
        }

        .head h1 {
            font-size: 34px;
            margin: 8px 0;
        }

        .head p {
            margin-bottom: 20px;
            color: #e6f6f4;
        }

        .btn-head {
            display: inline-block;
            background: #ffcf70;
            color: #3b2f2f;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            text-decoration: none;
        }

        .catalog-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            margin: 40px 0 20px;
        }

        .catalog-head small {
            color: #8a7a6a;
        }

        .total {
            background: #ffffff;
            border: 1px solid #f0e2d0;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 14px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
        }

        .card {
            background: #ffffff;
            border: 1px solid #f0e2d0;
            border-radius: 14px;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .kategori {
            font-size: 13px;
            text-transform: uppercase;
            color: #8a7a6a;
        }

        .badge {
            background: #ffe0d1;
            color: #d2491a;
            padding: 2px 8px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            margin-left: 6px;
        }

        .card h3 {
            font-size: 20px;
            margin: 6px 0 14px;
        }

        .harga-normal {
            color: #a89a8c;
            text-decoration: line-through;
            font-size: 14px;
            min-height: 21px;
        }

        .harga {
            font-size: 22px;
            font-weight: bold;
            color: #2f7f79;
            margin-bottom: 14px;
        }

        .info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid #f3e9dc;
            padding-top: 14px;
            margin-top: auto;
        }

        .status {
            padding: 3px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .tersedia {
            background: #dff5e3;
            color: #23843a;
        }

        .habis {
            background: #fde2e2;
            color: #c0392b;
        }

        button {
            width: 100%;
            margin-top: 16px;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #e07a3f;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #c9682f;
        }

        button:disabled {
            background: #dcd3ca;
            color: #8a7a6a;
            cursor: not-allowed;
        }

        footer {
            margin-top: 60px;
            padding: 24px 0;
            text-align: center;
            font-size: 14px;
            color: #8a7a6a;
            background: #ffffff;
            border-top: 2px solid #f0e2d0;
        }
    
        @media (max-width: 600px) {
            .head {
                padding: 30px 20px;
            }

            .head h1 {
                font-size: 26px;
            }

            .head-gambar {
                display: none;
            }

            .navbar {
                flex-direction: column;
                gap: 8px;
            }

            nav a {
                margin: 0 10px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container navbar">
            <div class="logo">Cia Store</div>
            <nav>
                <a href="#home">Home</a>
                <a href="#products">Products</a>
                <a href="#about">About</a>
            </nav>
        </div>
    </header>

    <main class="container">

        
        <section class="head" id="home">
            <div class="head-teks">
                <small>CIA STORE</small>
                <h1>Tech store Gacor king.</h1>
                <p>Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu disini!</p>
                <a href="#products" class="btn-head">Lihat Produk</a>
            </div>

        
            <svg class="head-gambar" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <circle cx="100" cy="100" r="90" fill="#3a9189"/>
                <path d="M35 55 H58 L76 128 H150 L164 80 H66" fill="none" stroke="#ffffff" stroke-width="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M70 80 H164 L150 128 H76 Z" fill="#ffcf70"/>
                <circle cx="88" cy="152" r="11" fill="#ffffff"/>
                <circle cx="138" cy="152" r="11" fill="#ffffff"/>
            </svg>
        </section>

        
        <section id="products">
            <div class="catalog-head">
                <div>
                    <small>OUR PRODUCTS</small>
                    <h2>Katalog Produk</h2>
                </div>
                <div class="total">Total Produk: <strong><?php echo $jumlah; ?></strong></div>
            </div>

            <div class="grid">
                <?php foreach ($produk as $p) { ?>
                    <?php
                    if ($p["harga"] >= 1000000) {
                        $diskon = true;
                        $hargaAkhir = hitungDiskon($p["harga"], 10);
                    } else {
                        $diskon = false;
                        $hargaAkhir = $p["harga"];
                    }
                    if ($p["stok"] > 0) {
                        $status = "Tersedia";
                        $kelas = "tersedia";
                    } else {
                        $status = "Stok Habis";
                        $kelas = "habis";
                    }
                    ?>
                    <div class="card">
                        <div>
                            <span class="kategori"><?php echo $p["kategori"]; ?></span>
                            <?php if ($diskon) { ?>
                                <span class="badge">DISKON 10%</span>
                            <?php } ?>
                        </div>

                        <h3><?php echo $p["nama"]; ?></h3>

                        <div class="harga-normal">
                            <?php if ($diskon) { echo rupiah($p["harga"]); } ?>
                        </div>
                        <div class="harga"><?php echo rupiah($hargaAkhir); ?></div>

                        <div class="info">
                            <span>Stok: <?php echo $p["stok"]; ?></span>
                            <span class="status <?php echo $kelas; ?>"><?php echo $status; ?></span>
                        </div>

                        <?php if ($p["stok"] > 0) { ?>
                            <button>Beli Sekarang</button>
                        <?php } else { ?>
                            <button disabled>Stok Habis</button>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </section>

    </main>

    <footer id="about">
        <p>Semua hak tidak dilindungi. DO AT YOUR OWN RISK!!!!</p>
    </footer>

</body>
</html>