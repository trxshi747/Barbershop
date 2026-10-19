@extends('layouts.admins')


@section('content')


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon Coiffure - Gestion Rendez-vous</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .calendar-day:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        .time-slot:hover {
            background-color: #4f46e5;
            color: white;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar réduite -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-16 bg-indigo-800 text-white">
                <div class="flex items-center justify-center h-16 bg-indigo-900">
                    <i class="fas fa-scissors text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Top navigation -->
            <div class="flex items-center justify-between h-16 px-4 bg-white border-b border-gray-200">
                <div class="flex items-center">
                    <h1 class="text-lg font-semibold text-gray-900">{{ Auth::guard('Coiffeur')->user()->prenom }} {{ Auth::guard('Coiffeur')->user()->nom }} - Calendrier</h1>
                </div>
                <div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-indigo-600 hover:text-indigo-900 flex items-center">
                            <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                        </button>
                    </form>
                </div>
                
            </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <div class="flex-1 overflow-auto p-4">
                    <h3>Gestion des disponibilités</h3>
                    
                  </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div id="calendar"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h4>Ajouter/Modifier une disponibilité</h4>
                            <form method="POST" action="{{ route('coiffeur.disponibilite.update') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="date">Date</label>
                                        <input type="date" class="form-control" id="date" name="date" required min="{{ date('Y-m-d') }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="heure_debut">Heure de début</label>
                                        <input type="time" class="form-control" id="heure_debut" name="heure_debut" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="heure_fin">Heure de fin</label>
                                        <input type="time" class="form-control" id="heure_fin" name="heure_fin" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="statut">Statut</label>
                                        <select class="form-control" id="statut" name="statut" required>
                                            <option value="disponible">Disponible</option>
                                            <option value="indisponible">Indisponible</option>
                                            <option value="pause">Pause</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h4>Mes disponibilités</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Heure début</th>
                                            <th>Heure fin</th>
                                            <th>Statut</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($disponibilites->flatten() as $disponibilite)
                                        <tr>
                                            <td>{{ $disponibilite->date->format('d/m/Y') }}</td>
                                            <td>{{ $disponibilite->heure_debut }}</td>
                                            <td>{{ $disponibilite->heure_fin }}</td>
                                            <td>
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                @if($disponibilite->statut == 'disponible') bg-green-100 text-green-800
                                                @elseif($disponibilite->statut == 'indisponible') bg-red-100 text-red-800
                                                @else bg-yellow-100 text-yellow-800
                                                @endif">
                                                {{ ucfirst($disponibilite->statut) }}
                                            </span>
                                            </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <form action="{{ route('coiffeur.disponibilite.delete', $disponibilite->id) }}" method="POST" class="inline">
                                                 @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900"
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette disponibilité ?')">
                                                <i class="fas fa-trash"></i>
                                                 </button>
                                             </form>
                                        </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Aucune disponibilité enregistrée</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css">
<style>
    #calendar {
        height: 600px;
        margin-bottom: 20px;
    }
    .fc-event {
        cursor: pointer;
    }
    .badge {
        font-size: 100%;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales/fr.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            locale: 'fr',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            slotMinTime: '08:00:00',
            slotMaxTime: '20:00:00',
            events: [
                @foreach($disponibilites as $date => $creneaux)
                    @foreach($creneaux as $creneau)
                        {
                            title: '{{ ucfirst($creneau->statut) }}',
                            start: '{{ $creneau->date }}T{{ $creneau->heure_debut }}',
                            end: '{{ $creneau->date }}T{{ $creneau->heure_fin }}',
                            color: '{{ $creneau->statut == "disponible" ? "#28a745" : ($creneau->statut == "indisponible" ? "#dc3545" : "#ffc107") }}',
                            extendedProps: {
                                id: '{{ $creneau->id }}'
                            }
                        },
                    @endforeach
                @endforeach
            ],
            eventClick: function(info) {
                // Pré-remplir le formulaire avec l'événement cliqué
                document.getElementById('date').value = info.event.start.toISOString().split('T')[0];
                document.getElementById('heure_debut').value = info.event.start.toTimeString().substring(0, 5);
                document.getElementById('heure_fin').value = info.event.end.toTimeString().substring(0, 5);
                document.getElementById('statut').value = info.event.title.toLowerCase();
                
                // Faire défiler jusqu'au formulaire
                document.querySelector('form').scrollIntoView({ behavior: 'smooth' });
            }
        });
        calendar.render();

        // Aujourd'hui par défaut dans le champ date
        document.getElementById('date').valueAsDate = new Date();
    });
</script>
@endpush
@endsection