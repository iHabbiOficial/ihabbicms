<div id="register-modal"
class="fixed z-10 w-full h-screen bg-translucent top-0 flex justify-center items-center hidden">
<div class="relative w-[464px] h-max rounded-[5px] p-[42px] bg-primary flex flex-col gap-[20px] items-center">

    <button class="absolute right-[20px] top-[20px] w-[22px] h-[22px] rounded-[5px] bg-secondary flex justify-center items-center" onclick="closeRegister()">
        <img src="assets/imagesnewindex/icons/xmark.svg" alt="Ícone do botão de fechar">
    </button>

    <h6 class="text-[18px] font-bold text-white">Criar conta</h6>

    <div x-data="authentication">
        <form method="POST" id="register-form" @submit.prevent="onFormRegisterSubmit">
            <template x-if="!! registerReferrerData.username">
                <div class="flex-1 mt-2 bg-green-500 border-b-4 border-green-600 p-2 text-white text-sm">
                    {{ __('You are being invited by') }} <span class="font-semibold" x-text="registerReferrerData.username"></span>
                </div>
            </template>

            <div class="mt-4 flex flex-col">
                <div class="relative w-full h-[50px] overflow-hidden">
                    <img src="assets/imagesnewindex/icons/login.svg" alt="Ícone do campo de usuário" class="absolute left-[16px] top-1/2 transform translate-y-[-50%]">
                    <x-ui.input autocomplete="username" id="register-username" icon="fa-solid fa-user" alpine-model="registerData.username" placeholder="{{ __('Seu usuário') }}" type="text" />
                </div>
            </div>

            <div class="mt-4 flex flex-col">
                <div class="relative w-full h-[50px] overflow-hidden">
                    <img src="assets/imagesnewindex/icons/email.svg" alt="Ícone do campo de email" class="absolute left-[16px] top-1/2 transform translate-y-[-50%]">
                    <x-ui.input autocomplete="email" id="register-email" icon="fa-solid fa-envelope" alpine-model="registerData.email" placeholder="{{ __('Seu email') }}" type="email" />
                </div>
            </div>
            
            <div class="mt-4 flex flex-col">
                <div class="relative w-full h-[50px] overflow-hidden">
                    <img src="assets/imagesnewindex/icons/password.svg" alt="Ícone do campo de email" class="absolute left-[16px] top-1/2 transform translate-y-[-50%]">
                    <x-ui.input autocomplete="password" id="register-password" icon="fa-solid fa-key" alpine-model="registerData.password" placeholder="{{ __('Sua senha') }}" type="password" />
                </div>
            </div>

            <div class="mt-4 flex flex-col">
                <div class="relative w-full h-[50px] overflow-hidden">
                    <img src="assets/imagesnewindex/icons/password.svg" alt="Ícone do campo de email" class="absolute left-[16px] top-1/2 transform translate-y-[-50%]">
                    <x-ui.input autocomplete="password" id="register-password-confirmation" icon="fa-solid fa-key" alpine-model="registerData.password_confirmation" placeholder="{{ __('Repita sua senha') }}" @keyup.enter="onRegisterSubmit()" type="password" />
                </div>
            </div>

            <div class="flex-1 flex flex-col mt-4">
                <div class="flex gap-2 text-sm">
                    <div class="flex-1">
                        <x-ui.input-radio id="register-gender" title="{{ __('Male') }}" value="M" alpine-model="registerData.gender" selected-classes="peer-checked:!text-blue-400 peer-checked:border-blue-400" />
                    </div>
                    <div class="flex-1">
                        <x-ui.input-radio id="login-gender" title="{{ __('Female') }}" value="F" alpine-model="registerData.gender" selected-classes="peer-checked:!text-pink-400 peer-checked:border-pink-400" :render-input="false" />
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-4">
                @includeWhen(config('hotel.recaptcha.enabled'), 'components.ui.recaptcha')
            </div>

            <div class="flex gap-4 mt-6">
                <x-ui.buttons.loadable alpine-model="loading" type="submit" class="bg-secondary border-red-500 hover:bg-red-600 shadow-red-600/75 flex-1 py-3 text-white uppercase">
                    <i class="fa-solid fa-user-plus"></i>
                    {{ __('Criar conta') }}
                </x-ui.buttons.loadable>
            </div>
        </form>
    </div>
</div>
</div>