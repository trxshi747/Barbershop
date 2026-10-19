@extends('layouts.app')

@section('content')
<section class="ftco-menu mb-5 pb-5">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Customer Reviews</span>
                <h2 class="mb-4">What our customers say</h2>
                <p class="text-white-50">Discover the experiences of our satisfied customers</p>
                @auth
                <a href="{{ route('myfeedbacks.index') }}" class="btn btn-primary bg-opacity-25 border border-primary">
                    Share your opinion
                </a>
                @else
                <a href="{{ route('login') }}" class="btn btn-outline-light">
                    Log in to leave a review
                </a>
                @endauth
            </div>
        </div>

        <div class="row">
            @foreach($feedbacks as $feedback)
            <div class="col-md-4 ftco-animate mb-4">
                <div class="glass-card h-100" style="background: rgba(255, 255, 255, 0.08); border: 1px solid rgba(255, 255, 255, 0.1);">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar me-3">
                                <i class="fas fa-user-circle fa-2x text-primary"></i>
                            </div>
                            <div>
                                <h5 class="text-white mb-0">{{ $feedback->user->name }}</h5>
                                <p class="text-white-50 small mb-0">
                                    {{ $feedback->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>

                        <div class="star-rating mb-3">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= $feedback->rate ? 'text-warning' : 'text-secondary' }}"></i>
                            @endfor
                        </div>

                        <p class="text-white mb-0">{{ $feedback->comment }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row mt-5">
            <div class="col text-center">
                {{ $feedbacks->links('pagination::simple-bootstrap-5') }}
            </div>
        </div>
    </div>
</section>

<style>
.glass-card {
    border-radius: 15px;
    transition: transform 0.3s ease;
    backdrop-filter: blur(10px);
}

.glass-card:hover {
    transform: translateY(-5px);
    background: rgba(255, 255, 255, 0.12) !important;
}

.star-rating {
    font-size: 1.2rem;
    letter-spacing: 2px;
}

.avatar {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>
@endsection