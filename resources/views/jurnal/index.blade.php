<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jurnal Lain</title>
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
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Meningkatkan shadow */
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
        .row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        .col {
            flex: 1;
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
            margin-top: 50px; /* Jarak atas footer */
            padding: 20px 0; /* Padding untuk memperjelas footer */
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Jurnal Lain</h1>
        <form>
            <div class="section">
                <h3>Input Jurnal</h3>
                
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="orderId">ID Jurnal (SO):</label>
                            <input type="text" id="orderId" value="SO-0001" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="orderDate">Tanggal:</label>
                            <input type="date" id="orderDate" value="2024-10-09">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="customerName">Keterangan:</label>
                    <input type="text" id="customerName" placeholder="Masukkan Keterangan">
                </div>

                <div class="form-group">
                    <label for="selectedItems">Nominal:</label>
                    <input type="text" id="selectedItems" placeholder="Masukan Nominal">
                </div>

                <div class="buttons">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="button" class="btn btn-back" onclick="window.history.back()">Kembali</button>
                </div>
            </div>
        </form>
    </div>

    <div class="nk-footer-copyright">
        &copy; Copyright {{ date('Y') }} <span style="color: blue;">KJA Kasir</span> All Rights Reserved
        <a href="https://softnio.com" target="_blank"></a>
    </div>
</body>
</html>
