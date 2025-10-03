// Production JavaScript - Fonctionnalités essentielles

document.addEventListener('DOMContentLoaded', function() {
    console.log('Production JS loaded');
    
    // Form validation enhancement
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('is-invalid');
                    isValid = false;
                } else {
                    field.classList.remove('is-invalid');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                showAlert('Veuillez remplir tous les champs obligatoires', 'danger');
            }
        });
    });
    
    // Button click handlers
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            // Add loading state
            if (this.type === 'submit') {
                this.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Chargement...';
                this.disabled = true;
            }
        });
    });
    
    // Table row hover effects
    const tableRows = document.querySelectorAll('.table tbody tr');
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.backgroundColor = '#f8f9fa';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.backgroundColor = '';
        });
    });
    
    // Card hover effects
    const cards = document.querySelectorAll('.card, .dashboard-card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
            this.style.boxShadow = '0 10px 25px rgba(0, 0, 0, 0.1)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 4px 6px rgba(0, 0, 0, 0.05)';
        });
    });
    
    // Auto-hide alerts
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.opacity = '0';
            alert.style.transition = 'opacity 0.5s ease';
            setTimeout(() => {
                alert.remove();
            }, 500);
        }, 5000);
    });
    
    // Stats counter animation
    const statsCards = document.querySelectorAll('.stats-card h3');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    });
    
    statsCards.forEach(card => {
        observer.observe(card);
    });
});

// Utility functions
function showAlert(message, type = 'info') {
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
    alertDiv.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    const container = document.querySelector('.container-fluid, .container');
    if (container) {
        container.insertBefore(alertDiv, container.firstChild);
    }
}

function animateCounter(element) {
    const target = parseInt(element.textContent.replace(/[^\d]/g, ''));
    if (isNaN(target)) return;
    
    const duration = 2000;
    const step = target / (duration / 16);
    let current = 0;
    
    const timer = setInterval(() => {
        current += step;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        
        if (target >= 1000000) {
            element.textContent = (current / 1000000).toFixed(1) + 'M';
        } else if (target >= 1000) {
            element.textContent = (current / 1000).toFixed(0) + 'K';
        } else {
            element.textContent = Math.floor(current);
        }
    }, 16);
}

// AJAX link handler
document.addEventListener('click', function(e) {
    const link = e.target.closest('.ajax-link');
    if (link) {
        e.preventDefault();
        const url = link.getAttribute('href');
        
        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(html => {
                const parser = new DOMParser();
                const newDocument = parser.parseFromString(html, 'text/html');
                const newContent = newDocument.querySelector('#main-content');
                const mainContent = document.querySelector('#main-content');
                
                if (newContent && mainContent) {
                    mainContent.innerHTML = newContent.innerHTML;
                    history.pushState(null, '', url);
                } else {
                    window.location.href = url;
                }
            })
            .catch(err => {
                console.error('Erreur de chargement :', err);
                window.location.href = url;
            });
    }
});

// Ensure all buttons are clickable
document.addEventListener('click', function(e) {
    const button = e.target.closest('.btn');
    if (button && !button.disabled) {
        button.style.pointerEvents = 'auto';
        button.style.cursor = 'pointer';
    }
});

console.log('Production JavaScript loaded successfully');
