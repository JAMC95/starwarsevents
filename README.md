StarWars Event
========================

Web App creada a partir de un curso de KNPUniversity, en este curso se desarrolla una web app con la que podremos crear, borrar y modificar eventos, designar eventos al usuario creado,
cada usuario podrá decidir si asiste o no al evento creado.
Un usuario no puede borrar ni editar eventos que no han sido creados por él
Un usuario puede darse de alta a través de ruta-de-la-web-app/register/

Para el diseño de la web se han utilizado tecnologías tales como CSS y librerías como Bootstrap haciendo un diseño atractivo en el twig

Se pueden ver que las rutas algunas son definidas en el archivo routing.yml y otras en el mismo Controller. Esto se ha hecho sabiendo que no es lo más óptimo (ya que queda más limpio ponerlo
en un mismo archivo/sitio) pero decidí hacerlo así para ver que hay dos tipos de formas, ambas aceptadas por la misma web de Symfony(a fecha de hoy)

¿Que bundles se utilizan?
--------------

  * **FrameworkBundle** - The core Symfony framework bundle

  * [**SensioFrameworkExtraBundle**][6] - Adds several enhancements, including
    template and routing annotation capability

  * [**DoctrineBundle**][7] - Adds support for the Doctrine ORM

  * [**TwigBundle**][8] - Adds support for the Twig templating engine

  * [**SecurityBundle**][9] - Adds security by integrating Symfony's security
    component

  * [**SwiftmailerBundle**][10] - Adds support for Swiftmailer, a library for
    sending emails

  * [**MonologBundle**][11] - Adds support for Monolog, a logging library

  * **WebProfilerBundle** (in dev/test env) - Adds profiling functionality and
    the web debug toolbar

  * **SensioDistributionBundle** (in dev/test env) - Adds functionality for
    configuring and working with Symfony distributions

  * [**SensioGeneratorBundle**][13] (in dev/test env) - Adds code generation
    capabilities

  * **DebugBundle** (in dev/test env) - Adds Debug and VarDumper component
    integration

All libraries and bundles included in the Symfony Standard Edition are
released under the MIT or BSD license.

Algunas imágenes de muestra de la aplicación en marcha:

 ![ScreenShot](/img/principal.png?raw=true "Pantalla Principal")
 ![ScreenShot](/img/login.png?raw=true "Pantalla Login")
 ![ScreenShot](/img/registrandose.png?raw=true "Pantalla Registro")
 ![ScreenShot](/img/verevento.png?raw=true "Viendo un evento")
 ![ScreenShot](/img/editandounevento.png?raw=true "Editando un evento")
 ![ScreenShot](/img/clickenasistir.png?raw=true "Clickeamos para asistir a un evento")
 ![ScreenShot](/img/botondenoasistencia.png?raw=true "Vemos el botón rojo para decir que no asistiremos")
 ![ScreenShot](/img/clickennoasistir.png?raw=true "Mensaje que nos saldrá si decidimos pulsar el botón de no asistir")




