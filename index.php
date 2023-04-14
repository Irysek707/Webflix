<title>Webflix</title>
<script src="script.js"></script>

<?php

#Set page title and display header section
$page_title = 'Home';
include('includes/logout.php');

echo '<div class="container"><h1 style="font-size: 5rem;">Welcome to Webflix</h1></div><br/>';

// Start
echo'<div class="container-xl">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                <!-- Carousel indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>   
                <!-- Wrapper for carousel items -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="thumb-wrapper">
                                    <div class="img-box">
                                        <img src="/examples/images/cities/london.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="thumb-content">
                                        <h4>London</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam.</p>
                                        <a href="#" class="btn btn-primary">More <i class="fa fa-angle-right"></i></a>
                                    </div>						
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="thumb-wrapper">
                                    <div class="img-box">
                                        <img src="/examples/images/cities/new-york.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="thumb-content">
                                        <h4>New York</h4>
                                        <p>Vivamus fermentum in arcu in aliquam. Quisque aliqua porta odio in fringilla vivamus.</p>
                                        <a href="#" class="btn btn-primary">More <i class="fa fa-angle-right"></i></a>
                                    </div>						
                                </div>
                            </div>				
                            <div class="col-sm-4">
                                <div class="thumb-wrapper">
                                    <div class="img-box">
                                        <img src="/examples/images/cities/paris.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="thumb-content">
                                        <h4>Paris</h4>
                                        <p>Convallis eget pretium eu, bibendum non leo. Proin susc ipit purus adipiscing dolor.</p>
                                        <a href="#" class="btn btn-primary">More <i class="fa fa-angle-right"></i></a>
                                    </div>						
                                </div>					
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="thumb-wrapper">
                                    <div class="img-box">
                                        <img src="/examples/images/cities/kuala-lumpur.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="thumb-content">
                                        <h4>Kuala Lumpur</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam.</p>
                                        <a href="#" class="btn btn-primary">More <i class="fa fa-angle-right"></i></a>
                                    </div>						
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="thumb-wrapper">
                                    <div class="img-box">
                                        <img src="/examples/images/cities/agra.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="thumb-content">
                                        <h4>Agra</h4>
                                        <p>Vivamus fermentum in arcu in aliquam. Quisque aliqua porta odio in fringilla vivamus.</p>
                                        <a href="#" class="btn btn-primary">More <i class="fa fa-angle-right"></i></a>
                                    </div>						
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="thumb-wrapper">
                                    <div class="img-box">
                                        <img src="/examples/images/cities/dubai.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="thumb-content">
                                        <h4>Dubai</h4>
                                        <p>Convallis eget pretium eu, bibendum non leo. Proin susc ipit purus adipiscing dolor.</p>
                                        <a href="#" class="btn btn-primary">More <i class="fa fa-angle-right"></i></a>
                                    </div>						
                                </div>					
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="thumb-wrapper">
                                    <div class="img-box">
                                        <img src="/examples/images/cities/rio-de-janeiro.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="thumb-content">
                                        <h4>Rio De Janeiro</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam.</p>
                                        <a href="#" class="btn btn-primary">More <i class="fa fa-angle-right"></i></a>
                                    </div>						
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="thumb-wrapper">
                                    <div class="img-box">
                                        <img src="/examples/images/cities/giza.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="thumb-content">
                                        <h4>Giza</h4>
                                        <p>Vivamus fermentum in arcu in aliquam. Quisque aliqua porta odio in fringilla vivamus.</p>
                                        <a href="#" class="btn btn-primary">More <i class="fa fa-angle-right"></i></a>
                                    </div>						
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="thumb-wrapper">
                                    <div class="img-box">
                                        <img src="/examples/images/cities/sydney.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="thumb-content">
                                        <h4>Sydney</h4>
                                        <p>Convallis eget pretium eu, bibendum non leo. Proin susc ipit purus adipiscing dolor.</p>
                                        <a href="#" class="btn btn-primary">More <i class="fa fa-angle-right"></i></a>
                                    </div>						
                                </div>					
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Carousel controls -->
                <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
            </div>
        </div>
    </div>';

    // End

// Action 
include('action.php');

// Comedy 
include('comedy.php');

// Crime 
include('crime.php');

// Documentary 
include('documentary.php');

// Drama 
include('drama.php');

// Fantasy 
include('fantasy.php');

// Horror 
include('horror.php');

// Romance 
include('romance.php');

// Science Fiction 
include('sciencefiction.php');

// Thriller 
include('thriller.php');

// TC Show 
include('tvshowdisplay.php');

#Display footer section
include('includes/footer.php');

?>