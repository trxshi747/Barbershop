@extends('layouts.app')

@section('content')

    <section class="ftco-menu mb-5 pb-5">
    <div class="container">
        <div class="row justify-content-center mb-5">
        <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">History</span>
        <h2 class="mb-4">Your bookings</h2>
        <p>Find all your scheduled appointments here.</p>
        </div>
    </div>

    <div class="row">
        @forelse($bookings as $booking)
        <div class="col-md-6 ftco-animate">
            <div class="glass-card mb-4" style="background: rgba(255, 255, 255, 0.08); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.1);">
                <div class="card-body p-4">

                    <div class="d-flex align-items-center mb-4">
                        <div>
                            <h4 class="mb-1 text-white">
                                {{ $booking->date->format('d/m/Y') }} 
                                à {{ \Carbon\Carbon::parse($booking->time)->format('H:i') }}
                            </h4>
                            <p class="text-white-50 mb-0">
                                Durée totale : 
                                @if($booking->duration)
                                    {{ $booking->duration }} minutes
                                @else
                                    Durée non spécifiée
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                    <div>
                        <h4 class="mb-2 text-white">Services :</h4>
                        @forelse($booking->services as $service)
                            <span class="badge bg-secondary bg-opacity-25 text-white border border-secondary me-1 mb-1">
                                {{ $service->name }}
                            </span>
                        @empty
                            <span class="text-warning">No associated services</span>
                        @endforelse
                    </div>
                    </div>

                    @php
                        $bookingDateTime = \Carbon\Carbon::parse(
                            $booking->date->format('Y-m-d') . ' ' . \Carbon\Carbon::parse($booking->time)->format('H:i:s')
                        );
                        $canCancel = $bookingDateTime->diffInHours(now()) > 48;
                    @endphp

                    @if($canCancel)
                        <form action="{{ route('bookings.destroy', $booking) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block bg-opacity-25 border border-danger" style="backdrop-filter: blur(5px);">
                                <i class="fi fi-tr-cross-circle me-2"></i>
                                Cancel
                            </button>
                        </form>
                        <div class="alert bg-warning bg-opacity-10 text-warning border border-warning p-3 mb-0" >
                            <h5 style="color:#000;">Cancellation not possible (in less than 48 hours)</h5>
                        </div>
                    @else
                        <div class="alert bg-warning bg-opacity-10 text-warning border border-warning p-3 mb-0" >
                            <h5 style="color:#000;">Cancellation not possible (in less than 48 hours)</h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 ftco-animate">
            <div class="glass-card text-center p-5" style="background: rgba(255, 255, 255, 0.05);">
                <h4 class="mb-3 text-white"><i class="fi fi-tr-calendar-search me-2"></i>NO BOOKINGS</h4>
                <a href="{{ route('our_services') }}" class="btn btn-primary bg-opacity-25 border border-primary">Book Now</a>
            </div>
        </div>
        @endforelse
    </div>

    <div class="row mt-5">
        <div class="col text-center">
            {{ $bookings->links('pagination::simple-bootstrap-5') }}
        </div>
    </div>
</div>
</section>

<style>
.glass-card {
    border-radius: 15px;
    transition: transform 0.3s ease;
}

.glass-card:hover {
    transform: translateY(-5px);
    background: rgba(255, 255, 255, 0.12) !important;
}

.badge {
    padding: 0.5em 1em;
    border-radius: 20px;
    backdrop-filter: blur(10px);
}
</style>
@endsection