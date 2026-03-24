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
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                }
            });

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
            responseDiv.textContent = 'Error de conexión. Intente nuevamente.';
        } finally {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Enviar Mensaje';
        }
    });
});
