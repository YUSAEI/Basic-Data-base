<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Libreria";

// Crear conexión
$conn = new mysqli($servername, $username, $password);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Crear base de datos
$sql = "CREATE DATABASE IF NOT EXISTS Libreria";
if ($conn->query($sql) === TRUE) {
    echo "Base de datos creada con éxito.";
} else {
    echo "Error al crear la base de datos: " . $conn->error;
}

// Seleccionar la base de datos
$conn->select_db($dbname);

// Crear tabla Libros
$sql = "CREATE TABLE IF NOT EXISTS Libros (
    ID_Libro INT AUTO_INCREMENT PRIMARY KEY,
    Titulo VARCHAR(255) NOT NULL,
    Autor VARCHAR(255) NOT NULL,
    Genero VARCHAR(100),
    Anio_Publicacion INT
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabla 'Libros' creada con éxito.";
} else {
    echo "Error al crear la tabla 'Libros': " . $conn->error;
}

// Crear tabla Usuarios
$sql = "CREATE TABLE IF NOT EXISTS Usuarios (
    ID_Usuario INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(255) NOT NULL,
    Direccion TEXT,
    Correo VARCHAR(255) UNIQUE NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabla 'Usuarios' creada con éxito.";
} else {
    echo "Error al crear la tabla 'Usuarios': " . $conn->error;
}

// Crear tabla Préstamos
$sql = "CREATE TABLE IF NOT EXISTS Prestamos (
    ID_Prestamo INT AUTO_INCREMENT PRIMARY KEY,
    ID_Usuario INT NOT NULL,
    ID_Libro INT NOT NULL,
    Fecha_Prestamo DATE NOT NULL,
    Fecha_Devolucion DATE,
    FOREIGN KEY (ID_Usuario) REFERENCES Usuarios(ID_Usuario),
    FOREIGN KEY (ID_Libro) REFERENCES Libros(ID_Libro)
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabla 'Préstamos' creada con éxito.";
} else {
    echo "Error al crear la tabla 'Préstamos': " . $conn->error;
}

// Cerrar conexión
$conn->close();
?>