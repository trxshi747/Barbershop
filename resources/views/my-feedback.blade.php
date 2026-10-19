@extends('layouts.app')

@section('content')

<section class="ftco-menu mb-5 pb-5">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Your Reviews</span>
                <h2 class="mb-4">Feedbacks</h2>
                <p class="text-white-50">Share your experience with us</p>
            </div>
        </div>

        <div class="row">
            <!-- Formulaire d'ajout -->
            <div class="col-md-12 ftco-animate mb-5">
                <div class="glass-card" style="background: rgba(255, 255, 255, 0.08); border: 1px solid rgba(255, 255, 255, 0.1);">
                    <div class="card-body p-4">
                        <form method="POST">
                            @csrf
                            
                            <div class="d-flex align-items-center mb-4">
                                <div class="w-100">
                                    <h4 class="text-white mb-3">Rate Your Experience</h4>
                                    <div class="rating-container">
                                        <div class="rating">
                                            @for($i = 5; $i >= 1; $i--)
                                                <input 
                                                    type="radio" 
                                                    id="star{{ $i }}" 
                                                    name="rate" 
                                                    value="{{ $i }}"
                                                    {{ old('rate') == $i ? 'checked' : '' }}
                                                >
                                                <label 
                                                    for="star{{ $i }}" 
                                                    class="star-label"
                                                    data-test="star-{{ $i }}"
                                                >
                                                    <i class="fas fa-star"></i>
                                                </label>
                                            @endfor
                                        </div>
                                    </div>
                                    @error('rate')<div class="text-danger small mt-2">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <div class="d-flex align-items-center mb-4">
                                <div class="w-100">
                                    <h4 class="text-white mb-3">Your Feedback</h4>
                                    <textarea name="comment" class="form-control bg-transparent text-white" rows="3" 
                                        placeholder="Describe your experience...">{{ old('comment') }}</textarea>
                                    @error('comment')<div class="text-danger small mt-2">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary bg-opacity-25 border border-primary">
                                Share
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Liste des feedbacks -->
            @forelse($feedbacks as $feedback)
            <div class="col-md-6 ftco-animate">
                <div class="glass-card mb-4" style="background: rgba(255, 255, 255, 0.08); border: 1px solid rgba(255, 255, 255, 0.1);">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="text-white mb-0">{{ $feedback->user->name }}</h4>
                                <p class="text-white-50 small mb-0">
                                    {{ $feedback->created_at->diffForHumans() }}
                                </p>
                            </div>
                            @if($feedback->user_id === Auth::id())
                                <form action="{{ route('myfeedbacks.destroy', $feedback) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger bg-opacity-25 border border-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            @endif
                        </div>

                        <div class="d-flex align-items-center mb-4">
                            <div class="star-rating">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $feedback->rate ? 'text-warning' : 'text-secondary' }}"></i>
                                @endfor
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <p class="text-white mb-0">{{ $feedback->comment }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 ftco-animate">
                <div class="glass-card text-center p-5" style="background: rgba(255, 255, 255, 0.05);">
                    <h4 class="mb-3 text-white"><i class="fas fa-comment-slash me-2"></i><br>No Feedbacks From You</h4>
                </div>
            </div>
            @endforelse
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

.rating {
    display: flex;
    flex-direction: row-reverse;
    gap: 0.5rem;
}

.rating input {
    display: none;
}

.rating label {
    font-size: 1.5rem;
    color: #ddd;
    cursor: pointer;
    transition: color 0.2s;
}

.rating input:checked ~ label,
.rating label:hover,
.rating label:hover ~ label {
    color: #ffc107;
}

.star-rating {
    font-size: 1.2rem;
    letter-spacing: 0.2rem;
}

.badge {
    padding: 0.5em 1em;
    border-radius: 20px;
    backdrop-filter: blur(10px);
}
</style>
@endsection