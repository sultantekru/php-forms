<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="tr">

<head>
	<meta charset="utf-8">
	<title>PHP Form Uygulaması</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

	<script>
		tinymce.init({
			selector: 'textarea#inputProductDescription',
			plugins: 'advlist autolink lists link image charmap print preview anchor',
			toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | link image',
			height: 300,
			language: 'tr_TR',
			menubar: true,
		});
	</script>

	<style>
		hr {
			margin-left: 10px;
			margin-right: 10px;
			border: 1px solid #CCCCCC;
		}

		span {
			color: red;
		}

		.form-group {
			font-size: 14px;
			padding-left: 10px;
		}

		.tab-content {
			border: 1px solid #CCCCCC;
			margin-bottom: 10px;
		}

		.tab-pane {
			padding: 30px;
		}

		div#generalTabContent {
			padding: 20px;
		}

		#description {
			font-size: 8px;
			color: #CCCCCC;
		}

		#inputVideoEmbed {
			width: 600px;
			height: 150px;
		}

		.navbar p {
			margin: 0;
			padding: 0;
		}

		.btn-container button {
			margin-left: 10px;
		}

		#cancel {
			color: #dc3545;
		}

		#cancel:hover {
			color: #fff;
		}

		.nav-link {
			color: black;
		}

		.nav-link:hover {
			color: black;
		}

		.dropdown .btn {
			width: 100%;
			border: 1px solid #CCCCCC;
			color: #CCCCCC;
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		.section-container {
			display: flex;
		}

		#amount {
			width: 75px;
			height: 38px;
			margin-right: 3px;
		}

		#basket {
			width: 50px;
			height: 38px;
			color: black;
		}

		.sale-container {
			padding: 15px;
			background-color: #e8e8e8;
		}

		#sale {
			width: 85px;
			height: 38px;
		}

		.btn-danger {
			margin-top: 10px;
		}

		#imgTitle {
			border: 1px solid black;
		}

		#img-line {
			border: 1px dotted;
		}

		.productImg {
			width: 150px;
			height: 150px;
		}

		.imgProductTitle {
			font-weight: bold;
		}

		.discountTitle {
			font-weight: bold;
		}

		.col-sm-2 .input-group,
		.col-sm-2 .dropdown {
			padding: 3px;
			margin-bottom: 3px;
		}
	</style>
</head>

<body>

	<div class="container">
		<div class="navbar">
			<p>Ürün</p>
			<div class="btn-container d-flex justify-content-end flex-column">
				<div>
					<?php
					echo isset($product) ?
						'<button type="button" class="btn btn-outline-warning">Sil</button>' :
						'';
					?>

					<button type="button" class="btn btn-outline-success">
					<?php
					echo isset($product) ?
						'Kaydet' :
						'Ekle';
					?>
					</button>
					<button onclick="window.location='/proje/index.php'" type="button" class="btn btn-outline-danger ml-2">
						 İptal
					</button>
				</div>
			</div>
		</div>
		<ul class="nav nav-tabs" id="mainTab" role="tablist">
			<li class="nav-item" role="presentation">
				<button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="true">Genel</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab" aria-controls="details" aria-selected="false">Detaylar</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="img-tab" data-bs-toggle="tab" data-bs-target="#img" type="button" role="tab" aria-controls="img" aria-selected="false">Resimler</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="discount-tab" data-bs-toggle="tab" data-bs-target="#discount" type="button" role="tab" aria-controls="discount" aria-selected="false">İndirim</button>
			</li>
		</ul>
		<div class="tab-content" id="mainTabContent">
			<div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
				<ul class="nav nav-tabs" id="generalTab" role="tablist">
					<li class="nav-item" role="presentation">
						<button class="nav-link active" id="turkish-tab" data-bs-toggle="tab" data-bs-target="#turkish" type="button" role="tab" aria-controls="turkish" aria-selected="true"><img style="height:20px; margin-right:5px;" src="https://cdn-icons-png.freepik.com/512/555/555560.png" alt="">Türkçe</button>
					</li>
				</ul>
				<div class="tab-content" id="generalTabContent">
					<div class="tab-pane fade show active" id="turkish" role="tabpanel" aria-labelledby="turkish-tab">
						<hr>
						<div class="form-group row">
							<label for="inputProductTitle" class="col-sm-2 col-form-label"><span>*</span> Türkçe Ürün Başlık</label>
							<div class="col-sm-4">
								<input value="<?php echo isset($product) ? $product->product_title : ''; ?>" type="text" class="form-control" id="inputProductTitle">
							</div>
						</div>
						<hr>
						<div class="form-group row">
							<label for="inputAdditionalInfo" class="col-sm-2 col-form-label">Türkçe Ek Bilgi Başlığı</label>
							<div class="col-sm-4">
								<input value="<?php echo isset($product) ? $product->additional_info_title : ''; ?>" type="text" class="form-control" id="inputAdditionalInfo">
							</div>
						</div>
						<hr>
						<div class="form-group row">
							<label for="inputAdditionalDescription" class="col-sm-2 col-form-label">Türkçe Ek Bilgi Açıklaması</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="inputAdditionalDescription">
							</div>
						</div>
						<hr>
						<div class="form-group row">
							<label for="inputMetaTitle" class="col-sm-2 col-form-label">Türkçe Meta Title</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="inputMetaTitle">
							</div>
						</div>
						<hr>
						<div class="form-group row">
							<label for="inputMetaKeywords" class="col-sm-2 col-form-label">Türkçe Meta Keywords</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="inputMetaKeywords">
							</div>
						</div>
						<hr>
						<div class="form-group row">
							<label for="inputMetaDescription" class="col-sm-2 col-form-label">Türkçe Meta Description</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="inputMetaDescription">
							</div>
						</div>
						<hr>
						<div class="form-group row">
							<label for="inputSeo" class="col-sm-2 col-form-label">Türkçe Seo Adresi <p id="description">Seo adresi girilmesi zorunlu değildir, girilen seo adresi gereçli olur, Girilmez ise otomatik olarak Başlık kısmını referans olarak oluşturulur.</p></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="inputSeo">
							</div>
						</div>
						<hr>
						<div class="form-group row">
							<label for="inputProductDescription" class="col-sm-2 col-form-label">Türkçe Ürün Açıklama</label>
							<div class="col-sm-10">
								<textarea id="inputProductDescription"></textarea>
							</div>
						</div>
						<hr>
						<div class="form-group row">
							<label for="inputVideoEmbed" class="col-sm-2 col-form-label">Türkçe Video Embed Kodu <p id="description">Vimeo - Google Video - Youtbe tarzı video sitelerinin embed kodu.</p></label>
							<div class="col-sm-10">
								<textarea id="inputVideoEmbed"></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
				<hr>
				<div class="form-group row">
					<label for="inputProuductCode" class="col-sm-2 col-form-label"><span>*</span> Ürün Kodu <p id="description">Ürün Kodu.</p></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="inputProuductCode">
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label for="amount" class="col-sm-2 col-form-label"><span>*</span> Miktar <p id="description">Üründen kaç adet olacağını belirler. Bu miktar 0 olarak girilirse ürün sitede "stokta yok" ibareleriyle listelenecektir. Eğer üründe seçenek varsa seçeneklerin stoğu ürün stoğundan büyük olamaz.</p></label>
					<div class="col-sm-4 section-container">
						<input type="text" class="form-control" id="amount">
						<div class="dropdown">
							<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
								Adet
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<li><a class="dropdown-item" href="#">Adet</a></li>
								<li><a class="dropdown-item" href="#">Kg</a></li>
							</ul>
						</div>
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label for="basket" class="col-sm-2 col-form-label"><span>*</span> Sepette Ekstra İndirim % <p id="description">Ürün sepet ekstra indirimde seçeneklere fiyat girilmiş ise indirim seçenek fiyatlarına da uygulanmaktadır.</p></label>
					<div class="col-sm-4 section-container">
						<div class="dropdown">
							<button class="btn dropdown-toggle" type="button" id="basket" data-bs-toggle="dropdown" aria-expanded="false">
								0
							</button>
							<ul class="dropdown-menu" aria-labelledby="basket">
								<li><a class="dropdown-item" href="#">5</a></li>
								<li><a class="dropdown-item" href="#">10</a></li>
							</ul>
						</div>
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label for="taxRateSelect" class="col-sm-2 col-form-label"><span>*</span> Vergi Oranı % <p id="description">Ürünün vergi oranı.</p></label>
					<div class="col-sm-4">
						<div class="dropdown">
							<button class="btn dropdown-toggle" type="button" id="taxRateSelect" data-bs-toggle="dropdown" aria-expanded="false">
								18
							</button>
							<ul class="dropdown-menu" aria-labelledby="taxRateSelect">
								<li><a class="dropdown-item" href="#">8</a></li>
								<li><a class="dropdown-item" href="#">18</a></li>
							</ul>
						</div>
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label for="sale" class="col-sm-2 col-form-label"><span>*</span> Satış Fiyatı <p id="description">Ürünün Satış Fiyatı.</p></label>
					<div class="col-sm-10">
						<div class="sale-container">
							<input type="text" class="d-inline-block form-control" id="sale"> TL
							<hr>
							<input type="text" class="d-inline-block form-control" id="sale"> $
							<hr>
							<input type="text" class="d-inline-block form-control" id="sale"> €
						</div>
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label for="sale" class="col-sm-2 col-form-label"><span>*</span> 2.Satış Fiyatı</label>
					<div class="col-sm-10">
						<div class="sale-container">
							<input type="text" class="d-inline-block form-control" id="sale"> TL
						</div>
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label for="stock" class="col-sm-2 col-form-label"><span>*</span> Stoktan Düş <p id="description">Ürün satıldıktan sonra ürün miktarı düşülür.</p></label>
					<div class="col-sm-4">
						<div class="dropdown">
							<button class="btn dropdown-toggle" type="button" id="stock" data-bs-toggle="dropdown" aria-expanded="false">
								-Evet-
							</button>
							<ul class="dropdown-menu" aria-labelledby="stock">
								<li><a class="dropdown-item" href="#">Evet</a></li>
								<li><a class="dropdown-item" href="#">Hayır</a></li>
							</ul>
						</div>
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label for="state" class="col-sm-2 col-form-label"><span>*</span> Durum<p id="description">Ürünleri aktif ya da pasif edin.</p></label>
					<div class="col-sm-4">
						<div class="dropdown">
							<button class="btn dropdown-toggle" type="button" id="state" data-bs-toggle="dropdown" aria-expanded="false">
								-Hayır-
							</button>
							<ul class="dropdown-menu" aria-labelledby="state">
								<li><a class="dropdown-item" href="#">Evet</a></li>
								<li><a class="dropdown-item" href="#">Hayır</a></li>
							</ul>
						</div>
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label for="property" class="col-sm-2 col-form-label"><span>*</span> Özellik Bölümü<p id="description">Ürünlerin özellik tabını gösterin ya da göstermeyin.</p></label>
					<div class="col-sm-4">
						<div class="dropdown">
							<button class="btn dropdown-toggle" type="button" id="property" data-bs-toggle="dropdown" aria-expanded="false">
								-Göster-
							</button>
							<ul class="dropdown-menu" aria-labelledby="property">
								<li><a class="dropdown-item" href="#">Göster</a></li>
								<li><a class="dropdown-item" href="#">Gösterme</a></li>
							</ul>
						</div>
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label for="productTime" class="col-sm-2 col-form-label"><span>*</span> Yeni Ürün Geçerlilik Süresi</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="productTime">
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label for="sorting" class="col-sm-2 col-form-label"><span>*</span> Sıralama</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="sorting">
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label for="show" class="col-sm-2 col-form-label"><span>*</span> Anasayfada Göster <p id="description">AnaSayfa sırasını ayarlamak için sayı giriniz! 0'dan büyük sayı girerseniz anasayfada gösterir ve o sırayı alır. 0 girerseniz anasayfada gözükmez.</p></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="show">
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label for="newProduct" class="col-sm-2 col-form-label"><span>*</span> Yeni Ürün</label>
					<div class="col-sm-4">
						<div class="dropdown">
							<button class="btn dropdown-toggle" type="button" id="newProduct" data-bs-toggle="dropdown" aria-expanded="false">
								-Evet-
							</button>
							<ul class="dropdown-menu" aria-labelledby="newProduct">
								<li><a class="dropdown-item" href="#">Evet</a></li>
								<li><a class="dropdown-item" href="#">Hayır</a></li>
							</ul>
						</div>
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label for="installment" class="col-sm-2 col-form-label"><span>*</span> Taksit</label>
					<div class="col-sm-4">
						<div class="dropdown">
							<button class="btn dropdown-toggle" type="button" id="installment" data-bs-toggle="dropdown" aria-expanded="false">
								-Evet-
							</button>
							<ul class="dropdown-menu" aria-labelledby="installment">
								<li><a class="dropdown-item" href="#">Evet</a></li>
								<li><a class="dropdown-item" href="#">Hayır</a></li>
							</ul>
						</div>
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label for="show" class="col-sm-2 col-form-label"><span>*</span> Garanti Süresi<p id="description">Ürün için verilen ay cinsinden garanti süresi.</p></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="show">
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="img" role="tabpanel" aria-labelledby="img-tab">
				<div class="form-group row">
					<label for="productImg" class="col-sm-2 col-form-label">Ürün Ana Resmi <p id="description">Ürüne ana resim eklemek için tıklayın. Ürün resim eklerken kare resim girmelisiniz, önerilen boyut 800px genişlik, 800px yükseklik. Ürün resim eklerken maksimum resim boyutu 1MB ve genişlik 768px, yükseklik 1024px olmalıdır.</p></label>
					<div class="col-sm-4">
						<img src="https://th.bing.com/th/id/R.52b37a48fe1da713f095575a61df1c54?rik=afUDSZgaB%2f4qOw&pid=ImgRaw&r=0" class="productImg">
					</div>
					<div class="btn-danger">
						<button type="button" class="btn btn-outline-danger">Temizle</button>
					</div>
				</div>
				<div class="form-group row imgProductTitle">
					<label for="image" class="col-sm-2 col-form-label">Resimler</label>
					<hr class="border border-solid">
					<div class="col-sm-4">
						<div class="btn-success">
							<button type="button" class="btn btn-outline-success">Resim Ekle</button>
						</div>
					</div>
					<hr id="img-line">
				</div>
			</div>
			<div class="tab-pane fade" id="discount" role="tabpanel" aria-labelledby="discount-tab">
				<div class="form-group">
					<label for="discountTitle" class="col-sm-2 col-form-label discountTitle">Müşteri Grubu</label>
					<label for="discountTitle" class="col-sm-2 col-form-label discountTitle">Öncelik</label>
					<label for="discountTitle" class="col-sm-2 col-form-label discountTitle">Yüzde İndirim Oranı veya İndirimli Fiyatı</label>
					<label for="discountTitle" class="col-sm-2 col-form-label discountTitle">Başlangıç Tarihi</label>
					<label for="discountTitle" class="col-sm-2 col-form-label discountTitle">Bitiş Tarihi</label>
					<hr>
				</div>
				<div class="form-group row align-items-center">
					<div class="col-sm-2">
						<div class="dropdown">
							<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
								Müşteri
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
								<li><a class="dropdown-item" href="#">Seçenek 1</a></li>
								<li><a class="dropdown-item" href="#">Seçenek 2</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="priority">
					</div>
					<div class="col-sm-2">
						<div class="input-group">
							<input type="text" class="form-control" id="priceTl" placeholder="0.00">
							<span class="input-group-text">TL</span>
						</div>
						<div class="dropdown">
							<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
								Fiyat
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
								<li><a class="dropdown-item" href="#">#</a></li>
							</ul>
						</div>
						<div class="input-group">
							<input type="text" class="form-control" id="priceDollar" placeholder="0.00">
							<span class="input-group-text">$</span>
						</div>
						<div class="dropdown">
							<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
								Fiyat
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
								<li><a class="dropdown-item" href="#">#</a></li>
							</ul>
						</div>
						<div class="input-group">
							<input type="text" class="form-control" id="priceEuro" placeholder="0.00">
							<span class="input-group-text">€</span>
						</div>
						<div class="dropdown">
							<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
								Fiyat
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
								<li><a class="dropdown-item" href="#">#</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="startDate">
					</div>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="endDate">
					</div>
					<div class="col-sm-2">
						<button type="button" class="btn btn-outline-danger">Kaldır</button>
					</div>
					<hr>
					<div class="btn-discount">
						<button type="button" class="btn btn-outline-success">İndirim Ekle</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>