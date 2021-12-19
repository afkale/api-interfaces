
## Funciones por defecto

###### getElements: Puede recibir un json con los datos por los que se quiere filtrar, en caso de que no reciba ningun dato mostrara todos los datos que coincidan, devolverá una lista de elementos.

###### getOneElement: Recibe un json con los parametros a filtrar y este devolvera un único objeto, lo suyo es utilizar la clave primaria del mismo para obtener un dato especifico.

###### updateValues: Recibe un id y unos valores que sustituiran los anteriores.

###### insertData: Recibe todos los datos de un objeto y los inserta en la base de datos.

# Roucon

###### Para utilizar la aplicacion debes posicionarte en un terminal y ejecutar rel comando _./roucon.sh "name"_.

###### La aplicacion esta diseñada para que los nombres coincidan con los nombres convencionales de una base de datos en ingles, es decir, si tu tabla en la base de datos se llama students al crear los ficheros con roucon deberás introducir _"./roucon student"_ para que se creen todos los metodos y nombres adecuados.

###### Una vez ejecutado este comando todos los objetos estarán preparados para ingresar cambiar y extraer datos.

###### Podrás crear tantos archivos como quiera, el comando admite varios nombres separados entre ellos por espacios, también admite nombres compuestos separados por guiones bajos es decir _./roucon.sh "user" "student" "admin" "user_idiom"_ lo cual creará soporte con la api para las tablas users, students, admins, users_idiom.

###### Por defecto todos los controllers se crearan con un id por defecto que sera "id", para cambiarlo, en cada uno de los controllers se encuentra un comentario en el que podrás cambiar el id por defecto para cada uno de ellos, esta operacion será necesrio cambiarla siempre que para esta tabla necesites utilizar el metodo de update.
