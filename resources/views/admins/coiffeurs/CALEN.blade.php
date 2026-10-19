@extends('layouts.admins')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- En-tête -->
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <i class="fas fa-calendar-alt text-indigo-600 mr-3 text-2xl"></i>
                    <h1 class="text-2xl font-bold text-gray-900">Marie Dupont - Calendrier</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Contenu principal -->
    <main class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg overflow-hidden mb-8">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Gestion des disponibilités</h2>
            </div>

            <!-- Calendrier -->
            <div class="p-6">
                <div id="calendar" class="h-[700px]"></div>
            </div>
        </div>

        <!-- Formulaire de gestion -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Ajout de disponibilité -->
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-800">Ajouter une disponibilité</h2>
                </div>
                <div class="p-6">
                    <form method="POST" action="{{ route('coiffeur.disponibilite.update') }}">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                                <input type="date" id="date" name="date" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="heure_debut" class="block text-sm font-medium text-gray-700">Heure début</label>
                                    <input type="time" id="heure_debut" name="heure_debut" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="heure_fin" class="block text-sm font-medium text-gray-700">Heure fin</label>
                                    <input type="time" id="heure_fin" name="heure_fin" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                            </div>
                            <div>
                                <label for="statut" class="block text-sm font-medium text-gray-700">Statut</label>
                                <select id="statut" name="statut" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="disponible">Disponible</option>
                                    <option value="indisponible">Indisponible</option>
                                    <option value="pause">Pause</option>
                                </select>
                            </div>
                            <div>
                                <button type="submit"
                                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-md shadow-sm">
                                    Enregistrer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Liste des disponibilités -->
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-800">Mes disponibilités</h2>
                </div>
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                            <th>Date</th>
                                            <th>Heure début</th>
                                            <th>Heure fin</th>
                                            <th>Statut</th>
                                            <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($disponibilites as $disponibilite)
                                <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $disponibilite->date->format('d/m/Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $disponibilite->heure_debut }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $disponibilite->heure_fin }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
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
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">Aucune disponibilité enregistrée</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css">
<style>
    .fc-header-toolbar {
        padding: 1rem;
        margin-bottom: 0 !important;
    }
    .fc-toolbar-title {
        font-size: 1.25rem;
        font-weight: 600;
    }
    .fc-event {
        cursor: pointer;
        font-size: 0.85rem;
        padding: 2px 4px;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales/fr.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
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
                @foreach($disponibilites as $dispo)
                {
                    title: '{{ ucfirst($dispo->statut) }}',
                    start: '{{ $dispo->date->format('Y-m-d') }}T{{ $dispo->heure_debut }}',
                    end: '{{ $dispo->date->format('Y-m-d') }}T{{ $dispo->heure_fin }}',
                    color: '{{ $dispo->statut == "disponible" ? "#10B981" : ($dispo->statut == "indisponible" ? "#EF4444" : "#F59E0B") }}'
                },
                @endforeach
            ],
            eventClick: function(info) {
                document.getElementById('date').value = info.event.start.toISOString().split('T')[0];
                document.getElementById('heure_debut').value = info.event.start.toTimeString().substring(0, 5);
                document.getElementById('heure_fin').value = info.event.end.toTimeString().substring(0, 5);
                document.getElementById('statut').value = info.event.title.toLowerCase();
            }
        });
        calendar.render();
    });
</script>
@endpush
@endsection