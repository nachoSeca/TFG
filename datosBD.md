INSERT INTO users (name, email, email_verified_at, password, role_id, created_at, updated_at)
VALUES
    ('Usuario1', 'usuario1@example.com', NOW(), 'password1', 1, NOW(), NOW()),
    ('Usuario2', 'usuario2@example.com', NOW(), 'password2', 1, NOW(), NOW()),
    ('Usuario3', 'usuario3@example.com', NOW(), 'password3', 2, NOW(), NOW()),
    ('Usuario4', 'usuario4@example.com', NOW(), 'password4', 2, NOW(), NOW()),
    ('Usuario5', 'usuario5@example.com', NOW(), 'password5', 2, NOW(), NOW()),
    ('Usuario6', 'usuario6@example.com', NOW(), 'password6', 2, NOW(), NOW()),
    ('Usuario7', 'usuario7@example.com', NOW(), 'password7', 3, NOW(), NOW()),
    ('Usuario8', 'usuario8@example.com', NOW(), 'password8', 3, NOW(), NOW()),
    ('Usuario9', 'usuario9@example.com', NOW(), 'password9', 3, NOW(), NOW()),
    ('Usuario10', 'usuario10@example.com', NOW(), 'password10', 3, NOW(), NOW()),
    ('Usuario11', 'usuario11@example.com', NOW(), 'password11', 3, NOW(), NOW()),
    ('Usuario12', 'usuario12@example.com', NOW(), 'password12', 3, NOW(), NOW()),
    ('Usuario13', 'usuario13@example.com', NOW(), 'password13', 3, NOW(), NOW()),
    ('Usuario14', 'usuario14@example.com', NOW(), 'password14', 3, NOW(), NOW()),
    ('Usuario15', 'usuario15@example.com', NOW(), 'password15', 3, NOW(), NOW()),
    ('Usuario16', 'usuario16@example.com', NOW(), 'password16', 3, NOW(), NOW()),
    ('Usuario17', 'usuario17@example.com', NOW(), 'password17', 3, NOW(), NOW()),
    ('Usuario18', 'usuario18@example.com', NOW(), 'password18', 3, NOW(), NOW()),
    ('Usuario19', 'usuario19@example.com', NOW(), 'password19', 3, NOW(), NOW()),
    ('Usuario20', 'usuario20@example.com', NOW(), 'password20', 3, NOW(), NOW());


INSERT INTO companies (nombre, direccion, codigo_postal, municipio, localidad, provincia, web, nombre_contacto, apellido_contacto, email_contacto, telefono_fijo, telefono_movil, fecha_ultimo_contacto, plazas_disponibles, observaciones, course_id, created_at, updated_at)
VALUES
    ('Grupo Santander', 'Paseo Pereda, 9', '39004', 'Santander', 'Cantabria', 'Cantabria', 'https://www.bancosantander.es/', 'Juan', 'Pérez', 'juan.perez@santander.es', '942123456', '654789123', '2023-12-15', 5, 'Buen trato, instalaciones modernas', 1, NOW(), NOW()),
    ('Inditex', 'Avda. de la Diputación, s/n', '15143', 'Arteixo', 'A Coruña', 'Galicia', 'https://www.inditex.com/', 'María', 'López', 'maria.lopez@inditex.com', '981234567', '678456123', '2023-11-20', 10, 'Empresa líder en moda', 2, NOW(), NOW()),
    ('Telefónica', 'Gran Vía, 28', '28013', 'Madrid', 'Madrid', 'Madrid', 'https://www.telefonica.com/', 'Pedro', 'García', 'pedro.garcia@telefonica.com', '914567890', '657321456', '2023-10-25', 8, 'Empresa multinacional de telecomunicaciones', 3, NOW(), NOW()),
    ('Mercadona', 'C/ Valencia, 5', '46005', 'Valencia', 'Valencia', 'Valencia', 'https://www.mercadona.es/', 'Ana', 'Martínez', 'ana.martinez@mercadona.es', '963456789', '654987321', '2023-09-30', 6, 'Cadena de supermercados líder en España', 1, NOW(), NOW()),
    ('El Corte Inglés', 'Plaza del Callao, 2', '28013', 'Madrid', 'Madrid', 'Madrid', 'https://www.elcorteingles.es/', 'José', 'Fernández', 'jose.fernandez@elcorteingles.es', '915678901', '678912345', '2023-08-25', 12, 'Gran superficie comercial en España', 2, NOW(), NOW()),
    ('BBVA', 'Paseo de la Castellana, 81', '28046', 'Madrid', 'Madrid', 'Madrid', 'https://www.bbva.es/', 'Laura', 'González', 'laura.gonzalez@bbva.es', '912345678', '654321987', '2023-07-20', 9, 'Entidad bancaria internacional', 3, NOW(), NOW()),
    ('Iberdrola', 'Plaza Euskadi, 5', '48009', 'Bilbao', 'Vizcaya', 'País Vasco', 'https://www.iberdrola.com/', 'Miguel', 'Díaz', 'miguel.diaz@iberdrola.com', '944567890', '678543219', '2023-06-15', 7, 'Empresa líder en energías renovables', 1, NOW(), NOW()),
    ('Repsol', 'Paseo de la Castellana, 278', '28046', 'Madrid', 'Madrid', 'Madrid', 'https://www.repsol.com/', 'Carmen', 'Martín', 'carmen.martin@repsol.com', '911234567', '654123789', '2023-05-10', 11, 'Compañía energética global', 2, NOW(), NOW()),
    ('Seat', 'Autovía A2, Km 585', '08760', 'Martorell', 'Barcelona', 'Barcelona', 'https://www.seat.es/', 'David', 'Gómez', 'david.gomez@seat.es', '937890123', '678987654', '2023-04-05', 10, 'Fabricante de automóviles español', 3, NOW(), NOW()),
    ('Mapfre', 'Carretera de Pozuelo, 52', '28222', 'Majadahonda', 'Madrid', 'Madrid', 'https://www.mapfre.com/', 'Elena', 'Ruiz', 'elena.ruiz@mapfre.com', '917890123', '654987321', '2023-03-01', 8, 'Grupo asegurador multinacional', 1, NOW(), NOW()),
    ('Vodafone', 'Avenida de América, 115', '28042', 'Madrid', 'Madrid', 'Madrid', 'https://www.vodafone.es/', 'Javier', 'Hernández', 'javier.hernandez@vodafone.com', '914567890', '678456321', '2023-02-22', 6, 'Compañía de telecomunicaciones líder', 2, NOW(), NOW()),
    ('Banco Sabadell', 'Plaça de Catalunya, 19', '08002', 'Barcelona', 'Barcelona', 'Barcelona', 'https://www.bancsabadell.com/', 'Cristina', 'López', 'cristina.lopez@bancsabadell.com', '932345678', '654123789', '2023-01-15', 9, 'Entidad financiera española', 3, NOW(), NOW());


INSERT INTO tutors (nombre, apellidos, email, telefono_movil, user_id, created_at, updated_at)
VALUES
    ('Manuel', 'González Pérez', 'manuel.gonzalez@example.com', '654789123', 7, NOW(), NOW()),
    ('Laura', 'Martínez Rodríguez', 'laura.martinez@example.com', '678456123', 8, NOW(), NOW()),
    ('Pedro', 'Sánchez López', 'pedro.sanchez@example.com', '657321456', 9, NOW(), NOW()),
    ('María', 'Díaz García', 'maria.diaz@example.com', '654987321', 10, NOW(), NOW()),
    ('Ana', 'Sánchez Pérez', 'ana.sanchez@example.com', '678912345', 11, NOW(), NOW()),
    ('Juan', 'Martínez García', 'juan.martinez@example.com', '678543219', 12, NOW(), NOW()),
    ('Elena', 'Gómez Rodríguez', 'elena.gomez@example.com', '657890123', 13, NOW(), NOW()),
    ('David', 'Fernández López', 'david.fernandez@example.com', '654321987', 14, NOW(), NOW()),
    ('Cristina', 'López García', 'cristina.lopez@example.com', '678987654', 15, NOW(), NOW()),
    ('Javier', 'Hernández Martínez', 'javier.hernandez@example.com', '678456321', 16, NOW(), NOW()),
    ('Carmen', 'Sánchez Martínez', 'carmen.sanchez@example.com', '678912345', 17, NOW(), NOW()),
    ('Miguel', 'Martínez Gómez', 'miguel.martinez@example.com', '657890123', 18, NOW(), NOW()),
    ('María', 'Gómez Rodríguez', 'maria.gomez@example.com', '654987321', 19, NOW(), NOW()),
    ('Pablo', 'Fernández López', 'pablo.fernandez@example.com', '678543219', 20, NOW(), NOW());


INSERT INTO students (nombre, apellidos, email, telefono_movil, nota_media, subir_cv, fecha_inicio_fct, fecha_fin_fct, direccion_practicas, user_id, tutor_id, company_id, course_id, created_at, updated_at)
VALUES
    ('Ana', 'García López', 'ana.garcia@example.com', '654123789', 7.5, 'cv_ana.pdf', '2024-09-01', '2025-02-28', 'Calle Principal, 123', 7, 1, 1, 1, NOW(), NOW()),
    ('Carlos', 'Martínez Ruiz', 'carlos.martinez@example.com', '678456123', 6.8, 'cv_carlos.pdf', '2024-09-15', '2025-03-15', 'Avenida Central, 456', 8, 2, 2, 1, NOW(), NOW()),
    ('Elena', 'Sánchez González', 'elena.sanchez@example.com', '654987321', 7.2, 'cv_elena.pdf', '2024-10-01', '2025-03-31', 'Plaza Mayor, 789', 9, 3, 3, 2, NOW(), NOW()),
    ('David', 'López Martínez', 'david.lopez@example.com', '678912345', 6.5, 'cv_david.pdf', '2024-10-15', '2025-04-15', 'Calle Real, 101', 10, 4, 4, 2, NOW(), NOW()),
    ('María', 'González Sánchez', 'maria.gonzalez@example.com', '657890123', 7.8, 'cv_maria.pdf', '2024-11-01', '2025-05-31', 'Paseo Central, 234', 11, 5, 5, 1, NOW(), NOW()),
    ('Juan', 'Rodríguez García', 'juan.rodriguez@example.com', '654321987', 7.3, 'cv_juan.pdf', '2024-11-15', '2025-06-15', 'Avenida del Sol, 345', 12, 6, 6, 2, NOW(), NOW()),
    ('Laura', 'Martínez Sánchez', 'laura.martinez@example.com', '678987654', 6.9, 'cv_laura.pdf', '2024-12-01', '2025-07-31', 'Calle Mayor, 567', 13, 7, 7, 1, NOW(), NOW()),
    ('Pablo', 'García Rodríguez', 'pablo.garcia@example.com', '657890123', 7.1, 'cv_pablo.pdf', '2024-12-15', '2025-08-15', 'Plaza España, 678', 14, 8, 8, 2, NOW(), NOW()),
    ('Carmen', 'López Sánchez', 'carmen.lopez@example.com', '654987321', 7.7, 'cv_carmen.pdf', '2025-01-01', '2025-09-30', 'Calle Nueva, 890', 15, 9, 9, 1, NOW(), NOW()),
    ('Javier', 'Sánchez Martínez', 'javier.sanchez@example.com', '678456321', 6.6, 'cv_javier.pdf', '2025-01-15', '2025-10-15', 'Avenida del Parque, 111', 16, 10, 10, 2, NOW(), NOW()),
    ('Sara', 'Martínez López', 'sara.martinez@example.com', '678912345', 7.9, 'cv_sara.pdf', '2025-02-01', '2025-11-30', 'Calle del Carmen, 222', 17, 11, 11, 1, NOW(), NOW()),
    ('Alejandro', 'González Rodríguez', 'alejandro.gonzalez@example.com', '657890123', 7.4, 'cv_alejandro.pdf', '2025-02-15', '2025-12-15', 'Paseo de la Libertad, 333', 18, 12, 12, 2, NOW(), NOW())
