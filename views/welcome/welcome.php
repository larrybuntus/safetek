<main style="height: 100vh;">
 	<nav class="purple darken-3">
    	<div class="nav-wrapper">
      		<a href="#" class="brand-logo center">Slydesave</a>
    	</div>
  	</nav>

  	<div class="carousel center carousel-slide" data-indicators="true">
  		
	    <div class="carousel-item" href="#one!" style="background: url(../assets/img/carousel/main.png) #6a1b9a;">
	    </div>
	    <div class="carousel-item" href="#two!" style="background: url(../assets/img/carousel/1.png) #6a1b9a;">
	    	<p class="white-text">Activate your slydesave layer</p>
	    </div>
	    <div class="carousel-item" href="#three!" style="background: url(../assets/img/carousel/2.png) #6a1b9a;">
	    	<p class="white-text">Customize your layer</p>
	    </div>
	    <div class="carousel-item" href="#four!" style="background: url(../assets/img/carousel/3.png) #fff;">
	    	<p class="purple-text text-darken-3">Save in pieces</p>
	    </div>
  	</div>

  	<div class="carousel-fixed-item center">
  		<a href="<?php echo __url__.'/auth/login' ?>" class="btn purple white-text darken-3">Get Started</a>
  	</div>

  	<script>
  		$(document).ready(function(){
      		$('.carousel').carousel();
    	});
  	</script>
</main>

