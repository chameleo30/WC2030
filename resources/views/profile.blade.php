@php
$total=0
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- title -->
	<title>profile</title>

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
						<p>Mon Compte</p>
						<h1>Bienvenue, {{ ucwords(session('client')->nom) }} !</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- check out section -->
	<div class="mt-150 mb-150">
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
				<div class="col-lg-12">
                    

						<div class="accordion" id="accordionExample">
                            
						  <div class="card single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5 class="mb-0">
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Information Personnel 
						        </button>
						      </h5>
						    </div>
						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="inscription-form">
                        <form action="update_profile" method="POST" enctype="multipart/form-data">
                          @csrf
                            <div class="form-row d-flex justify-content-between">
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
                                    <p><input name="nom" class="custom-height" type="text" placeholder="Nom *" value="{{ session('client')->nom }}" required></p>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <p><input name="prenom" class="custom-height" type="text" placeholder="Prénom *" value="{{ session('client')->prenom }}" required></p>
                                </div>
                            </div>
                            <div class="form-row d-flex justify-content-between">
                              <div class="col-lg-6 mb-3">
                                @error('date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                @error('sexe')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                                <div class="col-lg-6 mb-3">
                                    <p><input name="date" class="custom-height" type="date" placeholder="Date de naissance *" value="{{ session('client')->date_naissance }}" required></p>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <p>
                                        <select name="sexe" class="w-100 custom-height">
                                            @if(session('client')->sexe == "Homme"){
                                              <option selected value="Homme">Homme</option>
                                              <option value="Femme">Femme</option>
                                            }@elseif(session('client')->sexe == "Femme"){
                                              <option value="Homme">Homme</option>
                                              <option selected value="Femme">Femme</option>
                                            }
                                            @endif
                                        </select>
                                    </p>
                                </div>
                            </div>
                            <div class="form-row d-flex justify-content-between">
                            <div class="col-lg-6 mb-3">
                              @error('photo')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                          </div>
                            </div>
                            <div class="form-row d-flex justify-content-between">
                                <div class="col-lg-6 mb-3">
                                    <p><input name="photo" class="custom-height" type="file" placeholder="Photo"></p>
                                </div>
                            </div>
                            
                            <button class="boxed-btn black">Enregistrer</button>
                        </form>
						        </div>
						      </div>
						    </div>
						  </div>
						  <div class="card single-accordion">
                            <div class="card-header" id="headingTwo">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  Information De Contact
                                </button>
                              </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                              <div class="card-body">
                                <div class="inscription-form">
                                    <form action="update_contact" method="POST">
                                      @csrf
                                      <div class="form-row d-flex justify-content-between">
                                        <div class="col-lg-6 mb-3">
                                          @error('tel')
                                              <div class="alert alert-danger">{{ $message }}</div>
                                          @enderror
                                      </div>
                                      <div class="col-lg-6 mb-3">
                                          @error('email')
                                              <div class="alert alert-danger">{{ $message }}</div>
                                          @enderror
                                      </div>
                                        <div class="col-lg-6 mb-3">
                                            <p><input name="tel" class="custom-height" type="text" placeholder="Tel *" value="{{ session('client')->tel }}" required></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <p><input name="email" class="custom-height" type="text" placeholder="Email *" readonly value="{{ session('client')->email }}" required></p>
                                        </div>
                                    </div>
                                        <div class="form-row d-flex justify-content-between">
                                          <div class="col-lg-12 mb-3">
                                            @error('adresse')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                            <div class="col-lg-12 mb-3">
                                                <p><textarea name="adresse" class="w-100" id="bill" cols="30" rows="10" placeholder="Adresse *" required>{{ session('client')->adresse }}</textarea></p>
                                            </div>
                                        </div>
                                        <div class="form-row d-flex justify-content-between">
                                          <div class="col-lg-6 mb-3">
                                            @error('ville')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                          </div>
                                        </div>
                                        <div class="form-row d-flex justify-content-between">
                                          <div class="col-lg-6 mb-3">
                                            <p><input name="ville" class="custom-height" type="text" placeholder="Ville *" value="{{ session('client')->ville }}" required></p>
                                          </div>
                                        </div>
                                        <button class="boxed-btn black">Enregistrer</button>
                                    </form>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card single-accordion">
                            <div class="card-header" id="headingTwo">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                  Securité
                                </button>
                              </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                              <div class="card-body">
                                <div class="inscription-form">
                                    <form action="update_password" method="POST">
                                      @csrf
                                        <div class="form-row d-flex justify-content-between">
                                            <div class="col-lg-6 mb-3">
                                              @error('password_old')
                                                  <div class="alert alert-danger">{{ $message }}</div>
                                              @enderror
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                @error('password')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <p><input name="password_old" class="custom-height" type="password" placeholder="Mot de passe actuel *" required></p>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <p><input name="password" class="custom-height" type="password" placeholder="Nouveau mot de passe *" required></p>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <p><input name="password_confirmation" class="custom-height" type="password" placeholder="Confirmation du mot de passe *" required></p>
                                            </div>
                                        </div>
                                        <button class="boxed-btn black">Enregistrer</button>
                                    </form>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card single-accordion">
                            <div class="card-header" id="headingTwo">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                  Historique
                                </button>
                              </h5>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                              <div class="card-body">
                                <div class="inscription-form">
                                    <form action="index.html">
                                      @if(session('historiques'))
                                      <div class="container mt-5">
                                        <h1 class="page-title">Historique des Commandes</h1>
                                        <table class="table table-striped mt-4">
                                            <thead>
                                                <tr>
                                                    <th>ID Commande</th>
                                                    <th>Date</th>
                                                    <th>Heure</th>
                                                    <th>Adresse</th>
                                                    <th>Produits</th>
                                                    <th>Quantités</th>
                                                    <th>Prix</th>
                                                    <th>Montant Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <!-- Exemple d'une commande -->
                
                                              @foreach(session('historiques') as $id => $historique)
                                              <tr>
                                                  <td>{{ $id }}</td>
                                                  @php $DateHeureAdresse = explode(';', $historique['date']); @endphp
                                                  <td>{{ $DateHeureAdresse[0] }}</td>
                                                  <td>{{ $DateHeureAdresse[1] }}</td>
                                                  <td>{{ $DateHeureAdresse[2] }}</td>
                                                  <td>
                                                      <ul>
                                                          @php $produits = explode(';', $historique['nom']); @endphp
                                                          @for($i=0;$i<count($produits)-1;$i++)
                                                          <li>{{ $produits[$i] }}</li>
                                                          @endfor
                                                      </ul>
                                                  </td>
                                                  <td>
                                                      <ul>
                                                          @php $quantites = explode(';', $historique['quantite']); @endphp
                                                          @for($i=0;$i<count($quantites)-1;$i++)
                                                          <li>{{ $quantites[$i] }}</li>
                                                          @endfor
                                                      </ul>
                                                  </td>
                                                  <td>
                                                      <ul>
                                                          @php $prices = explode(';', $historique['prix']); @endphp
                                                          @for($i=0;$i<count($prices)-1;$i++)
                                                          <li>{{ $prices[$i] }}</li>
                                                          @endfor
                                                      </ul>
                                                  </td>
                                                  <td>{{ $historique['total'] }} dh</td>
                                              </tr>
                                              @endforeach
                                              <!-- Répétez les lignes pour chaque commande dans l'historique -->
                                          </tbody>
                                        </table>
                                      </div>
                                      @else
                                      <div class="alert alert-danger">
                                        <p>Aucun historique disponible.</p>
                                      </div>
                                      @endif
                                    </form>
                                </div>
                              </div>
                            </div>
                          </div>
						</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end check out section -->

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

	@include('partiels.footer')

	@include('partiels.js_links')

</body>
</html>
