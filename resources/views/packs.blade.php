@extends('layouts.app')

@section('content')

<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_6.jpg') }}); margin-top:-100px;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
    <div class="container">
        <div class="row slider-text justify-content-center align-items-center">

        <div class="col-md-7 col-sm-12 text-center ftco-animate">
            <h1 class="mb-3 mt-5 bread">Packs</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('welcome') }}">Home</a></span> <span>Packs</span></p>
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
	    						<p>9:00 am - 12:00 am</p>
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

    <section class="ftco-menu mb-5 pb-5">
    <div class="container">
        <div class="row justify-content-center mb-5">
        <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Discover</span>
        <h2 class="mb-4">Our Packs</h2>
        <p>Elevate your grooming routine with our curated packs—combining cuts, shaves, and premium products for a complete transformation. Perfect for those who demand the best from start to finish.</p>
        </div>
        <div class="myrow">
            @foreach ($packs as $pack)
                <div class="col-md-6">
                    <div class="pricing-entry d-flex ftco-animate">
                        <div class="img" style="background-image: url({{ asset('assets/images/'.$pack->image.'') }});"></div>
                        <div class="desc pl-3">
                            <div class="text align-items-center">
                                <h3>{{ $pack->name }}</h3>
                                <span class="price"><b>{{ $pack->price }} DH</b></span>
                            </div>
                            <div class="d-block">
                                <p>{{ $pack->description }}</p>
                                <p>Duration : {{ $pack->duration }} min</p>
                                <div class="form-check">
                                    <input class="form-check-input service-checkbox" type="checkbox">
                                    <label class="form-check-label">Select</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-6 text-center">
            <button type="submit" class="btn btn-primary py-3 px-4" id="validateSelection">Validate Selection</button>
        </div>
    </div>
    </div>




@endsection
