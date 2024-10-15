<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stok Opnem Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        h1 {
            color: #007bff;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }
        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f8f9fa;
        }
        .buttons {
            margin-top: 30px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        .btn-back {
            background-color: #6c757d; /* Warna untuk tombol kembali */
            color: white;
        }
        .nk-footer-copyright {
            text-align: center;
            margin-top: 50px; /* Meningkatkan jarak di atas footer */
            padding: 20px 0; /* Menambahkan padding untuk memperjelas footer */
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Stok Opnem Barang</h1>
        <form>
            <div class="section">
                <h3>Edit Kategori</h3>
                
                <div class="form-group">
                    <label for="customerName">Nama Barang:</label>
                    <input type="text" id="customerName" placeholder="Silahkan Pilih Barang">
                </div>

                <div class="form-group">
                    <label for="selectedItems">Sistem:</label>
                    <input type="text" id="selectedItems" placeholder="Masukkan Sistem">
                </div>
                <div class="form-group">
                    <label for="physical">Fisik:</label>
                    <input type="text" id="physical" placeholder="Masukkan Fisik">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan:</label>
                    <input type="text" id="keterangan" placeholder="Masukkan Keterangan">
                </div>
            </div>

            <div class="buttons">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="button" class="btn btn-back" onclick="window.history.back()">Kembali</button>
            </div>
        </form>
    </div>

    <div class="nk-footer-copyright">
        &copy; Copyright {{ date('Y') }} <span style="color: blue;">KJA Kasir</span> All Rights Reserved
        <a href="https://softnio.com" target="_blank"></a>
    </div>
</body>
</html>
