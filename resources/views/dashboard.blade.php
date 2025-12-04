<x-app-layout>
    {{-- Header bar principal --}}
        <header class="sticky top-0 z-30 bg-white border-b border-gray-200">
            <div class="px-8 py-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div 
                        class="w-10 h-10 rounded-lg flex items-center justify-center shadow-md"
                        style="background: linear-gradient(135deg, var(--blaze-orange), var(--green-haze));"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M3 12L12 3l9 9" />
                            <path d="M5 10v10h4v-6h6v6h4V10" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-lg font-semibold text-gray-900">
                            Painel Nacional
                        </h1>
                        <p class="text-xs text-gray-500">
                            Visão geral das filiações municipais
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <span class="hidden sm:inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white shadow-sm text-xs text-gray-600">
                        <span class="w-2 h-2 rounded-full animate-pulse" style="background-color: var(--green-haze);"></span>
                        Sistema oficial UNCME
                    </span>
                </div>
            </div>
        </header>

        {{-- Conteúdo --}}
        <div class="px-4 sm:px-6 lg:px-8 py-6 lg:py-8 space-y-6">
            {{-- Cards de estatísticas --}}
            <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100 flex flex-col gap-3">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">Municípios Filiados</span>
                        <span class="text-xs px-2 py-0.5 rounded-full bg-green-50 text-green-700 font-medium">
                            +12%
                        </span>
                    </div>
                    <div class="flex items-end justify-between">
                        <p class="text-2xl font-semibold text-gray-900">2.450</p>
                        <span class="text-xs text-[var(--blaze-orange)] font-medium">Nível nacional</span>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100 flex flex-col gap-3">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">Estados Ativos</span>
                    </div>
                    <div class="flex items-end justify-between">
                        <p class="text-2xl font-semibold text-gray-900">26</p>
                        <span class="text-xs text-[var(--crusta)] font-medium">Cobertura nacional</span>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100 flex flex-col gap-3">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">Usuários Ativos</span>
                        <span class="text-xs px-2 py-0.5 rounded-full bg-green-50 text-green-700 font-medium">
                            +8%
                        </span>
                    </div>
                    <div class="flex items-end justify-between">
                        <p class="text-2xl font-semibold text-gray-900">3.182</p>
                        <span class="text-xs text-[var(--green-haze)] font-medium">Últimos 30 dias</span>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100 flex flex-col gap-3">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">Aprovações Pendentes</span>
                        <span class="text-xs px-2 py-0.5 rounded-full bg-orange-50 text-orange-600 font-medium">
                            -5%
                        </span>
                    </div>
                    <div class="flex items-end justify-between">
                        <p class="text-2xl font-semibold text-gray-900">38</p>
                        <span class="text-xs text-[var(--coral)] font-medium">Fila de análise</span>
                    </div>
                </div>
            </section>

            {{-- Grade principal: gráficos & status --}}
            <section class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                {{-- Gráfico de barras - Municípios por estado --}}
                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 lg:col-span-2">
                    <div class="mb-4">
                        <h2 class="text-base font-semibold text-gray-900">Municípios por Estado</h2>
                        <p class="text-sm text-gray-600">Top 6 estados com mais filiações</p>
                    </div>
                    <div class="h-80">
                        <canvas id="estadosChart"></canvas>
                    </div>
                </div>

                {{-- Gráfico de pizza - Status das filiações --}}
                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <div class="mb-4">
                        <h2 class="text-base font-semibold text-gray-900">Status das Filiações</h2>
                        <p class="text-sm text-gray-600">Distribuição geral</p>
                    </div>
                    <div class="h-72">
                        <canvas id="statusChart"></canvas>
                    </div>
                </div>
            </section>

            {{-- Atividades recentes --}}
            <section class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                <div class="mb-4">
                    <h2 class="text-base font-semibold text-gray-900">Atividades Recentes</h2>
                    <p class="text-sm text-gray-600">Últimas atualizações do sistema</p>
                </div>

                @php
                    $atividades = [
                        ['municipio' => 'São Paulo - SP', 'acao' => 'Filiação aprovada', 'data' => 'Há 2 horas', 'status' => 'success'],
                        ['municipio' => 'Belo Horizonte - MG', 'acao' => 'Dados atualizados', 'data' => 'Há 4 horas', 'status' => 'info'],
                        ['municipio' => 'Salvador - BA', 'acao' => 'Aguardando aprovação', 'data' => 'Há 6 horas', 'status' => 'warning'],
                        ['municipio' => 'Curitiba - PR', 'acao' => 'Filiação aprovada', 'data' => 'Há 8 horas', 'status' => 'success'],
                        ['municipio' => 'Fortaleza - CE', 'acao' => 'Documento enviado', 'data' => 'Há 10 horas', 'status' => 'info'],
                    ];
                @endphp

                <div class="space-y-4">
                    @foreach ($atividades as $atividade)
                        <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-0">
                            <div class="flex items-center gap-4">
                                @php
                                    $corStatus = match($atividade['status']) {
                                        'success' => 'background-color: var(--green-haze);',
                                        'warning' => 'background-color: var(--crusta);',
                                        default => 'background-color: #3b82f6;',
                                    };
                                @endphp
                                <span class="w-2 h-2 rounded-full" style="{{ $corStatus }}"></span>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $atividade['municipio'] }}</p>
                                    <p class="text-xs text-gray-600">{{ $atividade['acao'] }}</p>
                                </div>
                            </div>
                            <span class="text-xs text-gray-500">{{ $atividade['data'] }}</span>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>

    {{-- Gráficos usando Chart.js (dados estáticos iguais ao dashboard do Figma/TS) --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const estadosCtx = document.getElementById('estadosChart');
            if (estadosCtx) {
                const estadosData = {
                    labels: ['SP', 'MG', 'BA', 'RS', 'PR', 'CE'],
                    datasets: [{
                        label: 'Municípios',
                        data: [320, 285, 198, 165, 142, 128],
                        backgroundColor: 'rgba(255, 105, 6, 0.9)',
                        borderRadius: 10,
                        barThickness: 48,
                    }],
                };

                new Chart(estadosCtx, {
                    type: 'bar',
                    data: estadosData,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false,
                            },
                        },
                        scales: {
                            x: {
                                grid: {
                                    display: false,
                                },
                                ticks: {
                                    color: '#6B7280',
                                },
                            },
                            y: {
                                grid: {
                                    color: '#E5E7EB',
                                },
                                ticks: {
                                    color: '#6B7280',
                                },
                                beginAtZero: true,
                            },
                        },
                    },
                });
            }

            const statusCtx = document.getElementById('statusChart');
            if (statusCtx) {
                const statusData = {
                    labels: ['Ativos', 'Pendentes', 'Inativos'],
                    datasets: [{
                        data: [2450, 380, 120],
                        backgroundColor: [
                            '#02a85a', // var(--green-haze)
                            '#ff812d', // var(--crusta)
                            '#94A3B8', // cinza
                        ],
                        borderWidth: 0,
                    }],
                };

                new Chart(statusCtx, {
                    type: 'doughnut',
                    data: statusData,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    padding: 16,
                                    color: '#4B5563',
                                },
                            },
                        },
                        cutout: '60%',
                    },
                });
            }
        });
    </script>
</x-app-layout>
