<!-- header -->
<div class="top-header-area" id="sticker">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="main-menu-wrap">
                    <!-- logo -->
                    <div class="site-logo">
                        <a href="/index">
                            <img src="assets-0/img/Yalla-Vamos.png" alt="">
                        </a>
                    </div>
                    <!-- logo -->

                    <!-- menu start -->
                    <nav class="main-menu">
                        <ul>
                            <li id="index"><a href="/index">Accueil</a>
                            </li>
                            <li id="about"><a href="/about">À propos</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="sub-menu">
                                    <li id="profile"><a href="/profile">Profile</a></li>
                                    <li id="about"><a href="/about">À propos</a></li>
                                    <li id="shop"><a href="/shop">Produits</a></li>
                                    <li id="checkout"><a href="/checkout">Paiement</a></li>
                                    <li id="cart"><a href="/cart">Panier</a></li>
                                    <li id="contact"><a href="/contact">Contact</a></li>
                                </ul>
                            </li>
                            <!--
                            <li><a href="/news">News</a>
                                <ul class="sub-menu">
                                    <li><a href="/news">News</a></li>
                                    <li><a href="/single-news">Single News</a></li>
                                </ul>
                            </li>
                            -->
                            <li id="shop"><a href="/shop">Produits</a>
                                <ul class="sub-menu">
                                    <li id="shop"><a href="/shop">Produits</a></li>
                                    <li id="checkout"><a href="/checkout">Paiement</a></li>
                                    <li id="cart"><a href="/cart">Panier</a></li>
                                </ul>
                                
                            </li>
                            <li class="cart-count"><a class="shopping-cart" href="/cart"><i class="fas fa-shopping-cart"></i>{{ count(session('cart', [])) }}</a></li>
                            <li><a class="search-bar-icon" href="#"><i class="fas fa-search"></i></a></li>   
                            @if(session('client'))
                            <li class="mobile-user"><a style="padding: 8px;" href="/profile">
                                <img src="assets-0/img/clients/{{session('client')->photo}}" alt="Profile Image" class="rounded-circle custom-profile-img">
                            </a></li>
                            <li style="float: right;"><a href="/log-out" onclick="return confirm('Êtes-vous sûr de vouloir vous déconnecter ?');"><i class="fas fa-sign-out-alt"></i></a></li>
                            @else
                            <li id="log-in" class="mobile-user ml-5"><a href="/log-in"><i class="fas fa-user"></i></a></li>
                            @endif
                        </ul>
                    </nav>
                    <div class="mobile-menu"></div>
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end header -->

<!-- search area -->
<div class="search-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <span class="close-btn"><i class="fas fa-window-close"></i></span>
                <div class="search-bar">
                    <div class="search-bar-tablecell">
                        <h3>Search For:</h3>
                        <input id="search" type="text" placeholder="Keywords">
                        <a id="searchButton" href="#" class="boxed-btn">Search <i class="fas fa-search"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end search area -->
<script>
    document.getElementById('search').addEventListener('keyup',function(){
    document.getElementById('searchButton').setAttribute('href', '/search?search='+document.getElementById('search').value);
})
document.getElementById('search').addEventListener('click',function(){
    document.getElementById('searchButton').setAttribute('href', '/search?search='+document.getElementById('search').value);
})
</script>