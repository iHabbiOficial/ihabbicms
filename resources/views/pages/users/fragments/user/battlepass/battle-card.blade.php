{{-- Card --}}
<div id="card" class="rounded-md p-2 border border-gray-300 dark:border-slate-800 bg-white dark:bg-slate-950 text-center w-auto hidden">
    <div>
        <div style="text-align: -webkit-center;">
            <img src="" alt="rewardImage">
        </div>

        <div>
            <span class="text-gray-400 text-sm font-semibold reward-details">Recompensa: </span>
            <span class="text-gray-500 text-xs">????</span>
        </div>

        <div>
            <span class="text-gray-400 text-sm font-semibold reward-details">Quantidade: </span>
            <span class="text-gray-500 text-xs">????</span>
        </div>

        <div>
            <span class="text-gray-400 text-sm font-semibold reward-details">Tempo necessário: </span>
            <span class="text-gray-500 text-xs">????</span>
        </div>

        <p class="text-xs font-semibold mt-2 px-2 py-1 text-red-500">
            Tem certeza que deseja resgatar esta recompensa?
        </p>

        <div class="flex mt-3 justify-center">
            <form action="{{ route('battlepass.confirm') }}" method="POST">
                @csrf
                <input type="hidden" name="battle_pass_id" id="battle_pass_id_input">
                <button type="submit" id="confirm_button" data-turbolinks="false" class="text-xs dark:bg-blue-500 bg-blue-500 border-blue-700 hover:bg-blue-400 dark:hover:bg-blue-400 dark:shadow-blue-700/75 shadow-blue-600/75 py-2 text-white mr-2 cursor-pointer transition-colors w-auto p-2 px-4 relative gap-2 justify-center items-center font-semibold flex rounded border-b-4">
                    {{ __('Confirmar') }}
                </button>
            </form>

            <x-ui.buttons.redirectable data-turbolinks="false" class="text-xs dark:bg-gray-500 bg-gray-500 border-gray-700 hover:bg-gray-400 dark:hover:bg-gray-400 dark:shadow-gray-700/75 shadow-gray-600/75 py-2 text-white">
                {{ __('Cancelar') }}
            </x-ui.buttons.redirectable>
        </div>
    </div>
</div>