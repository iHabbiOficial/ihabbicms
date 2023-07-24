<x-title-box
    icon="user-activityrooms"
    title="{{ __('Quartos em Alta') }}"
    description="{{ __('Verifique os quartos mais populares do iHabbi') }}"
/>

<div @class([
    "flex gap-3 scroll-smooth scroll-x relative mt-4 p-2 overflow-x-auto rounded-lg shadow border-b-2 border-gray-300 dark:border-slate-800 bg-white dark:bg-slate-950",
    "pb-6" => $rooms->isNotEmpty()
])>
    @forelse ($rooms as $room)
        <div
            data-tippy
            data-tippy-content="<small>Dono: {{ $room->owner_name }}</small>"
            class="w-14 hover:bg-gray-100 dark:hover:bg-slate-700 h-14 relative shrink-0 rounded-md dark:bg-slate-800 border border-gray-300 dark:border-slate-700 p-0.5 cursor-pointer"
        >
            @php
                $imageUrl = '';
                if ($room->users >= 1 && $room->users <= 3) {
                    $imageUrl = 'https://www.habborator.org/archive/icons/medium/room_icon_2.gif';
                } elseif ($room->users >= 4 && $room->users <= 7) {
                    $imageUrl = 'https://www.habborator.org/archive/icons/medium/room_icon_3.gif';
                } elseif ($room->users >= 8 && $room->users <= 14) {
                    $imageUrl = 'https://www.habborator.org/archive/icons/medium/room_icon_3.gif';
                } elseif ($room->users >= 15 && $room->users <= 20) {
                    $imageUrl = 'https://www.habborator.org/archive/icons/medium/room_icon_4.gif';
                } else {
                    $imageUrl = 'https://www.habborator.org/archive/icons/medium/room_icon_5.gif';
                }
            @endphp

            <div class="w-full h-full rounded-md bg-center bg-no-repeat" style="background-image: url('{{ $imageUrl }}')"></div>
            <div class="absolute max-w-[100%] truncate text-xs -bottom-5 left-1/2 -translate-x-1/2 dark:text-slate-200">{{ $room->name }}</div>
        </div>
    @empty
        <div class="flex items-center justify-center gap-2 w-full">
            <i class="fa-solid fa-house text-gray-300 dark:text-slate-600"></i>
            <span class="text-gray-400 dark:text-slate-500 text-sm">{{ __('Não há quartos em alta no momento') }}</span>
        </div>
    @endforelse
</div>