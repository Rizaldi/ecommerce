<br><br><br><br>
<div class="contact-area pb-20">
    <div class="container">
        <div class="row">
            <!-- <div class="col-md-6"> -->
                <!-- Google Map Start -->
                <!-- <div class="google-map-area"> -->
                    <!--  Map Section -->
                    <!-- <div id="contacts" class="map-area">
                        <div id="googleMap" style="width:100%;height:410px;"></div>
                    </div> -->
                <!-- </div> -->
                <!-- Google Map End -->
            <!-- </div> -->
            <div class="col-md-12">
                <h4>Contact US</h4>
                <form id="contact-form" action="<?php echo site_url('contact-us') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="name" id="name" placeholder="Your Name*">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="email" id="email" placeholder="Mail*">
                        </div>
                    </div>
                    <input type="text" name="subject" id="subject" placeholder="Subject*">
                    <textarea name="description" placeholder="Type Your Message......."></textarea>
                    <input type="file" name="file" style="border: none;">
                    <button type="submit" class="default-btn submit-btn">SEND</button>
                    <p class="form-message"></p>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="contact-address-info bg-light">
                    <div class="single-contact-adrs text-center">
                        <span class="c-address-icon">
                            <i class="fa fa-map-marker"></i>
                        </span>
                        <div class="adrs-text">
                            <span>Pondok Sukmajaya Permai Blok G1 No.10 Kec. Sukmajaya<br>Kota Depok, Jawa Barat 16412.</span>
                        </div>
                    </div>
                    <div class="single-contact-adrs text-center">
                        <span class="c-address-icon">
                            <i class="fa fa-phone"></i>
                        </span>
                        <div class="adrs-text">
                            <span>0878 2562 6969<br></span>
                        </div>
                    </div>
                    <div class="single-contact-adrs text-center">
                        <span class="c-address-icon">
                            <i class="fa fa-globe"></i>
                        </span>
                        <div class="adrs-text">
                            <span>Emil : generasijuara@gmail.com<br>Web : www.generasijuara.sch.id</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Area End -->
<!-- Client Area Start -->
<div class="client-area pt-30">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
            <div class="section-title-one feature-title">
                <h3>logo brands</h3>
            </div>   
        </div>
    </div>
    <div class="row">
      <div class="client-carousel owl-carousel">
        <div class="single-client">
          <img src="<?php echo base_url(''); ?>public/img/icon/logo1.png" alt="client"> 
      </div>
      <div class="single-client">
          <img src="<?php echo base_url(''); ?>public/img/icon/logo2.png" alt="client"> 
      </div>
      <div class="single-client">
          <img src="<?php echo base_url(''); ?>public/img/icon/logo3.png" alt="client"> 
      </div>
      <div class="single-client">
          <img src="<?php echo base_url(''); ?>public/img/icon/logo4.png" alt="client"> 
      </div>
      <div class="single-client">
          <img src="<?php echo base_url(''); ?>public/img/icon/logo5.png" alt="client"> 
      </div>
      <div class="single-client">
          <img src="<?php echo base_url(''); ?>public/img/icon/logo6.png" alt="client"> 
      </div>
      <div class="single-client">
          <img src="<?php echo base_url(''); ?>public/img/icon/logo1.png" alt="client"> 
      </div>
  </div>
</div>
</div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMlLa3XrAmtemtf97Z2YpXwPLlimRK7Pk"></script>
<script>
    google.maps.event.addDomListener(window, 'load', init);
    function init() {
        var mapOptions = {
            zoom: 18,
            center: new google.maps.LatLng(-6.3672353, 106.833858), // New York
            styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
        };
        var mapElement = document.getElementById('googleMap');
        var map = new google.maps.Map(mapElement, mapOptions);
        var marker = new google.maps.Marker({
            position: map.getCenter(),
            animation:google.maps.Animation.BOUNCE,
            icon: '<?php echo base_url('public/'); ?>img/map-marker.png',
            map: map
        });
    }
</script>