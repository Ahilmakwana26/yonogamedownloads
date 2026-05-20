document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobileMenu');
    const scrollTopBtn = document.getElementById('scrollTop');
    
    if (hamburger && mobileMenu) {
        hamburger.addEventListener('click', function() {
            mobileMenu.classList.toggle('active');
        });
    }
    
    if (scrollTopBtn) {
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                scrollTopBtn.style.display = 'block';
            } else {
                scrollTopBtn.style.display = 'none';
            }
        });
        
        scrollTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
    
    const toggleBtns = document.querySelectorAll('.toggle-btn');
    const filterBtns = document.querySelectorAll('.filter-btn');
    
    toggleBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            toggleBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            loadGames(this.dataset.type);
        });
    });
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            loadGamesByCategory(this.dataset.category);
        });
    });
});

function loadGames(type) {
    const container = document.getElementById('gamesContainer');
    if (!container) return;
    
    container.innerHTML = '<div style="text-align:center;padding:40px;">Loading...</div>';
    
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'ajax/load_games.php?type=' + type, true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            container.innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}

function loadGamesByCategory(category) {
    const container = document.getElementById('gamesContainer');
    if (!container) return;
    
    container.innerHTML = '<div style="text-align:center;padding:40px;">Loading...</div>';
    
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'ajax/load_games.php?category=' + encodeURIComponent(category), true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            container.innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}