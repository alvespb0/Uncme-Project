<x-app-layout>
    <header class="bg-white border-b border-gray-200">
        <div class="px-8 py-4 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-lg font-semibold text-gray-900">Estados</h1>
                <p class="text-sm text-gray-600 mt-1">Gerenciamento de estados e suas filiações</p>
            </div>

            <div class="relative w-full md:w-auto">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                    <!-- Ícone de busca -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="7" />
                        <line x1="16.5" y1="16.5" x2="21" y2="21" />
                    </svg>
                </span>
                <input
                    type="text"
                    placeholder="Buscar estado..."
                    class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--blaze-orange)] focus:border-transparent w-full md:w-64"
                />
            </div>
        </div>
    </header>

    <div class="px-4 sm:px-6 lg:px-8 py-6 lg:py-8">
        @php
            $estados = [
                [
                    'sigla' => 'SP',
                    'nome' => 'São Paulo',
                    'municipiosFiliados' => 320,
                    'totalMunicipios' => 645,
                    'percentual' => 49.6,
                    'responsavel' => 'Maria Silva',
                    'email' => 'maria.silva@sp.gov.br',
                ],
                [
                    'sigla' => 'MG',
                    'nome' => 'Minas Gerais',
                    'municipiosFiliados' => 285,
                    'totalMunicipios' => 853,
                    'percentual' => 33.4,
                    'responsavel' => 'João Santos',
                    'email' => 'joao.santos@mg.gov.br',
                ],
                [
                    'sigla' => 'BA',
                    'nome' => 'Bahia',
                    'municipiosFiliados' => 198,
                    'totalMunicipios' => 417,
                    'percentual' => 47.5,
                    'responsavel' => 'Ana Costa',
                    'email' => 'ana.costa@ba.gov.br',
                ],
                [
                    'sigla' => 'RS',
                    'nome' => 'Rio Grande do Sul',
                    'municipiosFiliados' => 165,
                    'totalMunicipios' => 497,
                    'percentual' => 33.2,
                    'responsavel' => 'Carlos Oliveira',
                    'email' => 'carlos.oliveira@rs.gov.br',
                ],
                [
                    'sigla' => 'PR',
                    'nome' => 'Paraná',
                    'municipiosFiliados' => 142,
                    'totalMunicipios' => 399,
                    'percentual' => 35.6,
                    'responsavel' => 'Patricia Lima',
                    'email' => 'patricia.lima@pr.gov.br',
                ],
                [
                    'sigla' => 'CE',
                    'nome' => 'Ceará',
                    'municipiosFiliados' => 128,
                    'totalMunicipios' => 184,
                    'percentual' => 69.6,
                    'responsavel' => 'Roberto Alves',
                    'email' => 'roberto.alves@ce.gov.br',
                ],
                [
                    'sigla' => 'PE',
                    'nome' => 'Pernambuco',
                    'municipiosFiliados' => 98,
                    'totalMunicipios' => 185,
                    'percentual' => 53.0,
                    'responsavel' => 'Fernanda Rocha',
                    'email' => 'fernanda.rocha@pe.gov.br',
                ],
                [
                    'sigla' => 'SC',
                    'nome' => 'Santa Catarina',
                    'municipiosFiliados' => 87,
                    'totalMunicipios' => 295,
                    'percentual' => 29.5,
                    'responsavel' => 'Lucas Martins',
                    'email' => 'lucas.martins@sc.gov.br',
                ],
            ];
        @endphp

        <section class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            @foreach ($estados as $estado)
                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-all cursor-pointer group">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-16 h-16 rounded-xl flex items-center justify-center text-white text-xl shadow-md"
                                style="background: linear-gradient(135deg, var(--crusta), var(--coral));"
                            >
                                {{ $estado['sigla'] }}
                            </div>
                            <div>
                                <h2 class="text-base font-semibold text-gray-900">{{ $estado['nome'] }}</h2>
                                <p class="text-sm text-gray-600 mt-1">{{ $estado['responsavel'] }}</p>
                                <p class="text-xs text-gray-500">{{ $estado['email'] }}</p>
                            </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5 text-gray-400 group-hover:text-[var(--blaze-orange)] transition-colors"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="bg-gray-50 rounded-lg p-3">
                            <p class="text-xs text-gray-600 mb-1">Municípios Filiados</p>
                            <p class="text-xl font-semibold text-gray-900">{{ $estado['municipiosFiliados'] }}</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-3">
                            <p class="text-xs text-gray-600 mb-1">Total de Municípios</p>
                            <p class="text-xl font-semibold text-gray-900">{{ $estado['totalMunicipios'] }}</p>
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm text-gray-600">Taxa de Filiação</span>
                            <span class="text-sm font-medium" style="color: var(--green-haze);">
                                {{ number_format($estado['percentual'], 1, ',', '.') }}%
                            </span>
                        </div>
                        <div class="w-full h-2 bg-gray-100 rounded-full overflow-hidden">
                            <div
                                class="h-full rounded-full"
                                style="
                                    width: {{ $estado['percentual'] }}%;
                                    background: linear-gradient(90deg, var(--green-haze), var(--downy));
                                "
                            ></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
    </div>
</x-app-layout>
