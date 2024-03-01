# code-challenge
Code challenge test

# Pasos para instalación

  - Seleccionar la rama master 
  - En caso de utilizar windows clonar el repositorio en la carpeta htdocs de la instalación XAMPP, en caso de ser una distribución linux, colocar el proyecto en la carpeta donde se alojen los proyectos.
  - En el gestor de base de datos de mysql, crear una base de datos llamada code_challenge
  - Ejecutar el script de code-challenge.sql mediante mysqldump (mysqldump -u[username] -p[password] code_challenge > code_challenge.sql) desde la carpeta donde se encuentra el script o en una interfaz grafica como DataGrip
  - En la carpeta de application/config dentro del archivo database.php, colocar las credenciales de acceso a la BD en las lineas 79 y 80
  - Ingresar a la url de http://localhost/code-challenge/ donde se mostrará la pantalla inicial.


