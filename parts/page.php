<main class="page">
	<div class="container">
		<section class="preview">
			<div class="preview__column">
				<div class="description">
					<h1>Яскраві гаджети на будь-який смак та день</h1>
					<p>Ми зібрали найкращі гаджети від найкращих брендів, щоб порадувати вас свіжими новинками digital-ринку. </p>
					<a href="/all-products/all-products.php">Каталог</a>
				</div>
			</div>
			<div class="preview__column">
				<div class="product">
					<img class="bg-img" src="assets/img/preview-background.png">
					<div class="bg-gradient"></div>
					<img class="header-product-img" src="assets/img/macbook.png">
					<div class="product-description">
						<h1>Macbook 14'' 2021 Pro</h1>
						<p>Apple M1 Max CPU</p>
						<p>14 core GPU</p>
						<h3>264 399 грн.</h3>
					</div>

				</div>
			</div>
		</section>

		<section class="hot-slider">
			<div class="head">
				<h1 class="title" style="font-size: 24px;">Гарячі надходження</h1>
				<ul>
					<li>
						<a href="/all-products/all-products.php">Всі</a>
					</li>
					<li>
						<a href="/all-products/all-products.php?category=Смартфони">Телефони</a>
					</li>
					<li>
						<a href="/all-products/all-products.php?category=Планшети">Планшети</a>
					</li>
					<li>
						<a href="/all-products/all-products.php?category=Ноутбуки">Ноутбуки</a>
					</li>
				</ul>
			</div>
			<div class="mycustom-scroll" data-mcs-theme="3d-dark">
				<div class="hot-slider__slider">
					<?php
					$sql = "SELECT catalog.id, maker_name, product_name, category_name,
					ram, screen_type, cpu, storage, graphic, camera,
					price, rating, img_src
					FROM catalog
					JOIN product ON id_product = product.id
					JOIN category ON id_category = category.id
					JOIN maker ON id_maker = maker.id
					LIMIT 8";
					$result = mysqli_query($conn, $sql);
					while ($row = $result->fetch_assoc()) : ?>
					<div class="hot-slider__column">
						<div class="product-card">
							<h1><?= $row['product_name'] ?></h1>
							<div class="product-img">
								<img src="<?= $row['img_src'] ?>">
							</div>
							<div class="product-text">
								<p><b>Категорія:</b> <?= $row['category_name'] ?></p>
								<p><b>Екран:</b> <?= $row['screen_type'] ?></p>
								<p><b>ОЗУ:</b> <?= $row['ram'] ?> GB</p>
								<p><b>CPU:</b> <?= $row['cpu'] ?></p>
								<p><b>Графіка:</b> <?= $row['graphic'] ?></p>
								<p><b>Сховище:</b> <?= $row['storage'] ?> GB</p>
								<p><b>Камера:</b> <?= $row['camera'] ?> MP</p>
							</div>
							<h3>22 000 грн.</h3>
							<a href="/all-products/all-products.php">
								<img src="assets/img/more.svg">
							</a>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
		</section>

		<section class="offers">
			<div class="offers__column">
				<div class="card">
					<h1>Надходження новых гаджетів</h1>
					<img src="assets/img/offer-backgraund.png">
					<div class="bg-gradient"></div>
					<h2>Надходження новых гаджетів</h2>
					<h3>Электротранспорт снова в моде</h3>
				</div>
			</div>

			<div class="offers__column">
				<div class="card">
					<img src="assets/img/offer-backgraund-2.png">
					<div class="bg-gradient"></div>
					<h2>Надходження новых гаджетів</h2>
					<h3>Электротранспорт снова в моде</h3>
				</div>
			</div>
		</section>


	

		<section class="catalog">
			<div class="catalog-btn-container">
				<a class="catalog-btn" href="/all-products/all-products.php">
					<h1 class="catalog-title">Каталог товарів</h1>
				</a>
			</div>
			<div class="catalog__columns">
				<?php
				$sql = "SELECT catalog.id, maker_name, product_name, category_name,
				ram, screen_type, cpu, storage, graphic, camera,
				price, rating, img_src
				FROM catalog
				JOIN product ON id_product = product.id
				JOIN category ON id_category = category.id
				JOIN maker ON id_maker = maker.id
				LIMIT 8";
				$result = mysqli_query($conn, $sql);
				while ($row = $result->fetch_assoc()) :
					?>
				<div class="catalog__column">
					<div class="product-card">
						<h1><?= $row['product_name'] ?></h1>
						<div class="product-img">
							<img src="<?= $row['img_src'] ?>">
						</div>
						<div class="product-text">
							<p><b>Категорія:</b> <?= $row['category_name'] ?></p>
							<p><b>Екран:</b> <?= $row['screen_type'] ?></p>
							<p><b>ОЗУ:</b> <?= $row['ram'] ?> GB</p>
							<p><b>CPU:</b> <?= $row['cpu'] ?></p>
							<p><b>Графіка:</b> <?= $row['graphic'] ?></p>
							<p><b>Сховище:</b> <?= $row['storage'] ?> GB</p>
							<p><b>Камера:</b> <?= $row['camera'] ?> MP</p>
						</div>
						<h3>22 000 грн.</h3>
						<a href="/all-products/all-products.php">
							<img src="assets/img/more.svg">
						</a>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
		</section>
	</div>
</main>