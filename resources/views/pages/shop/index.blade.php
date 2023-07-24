@extends('layouts.app')

@section('content')
    <x-container class="relative h-auto !px-0">
        <div class="flex flex-col-reverse lg:flex-row gap-8 lg:gap-0">
            <div class="w-full lg:w-2/3 h-auto flex flex-col lg:pr-8">
                <x-title-box icon="hc-shop" title="{{ __('VIP') }}" description="{{ __('Seja especial no iHabbi!') }}"/>

                <div class="flex gap-3 scroll-smooth scroll-x relative mt-4 p-2 overflow-x-auto rounded-lg shadow border-b-2 border-gray-300 dark:border-slate-800 bg-white dark:bg-slate-950">
                    <div class="w-full grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-2 bg-white dark:bg-slate-800 h-auto rounded-b-lg p-2">
                        <div class="w-full h-auto flex flex-col border-b-2 dark:border-slate-700 bg-gray-100 dark:bg-slate-900 rounded-lg">
                            <div class="w-full overflow-hidden bg-slate-200 dark:bg-slate-850 border-b dark:border-slate-700 relative flex items-center justify-start p-2 h-10 bg-center bg-no-repeat rounded-t-md">
                                <div class="w-full flex gap-2 justify-start items-center ml-1">
                                    <img src="https://www.habborator.org/archive/icons/mini/new_12.gif" alt="Imagem" />
                                    <span class="text-gray-500 dark:text-white font-bold truncate text-sm">VIP</span>
                                </div>

                                <div class="absolute -bottom-12 right-0 w-[64px] h-[110px] bg-center bg-no-repeat" style="background-image: url('https://1.bp.blogspot.com/-vnFwg0kndSY/X6d4ojSDrVI/AAAAAAABfBc/ctG4xGRU10sCHeMhLUNsnKt0ApC9VtCQwCPcBGAsYHg/s0/595__-3CQ.png')"></div>
                            </div>

                            <div class="w-full h-auto flex flex-col p-1 pl-2">
                                <div class="flex-1 flex gap-0.5 text-slate-800 dark:text-slate-200 min-h-[48px]">
                                    <div class="w-[50px] h-[50px] bg-white border dark:border-none rounded-lg dark:bg-slate-800 bg-center bg-no-repeat" style="background-image: url('https://images.ihabbi.city/c_images/album1584/VIPIH.gif')"></div>

                                    <div class="flex-row">
                                        <div>
                                            <span class="text-sm font-semibold ml-2">Plano VIP:</span>
                                            <span class="text-sm">R$00,00</span>
                                        </div>

                                        <div>
                                            <span class="text-sm font-semibold ml-2">Dias:</span>
                                            <span class="text-sm">30</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex justify-center">
                                    <x-ui.buttons.redirectable href="#" class="dark:bg-gray-500 bg-gray-500 border-gray-700 hover:bg-gray-400 dark:hover:bg-gray-400 dark:shadow-gray-700/75 shadow-gray-600/75 py-2 text-white mt-2 mr-2">
                                        {{ __('Benefícios') }}
                                    </x-ui.buttons.redirectable>

                                    <x-ui.buttons.redirectable href="#" class="dark:bg-orange-500 bg-orange-500 border-orange-700 hover:bg-orange-400 dark:hover:bg-orange-400 dark:shadow-orange-700/75 shadow-orange-600/75 py-2 text-white mt-2">
                                        {{ __('Adquirir') }}
                                    </x-ui.buttons.redirectable>
                                </div>
                            </div>
                        </div>

                        <div class="w-full h-auto flex flex-col border-b-2 dark:border-slate-700 bg-gray-100 dark:bg-slate-900 rounded-lg">
                            <div class="w-full overflow-hidden bg-slate-200 dark:bg-slate-850 border-b dark:border-slate-700 relative flex items-center justify-start p-2 h-10 bg-center bg-no-repeat rounded-t-md">
                                <div class="w-full flex gap-2 justify-start items-center ml-1">
                                    <img src="https://www.habborator.org/archive/icons/mini/new_11.gif" alt="Imagem" />
                                    <span class="text-gray-500 dark:text-white font-bold truncate text-sm">Prime</span>
                                </div>

                                <div class="absolute -bottom-12 right-0 w-[64px] h-[110px] bg-center bg-no-repeat" style="background-image: url('https://1.bp.blogspot.com/-8dDyr7u48D4/X6d4orAuVvI/AAAAAAABfBc/wgk67B9Fi_Yl2uRUFR3T6icj9-RWSiCWgCPcBGAsYHg/s0/203__-100.png')"></div>
                            </div>

                            <div class="w-full h-auto flex flex-col p-1 pl-2">
                                <div class="flex-1 flex gap-0.5 text-slate-800 dark:text-slate-200 min-h-[48px]">
                                    <div class="w-[50px] h-[50px] bg-white border dark:border-none rounded-lg dark:bg-slate-800 bg-center bg-no-repeat" style="background-image: url('https://images.ihabbi.city/c_images/album1584/PRIMEIH.gif')"></div>

                                    <div class="flex-row">
                                        <div>
                                            <span class="text-sm font-semibold ml-2">Plano Prime:</span>
                                            <span class="text-sm">R$00,00</span>
                                        </div>

                                        <div>
                                            <span class="text-sm font-semibold ml-2">Dias:</span>
                                            <span class="text-sm">30</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex justify-center">
                                    <x-ui.buttons.redirectable href="#" class="dark:bg-gray-500 bg-gray-500 border-gray-700 hover:bg-gray-400 dark:hover:bg-gray-400 dark:shadow-gray-700/75 shadow-gray-600/75 py-2 text-white mt-2 mr-2">
                                        {{ __('Benefícios') }}
                                    </x-ui.buttons.redirectable>

                                    <x-ui.buttons.redirectable href="#" class="dark:bg-orange-500 bg-orange-500 border-orange-700 hover:bg-orange-400 dark:hover:bg-orange-400 dark:shadow-orange-700/75 shadow-orange-600/75 py-2 text-white mt-2">
                                        {{ __('Adquirir') }}
                                    </x-ui.buttons.redirectable>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full h-auto lg:w-1/3 flex flex-col">
                <x-title-box icon="status-shop" title="{{ __('Status') }}" description="{{ __('Verifique seu status VIP') }}" style="margin-left: 15px;"/>
            
                <div class="flex flex-col gap-3 scroll-smooth scroll-x relative mt-4 p-2 overflow-x-auto rounded-lg shadow border-b-2 border-gray-300 dark:border-slate-800 bg-white dark:bg-slate-950 pb-6" style="padding: 15px;">

                    <div class="w-full h-auto flex flex-col border-b-2 dark:border-slate-700 bg-gray-100 dark:bg-slate-900 rounded-lg">
                        <div class="w-full overflow-hidden bg-slate-200 dark:bg-slate-850 border-b dark:border-slate-700 relative flex items-center justify-start p-2 h-10 bg-center bg-no-repeat rounded-t-md">
                            <div class="w-full flex gap-2 justify-start items-center ml-1">
                                <img src="https://1.bp.blogspot.com/-81JxygzdG68/X1k2eN88c5I/AAAAAAABeA0/39E7PHgcumQL7bFUwOwDG1JjOAf6SYVtwCPcBGAsYHg/s1600/Xis3.png" alt="Imagem" />
                                <span class="text-gray-500 dark:text-white font-bold truncate text-sm">Você NÃO é VIP</span>
                            </div>

                            <div class="absolute -bottom-12 right-0 w-[64px] h-[110px] bg-center bg-no-repeat" style="background-image: url('{{ \Auth::user()?->figure_path ?? '0' }}&direction=4&head_direction=3&size=m&gesture=sml')"></div>
                        </div>

                        <div class="w-full h-auto flex flex-col p-2">
                            <div class="flex justify-between">
                                <div class="flex-grow">
                                    <p class="text-sm text-gray-600 dark:text-gray-200">
                                        <span class="font-semibold">Tipo VIP:</span> N/A
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-200">
                                        <span class="font-semibold">Última compra:</span> 00-00-0000
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-200">
                                        <span class="font-semibold">Tempo restante:</span> N/A dias
                                    </p>
                                </div>
                                <div class="self-end">
                                    <img src="https://3.bp.blogspot.com/-tlBH4gCcVco/XK0oYlXGq3I/AAAAAAABOsg/jQa1fYqD_203xYbpGvPPxw6bnsNVfTT6gCKgBGAs/s1600/room_icon_password.gif" class="ml-4">
                                </div>
                            </div>
                            
                            <div>
                                <p class="text-xs text-gray-500 dark:text-gray-200 font-semibold text-center mt-3">Você <span class="text-red-800">NÃO é VIP atualmente</span>, mas fique tranquilo, basta escolher uma opção ao lado e se divertir com seus novos benefícios!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col-reverse lg:flex-row gap-8 lg:gap-0">
            <div class="w-full lg:w-2/3 h-auto flex flex-col lg:pr-8">
                <x-title-box icon="credits-shop" title="{{ __('Créditos') }}" description="{{ __('Que tal um pouco mais de grana?') }}" />
                
                
            </div>

            <div class="w-full h-auto lg:w-1/3 flex flex-col mt-3">
                <x-title-box icon="credits-shop" title="{{ __('Em breve') }}" description="{{ __('Que tal um pouco mais de em breve?') }}" style="margin-left: 15px;"/>
            
                
            </div>
        </div>
    </x-container>
@endsection
