@extends('layouts.app')

@php($rankingTitle = [
    'coins' => __('Top Credits'),
    'pixels' => __('Top Duckets'),
    'diamonds' => __('Top Diamonds'),
    'points' => __('Top Points'),
    'online-time' => __('Top Online Time'),
    'respects' => __('Top Respects')
])

@php($rankingDescription = [
    'coins' => __('The richest users in coins'),
    'pixels' => __('Os usuários mais ricos em duckets'),
    'diamonds' => __('Os usuários mais ricos em diamantes'),
    'points' => __('Os usuários mais ricos em pontos'),
    'online-time' => __('Users who play the most'),
    'respects' => __('The richest users in respects')
])

@section('content')
<x-container class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 grid-rows-2 gap-6">
    @foreach ($rankings as $title => $rankingUnity)
        @include('pages.community.rankings._partials.ranking-box', [
            'icon' => $title,
            'title' => $rankingTitle[$title],
            'description' => $rankingDescription[$title],
            'rankings' => $rankingUnity,
            'isUserModel' => $title == 'coins'
        ])
    @endforeach
</x-container>
@endsection
