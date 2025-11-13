# Pagina RG Foliares

**RG Foliares** es una aplicación web desarrollada en **Laravel 12** con **XAMPP**, diseñada para la gestión de datos operativos y administrativos, incluyendo CRUD, manejo de usuarios y envío de correos electrónicos. Su enfoque está en la eficiencia operativa y el uso de la información de la pagina y los datos de los usuarios.

---

## Características
- Gestión completa de registros (CRUD)
- Manejo de usuarios
- Envío de correos electrónicos vía SMTP
- Organización y visualización de información de manera clara

---

## Requisitos
- PHP >= 8.2
- Composer
- Artisan
- XAMPP o servidor local compatible
- MySQL

---

## Instalación
1. Clona el repositorio:
   ```bash
   git clone https://github.com/Jorge097/PaginaRG.git
      
2. Ingresa al directorio del proyecto:
   ```bash
    cd PaginaRG

3. Instala las dependencias de PHP:
   ```bash
   composer install
   
4. Copia el archivo .env.example y renómbralo a .env:
   ```bash
   cp .env.example .env"

5. Genera la clave de aplicación:
   ```bash
   php artisan key:generate
   
6. Ejecuta migraciones por si se aplicara:
   ```bash
   php artisan migrate

7. (Opcional) Instala dependencias de Node y compila assets:
   ```bash
   npm install
   npm run dev


© 2025 Jorge Silva. Todos los derechos reservados.
Este proyecto no puede ser usado, modificado ni vendido sin autorización del autor.

Contacto

Jorge Silva – jorge.silva-10@outlook.com
Repositorio: https://github.com/Jorge097/PaginaRG
