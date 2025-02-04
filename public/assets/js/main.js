// Animation des statistiques
function animateNumber(element, target) {
    let current = 0;
    const increment = target / 50;
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        element.textContent = Math.round(current);
    }, 40);
}

// Récupérer le nombre d'animaux depuis l'API
fetch('/api/animals/count')
    .then(response => response.json())
    .then(data => {
        const animalCount = document.getElementById('animalCount');
        animateNumber(animalCount, data.count);
    })
    .catch(() => {
        // Valeur par défaut si l'API n'est pas disponible
        const animalCount = document.getElementById('animalCount');
        animateNumber(animalCount, 150);
    }); 