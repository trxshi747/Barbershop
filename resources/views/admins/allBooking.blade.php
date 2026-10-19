@extends('layouts.admins')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Appointments Management</h2>
    

    <!-- Status messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            @if($bookings->isEmpty())
                <div class="alert alert-info">No appointments to display</div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Client</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Services</th>
                                <th>Hairdresser</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                            <tr>
                                <td>{{ $booking->id }}</td>
                                <td>{{ $booking->user->name }}</td>
                                <td>{{ $booking->date->format('d/m/Y') }}</td>
                                <td>{{ $booking->time->format('H:i') }}</td>
                                <td>
                                    @foreach($booking->services as $service)
                                        <span class="badge bg-primary me-1">{{ $service->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @if($booking->coiffeur)
                                        {{ $booking->coiffeur->nom }} {{ $booking->coiffeur->prenom }}
                                    @else
                                        <span class="text-danger">To be assigned</span>
                                    @endif
                                </td>
                                <td>
                                    @if(!$booking->coiffeur)
                                        <button class="btn btn-sm btn-primary" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#assignModal{{ $booking->id }}">
                                            <i class="bi bi-person-check"></i> Assign
                                        </button>
                                    @else
                                        <span class="text-success">Already assigned</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $bookings->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Modals -->
@foreach($bookings as $booking)
<div class="modal fade" 
     id="assignModal{{ $booking->id }}" 
     tabindex="-1"
     data-available-url="{{ route('admin.bookings.availableCoiffeurs', $booking) }}"
     aria-labelledby="assignModalLabel{{ $booking->id }}" 
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Assign hairdresser - Appointment #{{ $booking->id }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.bookings.assign', $booking) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Available hairdressers:</label>
                        <select class="form-select" name="coiffeur_id" required>
                            <option value="" id="loadingOption{{ $booking->id }}"> Searching available hairdressers...</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Confirm
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('[id^="assignModal"]').forEach(modal => {
            modal.addEventListener('show.bs.modal', function(event) {
                const url = this.dataset.availableUrl;
                const select = this.querySelector('select[name="coiffeur_id"]');
                
                select.innerHTML = '<option value=""> Searching...</option>';
                
                fetch(url)
                    .then(response => {
                        if (!response.ok) throw new Error(`HTTP error ${response.status}`);
                        return response.json();
                    })
                    .then(data => {
                        select.innerHTML = ''; // Reset
                        if (data.length > 0) {
                            data.forEach(coiffeur => {
                                select.innerHTML += `
                                    <option value="${coiffeur.id}">
                                        ${coiffeur.nom} ${coiffeur.prenom}
                                    </option>
                                `;
                            });
                        } else {
                            select.innerHTML = '<option value=""> No hairdresser available</option>';
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        select.innerHTML = '<option value=""> Loading error</option>';
                    });
            });
        });
    });
</script>
@endsection

@section('styles')
<style>
    .modal-content { transition: all 0.3s ease; }
    select:invalid { border-color: #dc3545; }
    .loading-option { color: #6c757d; font-style: italic; }
    .badge { transition: all 0.2s; }
    .table-hover tr:hover .badge { opacity: 0.8; }
    .modal-content { border: 2px solid rgba(0,0,0,0.1); }
    .form-select:focus { border-color: #86b7fe; box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25); }
</style>
@endsection