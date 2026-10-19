<!DOCTYPE html>
<html lang="fr">
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
                    <h1 class="text-lg font-semibold text-gray-900">Marie Dupont - Calendrier</h1>
                </div>
                
            </div>

            <!-- Main content area -->
            <div class="flex-1 overflow-auto p-4">
                <!-- Calendar section -->
                <div class="bg-white rounded-lg shadow mb-6">
                    <div class="p-4 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg font-semibold text-gray-900">Calendrier des rendez-vous</h2>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 text-sm bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none">
                                    Aujourd'hui
                                </button>
                                <button class="p-1 text-gray-500 rounded-md hover:bg-gray-100 focus:outline-none">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button class="p-1 text-gray-500 rounded-md hover:bg-gray-100 focus:outline-none">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="grid grid-cols-7 gap-2 mb-2">
                            <div class="text-center text-xs font-medium text-gray-500">LUN</div>
                            <div class="text-center text-xs font-medium text-gray-500">MAR</div>
                            <div class="text-center text-xs font-medium text-gray-500">MER</div>
                            <div class="text-center text-xs font-medium text-gray-500">JEU</div>
                            <div class="text-center text-xs font-medium text-gray-500">VEN</div>
                            <div class="text-center text-xs font-medium text-gray-500">SAM</div>
                            <div class="text-center text-xs font-medium text-gray-500">DIM</div>
                        </div>
                        <div class="grid grid-cols-7 gap-2">
                            <!-- Calendar days -->
                            <div class="calendar-day h-24 p-1 border border-gray-200 rounded-md cursor-pointer hover:bg-gray-50 transition-all duration-200">
                                <div class="text-right text-sm text-gray-500">28</div>
                            </div>
                            <div class="calendar-day h-24 p-1 border border-gray-200 rounded-md cursor-pointer hover:bg-gray-50 transition-all duration-200">
                                <div class="text-right text-sm text-gray-500">29</div>
                            </div>
                            <div class="calendar-day h-24 p-1 border border-gray-200 rounded-md cursor-pointer hover:bg-gray-50 transition-all duration-200">
                                <div class="text-right text-sm text-gray-500">30</div>
                            </div>
                            <div class="calendar-day h-24 p-1 border border-gray-200 rounded-md cursor-pointer hover:bg-gray-50 transition-all duration-200">
                                <div class="text-right text-sm">1</div>
                                <div class="mt-1 p-1 text-xs bg-blue-100 text-blue-800 rounded truncate">10:00 - Coupe femme</div>
                                <div class="mt-1 p-1 text-xs bg-green-100 text-green-800 rounded truncate">14:30 - Coloration</div>
                            </div>
                            <div class="calendar-day h-24 p-1 border border-gray-200 rounded-md cursor-pointer hover:bg-gray-50 transition-all duration-200">
                                <div class="text-right text-sm">2</div>
                                <div class="mt-1 p-1 text-xs bg-purple-100 text-purple-800 rounded truncate">11:15 - Balayage</div>
                            </div>
                            <div class="calendar-day h-24 p-1 border border-gray-200 rounded-md cursor-pointer hover:bg-gray-50 transition-all duration-200">
                                <div class="text-right text-sm">3</div>
                                <div class="mt-1 p-1 text-xs bg-yellow-100 text-yellow-800 rounded truncate">09:00 - Coupe homme</div>
                                <div class="mt-1 p-1 text-xs bg-pink-100 text-pink-800 rounded truncate">16:45 - Brushing</div>
                            </div>
                            <div class="calendar-day h-24 p-1 border border-gray-200 rounded-md cursor-pointer hover:bg-gray-50 transition-all duration-200">
                                <div class="text-right text-sm">4</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Availability section -->
                <div class="bg-white rounded-lg shadow">
                    <div class="p-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900">Gestion des disponibilités</h2>
                    </div>
                    <div class="p-4">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Heure</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lundi</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mardi</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mercredi</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jeudi</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vendredi</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Samedi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <!-- Time slots -->
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">08:00</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="time-slot w-full h-10 bg-green-100 text-green-800 text-center leading-10 rounded cursor-pointer transition-colors duration-200">Disponible</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="time-slot w-full h-10 bg-green-100 text-green-800 text-center leading-10 rounded cursor-pointer">Disponible</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="time-slot w-full h-10 bg-green-100 text-green-800 text-center leading-10 rounded cursor-pointer">Disponible</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="time-slot w-full h-10 bg-green-100 text-green-800 text-center leading-10 rounded cursor-pointer">Disponible</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="time-slot w-full h-10 bg-green-100 text-green-800 text-center leading-10 rounded cursor-pointer">Disponible</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="time-slot w-full h-10 bg-green-100 text-green-800 text-center leading-10 rounded cursor-pointer">Disponible</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">09:00</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="w-full h-10 bg-red-100 text-red-800 text-center leading-10 rounded">Occupé</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="time-slot w-full h-10 bg-green-100 text-green-800 text-center leading-10 rounded cursor-pointer">Disponible</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="w-full h-10 bg-red-100 text-red-800 text-center leading-10 rounded">Occupé</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="time-slot w-full h-10 bg-green-100 text-green-800 text-center leading-10 rounded cursor-pointer">Disponible</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="time-slot w-full h-10 bg-green-100 text-green-800 text-center leading-10 rounded cursor-pointer">Disponible</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="w-full h-10 bg-red-100 text-red-800 text-center leading-10 rounded">Occupé</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">10:00</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="w-full h-10 bg-red-100 text-red-800 text-center leading-10 rounded">Occupé</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="time-slot w-full h-10 bg-green-100 text-green-800 text-center leading-10 rounded cursor-pointer">Disponible</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="time-slot w-full h-10 bg-green-100 text-green-800 text-center leading-10 rounded cursor-pointer">Disponible</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="w-full h-10 bg-red-100 text-red-800 text-center leading-10 rounded">Occupé</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="time-slot w-full h-10 bg-green-100 text-green-800 text-center leading-10 rounded cursor-pointer">Disponible</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="w-full h-10 bg-gray-200 text-gray-600 text-center leading-10 rounded">Fermé</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-6 flex justify-between items-center">
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center">
                                    <div class="w-4 h-4 bg-green-100 rounded mr-2"></div>
                                    <span class="text-sm text-gray-600">Disponible</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-4 h-4 bg-red-100 rounded mr-2"></div>
                                    <span class="text-sm text-gray-600">Occupé</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-4 h-4 bg-gray-200 rounded mr-2"></div>
                                    <span class="text-sm text-gray-600">Fermé</span>
                                </div>
                            </div>
                            <button class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none">
                                <i class="fas fa-save mr-2"></i> Enregistrer
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Time slot selection
        document.addEventListener('DOMContentLoaded', function() {
            const timeSlots = document.querySelectorAll('.time-slot');
            timeSlots.forEach(slot => {
                slot.addEventListener('click', function() {
                    if (this.classList.contains('bg-green-100')) {
                        this.classList.remove('bg-green-100', 'text-green-800');
                        this.classList.add('bg-red-100', 'text-red-800');
                        this.textContent = 'Occupé';
                    } else {
                        this.classList.remove('bg-red-100', 'text-red-800');
                        this.classList.add('bg-green-100', 'text-green-800');
                        this.textContent = 'Disponible';
                    }
                });
            });
        });
    </script>
</body>
</html>