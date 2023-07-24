<x-title-box
    icon="user-referrals"
    title="{{ __('My Referrals') }} ({{ $referredUsersCount }})"
    description="{{ __('Refer friends and earn great rewards') }}"
/>
<div class="flex flex-col gap-1 relative mt-4 p-4 overflow-x-auto rounded-lg shadow border-b-2 border-gray-300 dark:border-slate-800 bg-white dark:bg-slate-950">
    <x-ui.input
        type="text"
        icon="fa-regular fa-share-from-square"
        label="{{ __('Your Referral Link') }}"
        id="referral-link"
        :small="true"
        default-value="{{ route('register', ['referral' => \Auth::user()->referral_code]) }}"
        :disabled="true"
    />
    <span class="text-slate-400 text-xs mt-1">
        {{ __('Share the link above to receive great prizes when your friends register.') }}
    </span>
    <span class="text-slate-400 text-xs font-medium mt-1 border-l-2 border-blue-500 dark:border-blue-400 pl-2">
        {!! __('Você ainda precisa convidar :m para coletar a próxima recompensa.', ['m' => '<span class="text-blue-500 dark:text-blue-400">5 usuários</span>']) !!}
    </span>
    <div class="flex items-center justify-end gap-3 mt-2" x-data="{
        copyLink(event) {
            const buttonContent = event.target.innerHTML

            if(!navigator?.clipboard) {
                console.error('{{ __('[Referral Link] Clipboard API is not supported') }}')
                return
            }

            navigator.clipboard.writeText(document.getElementById('referral-link').value)
            event.target.innerHTML = '{{ __('Successful!') }}'

            setTimeout(() => event.target.innerHTML = buttonContent, 2000)
        }
    }">
        <div class="border-t border-gray-300 dark:border-slate-700 flex-auto"></div>
        <x-ui.buttons.default
            class="bg-blue-400 hover:bg-blue-500 text-white border-blue-600 rounded-lg"
            data-tippy
            @click.debounce.500ms="copyLink"
            data-tippy-content="<small>{{ __('Click to copy the link') }}</small>"
        >
            <i class="fa-solid fa-arrow-up-right-from-square mr-1"></i>
            {{ __('Copy Link') }}
        </x-ui.buttons.default>
        <x-ui.buttons.default
            class="bg-green-400 disabled:!bg-slate-400 disabled:!border-slate-600 disabled:!text-slate-300 disabled:cursor-not-allowed hover:bg-green-500 text-green-800 border-green-600 rounded-lg"
            :disabled="true"
        >
        <i class="fa-solid fa-gift mr-1"></i>
            {{ __('Redeem') }}
        </x-ui.buttons.default>
    </div>
</div>
