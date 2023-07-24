<div class="w-full mt-12 p-2 border-t-2 border-gray-200 shadow dark:border-slate-800 bg-white dark:bg-slate-950" x-data="footer">
    <x-ui.buttons.default
        class="bottom-3 right-3 z-10 bg-blue-400 border-blue-600 hover:bg-blue-300 text-white"
        x-bind:class="{ '!hidden': !showScrollButton, '!fixed': showScrollButton }"
        @click="scrollToTop"
    >
        <i class="fa-solid fa-chevron-up"></i>
    </x-ui.buttons.default>

    <x-container class="flex justify-center gap-1 items-center text-sm flex-col">
        <span class="dark:text-gray-200">
            {!! __('© iHabbi 2023 - Este servidor utiliza a :a. Todos os direitos reservados.', [
                    'a' => <<<HTML
                        <a
                            data-tippy
                            target="_blank"
                            href="https://github.com/nicollassilva/orioncms"
                            data-tippy-content='OrionCMS'
                            class="underline underline-offset-4 text-blue-400"
                        >
                            OrionCMS
                        </a>
                    HTML
                ])
            !!}</span>
        <span class="font-semibold dark:text-white">{{ __('This website is a not-for-profit educational project.') }}</span>
    </x-container>
</div>

@include('components.select-language-modal')
