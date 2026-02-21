<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- title -->
	<title>Accueil</title>

	@include('partiels.css_links')

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

	@include('partiels.menu')

	<!-- hero area -->
	<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end hero area -->

	<!-- features list section -->
	<div class="list-section pt-80 pb-80">
		<div class="container">
			
			<div class="row">
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-shipping-fast"></i>
						</div>
						<div class="content">
							<h3>Livraison Gratuite</h3>
							<p>Pour les commandes de 500 dh et plus</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>24/7 Support</h3>
							<p>Recevez de l'aide à tout moment</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="list-box d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fas fa-sync"></i>
						</div>
						<div class="content">
							<h3>Remboursement</h3>
							<p>Remboursement sous 3 jours !</p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- end features list section -->

	<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Nos</span> Produits</h3>
						<p>Chez <a class="libelle" href="/index">{{ config('app.name') }}</a>, nous sélectionnons avec soin des maillots de football authentiques et de qualité, afin d’offrir aux supporters le meilleur en matière de style, de confort et de passion, sans compromis.</p>
					</div>
				</div>
			</div>
			<div id="alert-container"></div>
			<meta name="csrf-token" content="{{ csrf_token() }}">
			<div class="row">
				@if($produits)
					@foreach ($produits as $produit)
					<div class="col-lg-4 col-md-6 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="/afficher_produit?id_produit={{ $produit->id }}"><img src="assets-0/img/products/{{ $produit->photo }}" alt=""></a>
							</div>
							<h3>{{ $produit->designation }}</h3>
							<p class="product-price"><span>{{ $produit->unite_mesure }}</span> {{ $produit->prix_vente }} dh </p>
							<button class="cart-btn add-to-cart" data-id="{{ $produit->id }}"><i class="fas fa-shopping-cart"></i>Ajouter au Panier</button>
						</div>
					</div>
					@endforeach
				@endif
			</div>
		</div>
	</div>
	<!-- end product section -->

	<!-- cart banner section -->
	 @if($produit_solde)
	<section class="cart-banner pt-100 pb-100">
    	<div class="container">
        	<div class="row clearfix">
            	<!--Image Column-->
            	<div class="image-column col-lg-6">
                	<div class="image">
                    	<div class="price-box">
                        	<div class="inner-price">
                                <span class="price">
                                    <strong>30%</strong>
								</span>
                            </div>
                        </div>
                    	<img src="assets-0/img/products/{{ $produit_solde->photo }}" alt="">
                    </div>
                </div>
                <!--Content Column-->
                <div class="content-column col-lg-6">
					<h3><span class="orange-text">Offre </span>du mois</h3>
                    <h4>Maillot du Maroc</h4>
                    <div class="text">Supportez les Lions de l’Atlas avec style : -30% sur nos maillots officiels.
Ne manquez pas cette chance de porter fièrement vos couleurs marocaines et vivre la passion du football !</div>
                    <!--Countdown Timer-->
                    <div class="time-counter"><div class="time-countdown clearfix" data-countdown="2026/03/01"><div class="counter-column"><div class="inner"><span class="count">00</span>Days</div></div> <div class="counter-column"><div class="inner"><span class="count">00</span>Hours</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Mins</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Secs</div></div></div></div>
					<button class="cart-btn add-to-cart" data-id="{{ $produit_solde->id }}"><i class="fas fa-shopping-cart"></i>Ajouter au Panier</button>
                </div>
            </div>
        </div>
    </section>
	@endif
    <!-- end cart banner section -->
	<!-- testimonail-section
	<div class="testimonail-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="testimonial-sliders">
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets-0/img/avaters/avatar1.png" alt="">
							</div>
							<div class="client-meta">
								<h3>Saira Hakim <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets-0/img/avaters/avatar2.png" alt="">
							</div>
							<div class="client-meta">
								<h3>David Niph <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets-0/img/avaters/avatar3.png" alt="">
							</div>
							<div class="client-meta">
								<h3>Jacob Sikim <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	end testimonail-section -->
	
	<!-- advertisement section -->
	<div class="abt-section mb-150 mt-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="abt-bg">
						<a href="https://www.youtube.com/watch?v=KtYeXT__nZY" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="abt-text">
						<p class="top-sub">Commencée en 2024</p>
						<h2>l’aventure <span class="orange-text">{{ config('app.name') }}</span></h2>
						<p>Est née d’une passion profonde pour le football et l’univers du sport.
Nous plaçons la qualité, l’authenticité et le confort au cœur de nos priorités afin de proposer des maillots de football soigneusement sélectionnés, conçus pour accompagner chaque supporter dans les moments forts du jeu.</p>
						<p>Grâce à notre expertise, nous offrons des produits qui allient style, performance et durabilité, permettant à chacun de porter fièrement ses couleurs, sur le terrain comme au quotidien.</p>
						<p>Notre objectif est de rendre chaque expérience avec {{ config('app.name') }} simple, fluide et mémorable.
Nous croyons que porter un maillot, c’est bien plus qu’un choix vestimentaire : c’est vivre la passion.</p>
						<a href="/about" class="boxed-btn mt-4">En savoir plus</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end advertisement section -->
	
	<!-- shop banner -->
	<section class="shop-banner">
    	<div class="container">
        	<h3>Vente de <script>document.write(new Date().toLocaleString('fr-FR', { month: 'long' }));</script> en cours !<br>Avec de grosses <span class="orange-text">réductions...</span></h3>
            <div class="sale-percent"><span>Vente !<br> Jusqu'à</span>50% <span>de réduction</span></div>
            <a href="/shop" class="cart-btn btn-lg">Achetez maintenant</a>
        </div>
    </section>
	<!-- end shop banner -->

	<!-- latest news
	<div class="latest-news pt-150 pb-150">
		<div class="container">

			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Our</span> News</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href="single-news.html"><div class="latest-news-bg news-bg-1"></div></a>
						<div class="news-text-box">
							<h3><a href="single-news.html">You will vainly look for fruit on it in autumn.</a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
							</p>
							<p class="excerpt">Vivamus lacus enim, pulvinar vel nulla sed, scelerisque rhoncus nisi. Praesent vitae mattis nunc, egestas viverra eros.</p>
							<a href="single-news.html" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href="single-news.html"><div class="latest-news-bg news-bg-2"></div></a>
						<div class="news-text-box">
							<h3><a href="single-news.html">A man's worth has its season, like tomato.</a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
							</p>
							<p class="excerpt">Vivamus lacus enim, pulvinar vel nulla sed, scelerisque rhoncus nisi. Praesent vitae mattis nunc, egestas viverra eros.</p>
							<a href="single-news.html" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
					<div class="single-latest-news">
						<a href="single-news.html"><div class="latest-news-bg news-bg-3"></div></a>
						<div class="news-text-box">
							<h3><a href="single-news.html">Good thoughts bear good fresh juicy fruit.</a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
							</p>
							<p class="excerpt">Vivamus lacus enim, pulvinar vel nulla sed, scelerisque rhoncus nisi. Praesent vitae mattis nunc, egestas viverra eros.</p>
							<a href="single-news.html" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<a href="news.html" class="boxed-btn">More News</a>
				</div>
			</div>
		</div>
	</div>
	 end latest news -->

	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="assets-0/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets-0/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets-0/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets-0/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets-0/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->
	@include('partiels.chat')

	@include('partiels.footer')
	
	@include('partiels.js_links')

	<script>
		document.getElementById('index').classList.add('current-list-item');
	</script>
</body>
</html>