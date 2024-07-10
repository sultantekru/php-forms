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
		function triggerFileInput() {
			const fileInput = document.getElementById('file-input');
			fileInput.click();
		}

		function selectFile() {
			const fileInput = document.getElementById('file-input');
			const imagePreview = document.getElementById('image-preview');

			if (fileInput.files.length > 0) {
				let file = fileInput.files[0];
				const reader = new FileReader();
				reader.onload = function(e) {
					imagePreview.src = e.target.result;
				};
				reader.readAsDataURL(file);
			} else {
				imagePreview.src = 'https://th.bing.com/th/id/R.52b37a48fe1da713f095575a61df1c54?rik=afUDSZgaB%2f4qOw&pid=ImgRaw&r=0';
			}
		}

		function clearFile() {
			const imagePreview = document.getElementById('image-preview');

			imagePreview.src = 'https://th.bing.com/th/id/R.52b37a48fe1da713f095575a61df1c54?rik=afUDSZgaB%2f4qOw&pid=ImgRaw&r=0';
		}

		function submitForm() {
			var formData = new FormData();
			<?php echo isset($product) ? "formData.append('id', " . $product->id . ");" : '' ?>
			formData.append('product_title', document.getElementById('inputProductTitle').value);
			formData.append('additional_info_title', document.getElementById('inputAdditionalInfo').value);
			formData.append('additional_info_description', document.getElementById('inputAdditionalDescription').value);
			formData.append('meta_title', document.getElementById('inputMetaTitle').value);
			formData.append('meta_keywords', document.getElementById('inputMetaKeywords').value);
			formData.append('meta_description', document.getElementById('inputMetaDescription').value);
			formData.append('seo_url', document.getElementById('inputSeo').value);
			formData.append('product_description', document.getElementById('inputProductDescription').value);
			formData.append('video_embed_code', document.getElementById('inputVideoEmbed').value);
			formData.append('product_code', document.getElementById('inputProuductCode').value);
			formData.append('quantity', document.getElementById('amount').value);
			formData.append('extra_discount_in_cart', document.getElementById('basket').value);
			formData.append('tax_rate', document.getElementById('taxRateSelect').value);
			formData.append('sales_price', document.getElementById('sale').value);
			formData.append('second_sales_price', document.getElementById('sale-2').value);
			formData.append('subtract_stock', document.getElementById('stock').value);
			formData.append('status', document.getElementById('status').value);
			formData.append('features_section', document.getElementById('property').value);
			formData.append('new_product_validity_period', document.getElementById('productTime').value);
			formData.append('sort_order', document.getElementById('sorting').value);
			formData.append('show_on_homepage', document.getElementById('show').value);
			formData.append('new_product', document.getElementById('newProduct').value);
			formData.append('installments', document.getElementById('installment').value);
			formData.append('warranty_period', document.getElementById('warrantyPeriod').value);


			formData.append('file', document.getElementById('file-input').files[0]);

			var xhr = new XMLHttpRequest();
			var url = '<?php echo base_url('index.php/submit-products'); ?>';
			xhr.open('POST', url, true);

			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && xhr.status == 200) {
					if (xhr.status == 200) {
						alert('Ürün Başarılı bi şekilde eklendi.')
						window.location = '/proje/index.php';
					} else {
						alert('Ürün eklenirken bi hata oluştu.')
					}
				}
			};
			xhr.send(formData);

		}
	</script>
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

		#delete {
			width: 58px;
		}

		#delete:hover {
			color: #fff
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

		#sale-2 {
			width: 85px;
			height: 38px;
		}

		.btn-danger {
			margin-top: 10px;
		}

		#imgTitle {
			border: 1px solid black;
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

		.combobox {
			border: 1px solid #CCCCCC;
			border-radius: 0.375rem;
		}

		#file-input {
			display: none;
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
						"<button onclick=\"window.location='/proje/index.php/delete-products/" .   $product->id  . "'\" id=\"delete\" type=\"button\" class=\"btn btn-outline-warning\">Sil</button>" :
						'';
					?>

					<button onclick="submitForm()" type="button" class="btn btn-outline-success">
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
								<input value="<?php echo isset($product) ? $product->additional_info_description : ''; ?>" type="text" class="form-control" id="inputAdditionalDescription">
							</div>
						</div>
						<hr>
						<div class="form-group row">
							<label for="inputMetaTitle" class="col-sm-2 col-form-label">Türkçe Meta Title</label>
							<div class="col-sm-4">
								<input value="<?php echo isset($product) ? $product->meta_title : ''; ?>" type="text" class="form-control" id="inputMetaTitle">
							</div>
						</div>
						<hr>
						<div class="form-group row">
							<label for="inputMetaKeywords" class="col-sm-2 col-form-label">Türkçe Meta Keywords</label>
							<div class="col-sm-4">
								<input value="<?php echo isset($product) ? $product->meta_keywords : ''; ?>" type="text" class="form-control" id="inputMetaKeywords">
							</div>
						</div>
						<hr>
						<div class="form-group row">
							<label for="inputMetaDescription" class="col-sm-2 col-form-label">Türkçe Meta Description</label>
							<div class="col-sm-4">
								<input value="<?php echo isset($product) ? $product->meta_description : ''; ?>" type="text" class="form-control" id="inputMetaDescription">
							</div>
						</div>
						<hr>
						<div class="form-group row">
							<label for="inputSeo" class="col-sm-2 col-form-label">Türkçe Seo Adresi <p id="description">Seo adresi girilmesi zorunlu değildir, girilen seo adresi gereçli olur, Girilmez ise otomatik olarak Başlık kısmını referans olarak oluşturulur.</p></label>
							<div class="col-sm-4">
								<input value="<?php echo isset($product) ? $product->seo_url : ''; ?>" type="text" class="form-control" id="inputSeo">
							</div>
						</div>
						<hr>
						<div class="form-group row">
							<label for="inputProductDescription" class="col-sm-2 col-form-label">Türkçe Ürün Açıklama</label>
							<div class="col-sm-10">
								<textarea id="inputProductDescription"><?php echo isset($product) ? $product->product_description : ''; ?></textarea>
							</div>
						</div>
						<hr>
						<div class="form-group row">
							<label for="inputVideoEmbed" class="col-sm-2 col-form-label">Türkçe Video Embed Kodu <p id="description">Vimeo - Google Video - Youtbe tarzı video sitelerinin embed kodu.</p></label>
							<div class="col-sm-10">
								<textarea id="inputVideoEmbed"><?php echo isset($product) ? $product->video_embed_code : ''; ?></textarea>
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
						<input value="<?php echo isset($product) ? $product->product_code : ''; ?>" type="text" class="form-control" id="inputProuductCode">
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label for="amount" class="col-sm-2 col-form-label"><span>*</span> Miktar <p id="description">Üründen kaç adet olacağını belirler. Bu miktar 0 olarak girilirse ürün sitede "stokta yok" ibareleriyle listelenecektir. Eğer üründe seçenek varsa seçeneklerin stoğu ürün stoğundan büyük olamaz.</p></label>
					<div class="col-sm-4 section-container">
						<input value="<?php echo isset($product) ? $product->quantity : ''; ?>" type="text" class="form-control" id="amount">
						<div class="dropdown">
							<select class="combobox py-2 px-3 w-100" id="amount">
								<option>Kg</option>
								<option>Gram</option>
								<option>Adet</option>
							</select>
						</div>
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label for="basket" class="col-sm-2 col-form-label"><span>*</span> Sepette Ekstra İndirim % <p id="description">Ürün sepet ekstra indirimde seçeneklere fiyat girilmiş ise indirim seçenek fiyatlarına da uygulanmaktadır.</p></label>
					<div class="col-sm-4 section-container">
						<div class="dropdown">
							<select id="basket" class="combobox py-2 px-3 w-100" id="extra_discount_in_cart">
								<option>0</option>
								<option>10</option>
							</select>
						</div>
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label for="taxRateSelect" class="col-sm-2 col-form-label"><span>*</span> Vergi Oranı % <p id="description">Ürünün vergi oranı.</p></label>
					<div class="col-sm-4">
						<div class="dropdown">
							<select class="combobox py-2 px-3 w-100" id="taxRateSelect">
								<option value="volvo">5</option>
								<option value="saab">18</option>
								<option value="saab">20</option>
							</select>
						</div>
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label for="sale" class="col-sm-2 col-form-label"><span>*</span> Satış Fiyatı <p id="description">Ürünün Satış Fiyatı.</p></label>
					<div class="col-sm-10">
						<div class="sale-container">
							<input value="<?php echo isset($product) ? $product->sales_price : ''; ?>" type="text" class="d-inline-block form-control" id="sale"> TL
						</div>
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label for="sale-2" class="col-sm-2 col-form-label"><span>*</span> 2.Satış Fiyatı</label>
					<div class="col-sm-10">
						<div class="sale-container">
							<input value="<?php echo isset($product) ? $product->second_sales_price : ''; ?>" type="text" class="d-inline-block form-control" id="sale-2"> TL
						</div>
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label for="stock" class="col-sm-2 col-form-label"><span>*</span> Stoktan Düş <p id="description">Ürün satıldıktan sonra ürün miktarı düşülür.</p></label>
					<div class="col-sm-4">
						<div class="dropdown">
							<select id="stock" class="combobox py-2 px-3 w-100" id="stock">
								<option>Evet</option>
								<option>Hayır</option>
							</select>
						</div>
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label for="status" class="col-sm-2 col-form-label"><span>*</span> Durum<p id="description">Ürünleri aktif ya da pasif edin.</p></label>
					<div class="col-sm-4">
						<div class="dropdown">
							<select id="status" class="combobox py-2 px-3 w-100">
								<option>Evet</option>
								<option>Hayır</option>
							</select>
						</div>
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label for="property" class="col-sm-2 col-form-label"><span>*</span> Özellik Bölümü<p id="description">Ürünlerin özellik tabını gösterin ya da göstermeyin.</p></label>
					<div class="col-sm-4">
						<div class="dropdown">
							<select id="property" class="combobox py-2 px-3 w-100" id="property">
								<option>Göster</option>
								<option>Gösterme</option>
							</select>
						</div>
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label for="productTime" class="col-sm-2 col-form-label"><span>*</span> Yeni Ürün Geçerlilik Süresi</label>
					<div class="col-sm-4">
						<input value="<?php echo isset($product) ? $product->new_product_validity_period : ''; ?>" type="text" class="form-control" id="productTime">
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label for="sorting" class="col-sm-2 col-form-label"><span>*</span> Sıralama</label>
					<div class="col-sm-4">
						<input value="<?php echo isset($product) ? $product->sort_order : ''; ?>" type="text" class="form-control" id="sorting">
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label for="show" class="col-sm-2 col-form-label"><span>*</span> Anasayfada Göster <p id="description">AnaSayfa sırasını ayarlamak için sayı giriniz! 0'dan büyük sayı girerseniz anasayfada gösterir ve o sırayı alır. 0 girerseniz anasayfada gözükmez.</p></label>
					<div class="col-sm-4">
						<input value="<?php echo isset($product) ? $product->show_on_homepage : ''; ?>" type="text" class="form-control" id="show">
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label for="newProduct" class="col-sm-2 col-form-label"><span>*</span> Yeni Ürün</label>
					<div class="col-sm-4">
						<div class="dropdown">
							<select class="combobox py-2 px-3 w-100" id="newProduct">
								<option>Evet</option>
								<option>Hayır</option>
							</select>
						</div>
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label for="installment" class="col-sm-2 col-form-label"><span>*</span> Taksit</label>
					<div class="col-sm-4">
						<div class="dropdown">
							<select class="combobox py-2 px-3 w-100" id="installment">
								<option>Evet</option>
								<option>Hayır</option>
							</select>
						</div>
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label for="warrantyPeriod" class="col-sm-2 col-form-label"><span>*</span> Garanti Süresi<p id="description">Ürün için verilen ay cinsinden garanti süresi.</p></label>
					<div class="col-sm-4">
						<input value="<?php echo isset($product) ? $product->warranty_period : ''; ?>" type="text" class="form-control" id="warrantyPeriod">
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="img" role="tabpanel" aria-labelledby="img-tab">
				<div class="form-group row">
					<label for="productImg" class="col-sm-2 col-form-label">Ürün Ana Resmi <p id="description">Ürüne ana resim eklemek için tıklayın. Ürün resim eklerken kare resim girmelisiniz, önerilen boyut 800px genişlik, 800px yükseklik. Ürün resim eklerken maksimum resim boyutu 1MB ve genişlik 768px, yükseklik 1024px olmalıdır.</p></label>
					<div class="col-sm-4">
						<img id="image-preview" src="<?php echo isset($product) ? $product->image_url : 'https://th.bing.com/th/id/R.52b37a48fe1da713f095575a61df1c54?rik=afUDSZgaB%2f4qOw&pid=ImgRaw&r=0	'; ?>" class="productImg">
					</div>
					<div class="btn-danger">
						<input accept="image/*" type="file" id="file-input" onchange="selectFile()">
						<button onclick="triggerFileInput()" type="button" class="btn btn-outline-success">Resim Ekle</button>
						<button onclick="clearFile()" type="button" class="btn btn-outline-danger">Temizle</button>
					</div>
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
						<select class="combobox py-2 px-3 w-100" id="customer-group">
							<option>Müşteri</option>
						</select>
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
							<select class="combobox py-2 px-3 w-100" id="price">
								<option>Fiyat</option>
							</select>
						</div>
					</div>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="startDate">
					</div>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="endDate">
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<script>
		<?php
		if (isset($product)) {
			echo "document.getElementById('status').value = " . '"' .$product->status . '"';
		}
		?>
	</script>
</body>

</html>