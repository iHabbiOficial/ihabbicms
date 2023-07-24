function openRegister() {
    var modal = document.getElementById("register-modal");
    modal.style.display = "flex";
}

function closeRegister() {
    var modal = document.getElementById("register-modal");
    modal.style.display = "none";
}

document.addEventListener("click", function (event) {
    var modal = document.getElementById("register-modal");
    if (event.target === modal) {
      modal.style.display = "none";
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const prevBtn = document.querySelector('[data-direction="prev"]');
    const nextBtn = document.querySelector('[data-direction="next"]');
    const newsContainer = document.getElementById('newsContainer');
    const newsCards = newsContainer.querySelectorAll('.news-card');
    const cardWidth = newsCards[0].offsetWidth;
    const totalCards = newsCards.length;
    let currentIndex = 0;

    function updateButtons() {
        prevBtn.disabled = currentIndex === 0;
        nextBtn.disabled = currentIndex === totalCards - 2;

        // Adiciona ou remove a classe 'opacity-60' para ajustar a opacidade dos botões
        prevBtn.classList.toggle('opacity-60', currentIndex === 0);
        nextBtn.classList.toggle('opacity-60', currentIndex === totalCards - 2);
    }

    function showNewsCards() {
        const start = currentIndex;
        const end = Math.min(currentIndex + 2, totalCards);

        newsCards.forEach((card, index) => {
            card.classList.toggle('hidden', index < start || index >= end);
        });
    }

    prevBtn.addEventListener('click', function() {
        if (currentIndex > 0) {
            currentIndex--;
            showNewsCards();
            updateButtons();
        }
    });

    nextBtn.addEventListener('click', function() {
        if (currentIndex < totalCards - 2) {
            currentIndex++;
            showNewsCards();
            updateButtons();
        }
    });

    updateButtons();
});

// Envolve o código em uma função e chama a função imediatamente
(function () {
    const usernameInput = document.getElementById('login-username');
    const avatarImage = document.getElementById('avatar-image');

    const defaultAvatarUrl = 'https://i.imgur.com/Ii757pO.png';

    async function updateAvatarImage() {
        const username = usernameInput.value.trim(); // Remova espaços em branco no início e no fim

        if (username === '') {
            // Se o campo de usuário estiver vazio, use a imagem padrão
            avatarImage.src = defaultAvatarUrl;
            return;
        }

        try {
            const response = await fetch(`/api/user/${username}/look`);
            if (response.ok) {
                const data = await response.json();
                avatarImage.src = `https://imaging.ihabbi.city/imaging?figure=${encodeURIComponent(data)}&direction=4&head_direction=3&size=m&gesture=sml`;
            } else {
                // Usuário não encontrado, usar a imagem padrão
                avatarImage.src = defaultAvatarUrl;
            }
        } catch (error) {
            // Em caso de erro na requisição, usar a imagem padrão
            avatarImage.src = defaultAvatarUrl;
        }
    }

    // Chama a função para carregar a imagem ao iniciar a página
    updateAvatarImage();

    // Adiciona o evento 'input' no campo de usuário para atualizar a imagem ao digitar
    usernameInput.addEventListener('input', updateAvatarImage);
})();