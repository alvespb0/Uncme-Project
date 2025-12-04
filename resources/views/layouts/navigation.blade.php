<nav x-data="{ open: true }" class="flex h-screen bg-gray-50">

    {{-- Sidebar --}}
    <aside 
        class="bg-white border-r border-gray-200 h-full transition-all duration-300 flex flex-col shadow-sm"
        :class="open ? 'w-64' : 'w-20'"
    >
        <div class="flex flex-col h-full">

            {{-- Logo / Header --}}
            <div class="flex items-center justify-between p-4 border-b border-gray-200">
                <div class="flex items-center gap-3" x-show="open" x-cloak>
                    <div 
                        class="w-10 h-10 rounded-lg flex items-center justify-center shadow-sm"
                        style="background: linear-gradient(135deg, var(--blaze-orange), var(--green-haze));"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M3 12L12 3l9 9" />
                            <path d="M5 10v10h4v-6h6v6h4V10" />
                        </svg>
                    </div>
                    <div class="leading-tight">
                        <h4 class="text-sm font-semibold" style="color: var(--blaze-orange);">UNCME</h4>
                        <p class="text-xs text-gray-500">Nacional</p>
                    </div>
                </div>

                {{-- Botão de recolher --}}
                <button 
                    @click="open = !open"
                    class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-600 focus:outline-none ml-auto"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                         stroke="currentColor" class="w-5 h-5" x-show="open">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
                         stroke="currentColor" class="w-5 h-5" x-show="!open">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5L15.75 12l-7.5 7.5" />
                    </svg>
                </button>
            </div>

            {{-- Menu --}}
            <div class="flex-1 mt-4 space-y-1 px-2">

                {{-- Dashboard --}}
                <a href="{{ route('dashboard') }}" 
                   @class([
                       'flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-all',
                       'bg-white shadow-md shadow-orange-100' => request()->routeIs('dashboard'),
                       'hover:bg-gray-50 text-gray-600' => !request()->routeIs('dashboard'),
                   ])
                   :class="open ? '' : 'justify-center'"
                   style="{{ request()->routeIs('dashboard') ? 'color: var(--blaze-orange);' : '' }}"
                >
                    <svg 
                        class="w-5 h-5"
                        fill="none" stroke="currentColor" stroke-width="2" 
                         viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 13h8V3H3v10zM13 21h8v-6h-8v6zM13 3v6h8V3h-8zM3 21h8v-6H3v6z"/>
                    </svg>
                    <span x-show="open">Dashboard</span>
                </a>

                {{-- Estados --}}
                <a href="{{ route('estados') }}" 
                   @class([
                       'flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-all',
                       'bg-white shadow-md shadow-orange-100 text-[var(--blaze-orange)]' => request()->routeIs('estados'),
                       'hover:bg-gray-50 text-gray-600' => !request()->routeIs('estados'),
                   ])
                   :class="open ? '' : 'justify-center'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 9.5L12 4l9 5.5-9 5.5-9-5.5z" />
                        <path d="M3 14.5L12 20l9-5.5" />
                    </svg>
                    <span x-show="open">Estados</span>
                </a>

                {{-- Municípios --}}
                <a href="{{ route('municipios') }}" 
                   @class([
                       'flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-all',
                       'bg-white shadow-md shadow-orange-100 text-[var(--blaze-orange)]' => request()->routeIs('municipios'),
                       'hover:bg-gray-50 text-gray-600' => !request()->routeIs('municipios'),
                   ])
                   :class="open ? '' : 'justify-center'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 21V9l7-4 7 4v12" />
                        <path d="M9 21V12h6v9" />
                    </svg>
                    <span x-show="open">Municípios</span>
                </a>

                {{-- Usuários --}}
                <a href="{{ route('usuarios' )}}" 
                    @class([
                       'flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-all',
                       'bg-white shadow-md shadow-orange-100 text-[var(--blaze-orange)]' => request()->routeIs('usuarios'),
                       'hover:bg-gray-50 text-gray-600' => !request()->routeIs('usuarios'),
                   ])
                :class="open ? '' : 'justify-center'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 12a4 4 0 1 0-4-4 4 4 0 0 0 4 4z" />
                        <path d="M3 21a9 9 0 0 1 18 0" />
                    </svg>
                    <span x-show="open">Usuários</span>
                </a>

                {{-- Relatórios --}}
                <a href="#" 
                   class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-all hover:bg-gray-50"
                   :class="open ? '' : 'justify-center'"
                   style="color: #6B7280;"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M7 3h10v18H7z" />
                        <path d="M11 7h2M11 11h2M11 15h2" />
                    </svg>
                    <span x-show="open">Relatórios</span>
                </a>

                {{-- Configurações --}}
                <a href="#" 
                   class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-all hover:bg-gray-50"
                   :class="open ? '' : 'justify-center'"
                   style="color: #6B7280;"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 15.5a3.5 3.5 0 1 0-3.5-3.5 3.5 3.5 0 0 0 3.5 3.5z" />
                        <path d="M19.4 10a1.5 1.5 0 0 0 .3-1l-.3-2a1.5 1.5 0 0 0-1-.9l-1.7-.6a1.5 1.5 0 0 1-.8-.6L14.5 2.8a1.5 1.5 0 0 0-2.6 0L10.1 4.9a1.5 1.5 0 0 1-.8.6L7.6 6.1a1.5 1.5 0 0 0-1 .9l-.3 2a1.5 1.5 0 0 0 .3 1l1.1 1.4a1.5 1.5 0 0 1 .3 1l-.3 2a1.5 1.5 0 0 0 .4 1.1l1.4 1.4a1.5 1.5 0 0 0 1.1.4l2-.3a1.5 1.5 0 0 1 1 0l2 .3a1.5 1.5 0 0 0 1.1-.4l1.4-1.4a1.5 1.5 0 0 0 .4-1.1l-.3-2a1.5 1.5 0 0 1 .3-1z" />
                    </svg>
                    <span x-show="open">Configurações</span>
                </a>

            </div>

            {{-- Footer / Profile --}}
            <div class="p-4 border-t border-gray-200">
                <div class="flex items-center gap-3 px-2 py-2 rounded-lg hover:bg-gray-50 cursor-pointer"
                     :class="open ? '' : 'justify-center'">

                    <div 
                        class="w-9 h-9 rounded-full flex items-center justify-center text-white flex-shrink-0"
                        style="background-color: var(--green-haze);"
                    >
                        {{ strtoupper(substr(Auth::user()->name ?? 'A D', 0, 2)) }}
                    </div>

                    <div x-show="open" class="flex-1">
                        <div class="font-medium text-gray-900 text-sm">
                            {{ Auth::user()->name ?? 'Usuário' }}
                        </div>
                        <div class="text-sm text-gray-500">
                            {{ Auth::user()->email ?? 'email@exemplo.com' }}
                        </div>
                    </div>
                </div>

                <a href="#"
                   class="flex items-center gap-3 mt-3 px-3 py-2 rounded-lg text-gray-600 hover:bg-red-50 hover:text-red-600 text-sm"
                   :class="open ? '' : 'justify-center'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                        <path d="M10 17l5-5-5-5" />
                        <path d="M15 12H3" />
                    </svg>
                    <span x-show="open">Sair</span>
                </a>
            </div>

        </div>
    </aside>

    {{-- Conteúdo principal ajustado pela sidebar --}}
    <div class="flex-1 flex flex-col overflow-hidden">
        <div class="flex-1 overflow-auto">
            {{ $slot }}
        </div>
    </div>

</nav>
