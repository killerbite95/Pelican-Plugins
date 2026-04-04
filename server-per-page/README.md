# Server Per Page

> 🇪🇸 [Español](#español) | 🇬🇧 [English](#english)

---

## Español

Plugin para Pelican Panel que **recuerda para siempre** la selección de servidores por página del usuario. Por defecto establece **40** en modo cuadrícula y **50** en modo tabla.

### ✨ Características

- 💾 Guarda la selección de "por página" en la base de datos (no en sesión)
- 🔄 Se restaura automáticamente aunque la sesión haya expirado
- 🌐 Persiste entre dispositivos y navegadores
- ⚡ Por defecto 40 (cuadrícula) / 50 (tabla) si el usuario nunca ha cambiado el valor
- 🚫 Sin migraciones ni configuración adicional

### 📖 Cómo funciona

Filament almacena el valor de "por página" en la sesión PHP, que expira al cerrar el navegador. Este plugin extiende ese comportamiento:

1. Cuando la sesión no tiene valor guardado (primera visita o sesión expirada), lee la preferencia del usuario desde la base de datos y la inyecta en la sesión.
2. Cada vez que el usuario cambia el valor, lo persiste en el campo `customization` del modelo `User` en la base de datos.

### 📦 Instalación

1. Copia la carpeta `server-per-page/` en el directorio de plugins de Pelican:
   ```
   /pelican/plugins/server-per-page/
   ```
2. La estructura debe quedar así:
   ```
   server-per-page/
   ├── plugin.json
   ├── README.md
   └── src/
       ├── ServerPerPagePlugin.php
       └── Providers/
           └── ServerPerPageServiceProvider.php
   ```
3. Activa el plugin desde **Admin → Plugins**.

### 📋 Requisitos

- Pelican Panel con soporte para plugins
- Sin paquetes de Composer adicionales
- Sin migraciones de base de datos

### 🔢 Valores por defecto

| Modo | Opciones disponibles | Por defecto |
|------|---------------------|-------------|
| Cuadrícula (grid) | 10, 20, 30, **40** | **40** |
| Tabla (table) | 10, 20, **50**, 100 | **50** |

---

## English

Plugin for Pelican Panel that **permanently remembers** the user's servers-per-page selection. Defaults to **40** in grid mode and **50** in table mode.

### ✨ Features

- 💾 Saves the "per page" selection to the database (not the session)
- 🔄 Automatically restored even after session expiry
- 🌐 Persists across devices and browsers
- ⚡ Defaults to 40 (grid) / 50 (table) if the user has never changed the value
- 🚫 No migrations or additional configuration required

### 📖 How it works

Filament stores the "per page" value in the PHP session, which expires when the browser is closed. This plugin extends that behavior:

1. When the session has no stored value (first visit or expired session), it reads the user's preference from the database and injects it into the session.
2. Every time the user changes the value, it persists it in the `customization` field of the `User` model in the database.

### 📦 Installation

1. Copy the `server-per-page/` folder into your Pelican plugins directory:
   ```
   /pelican/plugins/server-per-page/
   ```
2. The structure should look like this:
   ```
   server-per-page/
   ├── plugin.json
   ├── README.md
   └── src/
       ├── ServerPerPagePlugin.php
       └── Providers/
           └── ServerPerPageServiceProvider.php
   ```
3. Enable the plugin from **Admin → Plugins**.

### 📋 Requirements

- Pelican Panel with plugin support
- No additional Composer packages
- No database migrations

### 🔢 Default values

| Mode | Available options | Default |
|------|------------------|---------|
| Grid | 10, 20, 30, **40** | **40** |
| Table | 10, 20, **50**, 100 | **50** |

---

| Campo / Field | Valor / Value |
|---|---|
| **ID** | `server-per-page` |
| **Versión / Version** | 1.0.0 |
| **Autor / Author** | Killerbite95 |
| **Categoría / Category** | Plugin |
