<x-app-layout>

    {{-- Header --}}
    <header class="bg-white border-b border-gray-200">
        <div class="px-8 py-4 flex flex-col md:flex-row md:items-center md:justify-between gap-4">

            <div>
                <h1 class="text-lg font-semibold text-gray-900">Novo Usuário</h1>
                <p class="text-sm text-gray-600 mt-1">Cadastro de um novo usuário</p>
            </div>

            <a href=""
                class="px-4 py-2 rounded-lg bg-white shadow-md shadow-orange-100 text-[var(--blaze-orange)]
                       flex items-center gap-2 hover:shadow-lg transition-all border border-orange-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path d="M15 19l-7-7 7-7" />
                </svg>
                Voltar
            </a>
        </div>
    </header>


    <div class="px-4 sm:px-6 lg:px-8 py-6 lg:py-8">

        {{-- x-data principal --}}
        <form method="POST" action="" enctype="multipart/form-data"
              x-data="{ acesso: null, temFiliacao: null }"
              class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 max-w-4xl mx-auto space-y-10">
            @csrf


            {{-- =========================================================
                    DADOS DO USUÁRIO
            ========================================================== --}}
            <section class="space-y-6">

                <h2 class="text-lg font-semibold text-gray-900 border-b pb-2">Dados do Usuário</h2>

                {{-- Nome --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
                    <input type="text" name="nome"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg
                           focus:ring-[var(--blaze-orange)] focus:border-transparent">
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg
                           focus:ring-[var(--blaze-orange)] focus:border-transparent">
                </div>

                {{-- Tipo de Acesso --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tipo de Acesso</label>

                    <div class="flex gap-6 text-sm text-gray-700">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="acesso" value="Nacional" x-model="acesso">
                            Nacional
                        </label>

                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="acesso" value="Estadual" x-model="acesso">
                            Estadual
                        </label>

                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="acesso" value="Municipal" x-model="acesso">
                            Municipal
                        </label>
                    </div>
                </div>


                {{-- Cidade só aparece para MUNICIPAL --}}
                <div x-show="acesso === 'Municipal'" x-transition class="space-y-6">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Cidade</label>

                        <select name="cidade"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg
                                focus:ring-[var(--blaze-orange)] focus:border-transparent">
                            <option value="">Selecione...</option>
                            <option value="São Paulo|SP">São Paulo - SP</option>
                            <option value="Campinas|SP">Campinas - SP</option>
                            <option value="Rio de Janeiro|RJ">Rio de Janeiro - RJ</option>
                            <option value="Niterói|RJ">Niterói - RJ</option>
                            <option value="Belo Horizonte|MG">Belo Horizonte - MG</option>
                            <option value="Uberlândia|MG">Uberlândia - MG</option>
                        </select>
                    </div>

                </div>

            </section>




            {{-- =========================================================
                    FILIAÇÃO — SOMENTE SE MUNICIPAL
            ========================================================== --}}
            
            <section x-show="acesso === 'Municipal'" x-transition class="space-y-8">

                <h2 class="text-lg font-semibold text-gray-900 border-b pb-3">Filiação</h2>

                {{-- Sim ou Não --}}
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">
                        Deseja vincular este usuário a uma filiação existente?
                    </label>

                    <div class="flex gap-6 text-sm">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="temFiliacao" value="sim" x-model="temFiliacao">
                            Sim
                        </label>

                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="temFiliacao" value="nao" x-model="temFiliacao">
                            Não
                        </label>
                    </div>
                </div>


                {{-- LISTA — Quando SIM --}}
                <div x-show="temFiliacao === 'sim'" x-transition
                    class="p-6 border border-gray-200 rounded-xl bg-gray-50 space-y-4">

                    <label class="block text-sm font-medium text-gray-700">
                        Selecione a Filiação
                    </label>

                    <select name="filiacao_id"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white">
                        <option value="">Selecione...</option>
                        <option value="1">Conselho Municipal da Criança - SP</option>
                        <option value="2">Conselho Estadual de Educação - RJ</option>
                        <option value="3">Conselho Municipal de Saúde - MG</option>
                    </select>

                </div>


                {{-- FORMULÁRIO COMPLETO — Quando NÃO --}}
<div x-show="temFiliacao === 'nao'" x-transition class="p-6 border border-gray-200 rounded-xl bg-gray-50 space-y-10"> {{-- Nome + CNPJ + Lei --}} <div class="grid grid-cols-1 md:grid-cols-3 gap-6"> <div class="space-y-1.5"> <label class="text-sm font-medium text-gray-700">Nome do Conselho</label> <input type="text" name="nome_conselho" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-[var(--blaze-orange)]"> </div> <div class="space-y-1.5"> <label class="text-sm font-medium text-gray-700">CNPJ</label> <input type="text" name="cnpj_conselho" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-[var(--blaze-orange)]"> </div> <div class="space-y-1.5"> <label class="text-sm font-medium text-gray-700">Lei de Criação</label> <input type="text" name="lei_criacao" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-[var(--blaze-orange)]"> </div> </div> {{-- Arquivo da lei --}} <div class="space-y-1.5"> <label class="text-sm font-medium text-gray-700">Lei de Criação (Arquivo)</label> <input type="file" name="lei_criacao_file" class="block w-full px-4 py-2 bg-white border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[var(--downy)] file:text-white file:font-medium hover:file:bg-[var(--green-haze)] transition-all"> </div> {{-- Último decreto --}} <div class="space-y-1.5"> <label class="text-sm font-medium text-gray-700">Último Decreto de Nomeação</label> <input type="text" name="ultimo_decreto" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg"> </div> {{-- Datas --}} <div class="grid grid-cols-1 md:grid-cols-3 gap-6"> <div class="space-y-1.5"> <label class="text-sm font-medium">Data do Regimento</label> <input type="date" name="data_regimento" class="w-full px-4 py-2.5 border-gray-300 rounded-lg"> </div> <div class="space-y-1.5"> <label class="text-sm font-medium">Início do Mandato</label> <input type="date" name="inicio_mandato" class="w-full px-4 py-2.5 border-gray-300 rounded-lg"> </div> <div class="space-y-1.5"> <label class="text-sm font-medium">Fim do Mandato</label> <input type="date" name="fim_mandato" class="w-full px-4 py-2.5 border-gray-300 rounded-lg"> </div> </div> {{-- Possui Câmara --}} <div class="space-y-2"> <label class="text-sm font-medium text-gray-700">Possui Câmara?</label> <div class="flex gap-6"> <label class="flex items-center gap-2"> <input type="radio" name="possui_camara" value="1" class="accent-[var(--blaze-orange)]"> Sim </label> <label class="flex items-center gap-2"> <input type="radio" name="possui_camara" value="0" class="accent-[var(--blaze-orange)]"> Não </label> </div> </div> {{-- Número de membros --}} <div class="space-y-1.5"> <label class="text-sm font-medium text-gray-700"> Número de Membros do Conselho </label> <input type="number" name="numero_membros" class="w-full px-4 py-2.5 border-gray-300 rounded-lg"> </div> {{-- Presidente --}} <div class="space-y-3"> <h4 class="font-semibold text-gray-800">Presidente</h4> <div class="grid grid-cols-1 md:grid-cols-3 gap-4"> <input type="text" name="presidente_nome" placeholder="Nome" class="px-4 py-2.5 border-gray-300 rounded-lg"> <input type="text" name="presidente_cel" placeholder="Celular" class="px-4 py-2.5 border-gray-300 rounded-lg"> <input type="email" name="presidente_email" placeholder="Email" class="px-4 py-2.5 border-gray-300 rounded-lg"> </div> </div> {{-- Vice-presidente --}} <div class="space-y-3"> <h4 class="font-semibold text-gray-800">Vice-Presidente</h4> <div class="grid grid-cols-1 md:grid-cols-3 gap-4"> <input type="text" name="vice_nome" placeholder="Nome" class="px-4 py-2.5 border-gray-300 rounded-lg"> <input type="text" name="vice_cel" placeholder="Celular" class="px-4 py-2.5 border-gray-300 rounded-lg"> <input type="email" name="vice_email" placeholder="Email" class="px-4 py-2.5 border-gray-300 rounded-lg"> </div> </div> {{-- Secretário Executivo --}} <div class="space-y-3"> <h4 class="font-semibold text-gray-800">Secretário Executivo</h4> <div class="grid grid-cols-1 md:grid-cols-3 gap-4"> <input type="text" name="sec_nome" placeholder="Nome" class="px-4 py-2.5 border-gray-300 rounded-lg"> <input type="text" name="sec_cel" placeholder="Celular" class="px-4 py-2.5 border-gray-300 rounded-lg"> <input type="email" name="sec_email" placeholder="Email" class="px-4 py-2.5 border-gray-300 rounded-lg"> </div> </div> {{-- SME --}} <div class="space-y-2"> <label class="text-sm font-medium text-gray-700"> Possui Sistema de Ensino (SME)? </label> <div class="flex gap-6"> <label class="flex items-center gap-2"> <input type="radio" name="possui_sme" value="1" class="accent-[var(--blaze-orange)]"> Sim </label> <label class="flex items-center gap-2"> <input type="radio" name="possui_sme" value="0" class="accent-[var(--blaze-orange)]"> Não </label> </div> </div> {{-- SME - dados --}} <div class="grid grid-cols-1 md:grid-cols-2 gap-6"> <div class="space-y-1.5"> <label class="text-sm font-medium">Número da Lei do SME</label> <input type="text" name="lei_sme" class="w-full px-4 py-2.5 border-gray-300 rounded-lg"> </div> <div class="space-y-1.5"> <label class="text-sm font-medium">Lei SME (Arquivo)</label> <input type="file" name="lei_sme_file" class="block w-full px-4 py-2 bg-white border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[var(--downy)] file:text-white file:font-medium hover:file:bg-[var(--green-haze)] transition-all"> </div> <div class="space-y-1.5"> <label class="text-sm font-medium">Endereço do SME</label> <input type="text" name="endereco_sme" class="w-full px-4 py-2.5 border-gray-300 rounded-lg"> </div> <div class="space-y-1.5"> <label class="text-sm font-medium">Telefone do SME</label> <input type="text" name="telefone_sme" class="w-full px-4 py-2.5 border-gray-300 rounded-lg"> </div> </div> {{-- Data de filiação --}} <div class="space-y-1.5 max-w-sm"> <label class="text-sm font-medium">Data de Filiação</label> <input type="date" name="data_filiacao" class="w-full px-4 py-2.5 border-gray-300 rounded-lg"> </div> </div>

            </section>



            {{-- BOTÃO --}}
            <div class="pt-6">
                <button type="submit"
                    class="px-6 py-3 rounded-lg text-white font-medium hover:shadow-md transition-all"
                    style="background: linear-gradient(135deg, var(--green-haze), var(--downy));">
                    Salvar Usuário
                </button>
            </div>

        </form>
    </div>

</x-app-layout>
