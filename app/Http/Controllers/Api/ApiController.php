<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\BattlePass;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function getOnlineCount(): JsonResponse
    {
        return response()->json([
            'onlineCount' => User::whereOnline('1')->count()
        ]);
    }

    public function getBBCodePreview(Request $request): JsonResponse
    {
        $data = $request->validate([
            'content' => 'required|string'
        ]);

        $content = strip_tags($data['content']);

        return response()->json([
            'success' => true,
            'content' => renderBBCodeText($content, true)
        ]);
    }

    public function getRewardById($id): JsonResponse
    {
        $reward = BattlePass::find($id);

        if (!$reward) {
            return response()->json(['error' => 'Recompensa não encontrada'], 404);
        }

        return response()->json($reward);
    }

    public function getLookByUsername($username): JsonResponse
    {
        $user = User::where('username', $username)->first();

        if (!$user) {
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }

        // Se o usuário for encontrado, retorne o look do usuário
        return response()->json($user->look);
    }
}
