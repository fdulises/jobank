# Plugin para implementar Bolsa de trabajo WP
El plugin define tres custom types, custom type para Ofertas laborales, custom type para Respuestas a la Oferta, custom type para Curriculum y por ultimo un custom type para insertar datos de empresa.

## Instalación
1. Subir el Plugin a la carpeta wp-content/plugins
2. Crear las paginas con los siguientes Slugs: 
    - jobankpost => Listado de ofertas
    - jobankpost-create => Formulario para crear propuestas
    - jobankcv => Formulario para insertar datos del curriculum
    - jobankprofile => Insertar datos de empresa

## Modo de Uso
Desde la sección sitio/jobankpost-create se accede al formulario para publicar propuestas de trabajo.
En la sección sitio/jobankpost se pueden ver las propuestas publicadas

El enlace de la propuesta cambia según se tengan configurados los enlaces permanentes de la instalación de Wordpress.
Para publicar una respuesta del usuario en dicha propuesta, solo hace falta un botón que lleve a: sitio/url-propuesta?createrequest

Desde la sección sitio/jobankcv se accede al formulario para ingresar datos del CV (Max. uno por usuario)
Desde la sección sitio/jobankprofile se accede al formulario para ingresar los datos de la empresa (Max. uno por usuario)

Desde el backoffice se puede también gestionar el contenido del plugin, pero la información de cada entidad aparece en formato JSON, por lo que no esta construido para la libre administración por parte de usuarios no preparados en el tema.