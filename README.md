# Api

_En el fichero database login se encuentran las credenciales para entrar a la base de datos:_

```
define("HOSTNAME", "localhost");
define("DATABASE", "database");
define("USERNAME", "root");
define("PASSWORD", "");
```

## Funciones por defecto

_getElement: Recibe un json con los parámetros a filtrar y este devolvera un único objeto, lo suyo es utilizar la clave primaria del mismo para obtener un dato especifico._

_getElements: Puede recibir un json con los datos por los que se quiere filtrar, en caso de que no reciba ningún dato mostrará todos los datos que coincidan, devolverá una lista de elementos._

_updateValues: Recibe un id y unos valores que sustituirán los anteriores._

_insertData: Recibe todos los datos de un objeto y los inserta en la base de datos._

_removeData: Recibe todos los datos de un objeto y elimina todos los que coincidan con estos._

## Funciones adicionales

_Para introducir otras funciones adicionales, si son generales deberán ingresarse en el *main controller*, en caso de que sean especificas de algún objeto deberá ingresarse en el controller de dicho objeto._

# Roucon

_Roucon es un generador de controllers y routes, el cual creara los objetos necesarios y los añadirá en las rutas del index._

_Para utilizar la aplicación debes posicionarte en un terminal y ejecutar:_

```
./roucon name
```

_La aplicacián esta diseñada para que los nombres coincidan con los nombres convencionales de una base de datos en ingles, es decir, si tu tabla en la base de datos se llama students el comando a introducir para que todos los datos sean correctos será:_

```
./roucon student
```

_Podrás crear tantos archivos como quieras, el comando admite varios nombres separados entre ellos por espacios, también admite nombres compuestos separados por guiones bajos es decir:_

```
./roucon user student admin user_idiom
```

_Si el nombre de una tabla es compuesto, debería asignarsele un nombre con la primera palabra en plural y la segunda en singular: sutudies_student, ya que en este caso la tabla haría referencia a una tabla que contiene todos los estudios que tiene cada uno de los estudiantes._

_Por defecto todos los controllers se crearan con el id "id", dentro de cada uno de los controllers de los objetos encontraras el id por defecto y el nombre de la tabla por defecto._
