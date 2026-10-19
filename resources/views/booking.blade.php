@extends('layouts.app')

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Choose the date and time</div>
                    
                    <div class="card-body">
                        <h4>Selected services :</h4>
                        <ul class="list-group mb-4">
                            @foreach($validated_services as $service)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $service->name }} 
                                    <div>
                                        <span class="badge badge-secondary mr-2">{{ $service->duration }} min</span>
                                        <span class="badge badge-primary">{{ $service->price }} DH</span>
                                    </div>
                                </li>
                            @endforeach
                            <li class="list-group-item font-weight-bold d-flex justify-content-between align-items-center">
                                <span>Total Time :</span>
                                <span>{{ $validated_services->sum('duration') }} min</span>
                                <span>Total Price :</span>
                                <span>{{ $validated_services->sum('price') }} DH</span>
                            </li>
                        </ul>
                        
                        <hr>
                        
                        <form action="{{ route('booking.show') }}" method="POST" id="dateForm">
                            <div class="form-group">
                                <label for="dateSelect">Date</label>
                                <select class="form-control" name="date" id="dateSelect" >
                                    @foreach($available_dates as $date)
                                        <option value="{{ $date }}" {{ $selected_date == $date ? 'selected' : '' }}>
                                            {{ \Carbon\Carbon::parse($date)->isoFormat('dddd D MMMM YYYY') }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                        <form action="{{ route('booking.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="date" value="{{ $selected_date }}">
                            @if(!empty($available_hours))
                            <div class="form-group">
                                <label>Available slots</label>
                                <div class="row">
                                    @foreach($available_hours as $slot)
                                        <div class="col-md-3 mb-3">
                                            <div class="time-slot {{ !$slot['available'] ? 'disabled' : '' }}">
                                                <input type="radio" name="time" 
                                                    id="time_{{ $slot['start'] }}" 
                                                    value="{{ $slot['start'] }}"
                                                    {{ !$slot['available'] ? 'disabled' : '' }} required>
                                                <label for="time_{{ $slot['start'] }}" 
                                                    class="btn btn-{{ $slot['available'] ? 'primary' : 'secondary' }} btn-block">
                                                    {{ $slot['start'] }} - {{ $slot['end'] }}
                                                    @if(!$slot['available'])
                                                        <span class="badge badge-danger">Complet</span>
                                                    @endif
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            
                            <button type="submit" class="btn btn-primary btn-lg btn-block mt-4">
                                Confirmer la réservation
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('dateSelect').addEventListener('change', function() {
            document.getElementById('dateForm').submit();
        });
    </script>
</section>
@endsection

<style>
.time-slot {
    margin-bottom: 10px;
}
.time-slot.disabled {
    opacity: 0.6;
}
.time-slot input[type="radio"] {
    display: none;
}
.time-slot input[type="radio"]:checked + label {
    background-color: #007bff;
    color: white;
}
.time-slot input[type="radio"]:checked + label.btn-outline-secondary {
    background-color: #6c757d;
}
.time-slot label {
    cursor: pointer;
    transition: all 0.3s;
    text-align: center;
    padding: 10px 5px;
}
.time-slot.disabled label {
    cursor: not-allowed;
}
.closing-soon label {
    border-color: #ffc107;
}
#dateSelect, #dateSelect option {
    color: #959595 !important;
    border: 2px solid #959595 !important;
    background: #fff !important;
    width: 300px; 
    height: 50px; 
    font-size: 16px; 
    padding: 8px; 
    border-radius: 4px; 
}
</style>

