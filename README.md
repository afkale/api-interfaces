# Funciones por defecto

_getElement: Recibe un json con los parametros a filtrar y este devolvera un único objeto, lo suyo es utilizar la clave primaria del mismo para obtener un dato especifico._

_getElements: Puede recibir un json con los datos por los que se quiere filtrar, en caso de que no reciba ningun dato mostrara todos los datos que coincidan, devolverá una lista de elementos._

_updateValues: Recibe un id y unos valores que sustituiran los anteriores._

_insertData: Recibe todos los datos de un objeto y los inserta en la base de datos._

# Roucon

_Para utilizar la aplicacion debes posicionarte en un terminal y ejecutar:_

```
./roucon.sh "name"
```

_La aplicacion esta diseñada para que los nombres coincidan con los nombres convencionales de una base de datos en ingles, es decir, si tu tabla en la base de datos se llama students el comando a introducir para que todos los datos sean conrrectos sera:_

```
./roucon student
```

_Podrás crear tantos archivos como quieras, el comando admite varios nombres separados entre ellos por espacios, también admite nombres compuestos separados por guiones bajos es decir:_

```
./roucon.sh "user" "student" "admin" "user_idiom"
```

_Por defecto todos los controllers se crearan con el id "id", dentro de cada uno de los controllers de los objetos encontraras el id por defecto y el nombre de la tabla por defecto._
