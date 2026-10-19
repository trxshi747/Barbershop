@extends('layouts.app')

@section('content')

<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_5.jpg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
    <div class="container">
        <div class="row slider-text justify-content-center align-items-center">

        <div class="col-md-7 col-sm-12 text-center ftco-animate">
            <h1 class="mb-3 mt-5 bread">Services</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('welcome') }}">Home</a></span> <span>Services</span></p>
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
        <h2 class="mb-4">Our Services</h2>
        <p>Step into our vintage-inspired barbershop where traditional craftsmanship meets modern style. From razor-sharp fades to hot towel shaves, we transform haircuts into timeless experiences. Your confidence starts here.</p>
        </div>
    </div>
        <form id="service_selection" action="{{ route('services.select') }}" method="POST">
            @csrf
            <div class="row d-md-flex">
                <div class="col-lg-12 ftco-animate p-md-5">
                    <div class="row">
                    <div class="col-md-12 nav-link-wrap mb-5">
                    <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                        <a class="nav-link active" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Men</a>

                        <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Kids</a>

                        <a class="nav-link" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false">Coloring Style</a>

                        <a class="nav-link" id="v-pills-5-tab" data-toggle="pill" href="#v-pills-5" role="tab" aria-controls="v-pills-5" aria-selected="false">Hair Removal</a>

                        <a class="nav-link" id="v-pills-6-tab" data-toggle="pill" href="#v-pills-6" role="tab" aria-controls="v-pills-6" aria-selected="false">Smoothing And Hair Care</a>

                        <a class="nav-link" id="v-pills-7-tab" data-toggle="pill" href="#v-pills-7" role="tab" aria-controls="v-pills-7" aria-selected="false">Facial Treatments</a>
                    </div>
                    </div>
                    <div class="col-md-12 d-flex align-items-center">
                    
                    <div class="tab-content ftco-animate" id="v-pills-tabContent">

                        

                        <div class="tab-pane fade show active" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
                        <div class="row">
                            @foreach ($services['Men'] as $service)
                                <div class="col-md-6 text-center">
                                    <div class="menu-wrap">
                                        <a href="#" class="menu-img img mb-4" style="background-image: url({{ asset('assets/images/'.$service->image.'') }});"></a>
                                        <div class="text">
                                            <h3><a href="#">{{ $service->name }}</a></h3>
                                            <p>{{ $service->description }}</p>
                                            <p class="price"><span>{{ $service->price }} DH</span></p>
                                            <p>Duration : {{ $service->duration }} min</p>
                                            <div class="form-check">
                                                <input class="form-check-input service-checkbox" type="checkbox" name="services[]" id="service-{{ $service->id }}" value="{{ $service->id }}">
                                                <label class="form-check-label" for="service-{{ $service->id }}">Select</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
                        <div class="row">
                            @foreach ($services['Kids'] as $service)
                                <div class="col-md-6 text-center">
                                    <div class="menu-wrap">
                                        <a href="#" class="menu-img img mb-4" style="background-image: url({{ asset('assets/images/'.$service->image.'') }});"></a>
                                        <div class="text">
                                            <h3><a href="#">{{ $service->name }}</a></h3>
                                            <p>{{ $service->description }}</p>
                                            <p class="price"><span>{{ $service->price }} DH</span></p>
                                            <p>Duration : {{ $service->duration }} min</p>
                                            <div class="form-check">
                                                <input class="form-check-input service-checkbox" type="checkbox" name="services[]" id="service-{{ $service->id }}" value="{{ $service->id }}">
                                                <label class="form-check-label" for="service-{{ $service->id }}">Select</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">
                        <div class="row">
                            @foreach ($services['Coloring Style'] as $service)
                                <div class="col-md-6 text-center">
                                    <div class="menu-wrap">
                                        <a href="#" class="menu-img img mb-4" style="background-image: url({{ asset('assets/images/'.$service->image.'') }});"></a>
                                        <div class="text">
                                            <h3><a href="#">{{ $service->name }}</a></h3>
                                            <p>{{ $service->description }}</p>
                                            <p class="price"><span>{{ $service->price }} DH</span></p>
                                            <p>Duration : {{ $service->duration }} min</p>
                                            <div class="form-check">
                                                <input class="form-check-input service-checkbox" type="checkbox" name="services[]" id="service-{{ $service->id }}" value="{{ $service->id }}">
                                                <label class="form-check-label" for="service-{{ $service->id }}">Select</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-5-tab">
                        <div class="row">
                            @foreach ($services['Hair Removal'] as $service)
                                <div class="col-md-6 text-center">
                                    <div class="menu-wrap">
                                        <a href="#" class="menu-img img mb-4" style="background-image: url({{ asset('assets/images/'.$service->image.'') }});"></a>
                                        <div class="text">
                                            <h3><a href="#">{{ $service->name }}</a></h3>
                                            <p>{{ $service->description }}</p>
                                            <p class="price"><span>{{ $service->price }} DH</span></p>
                                            <p>Duration : {{ $service->duration }} min</p>
                                            <div class="form-check">
                                                <input class="form-check-input service-checkbox" type="checkbox" name="services[]" id="service-{{ $service->id }}" value="{{ $service->id }}">
                                                <label class="form-check-label" for="service-{{ $service->id }}">Select</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="v-pills-6" role="tabpanel" aria-labelledby="v-pills-6-tab">
                        <div class="row">
                            @foreach ($services['Smoothing And Hair Care'] as $service)
                                <div class="col-md-6 text-center">
                                    <div class="menu-wrap">
                                        <a href="#" class="menu-img img mb-4" style="background-image: url({{ asset('assets/images/'.$service->image.'') }});"></a>
                                        <div class="text">
                                            <h3><a href="#">{{ $service->name }}</a></h3>
                                            <p>{{ $service->description }}</p>
                                            <p class="price"><span>{{ $service->price }} DH</span></p>
                                            <p>Duration : {{ $service->duration }} min</p>
                                            <div class="form-check">
                                                <input class="form-check-input service-checkbox" type="checkbox" name="services[]" id="service-{{ $service->id }}" value="{{ $service->id }}">
                                                <label class="form-check-label" for="service-{{ $service->id }}">Select</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="v-pills-7" role="tabpanel" aria-labelledby="v-pills-7-tab">
                        <div class="row">
                            @foreach ($services['Facial Treatments'] as $service)
                                <div class="col-md-6 text-center">
                                    <div class="menu-wrap">
                                        <a href="#" class="menu-img img mb-4" style="background-image: url({{ asset('assets/images/'.$service->image.'') }});"></a>
                                        <div class="text">
                                            <h3><a href="#">{{ $service->name }}</a></h3>
                                            <p>{{ $service->description }}</p>
                                            <p class="price"><span>{{ $service->price }} DH</span></p>
                                            <p>Duration : {{ $service->duration }} min</p>
                                            <div class="form-check">
                                                <input class="form-check-input service-checkbox" type="checkbox" name="services[]" id="service-{{ $service->id }}" value="{{ $service->id }}">
                                                <label class="form-check-label" for="service-{{ $service->id }}">Select</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-md-6 text-center">
                    <button type="submit" class="btn btn-primary py-3 px-4" id="validateSelection">Validate Selection</button>
                </div>
            </div>
        </div>
</form>
    </section>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Au chargement, désactive tous les contenus sauf Men
        document.querySelectorAll('.tab-pane:not(#v-pills-2)').forEach(pane => {
            pane.classList.remove('show', 'active');
        });
        
        // Gère le clic sur les onglets
        document.querySelectorAll('[data-toggle="pill"]').forEach(tab => {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                const target = this.getAttribute('href');
                
                // Désactive tous les onglets
                document.querySelectorAll('.tab-pane').forEach(pane => {
                    pane.classList.remove('show', 'active');
                });
                
                // Active l'onglet cible
                document.querySelector(target).classList.add('show', 'active');
            });
        });
    });

    document.getElementById('service_selection').addEventListener('submit', function(e) {
        const checkedServices = document.querySelectorAll('input[name="services[]"]:checked');
        if (checkedServices.length === 0) {
            e.preventDefault();
            alert('Veuillez sélectionner au moins un service.');
        }
    });
    </script>

@endsection
