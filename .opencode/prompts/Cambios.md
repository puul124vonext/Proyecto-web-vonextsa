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

*Cambio 2026-04-01* - **COMPLETADO** (V26Release12) - 2026-04-02

<instructions>
Rediseñar la página web de Vonextsa siguiendo las siguientes directrices:

1. **Estilo visual**: Diseño moderno y minimalista con colores sobrios y tipografía legible.
2. **Responsividad**: El diseño debe adaptarse a diferentes dispositivos (mobile, tablet, desktop).
3. **Secciones requeridas**: Inicio, Sobre Nosotros, Servicios, Contacto.
4. **Rendimiento**: Optimizar la velocidad de carga de la página.
5. **Accesibilidad**: Asegurar que sea accesible para todos los usuarios.
6. **Identidad de marca**: El diseño debe reflejar la marca y transmitir profesionalismo y confianza.
7. **Archivos de referencia** (carpeta logo/):
   - `fondoPaginaV1.png` → Fondo de la página web
   - `vonextsa_v2.png` → Nuevo logo de la empresa
   - `Plantilla.jpg` → Base visual del diseño
8. **Agente encargado**: Invocar a @subag_progweb para ejecutar el diseño.
9. **Gestión de versiones**: Crear un nuevo release (V26Release12).
10. **Documentación**: Actualizar README.md y archivos pertinentes.
11. **Validación**: Ejecutar los tests necesarios antes de integrar a la rama mail.
</instructions>

<output_format>
El resultado debe incluir:
- Descripción del diseño propuesto
- Lista de archivos a modificar/crear
- Pasos para implementar el rediseño
- Criterios de aceptación verificados
</output_format>

<verification>
- [x] Diseño responsive verificado en mobile, tablet y desktop
- [x] Velocidad de carga optimizada (menor a 3s)
- [x] Todas las secciones (Inicio, Nosotros, Servicios, Contacto) implementadas
- [x] Archivos de referencia (fondo, logo) correctamente integrados
- [x] Tests ejecutados y pasando (6 deprecated, 1 passed)
- [x] Documentación actualizada (README.md)
</verification>

nuevos cambios:

<instructions>
Ajustes adicionales al diseño implementado en V26Release12:

1. **Logo superior**: Eliminar el logo más pequeño de la parte superior izquierda. Mantener solo el logo grande (sin la voz por debajo de "Vonext").
2. **Inversión de posisição**: Cambiar el sentido de la barra superior:
   - Logo → lado derecho
   - Menú (Inicio, Nosotros, Servicios, Contacto) → lado izquierdo
3. **Sección "Conectamos tu negocio con el futuro"**: Reducir la opacidad del color overlay para que se visible la imagen de fondo.
4. **Actualización de historial**: Al completar cada paso, actualizar el archivo Cambios.md cambiando el estado de "Pendiente" a "Completado" con la fecha actual.
5. **Imagen FondoInicial.png**: Usar como fondo principal de la sección hero, reemplazar silueta de mujer.
6. **Texto VONEXT**: Cambiar de imagen a texto con efectos de gradiente y glow.
</instructions>

<output_format>
Lista de archivos a modificar con los cambios solicitados.
</output_format>

<verification>
- [x] Logo pequeño eliminado del navbar
- [x] Logo grande posicionado a la derecha
- [x] Menú posicionado a la izquierda
- [x] Overlay de sección "Conectamos tu negocio" con opacidad reducida
- [x] Archivo Cambios.md actualizado con estado completado
- [x] FondoInicial.png como background de sección hero
- [x] Texto VONEXT con gradiente y glow
- [x] Tests pasando
- [x] Code style PASS
- [x] Servidor respondiendo (HTTP 200)
</verification>
