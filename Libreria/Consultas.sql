// Obtener todos los libros prestados en un período específico

SELECT L.Titulo, L.Autor, P.Fecha_Prestamo, P.Fecha_Devolucion
FROM Prestamos P
JOIN Libros L ON P.ID_Libro = L.ID_Libro
WHERE P.Fecha_Prestamo BETWEEN '2024-01-01' AND '2024-01-31';

// Listar los usuarios con préstamos activos 

SELECT U.Nombre, U.Correo, L.Titulo, P.Fecha_Prestamo
FROM Prestamos P
JOIN Usuarios U ON P.ID_Usuario = U.ID_Usuario
JOIN Libros L ON P.ID_Libro = L.ID_Libro
WHERE P.Fecha_Devolucion > CURRENT_DATE;

// Buscar libros por autor o género

SELECT Titulo, Autor, Genero, Año_Publicacion
FROM Libros
WHERE Autor = 'Gabriel García Márquez' OR Genero = 'Realismo Mágico';
