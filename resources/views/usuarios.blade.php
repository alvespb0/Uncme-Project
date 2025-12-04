<x-app-layout>
    {{-- Header --}}
    <header class="bg-white border-b border-gray-200">
        <div class="px-8 py-4 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-lg font-semibold text-gray-900">Usuários</h1>
                <p class="text-sm text-gray-600 mt-1">Lista completa de usuários cadastrados</p>
            </div>
            <button
                class="px-4 py-2 rounded-lg text-white flex items-center gap-2 hover:shadow-md transition-all"
                style="background: linear-gradient(135deg, var(--green-haze), var(--downy));"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                    <path d="M7 10l5 5 5-5" />
                    <path d="M12 15V3" />
                </svg>
                <span>Exportar</span>
            </button>
        </div>
    </header>

    <div class="px-4 sm:px-6 lg:px-8 py-6 lg:py-8 space-y-6">
        @php
            $usuarios = [
                ['id' => 1, 'nome' => 'Zézinho', 'estado' => 'SP', 'cidade' => 'São Paulo', 'acesso' => 'Nacional', 'status' => 'ativo'],
                ['id' => 2, 'nome' => 'Luisinho', 'estado' => 'RJ', 'cidade' => 'Rio de Janeiro', 'acesso' => 'Estadual', 'status' => 'ativo'],
                ['id' => 3, 'nome' => 'Huguinho', 'estado' => 'MG', 'cidade' => 'Belo Horizonte', 'acesso' => 'Municipal', 'status' => 'inativo'],
            ];

            $statusStyles = [
                'ativo' => ['bg' => 'var(--apple-green)', 'color' => 'var(--green-haze)', 'label' => 'Ativo'],
                'pendente' => ['bg' => 'var(--romantic)', 'color' => 'var(--crusta)', 'label' => 'Pendente'],
                'inativo' => ['bg' => '#F1F5F9', 'color' => '#64748B', 'label' => 'Inativo'],
            ];
        @endphp

        {{-- Filtros (visual, sem lógica JS) --}}
        <section class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-1 relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="7" />
                            <line x1="16.5" y1="16.5" x2="21" y2="21" />
                        </svg>
                    </span>
                    <input
                        type="text"
                        placeholder="Buscar município ou estado..."
                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--blaze-orange)] focus:border-transparent"
                    />
                </div>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 4h18" />
                        <path d="M6 8h12" />
                        <path d="M9 12h6" />
                        <path d="M10 16h4" />
                    </svg>
                    <select
                        class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--blaze-orange)] focus:border-transparent"
                    >
                        <option>Todos os Status</option>
                        <option>Ativos</option>
                        <option>Pendentes</option>
                        <option>Inativos</option>
                    </select>
                </div>
            </div>
        </section>

        {{-- Tabela --}}
        <section class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs text-gray-600 uppercase tracking-wider">
                                Usuário
                            </th>
                            <th class="px-6 py-4 text-left text-xs text-gray-600 uppercase tracking-wider">
                                Município
                            </th>
                            <th class="px-6 py-4 text-left text-xs text-gray-600 uppercase tracking-wider">
                                UF
                            </th>
                            <th class="px-6 py-4 text-left text-xs text-gray-600 uppercase tracking-wider">
                                Acesso
                            </th>
                            <th class="px-6 py-4 text-left text-xs text-gray-600 uppercase tracking-wider">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($usuarios as $usuario)
                            @php
                                $status = $statusStyles[$usuario['status']];
                            @endphp
                            <tr class="hover:bg-gray-50 transition-colors cursor-pointer">
                                <td class="px-6 py-4">
                                        <span class="text-gray-900">{{ $usuario['nome'] }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-gray-600">{{ $usuario['cidade'] }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-gray-600">{{ $usuario['estado'] }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-gray-600">{{ $usuario['acesso'] }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-medium"
                                        style="background-color: {{ $status['bg'] }}; color: {{ $status['color'] }};"
                                    >
                                        {{ $status['label'] }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Paginação fake para o MVP --}}
            <div class="px-6 py-4 border-top border-gray-200 flex items-center justify-between">
                <p class="text-sm text-gray-600">
                    Mostrando <span>{{ count($usuarios) }}</span> de <span>{{ count($usuarios) }}</span> usuários
                </p>
                <div class="flex gap-2">
                    <button
                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors"
                    >
                        Anterior
                    </button>
                    <button
                        class="px-4 py-2 rounded-lg text-white transition-colors"
                        style="background-color: var(--blaze-orange);"
                    >
                        1
                    </button>
                    <button
                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors"
                    >
                        2
                    </button>
                    <button
                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors"
                    >
                        Próximo
                    </button>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>



