/**
 * VONEXT S.A - V26R12
 * JavaScript para el sitio web
 */

document.addEventListener('DOMContentLoaded', function() {
    // ============================================
    // Navbar scroll effect
    // ============================================
    const navbar = document.getElementById('mainNav');
    
    if (navbar) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    }

    // ============================================
    // Smooth scroll for navigation links
    // ============================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href !== '#inicio') {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    const navHeight = navbar ? navbar.offsetHeight : 80;
                    const targetPosition = target.offsetTop - navHeight;
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });

    // ============================================
    // Contact Form Handler
    // ============================================
    const form = document.getElementById('contactForm');
    const responseDiv = document.getElementById('formResponse');
    const submitBtn = document.getElementById('submitBtn');

    if (form) {
        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            // Show loading state
            submitBtn.disabled = true;
            const originalBtnContent = submitBtn.innerHTML;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Enviando...';
            responseDiv.classList.add('d-none');

            const formData = new FormData(form);

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                const data = await response.json();

                responseDiv.classList.remove('d-none');
                
                if (data.success) {
                    responseDiv.className = 'alert alert-success text-center';
                    responseDiv.innerHTML = `<i class="bi bi-check-circle-fill me-2"></i>${data.message}`;
                    form.reset();
                    
                    // Remove success message after 5 seconds
                    setTimeout(() => {
                        responseDiv.classList.add('d-none');
                    }, 5000);
                } else {
                    responseDiv.className = 'alert alert-danger text-center';
                    responseDiv.innerHTML = `<i class="bi bi-exclamation-circle-fill me-2"></i>${data.message || 'Error al enviar el mensaje'}`;
                }
            } catch (error) {
                responseDiv.classList.remove('d-none');
                responseDiv.className = 'alert alert-danger text-center';
                responseDiv.innerHTML = `<i class="bi bi-exclamation-triangle-fill me-2"></i>Error de conexión. Por favor intenta nuevamente.`;
                console.error('Form error:', error);
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnContent;
            }
        });
    }

    // ============================================
    // Lazy loading for images
    // ============================================
    if ('loading' in HTMLImageElement.prototype) {
        // Browser supports lazy loading
        document.querySelectorAll('img[loading="lazy"]').forEach(img => {
            img.src = img.dataset.src || img.src;
        });
    } else {
        // Fallback for older browsers
        const lazyImages = document.querySelectorAll('img[loading="lazy"]');
        lazyImages.forEach(img => {
            img.src = img.dataset.src || img.src;
        });
    }
});

/**
 * Function to handle navbar toggle accessibility
 */
function setupNavbarToggle() {
    const toggler = document.querySelector('.navbar-toggler');
    const navbar = document.querySelector('.navbar-collapse');
    
    if (toggler && navbar) {
        toggler.setAttribute('aria-expanded', 'false');
        navbar.setAttribute('aria-hidden', 'true');
        
        toggler.addEventListener('click', function() {
            const isExpanded = toggler.getAttribute('aria-expanded') === 'true';
            toggler.setAttribute('aria-expanded', !isExpanded);
            navbar.setAttribute('aria-hidden', isExpanded);
        });
    }
}

// Initialize accessibility features
document.addEventListener('DOMContentLoaded', setupNavbarToggle);