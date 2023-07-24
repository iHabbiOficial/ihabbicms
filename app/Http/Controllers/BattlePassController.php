<?php

namespace App\Http\Controllers;

use App\Models\BattleLog;
use App\Models\BattlePass;
use App\Models\BattleTotal;
use Illuminate\Http\Request;
use App\Models\BattleHistory;

class BattlePassController extends Controller
{
    public function confirmReward(Request $request)
    {
        $battlePassId = $request->input('battle_pass_id');
        $userId = auth()->user()->id;
    
        // Verifique se já existe um registro na tabela battle_logs com o mesmo battle_id e user_id
        $existingLog = BattleLog::where('battle_id', $battlePassId)->where('user_id', $userId)->first();
    
        // Verifique se o registro existe e se o resgate está no mesmo mês do created_at do registro existente
        if ($existingLog && now()->format('Y-m') === $existingLog->created_at->format('Y-m')) {
            // Redirecione de volta à página anterior
            return back();
        }
    
        // Recupere os detalhes do prêmio com base no $battlePassId
        $prize = BattlePass::findOrFail($battlePassId);
    
        // Salve os detalhes do resgate do prêmio na tabela battle_logs
        BattleLog::create([
            'battle_id' => $prize->id,
            'user_id' => $userId,
            'reward_type' => $prize->type,
            'reward_amount' => $prize->quantity,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Redirecionar para a página desejada após o resgate do prêmio.
        return redirect()->route('index')->with('success', 'Você resgatou o prêmio do dia!');
    }

    public function getUserRewards(Request $request)
    {
        $userId = auth()->user()->id;
    
        // Buscar os prêmios resgatados pelo usuário autenticado no mesmo mês do created_at
        $rewards = BattleLog::where('user_id', $userId)
            ->whereMonth('created_at', now()->month)
            ->get();
    
        // Retornar os prêmios resgatados como resposta em formato JSON
        return response()->json($rewards);
    }

    public function cleanupBattleLogs()
    {
        // Verificar se hoje é dia 25 antes de prosseguir
        if (now()->format('d') !== '25') {
            return; // Se não for dia 25, não fazemos nada
        }
    
        // Verificar se já existe um registro na tabela BattleTotal com o mês e ano atual
        $battleDataExists = BattleTotal::where('battle_date', now()->format('Y-m'))->exists();
    
        if (!$battleDataExists) {
            // Faz uma consulta na tabela battle_logs para encontrar usuários que completaram e não completaram os 8 prêmios
            $completedUsers = BattleLog::select('user_id')
                ->selectRaw('(SELECT COUNT(DISTINCT battle_id) FROM battle_logs WHERE user_id AND battle_id BETWEEN 1 AND 8) as total_completed')
                ->groupBy('user_id')
                ->having('total_completed', '=', 8)
                ->get();
    
            $incompleteUsers = BattleLog::select('user_id')
                ->selectRaw('(SELECT COUNT(DISTINCT battle_id) FROM battle_logs WHERE user_id AND battle_id BETWEEN 1 AND 8) as total_completed')
                ->groupBy('user_id')
                ->having('total_completed', '<', 8)
                ->get();
    
            // Salvar os registros na tabela battle_history
            foreach ($completedUsers as $user) {
                BattleHistory::create([
                    'user_id' => $user->user_id,
                    'battle_date' => now()->format('Y-m'),
                    'complete' => 'yes',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
    
            foreach ($incompleteUsers as $user) {
                BattleHistory::create([
                    'user_id' => $user->user_id,
                    'battle_date' => now()->format('Y-m'),
                    'complete' => 'no',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
    
            // Salvar o registro na tabela BattleTotal para indicar o início do novo passe de batalha
            BattleTotal::create([
                'battle_date' => now()->format('Y-m'), // Mesmo formato usado na consulta do battle_logs (ano-mês)
                'total_users' => count($completedUsers) + count($incompleteUsers),
                'total_winners' => count($completedUsers),
            ]);
    
            // Limpar a tabela battle_logs
            BattleLog::truncate();
        }
    }
}
