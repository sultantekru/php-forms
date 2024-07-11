<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title>Product List</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        tr {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container pt-5">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h1 class="mb-0">Veri Listeleme Ekranı</h1>
            <button onclick="window.location='/index.php/products'" type="button" class="btn btn-outline-dark">Ürün Ekle</button>
        </div>
        
        <table class="table table-hover" id="data-table">
            <thead class="thead-dark">
                <tr>
                    <th>Ürün Başlığı</th>
                    <th>Ürün Açıklama</th>
                    <th>Miktar</th>
                    <th>Satış Fiyatı</th>
                    <th>Para Birimi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) : ?>

                    <tr onclick="window.location='<?php echo "/index.php/products/" . $product->id; ?>'">
                        <td><?php echo $product->product_title; ?></td>
                        <td><?php echo $product->product_description; ?></td>
                        <td><?php echo $product->quantity; ?></td>
                        <td><?php echo $product->sales_price; ?></td>
                        <td><?php echo $product->currency; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
