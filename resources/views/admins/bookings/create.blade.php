<!-- resources/views/admin/bookings/create.blade.php -->
@extends('layouts.admins')

@section('content')
<div class="container py-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-calendar-plus me-2"></i>Nouveau Rendez-vous</h5>
        </div>
        
        <div class="card-body">
            <form action="{{ route('admin.bookings.store') }}" method="POST" id="bookingForm">
                @csrf
                
                <!-- Client Selection -->
                <div class="mb-4">
                    <label class="form-label fw-bold">Client</label>
                    <select name="user_id" class="form-select" required>
                        <option value="">Choisir un client</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Services Selection -->
                <div class="mb-4">
                    <label class="form-label fw-bold">Services</label>
                    <div class="row g-3">
                        @foreach($services as $service)
                            <div class="col-md-6">
                                <div class="form-check card p-3">
                                    <input class="form-check-input service-check" 
                                           type="checkbox" 
                                           name="services[]" 
                                           value="{{ $service->id }}"
                                           data-duration="{{ $service->duration }}"
                                           data-price="{{ $service->price }}">
                                    <label class="form-check-label">
                                        {{ $service->name }}<br>
                                        <small class="text-muted">
                                            {{ $service->duration }}min - 
                                            {{ $service->price }}DH
                                        </small>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                
                <!-- Coiffeur & Schedule -->
                
                    
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="form-label fw-bold">Date</label>
                            <input type="date" name="date" class="form-control" 
                                   min="{{ now()->format('Y-m-d') }}" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="form-label fw-bold">Heure</label>
                            <input type="time" name="time" class="form-control" 
                                   required>
                        </div>
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-check-circle me-2"></i>Confirmer le RDV
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const serviceChecks = document.querySelectorAll('.service-check');
    
    serviceChecks.forEach(checkbox => {
        checkbox.addEventListener('change', updateSummary);
    });

    function updateSummary() {
        let totalDuration = 0;
        let totalPrice = 0;
        
        serviceChecks.forEach(checkbox => {
            if (checkbox.checked) {
                totalDuration += parseInt(checkbox.dataset.duration);
                totalPrice += parseFloat(checkbox.dataset.price);
            }
        });
        
        document.getElementById('durationPreview').textContent = totalDuration + 'min';
        document.getElementById('pricePreview').textContent = totalPrice.toFixed(2) + 'DH';
    }
});
</script>
@endpush