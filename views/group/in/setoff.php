<div class="group-setoffs h100">
	<div class="navbar-fixed">
		<nav class="red-btn">
		    <div class="nav-wrapper">
		      	<a href="#" class="brand-logo center">Moving</a>
		      	<ul id="nav-mobile" class="left">
		        	<li><a href="" class="spec-ajax" data-back="true"><i class="material-icons md-36">keyboard_arrow_left</i></a></li>
		      	</ul>
		    </div>
	  	</nav>
  	</div>

  	<div class="group-setoff center-align valign-center h88">
		<a href="" class="btn indigo emergency z-depth-4 hoverable emergency">EMERGENCY</a>
		<div class="hidden">
			<div class="direction" data-latitude="" data-longitude=""></div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	function getLocation() {
	    if (navigator.geolocation) {
	       navigator.geolocation.getCurrentPosition(showPosition);
	    } else {
	        $(".modal-content").html('<p class="flow-text center-align">Geolocation is not supported by this browser.</p>');
	        $("#modal").modal("open");
	    }
	}

	function showPosition(position) {
	    $(".direction").attr("data-latitude", position.coords.latitude);
	    $(".direction").attr("data-longitude", position.coords.longitude); 
	    return true;
	}
	getLocation();

	$(document).on("click", ".emergency", function(e){
		e.preventDefault();
		
		getLocation();
		$latitude = $(".direction").attr("data-latitude");
		$longitude = $(".direction").attr("data-longitude");
		$emergency = "emergency";

		$.post("<?php echo __url__.'/actions/group.action.php'; ?>", {latitude:$latitude, longitude:$longitude, query: $emergency},function(data){
		    $(".modal-content").html(data);
		});
	});
});
</script>