{{-- Passe de Batalha --}}
<div class="flex gap-3 mt-4 p-2 overflow-x-auto rounded-lg justify-center">
    <div class="cursor-pointer">
        <img src="https://i.imgur.com/IQCMcjC.gif" alt="Inicio" onclick="toggleCard('inicio')">
    </div>

    @php
        $totalPrizes = count($battlePass);
        $redeemedStatus = [];
    @endphp
    
    @foreach($battlePass as $key => $prize)
        @php
            // Verifica se o usuário está autenticado
            $isAuthenticated = auth()->check();
            
            // Verifica se a recompensa foi resgatada pelo usuário (se estiver autenticado)
            $redeemed = $isAuthenticated ? $prize->battleLogs->contains('user_id', auth()->user()->id) : false;
            $redeemedStatus[] = $redeemed;
        @endphp
        @if($key < $totalPrizes)
            <div>
                <img src="{{ $redeemed ? 'https://i.imgur.com/v5ZfB8d.png' : 'https://i.imgur.com/qSwMiTY.png' }}" alt="Seta pra Direta">
            </div>
        @endif
    
        <div class="cursor-pointer">
            <img src="{{ $redeemed ? 'https://i.imgur.com/B3CWS8y.png' : $prize->image_icon }}" alt="Premio" onclick="toggleCard({{ $prize->id }})">
        </div>
    @endforeach
</div>