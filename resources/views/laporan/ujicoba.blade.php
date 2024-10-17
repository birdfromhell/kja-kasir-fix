<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            /* background-color: #f2f2f2; */
        }

        tfoot {
            /* background-color: #f2f2f2; */
            font-weight: bold;
        }
    </style>
</head>

<body>

    <table>
        <thead>
            <tr>
                <th>Kolom 1</th>
                <th></th>
                <th></th>
                <th>Kolom 4</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Data 1</td>
                <td>Data 2</td>
                <td>Data 3</td>
                <td>Data 4</td>
                <td>Data 5</td>
                <td>Data 6</td>
            </tr>
            <!-- Tambahkan baris sesuai kebutuhan -->
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6">Footer Tabel</td>
            </tr>
        </tfoot>
    </table>

</body>

</html>
