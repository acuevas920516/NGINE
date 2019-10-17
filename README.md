En el archivo index.php primeramente se define la ruta por default que va a cargar el iframe preview.<br>
Luego se captura cualquier peticion por post que tenga como parametro "ch", esta funcion va a interactuar
con la clase remote.php (simulacion de control remoto).<br>
Por medio de captura de eventos onClick sobre los botones Video, Image y API, se muestran los contenidos
especificados, agregandole un timer para que a los 30s, vuelva a aparecer el preview.<br>
El evento onClick del enlace API consume utilizando curl de php la ruta especificada,
y maneja las respuestas de acuerdo al tipo de fichero que obtenga.<br>
En el caso de los ficheros de texto, no han sido manejados puesto que en ningun momento fueron obtenidos.<br>
En el fichero remote.php se gestiona por medio de un formulario los canales
que escoja el usuario. Dicho formulario inserta el parametro ch con captura de eventos
javascript, y los envia al fichero index.php para que este maneje la peticion.<br>
Se realizo la captura de eventos de teclado para todo el documento, permitiendo
que al presionar el numero del canal, se ejecute la peticion de forma automatica.
