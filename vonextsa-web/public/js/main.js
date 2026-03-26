document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');
    const responseDiv = document.getElementById('formResponse');
    const submitBtn = document.getElementById('submitBtn');

    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        submitBtn.disabled = true;
        submitBtn.textContent = 'Enviando...';
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

            if (!response.ok) {
                const errorData = await response.json().catch(() => ({}));
                throw new Error(errorData.message || 'Error del servidor');
            }

            const data = await response.json();

            responseDiv.classList.remove('d-none');
            
            if (data.success) {
                responseDiv.className = 'mt-3 alert alert-success';
                responseDiv.textContent = data.message;
                form.reset();
            } else {
                responseDiv.className = 'mt-3 alert alert-danger';
                responseDiv.textContent = data.message || 'Error al enviar el mensaje';
            }
        } catch (error) {
            responseDiv.classList.remove('d-none');
            responseDiv.className = 'mt-3 alert alert-danger';
            responseDiv.textContent = 'Error de conexión: ' + error.message;
            console.error('Form error:', error);
        } finally {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Enviar Mensaje';
        }
    });
});
