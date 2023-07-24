<x-title-box
    icon="user-battlepass"
    title="{{ __('Chegue na frente') }}"
    description="{{ __('Obtenha diversos prêmios estando online') }}"
/>

<div class="gap-3 mt-4 p-2 overflow-x-auto rounded-lg shadow border-b-2 border-gray-300 dark:border-slate-800 bg-white dark:bg-slate-950 justify-center">

    @include('pages.users.fragments.user.battlepass.battle-menu')

    @include('pages.users.fragments.user.battlepass.battle-info')

    <div class="border border-gray-300 dark:border-gray-800 mt-3 mb-3"></div>

    <div class="flex items-center justify-center mt-3">
        <div class="text-center bg-gray-300 dark:bg-gray-800 p-1 inline-block rounded-md">
            <span class="text-sm text-black dark:text-white">Em construção</span>
        </div>
    </div>

    @include('pages.users.fragments.user.battlepass.battle-pass')

    <div class="border border-gray-300 dark:border-gray-800 mt-3 mb-3"></div>

    {{-- Loading Image --}}
    <div style="text-align: -webkit-center;">
        <img id="loadingImage" src="https://i.imgur.com/DuqiRBu.gif" alt="Carregando..." style="display: none;">
    </div>
    
    @include('pages.users.fragments.user.battlepass.battle-card')
    
    <!-- Barra de Progresso -->
    <div class="flex items-center mb-2 mt-3 justify-center">
        <img src="https://i.imgur.com/uNJz3Ac.png" alt="" class="mr-1">
        <p class="text-gray-400 text-sm">Barra de Progresso</p>
    </div>

    <div class="w-full h-4 bg-gray-300 dark:bg-gray-800 rounded-md relative">
        <!-- Adicione a classe 'progress-bar' à div que representa o preenchimento da barra de progresso e a classe 'bg-blue-500' para definir a cor de preenchimento -->
        <div class="progress-bar h-0 w-0 rounded-md bg-blue-500"></div>
        <div class="flex items-center justify-center h-full text-white font-bold absolute inset-0 text-xs">
            0%
        </div>
    </div>
</div>