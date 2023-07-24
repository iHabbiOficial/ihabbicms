{{-- Menu --}}
<div class="bg-slate-100 dark:bg-gray-900 p-1 rounded-md shadow-md shadow-right">
    <nav class="flex justify-center">
        <button class="menu-button text-gray-700 dark:text-gray-200 font-semibold px-4 py-2 border-b-2 border-blue-500" onclick="showContent('inicio')">Início</button>
        <button class="menu-button text-gray-700 dark:text-gray-200 font-semibold px-4 py-2" onclick="showContent('funcionamento')">Funcionamento</button>
        <button class="menu-button text-gray-700 dark:text-gray-200 font-semibold px-4 py-2" onclick="showContent('historico')">Histórico</button>
    </nav>
</div>

{{-- JavaScript Menu and Infos --}}
<script>
    // Esta função será chamada assim que a página carregar
    window.onload = function() {
        // Exibe o conteúdo 'inicio' por padrão
        showContent('inicio');
    }

    function showContent(menu) {
        // Oculta todos os conteúdos
        var contents = document.querySelectorAll('[id$="-info"]');
        for (var i = 0; i < contents.length; i++) {
            contents[i].style.display = 'none';
        }

        // Exibe o conteúdo correspondente ao menu clicado
        var contentToShow = document.getElementById(menu + '-info');
        contentToShow.style.display = 'block';

        // Remove a classe "border-blue-500" de todos os botões do menu
        var menuButtons = document.querySelectorAll('.menu-button');
        for (var i = 0; i < menuButtons.length; i++) {
            menuButtons[i].classList.remove('border-b-2', 'border-blue-500');
        }

        // Adiciona a classe "border-blue-500" ao botão do menu clicado
        var clickedButton = document.querySelector('[onclick="showContent(\'' + menu + '\')"]');
        clickedButton.classList.add('border-b-2', 'border-blue-500');
    }
</script>