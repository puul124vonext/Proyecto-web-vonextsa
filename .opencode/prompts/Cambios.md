## GESTION DE CAMBIOS EN LA PAGINA WEB
**Archivo de requerimietno de cambios para la página web**

*Cambio 2026-03-25* - **COMPLETADO** (V26Release5)
---
- [x] Se carga la carperta imagenes dentro del proyecto, esta carpeta contine las imaganes y animaciones para la paginaweb.
- [x] Exite el archivo nosotros.gif a sert cambiado por nosotros.jpg de la página.
- [x] Dentro del panel azul de seccion id inicio colocar en fromato slide los archivo img paar q pasen en modo carrucel la visualizacion de datos.
- [x] Existen dos archivo de anmaciones logodowndr es una animaciona ser colocada en la parte inferir derecha de la pagina así como  tambien el archivo lohodowniz a ser colocado en la parte inferiror izquierada de la página.
- [x] Reraliza los cambois solicitados guardando las proporciones de la paágina es decir adecuando lo size de la ig y gif para conservar la proporcionaidad de la página actual.
- [x] Genera un archivo de requerimientos, en formato de pasos para subir el proycto al hosting de pruebas ultahost, tener en cuenta que se lo hará por ssh en el hosting exite php y mysql prespara las configraciones necesarias tambien el en hosting.

*Cambio 2026-03-26* - **COMPLETADO** (V26Release6)
- [x] Se requiere colocar la politica de seguridad que esta en el archivo logo/PoliticaSeguridad.txt, para colocar este texto podemos tomar como referencia la pagian https://atphonecenter.com politica de seguridad esta bajo el slide de imagenes y al presionar een politica de seguridad debe aparecer un poup up de donde este el texto de la politica.
- [x] REcueren que para cada cambio se debe crear una nueva version, luego hacer lso test de pruebas antes de subira a mail.
- [x] Actualizar toda la documentacion

*Cambio 2026-03-27* - **COMPLETADO** (V26Release9)
- [x] Agregar el procedimiento de crear .httpaccess con este contenido: 
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php [L]
</IfModule>

y colocarlo en la carpeta public
- [x] cambiar el logo de vonextsa.jpg a vonextsa_v1.pnp es una nueva imegn mejoraada en resolucion.
- [x] Realizar un cambio en la home page, el logo esta al lado izquierdo y las opciones inicio nosotrops, servicios,contacto al lado derecho se reuqieo cambiar el logo al lado dercho y las opciones al lado izquierdo.
- [x] Agregar en agentes.md la siguiente regla al inicio: Siempre ubicarse en el release mas reciente y por cda cambio preguntar si el cambio es en el release actual o crear un nuevo release.
- [x] Agregar regal en readme: Nunca hacer cambios en la rama main
- [x] Agregar en Agente.md: El archivo readme es el ubicado en proyecto-web-vonetxsa y siempre debe ser actualizado antes des hace el comint push m,erge y pull.
- [x] se deve reficicar que el Archivo readme este en la ultima version correspondiete a la versionq se realziao el cambio.
- [x] quita los gif inferiores del lado izquierdo y derecho de la pagina.
- [x] Mejora le rendimiento de la carga de la pagina tarna en desplegar el slide de las imagenes.

*Cambio 2026-03-27* - **COMPLETADO** (V26Release10)
- [x] Agregar líneas de contexto en agents.md con el flujo de trabajo de agentes (@document-writer, @subag_php, @subag_progweb, @subag_security, @subag_tester)