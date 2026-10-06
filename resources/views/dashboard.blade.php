<x-layouts::app :title="__('Dashboard')">
    <!-- Añadimos una capa adicional de animación de entrada para toda la vista -->
    <flux:main class="w-full flex-1 flex flex-col gap-8 animate-in fade-in slide-in-from-bottom-8 duration-700">
        
        <!-- ENCABEZADO PREMIUM CON GRADIENTE ANIMADO -->
        <div class="group relative overflow-hidden rounded-3xl p-8 shadow-2xl text-white transition-all hover:shadow-blue-500/20 hover:scale-[1.01] duration-500">
            <!-- Fondo Base -->
            <div class="absolute inset-0 bg-gradient-to-r from-blue-700 via-indigo-600 to-violet-700 opacity-90"></div>
            
            <!-- Elementos Flotantes (Glassmorphism & Glows) -->
            <div class="absolute -right-20 -top-20 h-64 w-64 rounded-full bg-blue-400/30 blur-3xl group-hover:bg-blue-400/40 group-hover:scale-110 transition-all duration-700"></div>
            <div class="absolute -bottom-20 -left-20 h-64 w-64 rounded-full bg-violet-400/30 blur-3xl group-hover:bg-violet-400/40 group-hover:scale-110 transition-all duration-700"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 h-full w-full bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-white/10 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-1000"></div>
            
            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="flex-1 animate-in slide-in-from-left-8 fade-in duration-700 delay-100">
                    <div class="inline-flex items-center gap-2 px-3 py-1 mb-4 rounded-full bg-white/10 border border-white/20 backdrop-blur-md text-sm font-medium text-blue-100">
                        <span class="relative flex h-2 w-2">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-300 opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-200"></span>
                        </span>
                        Sistema en línea
                    </div>
                    
                    <flux:heading size="2xl" level="1" class="text-white drop-shadow-md font-bold tracking-tight">
                        ¡Hola, {{ auth()->user()->name }}! 👋
                    </flux:heading>
                    <p class="mt-3 text-blue-100/90 max-w-xl text-lg leading-relaxed font-light">
                        Este es tu centro de operaciones. Visualiza métricas en tiempo real y responde rápidamente a los requerimientos de la plataforma.
                    </p>
                    
                    <div class="mt-8 flex flex-wrap gap-4">
                        <flux:button href="{{ route('tickets.index') }}" class="!bg-white !text-indigo-600 hover:!bg-blue-50 hover:!scale-105 transition-all shadow-xl shadow-black/10 font-semibold px-6 rounded-xl">
                            Gestionar Tickets
                        </flux:button>
                        @can('crear tickets')
                        <flux:button href="{{ route('tickets.create') }}" class="!bg-black/20 !text-white border border-white/30 hover:!bg-white/20 backdrop-blur-md hover:!scale-105 transition-all rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg> Nuevo Ticket
                        </flux:button>
                        @endcan
                    </div>
                </div>
                
                <!-- Ilustración/Icono Animado a la derecha -->
                <div class="hidden md:flex flex-shrink-0 relative w-40 h-40 animate-in zoom-in fade-in duration-700 delay-300">
                    <div class="absolute inset-0 bg-white/10 rounded-full blur-2xl animate-pulse"></div>
                    <div class="relative h-full w-full rounded-full border border-white/20 bg-white/10 backdrop-blur-xl flex items-center justify-center shadow-2xl group-hover:rotate-12 transition-transform duration-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-white drop-shadow-lg">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 01-5.84 7.36c-3.12 0-5.64-2.53-5.64-5.64 0-2.61 1.76-4.86 4.18-5.5m11.19-5.9c-1.57 0-3.05.61-4.16 1.72-2.19 2.19-2.25 5.7-.15 7.96l2.16 2.16c.45.45 1.18.45 1.63 0l2.16-2.16c2.25-2.25 2.25-5.9 0-8.15-1.11-1.11-2.59-1.72-4.16-1.72zm-6.19 7.02l-1.06 1.06c-1.14 1.14-2.99 1.14-4.13 0l-1.06-1.06c-1.14-1.14-1.14-2.99 0-4.13l1.06-1.06c1.14-1.14 2.99-1.14 4.13 0l1.06 1.06c1.14 1.14 1.14 2.99 0 4.13z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- TARJETAS ESTADÍSTICAS -->
        <div class="grid auto-rows-min gap-6 md:grid-cols-3">
            <!-- Tarjeta 1: Abiertos -->
            <div class="group relative overflow-hidden rounded-2xl border border-zinc-200/80 dark:border-zinc-800 bg-white/60 dark:bg-zinc-900/60 p-6 backdrop-blur-xl shadow-sm hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-500 hover:-translate-y-2 cursor-default animate-in fade-in slide-in-from-bottom-8 delay-150">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="absolute top-0 right-0 w-32 h-32 bg-blue-500/10 rounded-full blur-3xl -mr-16 -mt-16 group-hover:bg-blue-500/20 transition-all duration-500"></div>
                
                <div class="relative flex items-start justify-between">
                    <div class="space-y-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 group-hover:scale-110 group-hover:rotate-6 transition-transform duration-500 shadow-sm border border-blue-100 dark:border-blue-800/50">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Activos</p>
                            <p class="mt-1 text-5xl font-black tracking-tight text-zinc-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                {{ \App\Models\Ticket::where('estado', 'abierto')->count() }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 2: Cerrados -->
            <div class="group relative overflow-hidden rounded-2xl border border-zinc-200/80 dark:border-zinc-800 bg-white/60 dark:bg-zinc-900/60 p-6 backdrop-blur-xl shadow-sm hover:shadow-xl hover:shadow-emerald-500/10 transition-all duration-500 hover:-translate-y-2 cursor-default animate-in fade-in slide-in-from-bottom-8 delay-300">
                <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/5 to-teal-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-500/10 rounded-full blur-3xl -mr-16 -mt-16 group-hover:bg-emerald-500/20 transition-all duration-500"></div>
                
                <div class="relative flex items-start justify-between">
                    <div class="space-y-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-50 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 group-hover:scale-110 group-hover:rotate-6 transition-transform duration-500 shadow-sm border border-emerald-100 dark:border-emerald-800/50">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Resueltos</p>
                            <p class="mt-1 text-5xl font-black tracking-tight text-zinc-900 dark:text-white group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">
                                {{ \App\Models\Ticket::where('estado', 'cerrado')->count() }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 3: Personal -->
            <div class="group relative overflow-hidden rounded-2xl border border-zinc-200/80 dark:border-zinc-800 bg-white/60 dark:bg-zinc-900/60 p-6 backdrop-blur-xl shadow-sm hover:shadow-xl hover:shadow-amber-500/10 transition-all duration-500 hover:-translate-y-2 cursor-default animate-in fade-in slide-in-from-bottom-8 delay-500">
                <div class="absolute inset-0 bg-gradient-to-br from-amber-500/5 to-orange-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="absolute top-0 right-0 w-32 h-32 bg-amber-500/10 rounded-full blur-3xl -mr-16 -mt-16 group-hover:bg-amber-500/20 transition-all duration-500"></div>
                
                <div class="relative flex items-start justify-between">
                    <div class="space-y-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-amber-50 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400 group-hover:scale-110 group-hover:-rotate-6 transition-transform duration-500 shadow-sm border border-amber-100 dark:border-amber-800/50">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Mi Gestión</p>
                            <p class="mt-1 text-5xl font-black tracking-tight text-zinc-900 dark:text-white group-hover:text-amber-600 dark:group-hover:text-amber-400 transition-colors">
                                {{ \App\Models\Ticket::where('user_id', auth()->id())->count() }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CONTENIDO PRINCIPAL: ACTIVIDAD RECIENTE -->
        <div class="relative flex-1 overflow-hidden rounded-3xl border border-zinc-200/80 dark:border-zinc-800 bg-white/80 dark:bg-zinc-900/80 backdrop-blur-2xl shadow-lg transition-all duration-500 animate-in fade-in slide-in-from-bottom-8 delay-700">
            <div class="p-8">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h3 class="text-2xl font-bold text-zinc-900 dark:text-white flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-zinc-400">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg> Actividad Reciente
                        </h3>
                        <p class="text-zinc-500 dark:text-zinc-400 mt-1 text-sm">Últimos tickets creados en la plataforma</p>
                    </div>
                    <flux:button size="sm" variant="ghost" href="{{ route('tickets.index') }}" class="group hidden sm:flex">
                        Ver todos <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </flux:button>
                </div>

                @php
                    // Obtenemos los últimos 5 tickets
                    $recentTickets = \App\Models\Ticket::with('user')->latest()->take(5)->get();
                @endphp

                @if($recentTickets->isEmpty())
                    <div class="flex flex-col items-center justify-center py-16 text-center animate-in zoom-in duration-500">
                        <div class="rounded-full bg-zinc-100 dark:bg-zinc-800 p-6 mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 w-10 text-zinc-400">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 12.838c-.066.214-.1.437-.1.661z" />
                            </svg>
                        </div>
                        <h4 class="text-lg font-semibold text-zinc-900 dark:text-white">Bandeja Vacía</h4>
                        <p class="mt-2 text-zinc-500 dark:text-zinc-400 max-w-sm">No hay tickets registrados en el sistema por el momento.</p>
                        @can('crear tickets')
                        <flux:button href="{{ route('tickets.create') }}" class="mt-6" variant="primary">Crear el primero</flux:button>
                        @endcan
                    </div>
                @else
                    <div class="space-y-4">
                        @foreach($recentTickets as $index => $ticket)
                            <a href="{{ route('tickets.show', $ticket) }}" 
                               class="group block p-4 rounded-2xl border border-zinc-100 dark:border-zinc-800 bg-zinc-50/50 dark:bg-zinc-800/20 hover:bg-white dark:hover:bg-zinc-800 hover:shadow-md hover:border-zinc-200 dark:hover:border-zinc-700 transition-all duration-300 animate-in fade-in slide-in-from-right-4"
                               style="animation-delay: {{ 800 + ($index * 100) }}ms">
                                
                                <div class="flex items-center justify-between sm:flex-row flex-col sm:gap-0 gap-4">
                                    <div class="flex items-center gap-4 w-full sm:w-auto">
                                        <div class="hidden sm:flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-gradient-to-br {{ $ticket->estado === 'abierto' ? 'from-blue-100 to-indigo-100 dark:from-blue-900/40 dark:to-indigo-900/40 text-blue-600' : 'from-zinc-100 to-zinc-200 dark:from-zinc-800 dark:to-zinc-700 text-zinc-500' }}">
                                            @if($ticket->estado === 'abierto')
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                  <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                  <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                                </svg>
                                            @endif
                                        </div>
                                        <div>
                                            <h4 class="text-base font-semibold text-zinc-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors line-clamp-1">
                                                {{ $ticket->titulo }}
                                            </h4>
                                            <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-1 flex items-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5">
                                                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                                </svg> {{ $ticket->user->name }}
                                                <span class="text-zinc-300 dark:text-zinc-600">&bull;</span>
                                                {{ $ticket->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between w-full sm:w-auto">
                                        <flux:badge size="sm" color="{{ $ticket->estado === 'abierto' ? 'green' : 'zinc' }}" class="uppercase tracking-wider font-bold">
                                            {{ $ticket->estado }}
                                        </flux:badge>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-zinc-400 group-hover:text-blue-500 group-hover:translate-x-1 transition-all ml-4 sm:hidden block">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </flux:main>
</x-layouts::app>