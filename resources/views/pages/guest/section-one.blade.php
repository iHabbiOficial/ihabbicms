<section class="mt-[50px]">
    <div class="container mx-auto flex justify-between flex-wrap gap-[50px] px-6 sm:px-16">
        <div class="login flex flex-col gap-[15px] w-full md:w-max">
            <h6 class="text-[24px] font-extrabold text-white">Conecte-se</h6>
            <div x-data="authentication">
                <form id="login-form" method="POST" @submit.prevent="onFormLoginSubmit">
                    @csrf
                    <div class="mt-4 flex flex-col">
                        <div class="relative w-full h-[50px] overflow-hidden md:w-[380px]">
                            <img src="assets/imagesnewindex/icons/login.svg" alt="Ícone do campo de usuário"
                                class="absolute left-[16px] top-1/2 transform translate-y-[-50%]">
                    
                            <!-- Adicione o atributo id ao input para podermos identificá-lo -->
                            <x-ui.input autocomplete="username" id="login-username" icon="fa-solid fa-user" alpine-model="loginData.username"
                                placeholder="{{ __('Username') }}" type="text" />
                    
                            <!-- Adicione um elemento <img> com um id para exibir a imagem do avatar -->
                            <img id="avatar-image" src="" alt="Avatar do usuário" class="absolute right-[16px] top-[-30px]">
                        </div>
                    </div>
            
                    <div class="mt-4 flex flex-col">
                        <div class="relative w-full h-[50px] overflow-hidden md:w-[380px]">
                            <img src="assets/imagesnewindex/icons/password.svg" alt="Ícone do campo de senha"
                                class="absolute left-[16px] top-1/2 transform translate-y-[-50%]">
                            <x-ui.input autocomplete="password" id="login-password" icon="fa-solid fa-key" alpine-model="loginData.password" placeholder="{{ __('Password') }}" type="password" />
                        </div>
                    </div>
            
                    <div class="flex gap-4 mt-6">
                        <x-ui.buttons.default type="button" onclick="openRegister()" class="bg-quaternary border-gray-700 hover:bg-gray-600 shadow-gray-600/75 flex-1 py-3 text-white uppercase">
                            <i class="fa-solid fa-user-plus"></i>
                            {{ __('Criar conta') }}
                        </x-ui.buttons.default>
            
                        <x-ui.buttons.loadable type="submit" alpine-model="loading" class="bg-secondary border-red-500 hover:bg-red-600 shadow-red-600/75 flex-1 py-3 text-white uppercase">
                            <i class="fa-solid fa-right-to-bracket"></i>
                            {{ __('Entrar') }}
                        </x-ui.buttons.loadable>
                    </div>
                </form>
            </div>
        </div>

        <div class="max-w-full flex flex-col gap-[20px]">
            <div class="flex items-center justify-between">
                <h6 class="text-[16px] text-white font-semibold">Últimas notícias</h6>
                <div class="flex gap-[5px] items-center">
                    <button
                        class="w-[28px] h-[28px] rounded-[5px] bg-secondary flex justify-center items-center disabled:opacity-60"
                        disabled aria-label="Voltar" data-direction="prev">
                        <img src="assets/imagesnewindex/icons/arrow-left.svg" alt="Ícone do botão de voltar" class="icon">
                    </button>
                    <button class="w-[28px] h-[28px] rounded-[5px] bg-secondary flex justify-center items-center"
                        aria-label="Próxima" data-direction="next">
                        <img src="assets/imagesnewindex/icons/arrow-right.svg" alt="Ícone do botão de próxima" class="icon">
                    </button>
                </div>
            </div>
        
            <div class="max-w-full flex gap-[10px] overflow-x-auto" id="newsContainer">
                @foreach ($defaultArticles as $index => $defaultArticle)
                <a href="{{ route('articles.show', [$defaultArticle->id, $defaultArticle->slug]) }}">
                    <div class="w-[330px] h-[206px] bg-quaternary rounded-[5px] overflow-hidden flex-shrink-0 flex-grow-0 flex-basis-auto news-card {{ $index > 1 ? 'hidden' : '' }}">
                        <div class="w-full h-[161px] transition-transform transform-gpu hover:scale-110" style="background-image: url('{{ $defaultArticle->image }}'); background-size: cover;"></div>
                        <div class="w-full h-[45px] flex justify-center items-center text-[14px] text-white font-bold">
                            {{ $defaultArticle->title }}
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>

    </div>
</section>