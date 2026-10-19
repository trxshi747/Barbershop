@extends('layouts.app')

@section('content')


<section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_1.jpg') }});">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-8 col-sm-12 text-center ftco-animate">
            	<span class="subheading">Welcome</span>
              <h1 class="mb-4">The finest barber craft</h1>
              <p class="mb-4 mb-md-5">Where Every Cut Carries 100 Years of Tradition.</p>
              <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Book Now</a> <a href="{{ route('our_services') }}" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Services</a></p>
            </div>

          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_2.jpg') }});">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-8 col-sm-12 text-center ftco-animate">
            	<span class="subheading">Welcome</span>
              <h1 class="mb-4">The gentleman's choice</h1>
              <p class="mb-4 mb-md-5">For Men Who Demand Flawless Fades.</p>
              <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Book Now</a> <a href="{{ route('our_services') }}" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Services</a></p>
            </div>

          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-8 col-sm-12 text-center ftco-animate">
            	<span class="subheading">Welcome</span>
              <h1 class="mb-4">Masterful barbering art</h1>
              <p class="mb-4 mb-md-5">Precision • Legacy • Mastery.</p>
              <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Book Now</a> <a href="{{ route('our_services') }}" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Services</a></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-intro">
    	<div class="container-wrap">
    		<div class="wrap d-md-flex align-items-xl-end">
	    		<div class="info">
	    			<div class="row no-gutters">
	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-phone"></span></div>
	    					<div class="text">
	    						<h3>+212 649157670</h3>
	    						<p>Call for any informations.</p>
	    					</div>
	    				</div>
	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-my_location"></span></div>
	    					<div class="text">
	    						<h3>10 Rue Allal el Fassi, Al Hoceïma 35000</h3>
	    					</div>
	    				</div>
	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-clock-o"></span></div>
	    					<div class="text">
	    						<h3>Open Monday - Sunday</h3>
	    						<p>9:00 am - 11:00 pm</p>
	    					</div>
	    				</div>
	    			</div>
	    		</div>
	    		<div class="book p-4">
	    			<h3>Book now</h3>
	    			<form action="#" class="appointment-form">
						<div class="form-group ml-md-4">
							<input type="submit" value="Booking" class="btn btn-white py-3 px-4">
						</div>
	    			</form>
	    		</div>
             </div>
          </div>
    
    </section>

    <section class="ftco-about d-md-flex">
    	<div class="one-half img" style="background-image: url({{ asset('assets/images/about.jpg')}});"></div>
    	<div class="one-half ftco-animate">
    		<div class="overlap">
	        <div class="heading-section ftco-animate ">
	        	<span class="subheading">Discover</span>
	          <h2 class="mb-4">Our Story</h2>
	        </div>
	        <div>
	  				<p class="white">At our barber shop, we blend timeless barbering traditions with modern style to create more than just haircuts—we craft confidence. Founded in 2001 by Yassir Karrouti, our shop was built on the belief that every man deserves a grooming experience that makes him look sharp and feel unstoppable. From our handpicked barbers trained in precision techniques to our carefully curated selection of premium products, every detail is designed to elevate your routine. More than a barbershop, we're a community hub where great conversations flow as smoothly as our fades. Step into our chair and leave not just looking your best, but feeling it too.</p>
	  			</div>
  			</div>
    	</div>
    </section>

    <section class="ftco-section ftco-services">
    	<div class="container">
    		<div class="row">
          <div class="col-md-4 ftco-animate">
            <div class="media d-block text-center block-6 services">
              <div class="icon d-flex justify-content-center align-items-center mb-5">
              	<span class="flaticon-choices"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Easy to book</h3>
                <p>Securing your perfect cut is just a tap away – our seamless booking system gets you in the chair without the hassle.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="media d-block text-center block-6 services">
              <div class="icon d-flex justify-content-center align-items-center mb-5">
              	<span class="fi fi-tr-customer-care"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Fastest Service</h3>
                <p>We respect your time. Walk in for a quick trim or schedule ahead – either way, you'll be looking sharp in no time.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="media d-block text-center block-6 services">
              <div class="icon d-flex justify-content-center align-items-center mb-5">
              	<span class= "fi fi-ts-shield-check"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Quality Grooming</h3>
                <p>From classic cuts to modern styles, every service is delivered with expert hands and premium products for flawless results.</p>
              </div>
            </div>    
          </div>
        </div>
    	</div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row align-items-center">
    			<div class="col-md-6 pr-md-5">
    				<div class="heading-section text-md-right ftco-animate">
	          	<span class="subheading">Discover</span>
	            <h2 class="mb-4">Our Services</h2>
	            <p class="mb-4 white">We blend traditional craftsmanship with modern grooming techniques to deliver precision haircuts, beard trims, and luxury shaves. Our skilled barbers provide personalized consultations to ensure your look matches your style. From classic fades to hot towel treatments, every service is designed to make you look sharp and feel confident.</p>
	            <p><a href="{{ route('our_services') }}" class="btn btn-primary btn-outline-primary px-4 py-3">View All Services</a></p>
	          </div>
    			</div>
    			<div class="col-md-6">
    				<div class="row">
    					<div class="col-md-6">
    						<div class="menu-entry">
		    					<a href="#" class="img" style="background-image: url({{ asset('assets/images/menu-1.jpg')}});"></a>
		    				</div>
    					</div>
    					<div class="col-md-6">
    						<div class="menu-entry mt-lg-4">
		    					<a href="#" class="img" style="background-image: url({{ asset('assets/images/menu-2.jpg')}});"></a>
		    				</div>
    					</div>
    					<div class="col-md-6">
    						<div class="menu-entry">
		    					<a href="#" class="img" style="background-image: url({{ asset('assets/images/menu-3.jpg')}});"></a>
		    				</div>
    					</div>
    					<div class="col-md-6">
    						<div class="menu-entry mt-lg-4">
		    					<a href="#" class="img" style="background-image: url({{ asset('assets/images/menu-4.jpg')}});"></a>
		    				</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url({{ asset('assets/images/bg_2.jpg')}});" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center">
        	<div class="col-md-10">
        		<div class="row">
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="fi fi-tc-american-sign-language-interpreting"></span></div>
		              	<strong class="number" data-number="8563">0</strong>
		              	<span>Perfect Fades</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="fi fi-tr-rectangle-pro"></span></div>
		              	<strong class="number" data-number="7">0</strong>
		              	<span>Master Barbers</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="fi fi-tr-smile-beam"></span></div>
		              	<strong class="number" data-number="10059">0</strong>
		              	<span>Satisfied Clients</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="fi fi-tr-review"></span></div>
		              	<strong class="number" data-number="5567">0</strong>
		              	<span>5-Star Reviews</span>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading">Discover</span>
            <h2 class="mb-4">recommendations</h2>
            <p class="white">Book now and let our barbers craft your signature style.</p>
          </div>
        </div>
        <div class="row">
			<div class="col-md-3">
        		<div class="menu-entry">
    					<a href="#" class="img" style="background-image: url({{ asset('assets/images/haircut.jpg')}});"></a>
    					<div class="text text-center pt-4">
    						<h3><a href="#">Haircut</a></h3>
    						<p>A precision haircut paired with a revitalizing shampoo and thorough detangling for a flawless finish. Perfect for a fresh, sharp look.</p>
    						<p class="price"><span>100 DH</span></p>
    						
    					</div>
    				</div>
        	</div>
        	<div class="col-md-3">
        		<div class="menu-entry">
    					<a href="#" class="img" style="background-image: url({{ asset('assets/images/beard.jpg')}});"></a>
    					<div class="text text-center pt-4">
    						<h3><a href="#">Beard</a></h3>
    						<p>Expert beard shaping, trimming, and nourishing treatment to keep your facial hair well-groomed and healthy. Includes hot towel service for extra relaxation.</p>
    						<p class="price"><span>70 DH</span></p>
    					
    					</div>
    				</div>
        	</div>
        	<div class="col-md-3">
        		<div class="menu-entry">
    					<a href="#" class="img" style="background-image: url({{ asset('assets/images/soin_nourrisant.jpg')}});"></a>
    					<div class="text text-center pt-4">
    						<h3><a href="#">Nourishing Care</a></h3>
    						<p>A deep conditioning treatment to repair and hydrate hair, leaving it soft, strong, and full of vitality. Ideal for damaged or dry hair.</p>
    						<p class="price"><span>130 DH</span></p>
    						
    					</div>
    				</div>
        	</div>
        	<div class="col-md-3">
        		<div class="menu-entry">
    					<a href="#" class="img" style="background-image: url({{ asset('assets/images/hair_coloring.jpg')}});"></a>
    					<div class="text text-center pt-4">
    						<h3><a href="#">Hair Coloring</a></h3>
    						<p>High-quality coloring service to cover grays, refresh your tone, or try a bold new look. Includes consultation and aftercare advice.</p>
    						<p class="price"><span>200 DH</span></p>
    						
    					</div>
    				</div>
        	</div>
        </div>
    	</div>
    </section>

    {{--<section class="ftco-gallery">
    	<div class="container-wrap">
    		<div class="row no-gutters">
					<div class="col-md-3 ftco-animate">
						<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(images/gallery-1.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(images/gallery-3.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(images/gallery-3.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(images/gallery-4.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-search"></span>
    					</div>
						</a>
					</div>
        </div>
    	</div>
    </section>--}}

    

    <section class="ftco-section img" id="ftco-testimony" style="background-image: url(images/bg_1.jpg);"  data-stellar-background-ratio="0.5">
    	<div class="overlay"></div>
	    <div class="container">
	      <div class="row justify-content-center mb-5">
	        <div class="col-md-7 heading-section text-center ftco-animate">
	        	<span class="subheading">Testimony</span>
	          <h2 class="mb-4">Feedbacks</h2>
	         
	        </div>
	      </div>
	    </div>
	    <div class="container-wrap">
	      <div class="row d-flex no-gutters">
	        <div class="col-lg align-self-sm-end ftco-animate">
	          <div class="testimony">
	             <blockquote>
	                <p>&ldquo;Best barbershop in town! Always leave looking fresh with a perfect cut. The beard trim is next level!&rdquo;</p>
	              </blockquote>
	              <div class="author d-flex mt-4">
	                <div class="name align-self-center">chel7.vinix</div>
	              </div>
	          </div>
	        </div>
	        <div class="col-lg align-self-sm-end">
	          <div class="testimony overlay">
	             <blockquote>
	                <p>&ldquo;Professional service and a great atmosphere. My go-to spot for a sharp fade and hot towel shave.&rdquo;</p>
	              </blockquote>
	              <div class="author d-flex mt-4">
	                <div class="image mr-3 align-self-center">
	                  <img src="images/person_2.jpg" alt="">
	                </div>
	                <div class="name align-self-center">zambo.tkhna</div>
	              </div>
	          </div>
	        </div>
	        <div class="col-lg align-self-sm-end ftco-animate">
	          <div class="testimony">
	             <blockquote>
	                <p>&ldquo;Friendly barbers who know their craft. My hair coloring turned out even better than I expected! &rdquo;</p>
	              </blockquote>
	              <div class="author d-flex mt-4">
	                <div class="image mr-3 align-self-center">
	                  <img src="images/person_3.jpg" alt="">
	                </div>
	                <div class="name align-self-center">rabyota666</div>
	              </div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>

    


{{--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>--}}
@endsection
