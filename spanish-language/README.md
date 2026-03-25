# Spanish Language / Idioma Español

> 🇪🇸 [Español](#español) | 🇬🇧 [English](#english)

---

## Español

Plugin de traducción que añade soporte completo en **castellano/español** a Pelican Panel. Traduce todas las cadenas de la interfaz de administración y del panel de usuario.

### ✨ Características

- 🌍 Traducción completa de la interfaz al español
- 📁 Archivos de idioma organizados en `lang/es/`
- ⚙️ Sin configuración adicional necesaria
- 🔄 Compatible con actualizaciones del panel

### 📁 Archivos de traducción incluidos

| Archivo | Contenido |
|---------|-----------|
| `activity.php` | Registro de actividad |
| `auth.php` | Autenticación y acceso |
| `commands.php` | Comandos del servidor |
| `exceptions.php` | Mensajes de error |
| `installer.php` | Asistente de instalación |
| `mail.php` | Correos electrónicos |
| `notifications.php` | Notificaciones |
| `profile.php` | Perfil de usuario |
| `search.php` | Búsqueda |
| `validation.php` | Validación de formularios |
| `admin/` | Sección de administración |
| `command/` | Comandos adicionales |
| `server/` | Gestión de servidores |

### 📦 Instalación

1. Copia la carpeta `spanish-language/` en el directorio de plugins de Pelican:
   ```
   /pelican/plugins/spanish-language/
   ```
2. La estructura debe quedar así:
   ```
   spanish-language/
   ├── plugin.json
   ├── README.md
   ├── src/
   │   └── SpanishLanguagePlugin.php
   └── lang/
       └── es/
           ├── activity.php
           ├── auth.php
           └── ...
   ```
3. Activa el plugin desde **Admin → Plugins**.
4. Cambia el idioma del panel a **Español** en la configuración.

### 📋 Requisitos

- Pelican Panel con soporte para Filament
- Sin paquetes de Composer adicionales

---

## English

Translation plugin that adds full **Spanish/Castilian** support to Pelican Panel. Translates all strings in both the administration interface and user panel.

### ✨ Features

- 🌍 Complete interface translation to Spanish
- 📁 Language files organized under `lang/es/`
- ⚙️ No additional configuration required
- 🔄 Compatible with panel updates

### 📁 Included translation files

| File | Content |
|------|---------|
| `activity.php` | Activity log |
| `auth.php` | Authentication and access |
| `commands.php` | Server commands |
| `exceptions.php` | Error messages |
| `installer.php` | Installation wizard |
| `mail.php` | Email messages |
| `notifications.php` | Notifications |
| `profile.php` | User profile |
| `search.php` | Search |
| `validation.php` | Form validation |
| `admin/` | Administration section |
| `command/` | Additional commands |
| `server/` | Server management |

### 📦 Installation

1. Copy the `spanish-language/` folder into your Pelican plugins directory:
   ```
   /pelican/plugins/spanish-language/
   ```
2. The structure should look like this:
   ```
   spanish-language/
   ├── plugin.json
   ├── README.md
   ├── src/
   │   └── SpanishLanguagePlugin.php
   └── lang/
       └── es/
           ├── activity.php
           ├── auth.php
           └── ...
   ```
3. Enable the plugin from **Admin → Plugins**.
4. Change the panel language to **Spanish** in the settings.

### 📋 Requirements

- Pelican Panel with Filament support
- No additional Composer packages required

---

| Campo / Field | Valor / Value |
|---|---|
| **ID** | `spanish-language` |
| **Versión / Version** | 1.0.0 |
| **Autor / Author** | Killerbite95 |
| **Categoría / Category** | Language |
