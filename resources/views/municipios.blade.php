<x-app-layout>
    {{-- Header --}}
    <header class="bg-white border-b border-gray-200">
        <div class="px-8 py-4 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-lg font-semibold text-gray-900">Municípios</h1>
                <p class="text-sm text-gray-600 mt-1">Lista completa de municípios filiados</p>
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
            $municipios = [
                ['id' => 1, 'nome' => 'São Paulo', 'estado' => 'SP', 'populacao' => 12396372, 'dataFiliacao' => '15/01/2024', 'status' => 'ativo', 'responsavel' => 'Ricardo Nunes'],
                ['id' => 2, 'nome' => 'Rio de Janeiro', 'estado' => 'RJ', 'populacao' => 6775561, 'dataFiliacao' => '10/02/2024', 'status' => 'ativo', 'responsavel' => 'Eduardo Paes'],
                ['id' => 3, 'nome' => 'Belo Horizonte', 'estado' => 'MG', 'populacao' => 2530701, 'dataFiliacao' => '20/01/2024', 'status' => 'ativo', 'responsavel' => 'Fuad Noman'],
                ['id' => 4, 'nome' => 'Salvador', 'estado' => 'BA', 'populacao' => 2900319, 'dataFiliacao' => '05/03/2024', 'status' => 'pendente', 'responsavel' => 'Bruno Reis'],
                ['id' => 5, 'nome' => 'Fortaleza', 'estado' => 'CE', 'populacao' => 2703391, 'dataFiliacao' => '18/02/2024', 'status' => 'ativo', 'responsavel' => 'José Sarto'],
                ['id' => 6, 'nome' => 'Curitiba', 'estado' => 'PR', 'populacao' => 1963726, 'dataFiliacao' => '12/01/2024', 'status' => 'ativo', 'responsavel' => 'Rafael Greca'],
                ['id' => 7, 'nome' => 'Recife', 'estado' => 'PE', 'populacao' => 1661017, 'dataFiliacao' => '25/02/2024', 'status' => 'ativo', 'responsavel' => 'João Campos'],
                ['id' => 8, 'nome' => 'Manaus', 'estado' => 'AM', 'populacao' => 2255903, 'dataFiliacao' => '08/03/2024', 'status' => 'pendente', 'responsavel' => 'David Almeida'],
                ['id' => 9, 'nome' => 'Porto Alegre', 'estado' => 'RS', 'populacao' => 1492530, 'dataFiliacao' => '30/01/2024', 'status' => 'ativo', 'responsavel' => 'Sebastião Melo'],
                ['id' => 10, 'nome' => 'Brasília', 'estado' => 'DF', 'populacao' => 3094325, 'dataFiliacao' => '22/02/2024', 'status' => 'inativo', 'responsavel' => 'Ibaneis Rocha'],
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
                                Município
                            </th>
                            <th class="px-6 py-4 text-left text-xs text-gray-600 uppercase tracking-wider">
                                Estado
                            </th>
                            <th class="px-6 py-4 text-left text-xs text-gray-600 uppercase tracking-wider">
                                População
                            </th>
                            <th class="px-6 py-4 text-left text-xs text-gray-600 uppercase tracking-wider">
                                Data Filiação
                            </th>
                            <th class="px-6 py-4 text-left text-xs text-gray-600 uppercase tracking-wider">
                                Responsável
                            </th>
                            <th class="px-6 py-4 text-left text-xs text-gray-600 uppercase tracking-wider">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($municipios as $municipio)
                            @php
                                $status = $statusStyles[$municipio['status']];
                            @endphp
                            <tr class="hover:bg-gray-50 transition-colors cursor-pointer">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-lg flex items-center justify-center"
                                            style="background-color: var(--romantic);"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M12 21s-6-5.686-6-10a6 6 0 1 1 12 0c0 4.314-6 10-6 10z" />
                                                <circle cx="12" cy="11" r="2.5" />
                                            </svg>
                                        </div>
                                        <span class="text-gray-900">{{ $municipio['nome'] }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-gray-600">{{ $municipio['estado'] }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-gray-600">{{ number_format($municipio['populacao'], 0, ',', '.') }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-gray-600">{{ $municipio['dataFiliacao'] }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-gray-600">{{ $municipio['responsavel'] }}</span>
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
                    Mostrando <span>{{ count($municipios) }}</span> de <span>{{ count($municipios) }}</span> municípios
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


