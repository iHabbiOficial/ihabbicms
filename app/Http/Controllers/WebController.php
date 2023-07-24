<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Camera;
use App\Models\Article;
use App\Models\BattlePass;
use App\Models\BattleInfo;
use Illuminate\View\View;
use Illuminate\Support\Facades\App;
use Illuminate\Http\RedirectResponse;

class WebController extends Controller
{
    private const FIXED_ARTICLES_LIST_COUNT_WHEN_AUTH = 5;

    private const ARTICLES_LIST_COUNT_WHEN_AUTH = 5;
    private const ARTICLES_LIST_COUNT_WHEN_GUEST = 8;

    public function index(): View
    {
        $isAuthenticated = \Auth::check();

        $defaultArticles = Article::forIndex(
            $this->getArticlesLimit('default', $isAuthenticated)
        )->get();

        // Aqui chamamos a função cleanupBattleLogs do BattlePassController
        $battlePassController = new BattlePassController();
        $battlePassController->cleanupBattleLogs();

        $compactValues = ['defaultArticles'];

        if ($isAuthenticated) {
            $onlineFriends = \Auth::user()->getOnlineFriends();
            $referredUsersCount = \Auth::user()->referredUsers()->count();

            $fixedArticles = Article::forIndex($this->getArticlesLimit('fixed', $isAuthenticated))
                ->whereFixed(true)
                ->get();

            $battleInfos = BattleInfo::orderBy('id', 'asc')->get();
            $battlePass = BattlePass::orderBy('id', 'asc')->get();

            $rooms = Room::where('users', '>', 0)
                ->orderBy('users', 'desc')
                ->limit(15)
                ->get();

            array_push($compactValues, 'onlineFriends', 'referredUsersCount', 'fixedArticles', 'rooms', 'battlePass', 'battleInfos');
        } else {
            $photos = Camera::latestWith()->limit(6)->get();
            $latestUsers = User::forIndex()->get();

            array_push($compactValues, 'photos', 'latestUsers');

            return view('new', compact($compactValues));
        }

        return view('index', compact($compactValues));
    }

    private function getArticlesLimit(string $type, bool $isAuthenticated): int
    {
        if($type == 'default') return match ($isAuthenticated) {
            true => self::ARTICLES_LIST_COUNT_WHEN_AUTH,
            false => self::ARTICLES_LIST_COUNT_WHEN_GUEST
        };

        if($type == 'fixed') {
            return self::FIXED_ARTICLES_LIST_COUNT_WHEN_AUTH;
        }

        return 0;
    }

    public function setLanguage(string $countryCode): RedirectResponse
    {
        if(array_key_exists($countryCode, config('hotel.cms.available_languages'))) {
            App::setLocale($countryCode);
            session()->put('locale', $countryCode);
        }

        return redirect()->back(302, [], route('index'));
    }

    public function maintenance(): View
    {
        return view('pages.maintenance');
    }
}
