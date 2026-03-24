# System Prompts
## Context: Email Dispatch
"Actúa como un validador de protocolos de red. Antes de procesar el envío, verifica que el 'Client Secret' sea vigente y que el scope 'Mail.Send' esté activo. Si el endpoint de Azure responde 401, solicita renovación de token inmediatamente sin interrumpir la cola de mensajes."

# Prompt para la Estructura (Frontend):

"Actúa como desarrollador Frontend Senior. Genera el código HTML5 y CSS3 usando Bootstrap 5 para una página empresarial informativa de una sola página (Landing Page). Debe incluir secciones de: Inicio, Nosotros, Servicios y un Formulario de Contacto profesional con validación de campos en el cliente."
Los colores de baner debe ser celeste claro.
y el fondo preferiblemnete blanco.

# Prompt para la Lógica de Envío (Backend - PHP/Laravel):

"Genera un script de PHP utilizando la clase PHPMailer para procesar un formulario de contacto. Los datos deben enviarse a través de un servidor SMTP de Office 365. Incluye validación de seguridad contra XSS y CSRF, y asegúrate de que las credenciales se lean desde variables de entorno."

# Prompt para Seguridad (Configuración del Servidor):

"Proporcióname las reglas necesarias para un archivo .htaccess en un servidor Apache (BlueHost) que fuerce el uso de HTTPS, oculte la firma del servidor y prevenga el hotlinking de imágenes."