<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Contact</title>

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
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>24/7 Support</p>
						<h1>Contactez-Nous</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- contact form -->
	<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div id="alert-container">
				@if (session('success'))
				<div class="alert alert-success">
				{{ session('success') }}
				</div>
				@endif
				@if (session('error'))
				<div class="alert alert-danger">
					{{ session('error') }}
				</div>
				@endif
			</div>
			<div class="row">
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="form-title">
						<h2>Vous avez des questions ?</h2>
						<p>N'hésitez pas à nous contacter pour toute question ou préoccupation. Nous sommes là pour vous aider !</p>
					</div>
				 	<div id="form_status"></div>
					<div class="contactez-nous">
						<form action="/contactez" method="POST">
							@csrf
							<div class="form-row d-flex justify-content-between">
								@if(!session('client'))
								<div class="col-lg-6 mb-3">
									@error('nom')
										<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									</div>
									<div class="col-lg-6 mb-3">
									@error('prenom')
										<div class="alert alert-danger">{{ $message }}</div>
									@enderror
									</div>
								<div class="col-lg-6 mb-3">
									<p>
										<input type="text" placeholder="Nom *" name="nom" required>
									</p>
								</div>
								<div class="col-lg-6 mb-3">
									<p>
										<input type="text" placeholder="Prénom *" name="prenom" required>
									</p>
								</div>
								<div class="col-lg-6 mb-3">
									@error('email')
										<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="col-lg-6 mb-3">
									@error('tel')
										<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="col-lg-6 mb-3">
									<p>
										<input type="email" placeholder="Email *" name="email" required>
									</p>
								</div>
								<div class="col-lg-6 mb-3">
									<p>
										<input type="text" placeholder="Tel *" name="tel" required>
									</p>
								</div>
								@endif
								<div class="col-lg-12 mb-3">
									@error('objet')
										<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="col-lg-12 mb-3">
									<p>
										<input type="text" placeholder="Objet *" name="objet" required>
									</p>
								</div>
								<div class="col-lg-12 mb-3">
									@error('message')
										<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="col-lg-12 mb-3">
									<p>
										<textarea rows="5" name="message" placeholder="Message *" required></textarea>
									</p>
								</div>
							</div>
							<input type="submit" value="Envoyer">
						</form>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="contact-form-wrap">
						<div class="contact-form-box">
							<h4><i class="fas fa-map"></i>Adresse du magasin</h4>
							<p> Avenue des FAR, Quartier Centre-ville,
								Business Center,
								2ème étage, <br> Casablanca 20000, <br> Maroc</p>
						</div>
						<div class="contact-form-box">
							<h4><i class="far fa-clock"></i>Heures d'ouverture</h4>
							<p>LUN - VEN : 8h à 21h<br>SAM - DIM : 10h à 20h</p>
						</div>
						<div class="contact-form-box">
							<h4><i class="fas fa-address-book"></i> Contact</h4>
							<p>Tel: +212 6 2222 3333 <br> Email: contact@<span>{{ config('app.name') }}</span>.com </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end contact form -->

	<!-- find our location -->
	<div class="find-location blue-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<p> <i class="fas fa-map-marker-alt"></i> Find Our Location</p>
				</div>
			</div>
		</div>
	</div>
	<!-- end find our location -->

	<!-- google map section
	<div class="embed-responsive embed-responsive-21by9">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26432.42324808999!2d-118.34398767954286!3d34.09378509738966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bf07045279bf%3A0xf67a9a6797bdfae4!2sHollywood%2C%20Los%20Angeles%2C%20CA%2C%20USA!5e0!3m2!1sen!2sbd!4v1576846473265!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" class="embed-responsive-item"></iframe>
	</div>
	end google map section -->

	@include('partiels.chat')

	@include('partiels.footer')
	
	@include('partiels.js_links')

	<script>
		document.getElementById('contact').classList.add('current-list-item');
	</script>
	
</body>
</html>