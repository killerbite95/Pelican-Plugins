# AlienHost Theme

Tema oficial de AlienHost para Pelican Panel con la identidad visual de [alienhost.es](https://alienhost.es).

## 📋 Información del Plugin

| Campo | Valor |
|-------|-------|
| **ID** | `alienhost-theme` |
| **Versión** | 1.0.0 |
| **Categoría** | Theme |
| **Autor** | Killerbite95 |

## 📖 Descripción

AlienHost Theme transforma Pelican Panel con la paleta de colores oficial de AlienHost, un proveedor de servidores de juegos desde 2013. El tema proporciona una apariencia moderna, futurista y profesional coherente con la marca.

## ✨ Características

### Tipografía Personalizada
- **Fuente**: [Poppins](https://fonts.google.com/specimen/Poppins) - Una fuente geométrica sans-serif moderna y legible, la misma utilizada en alienhost.es.

### Paleta de Colores

| Uso | Color | Hex | RGB | Descripción |
|-----|-------|-----|-----|-------------|
| **Primary** | Púrpura AlienHost | `#6419ff` | rgb(100, 25, 255) | Color principal de la marca |
| **Gray** | Azul Oscuro | `#0f172a` | rgb(15, 23, 42) | Tonos neutros oscuros |
| **Info** | Cyan AlienHost | `#0073ce` | rgb(0, 115, 206) | Información y acentos |
| **Success** | Emerald | - | - | Acciones exitosas |
| **Warning** | Amber | - | - | Advertencias |
| **Danger** | Rose | - | - | Acciones destructivas |

### Gradiente de Marca
El gradiente característico de AlienHost va del púrpura (`#6419ff`) al cyan (`#0073ce`), creando un efecto visual distintivo y moderno.

## 📦 Instalación

1. Descarga el plugin en la carpeta de plugins de Pelican Panel:
   ```
   /pelican/plugins/alienhost-theme/
   ```

2. La estructura debe quedar así:
   ```
   alienhost-theme/
   ├── plugin.json
   ├── DOCUMENTATION.md
   └── src/
       └── AlienHostThemePlugin.php
   ```

3. Activa el plugin desde el panel de administración en **Admin → Plugins**.

## 🔧 Requisitos

- Pelican Panel (versión compatible)
- No requiere paquetes de Composer adicionales

## 🎨 Vista Previa

El tema aplica los siguientes cambios visuales:

- **Botones primarios**: Púrpura brillante (#6419ff)
- **Elementos de navegación**: Tonos azul oscuro (#0f172a)
- **Enlaces e información**: Cyan (#0073ce)
- **Alertas de éxito**: Verde esmeralda
- **Alertas de error**: Rosa/Rojo
- **Advertencias**: Ámbar

## 📝 Notas Técnicas

Este plugin implementa la interfaz `Filament\Contracts\Plugin` y modifica la configuración del panel:

```php
$panel
    ->font('Poppins')
    ->colors([
        'primary' => Color::hex('#6419ff'),
        'gray' => Color::hex('#0f172a'),
        'danger' => Color::Rose,
        'warning' => Color::Amber,
        'success' => Color::Emerald,
        'info' => Color::hex('#0073ce'),
    ]);
```

## 🌐 Sobre AlienHost

**AlienHost** es un proveedor español de servidores de juegos desde 2013, ofreciendo:
- 🎮 Servidores de juegos (Garry's Mod, CS2, Minecraft, Rust, FiveM, etc.)
- 🌐 Hosting web con cPanel
- 🛡️ Protección Anti-DDoS incluida
- 📞 Soporte 24/7

**Estadísticas:**
- +350 Clientes activos
- +1000 Servidores
- +10 Años de experiencia
- 99.9% Uptime garantizado

## 🔗 Enlaces

- **Web**: [alienhost.es](https://alienhost.es)
- **Panel de clientes**: [clientes.alienhost.es](https://clientes.alienhost.es)
- **Estado del servicio**: [status.alienhost.es](https://status.alienhost.es)
- **Discord**: [discord.gg/7xUeReg5af](https://discord.gg/7xUeReg5af)

## 📄 Licencia

© 2025 AlienHost. Todos los derechos reservados.
