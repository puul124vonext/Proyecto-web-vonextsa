---
Descripción: Revisar el código de la interfaz de usuario para verificar su conformidad con las directrices de la interfaz web de Vercel.
sugerencia de argumento: <archivo o patrón>
---

# Directrices para la interfaz web

Revise estos archivos para verificar su cumplimiento: $ARGUMENTOS

Lee los archivos y compruébalos según las reglas que se indican a continuación. Genera una salida concisa pero completa; la brevedad se ve comprometida por la gramática. Relación señal/ruido elevada.

## Normas

### Accesibilidad

- Los botones que solo contienen iconos necesitan `aria-label`.
- Los controles de formulario necesitan `<label>` o `aria-label`.
- Los elementos interactivos necesitan controladores de teclado (`onKeyDown`/`onKeyUp`)
- `<button>` para acciones, `<a>`/`<Link>` para navegación (no `<div onClick>`)
- Las imágenes necesitan `alt` (o `alt=""` si son decorativas)
- Los iconos decorativos necesitan `aria-hidden="true"`
- Las actualizaciones asíncronas (notificaciones, validación) necesitan `aria-live="polite"`
- Utilice HTML semántico (`<button>`, `<a>`, `<label>`, `<table>`) antes de ARIA.
- Encabezados jerárquicos `<h1>`–`<h6>`; incluir enlace para saltar al contenido principal
- `scroll-margin-top` en los anclajes de encabezado

### Estados de enfoque

- Los elementos interactivos necesitan foco visible: `focus-visible:ring-*` o equivalente.
- Nunca `outline-none` / `outline: none` sin reemplazo de foco
- Utilice `:focus-visible` en lugar de `:focus` (para evitar que aparezca el anillo de enfoque al hacer clic).
- Enfoque de grupo con `:focus-within` para controles compuestos

### Formularios

- Los campos de entrada necesitan `autocompletar` y un `nombre` significativo.
- Utilice el `type` (`email`, `tel`, `url`, `number`) y el `inputmode` correctos.
- Nunca bloquear el pegado (`onPaste` + `preventDefault`)
- Etiquetas clicables (`htmlFor` o control contenedor)
- Desactivar la corrección ortográfica en correos electrónicos, códigos y nombres de usuario (`spellCheck={false}`)
- Casillas de verificación/botones de radio: etiqueta + control comparten un único objetivo de pulsación (sin zonas muertas)
- El botón de envío permanece habilitado hasta que comienza la solicitud; indicador de carga durante la solicitud
- Los errores se muestran en línea junto a los campos; al enviar el mensaje, se enfoca el primer error.
- Los marcadores de posición terminan con `…` y muestran un patrón de ejemplo.
- `autocomplete="off"` en campos que no sean de autenticación para evitar que se activen los gestores de contraseñas.
- Advertir antes de navegar con cambios no guardados (`beforeunload` o router guard)

### Animación

- Respetar `prefers-reduced-motion` (proporcionar variante reducida o deshabilitar)
- Animar solo `transform`/`opacity` (apto para compositores)
- Nunca `transition: all`: lista las propiedades explícitamente
- Establecer el `transform-origin` correcto.
- SVG: transforma en el contenedor `<g>` con `transform-box: fill-box; transform-origin: center`
- Las animaciones se pueden interrumpir: responden a la entrada del usuario durante la animación.

### Tipografía

- `…` no `...`
- Citas rizadas `"` `"` no rectas `"`
- Espacios de no separación: `10 MB`, `⌘ K`, nombres de marcas
- Los estados de carga terminan con `…`: `"Cargando…"`, `"Guardando…"`
- `font-variant-numeric: tabular-nums` para columnas/comparaciones numéricas
- Utilice `text-wrap: balance` o `text-pretty` en los encabezados (evita que queden líneas sueltas al final de la página).

### Manejo de contenido

- Los contenedores de texto manejan contenido largo: `truncate`, `line-clamp-*` o `break-words`.
- Los elementos Flex necesitan `min-w-0` para permitir el truncamiento del texto.
- Gestionar estados vacíos: no mostrar una interfaz de usuario defectuosa para cadenas/matrices vacías.
- Contenido generado por el usuario: prevea entradas cortas, medianas y muy largas.

### Imágenes

- `<img>` necesita `width` y `height` explícitos (evita CLS)
- Imágenes que no se pueden mostrar al desplazarse: `loading="lazy"`
- Imágenes críticas en la parte superior de la página: `priority` o `fetchpriority="high"`

### Actuación

- Listas grandes (>50 elementos): virtualizar (`virtua`, `content-visibility: auto`)
- No se realizan lecturas de diseño en render (`getBoundingClientRect`, `offsetHeight`, `offsetWidth`, `scrollTop`)
- Lecturas/escrituras del DOM por lotes; evitar el entrelazado.
- Prefiero las entradas no controladas; las entradas controladas deben ser económicas por pulsación de tecla.
- Añadir `<link rel="preconnect">` para dominios CDN/de activos
- Fuentes críticas: `<link rel="preload" as="font">` con `font-display: swap`

### Navegación y estado

- La URL refleja el estado: filtros, pestañas, paginación, paneles expandidos en los parámetros de consulta.
- Los enlaces utilizan `<a>`/`<Link>` (compatibilidad con Cmd/Ctrl+clic y clic central).
- Vincular profundamente todas las interfaces de usuario con estado (si utiliza `useState`, considere la sincronización de URL a través de nuqs o similar).
- Las acciones destructivas requieren confirmación mediante una ventana modal o de deshacer; nunca de forma inmediata.

### Tacto e interacción

- `touch-action: manipulation` (evita el retraso al hacer zoom con doble toque)
- `-webkit-tap-highlight-color` establecido intencionalmente
- `overscroll-behavior: contain` en modales/cajones/hojas
- Durante el arrastre: deshabilitar la selección de texto, `inert` en los elementos arrastrados
- Usar `autoFocus` con moderación: solo en ordenadores de escritorio, con una única entrada principal; evitar en dispositivos móviles.

### Zonas seguras y distribución

- Los diseños de sangrado completo necesitan `env(safe-area-inset-*)` para las muescas
- Evita las barras de desplazamiento no deseadas: `overflow-x-hidden` en los contenedores, corrige el desbordamiento de contenido
- Flex/cuadrícula sobre medición JS para el diseño

### Modo oscuro y tema

- `color-scheme: dark` en `<html>` para temas oscuros (soluciona problemas de barra de desplazamiento y campos de entrada)
- `<meta name="theme-color">` coincide con el fondo de la página
- Nativo `<select>`: `background-color` y `color` explícitos (modo oscuro de Windows)

### Localización e i18n

- Fechas/horas: utilice `Intl.DateTimeFormat`, no formatos codificados.
- Números/moneda: utilice `Intl.NumberFormat`, no formatos codificados.
- Detectar el idioma a través de `Accept-Language` / `navigator.languages`, no mediante IP.

### Seguridad en la hidratación

- Las entradas con `value` necesitan `onChange` (o usar `defaultValue` para las no controladas).
- Visualización de fecha/hora: evita desajustes de hidratación (servidor vs. cliente).
- Suprimir advertencia de hidratación solo cuando sea realmente necesario

### Estados interactivos y de desplazamiento

- Los botones/enlaces necesitan un estado `hover:` (retroalimentación visual).
- Los estados interactivos aumentan el contraste: los estados de desplazamiento/activo/enfoque son más prominentes que los de reposo.

### Contenido y textos

- Voz activa: "Instalar la CLI" no "La CLI se instalará"
- Mayúsculas en los encabezados/botones (estilo Chicago)
- Números para los recuentos: "8 despliegues", no "ocho".
- Etiquetas específicas de los botones: "Guardar clave API", no "Continuar".
- Los mensajes de error incluyen la solución/el siguiente paso, no solo el problema.
- Segunda persona; evitar la primera persona
- `&` sobre "and" donde el espacio es limitado

### Antipatrones (marque estos)

- `user-scalable=no` o `maximum-scale=1` desactivan el zoom.
- `onPaste` con `preventDefault`
- `transición: todo`
- `outline-none` sin reemplazo de focus-visible
- Navegación `onClick` en línea sin `<a>`
- `<div>` o `<span>` con manejadores de clics (debería ser `<button>`)
- Imágenes sin dimensiones
- Grandes matrices `.map()` sin virtualización
- Campos de formulario sin etiquetas
- Botones de iconos sin `aria-label`
- Formatos de fecha/número codificados (usar `Intl.*`)
- `autoFocus` sin justificación clara

## Formato de salida

Agrupar por archivo. Usar el formato `archivo:línea` (en VS Code se puede hacer clic). Conclusiones concisas.

```text
## src/Button.tsx

src/Button.tsx:42 - falta la etiqueta aria en el botón del icono
src/Button.tsx:18 - El campo de entrada no tiene etiqueta
src/Button.tsx:55 - falta la animación prefers-reduced-motion
src/Button.tsx:67 - transición: todas → propiedades de lista

## src/Modal.tsx

src/Modal.tsx:12 - falta comportamiento de desplazamiento excesivo: contiene
src/Modal.tsx:34 - "..." → "…"

## src/Card.tsx

✓ pasar
```

Indicar el problema y su ubicación. Omitir la explicación a menos que la solución no sea obvia. Sin preámbulo.