@foreach ($battleInfos as $info)
    @php
        // Mapear os menus para classes CSS correspondentes
        $menuClass = [
            'inicio' => 'justify-center text-center mt-3',
            'funcionamento' => 'mt-3 p-2',
            'historico' => 'mt-3',
        ];
        // Mapear os menus para ícones correspondentes
        $menuIcon = [
            'inicio' => 'UOkkX1K.png',
            'funcionamento' => 'trvgcOR.png',
            'historico' => 'lxl7kUN.png',
        ];
    @endphp

    {{-- Exibir somente se a seção corresponder ao menu atual --}}
    @if ($info->menu == 'inicio' || $info->menu == 'funcionamento' || $info->menu == 'historico')
        <div id="{{ $info->menu }}-info" class="{{ $menuClass[$info->menu] }}" style="{{ $info->menu == 'funcionamento' || $info->menu == 'historico' ? 'display: none;' : '' }}">
            <div class="flex items-center mb-2 justify-center text-center">
                <img src="https://i.imgur.com/{{ $menuIcon[$info->menu] }}" alt="" class="mr-{{ $info->menu == 'inicio' ? '1' : '2' }}">
                <p class="text-gray-500 text-sm dark:text-white font-semibold">{{ $info->title }}</p>
            </div>
        
            {{-- Adicionar informações adicionais específicas para a seção de Histórico --}}
            @if ($info->menu == 'historico')
                <p class="text-gray-400 text-xs text-center mb-3">      
                    Na página "Histórico", você terá acesso a uma visão completa do seu progresso no <a class="text-blue-500 hover:text-blue-600 cursor-pointer hover:underline" onclick="showContent('inicio')">Passe de Batalha</a> ao longo do tempo. Veja o que você pode encontrar nessa página:
                </p>
                <p class="text-gray-400 text-xs mb-3 text-center">
                    <span class="font-semibold">Passes Concluídos:</span> 0
                </p>
                <p class="text-gray-400 text-xs mb-3 text-center">
                    <span class="font-semibold">Passes Não Conluídos:</span> 0
                </p>
                <p class="text-gray-400 text-xs mb-3 text-center">
                    <span class="font-semibold">Total de Passes:</span> 0
                </p>
            @endif
        
            {!! $info->description !!}
        </div>
    @endif
@endforeach