<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ============================================================
         TÍTULO DE PÁGINA
         En Yii 1.1 cada vista puede definir:
           $this->pageTitle = 'Mi Página';
         y aquí lo renderizamos con htmlspecialchars para seguridad.
    ============================================================ -->
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <!-- CDN: Bootstrap 5.3 CSS -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"
    >

    <!-- CDN: Bootstrap Icons 1.11 -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>
        /* ----------------------------------------------------------
           VARIABLES CSS — paleta y dimensiones centralizadas
        ---------------------------------------------------------- */
        :root {
            --sidebar-width: 280px;
            --topbar-height: 60px;
            --color-primary: #0d6efd;
            --color-sidebar-bg: #ffffff;
            --color-sidebar-text: #555;
            --color-sidebar-hover-bg: #f0f4ff;
            --color-topbar-bg: #ffffff;
            --color-content-bg: #f4f6f9;
            --color-border: #e3e6ea;
            --transition-speed: 0.25s;
        }

        *, *::before, *::after { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Segoe UI', system-ui, sans-serif;
            background-color: var(--color-content-bg);
            color: #333;
            overflow-x: hidden;
        }

        /* ----------------------------------------------------------
           TOPBAR
        ---------------------------------------------------------- */
        #topbar {
            position: fixed;
            top: 0; left: 0; right: 0;
            height: var(--topbar-height);
            background: var(--color-topbar-bg);
            border-bottom: 3px solid var(--color-primary);
            display: flex;
            align-items: center;
            padding: 0 1rem;
            z-index: 1040;
            gap: 0.75rem;
        }

        #topbar .topbar-logo {
            display: none;
            font-weight: 700;
            font-size: 1.1rem;
            color: var(--color-primary);
            text-decoration: none;
        }

        #topbar .search-box { flex: 1; max-width: 400px; }
        #topbar .search-box input {
            border-radius: 20px;
            border: 1px solid var(--color-border);
            background: #f4f6f9;
            padding-left: 1rem;
        }
        #topbar .search-box input:focus {
            background: #fff;
            box-shadow: none;
            border-color: var(--color-primary);
        }

        #topbar .topbar-actions {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .btn-icon {
            background: none;
            border: none;
            font-size: 1.3rem;
            color: #666;
            cursor: pointer;
            padding: 0.25rem 0.4rem;
            border-radius: 6px;
            transition: background var(--transition-speed);
        }
        .btn-icon:hover { background: var(--color-sidebar-hover-bg); }

        /* ----------------------------------------------------------
           SIDEBAR
        ---------------------------------------------------------- */
        #sidebar {
            position: fixed;
            top: 0; left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--color-sidebar-bg);
            border-right: 1px solid var(--color-border);
            display: flex;
            flex-direction: column;
            z-index: 1045;
            transition: transform var(--transition-speed) ease;
            overflow-y: auto;
            overflow-x: hidden;
        }

        #sidebar .sidebar-header {
            height: var(--topbar-height);
            display: flex;
            align-items: center;
            padding: 0 1.25rem;
            border-bottom: 1px solid var(--color-border);
            flex-shrink: 0;
        }
        .brand-text {
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #999;
            margin-top: 0.25rem;
        }

        #sidebar .sidebar-nav { padding: 1rem 0; flex: 1; }

        .nav-section-label {
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #aaa;
            padding: 0.75rem 1.25rem 0.25rem;
        }

        .nav-item-link {
            display: flex;
            align-items: center;
            gap: 0.65rem;
            padding: 0.6rem 1.25rem;
            color: var(--color-sidebar-text);
            text-decoration: none;
            font-size: 0.9rem;
            transition: background var(--transition-speed), color var(--transition-speed);
        }
        .nav-item-link i { font-size: 1rem; width: 1.2rem; text-align: center; }
        .nav-item-link:hover {
            background: var(--color-sidebar-hover-bg);
            color: var(--color-primary);
        }
        .nav-item-link.active {
            background: var(--color-primary);
            color: #fff;
            font-weight: 600;
        }
        .nav-item-link.active i { color: #fff; }

        .nav-item-link .arrow {
            margin-left: auto;
            font-size: 0.75rem;
            transition: transform var(--transition-speed);
        }
        .nav-item-link[aria-expanded="true"] .arrow { transform: rotate(180deg); }

        .nav-sub { list-style: none; padding: 0; margin: 0; background: #f8f9fa; }
        .nav-sub .nav-item-link { padding-left: 3rem; font-size: 0.85rem; }

        /* ----------------------------------------------------------
           OVERLAY (móvil)
        ---------------------------------------------------------- */
        #sidebarOverlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.4);
            z-index: 1044;
        }

        /* ----------------------------------------------------------
           ÁREA DE CONTENIDO
        ---------------------------------------------------------- */
        #main-wrapper {
            margin-left: var(--sidebar-width);
            padding-top: var(--topbar-height);
            min-height: 100vh;
            transition: margin-left var(--transition-speed);
        }

        #breadcrumb-bar {
            padding: 0.5rem 1.5rem;
            background: #fff;
            border-bottom: 1px solid var(--color-border);
            font-size: 0.85rem;
        }
        #breadcrumb-bar .breadcrumb { margin: 0; }

        .page-title-bar {
            margin: 1.25rem 1.5rem 0;
            background: #fff;
            border-radius: 12px;
            padding: 1rem 1.5rem;
            font-size: 1.3rem;
            font-weight: 600;
        }

        #page-content { padding: 1.25rem 1.5rem; }

        /* ----------------------------------------------------------
           RESPONSIVE — móvil
        ---------------------------------------------------------- */
        @media (max-width: 991.98px) {
            #sidebar { transform: translateX(-100%); }
            #sidebar.sidebar-open { transform: translateX(0); }
            body.sidebar-open #sidebarOverlay { display: block; }
            #main-wrapper { margin-left: 0; }
            #topbar .topbar-logo { display: block; }
            #btnToggleSidebar { display: flex !important; }
        }
    </style>
</head>
<body>

<!-- Overlay (solo móvil) -->
<div id="sidebarOverlay" onclick="closeSidebar()"></div>

<!-- ================================================================
     SIDEBAR
================================================================ -->
<aside id="sidebar" role="navigation" aria-label="Menú principal">

    <div class="sidebar-header">
        <div>
            <!-- Reemplaza src con tu logo real usando Yii::app()->baseUrl -->
            <img
                src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png"
                alt="Logo EasyROI"
                height="28"
                onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
            >
            <strong style="display:none; color: var(--color-primary); font-size:1.2rem;">EasyROI</strong>
            <div class="brand-text">EasyROI</div>
        </div>
    </div>

    <nav class="sidebar-nav">

        <div class="nav-section-label">Principal</div>

        <a href="<?php echo Yii::app()->createUrl('site/index'); ?>"
           class="nav-item-link <?php echo ($this->id === 'site' && $this->action->id === 'index') ? 'active' : ''; ?>">
            <i class="bi bi-house-fill"></i>
            Inicio
        </a>

        <a href="<?php echo Yii::app()->createUrl('dashboard/index'); ?>"
           class="nav-item-link <?php echo ($this->id === 'dashboard') ? 'active' : ''; ?>">
            <i class="bi bi-bar-chart-line"></i>
            Dashboard
        </a>

        <div class="nav-section-label">Comercial</div>

        <!-- Ventas con submenú -->
        <a class="nav-item-link"
           data-bs-toggle="collapse"
           href="#subVentas"
           role="button"
           aria-expanded="<?php echo ($this->id === 'ventas') ? 'true' : 'false'; ?>"
           aria-controls="subVentas">
            <i class="bi bi-tags"></i>
            Ventas
            <i class="bi bi-chevron-down arrow"></i>
        </a>
        <ul class="nav-sub collapse <?php echo ($this->id === 'ventas') ? 'show' : ''; ?>" id="subVentas">
            <li>
                <a href="<?php echo Yii::app()->createUrl('ventas/index'); ?>"
                   class="nav-item-link <?php echo ($this->id === 'ventas' && $this->action->id === 'index') ? 'active' : ''; ?>">
                    <i class="bi bi-list-ul"></i> Listado
                </a>
            </li>
            <li>
                <a href="<?php echo Yii::app()->createUrl('ventas/create'); ?>"
                   class="nav-item-link <?php echo ($this->id === 'ventas' && $this->action->id === 'create') ? 'active' : ''; ?>">
                    <i class="bi bi-plus-circle"></i> Nueva venta
                </a>
            </li>
        </ul>

        <div class="nav-section-label">Operaciones</div>

        <!-- Operaciones con submenú -->
        <?php $inOperaciones = in_array($this->id, ['contratos', 'tickets']); ?>
        <a class="nav-item-link <?php echo $inOperaciones ? 'active' : ''; ?>"
           data-bs-toggle="collapse"
           href="#subOperaciones"
           role="button"
           aria-expanded="<?php echo $inOperaciones ? 'true' : 'false'; ?>"
           aria-controls="subOperaciones">
            <i class="bi bi-gear-fill"></i>
            Operaciones
            <i class="bi bi-chevron-down arrow"></i>
        </a>
        <ul class="nav-sub collapse <?php echo $inOperaciones ? 'show' : ''; ?>" id="subOperaciones">
            <li>
                <a href="<?php echo Yii::app()->createUrl('contratos/index'); ?>"
                   class="nav-item-link <?php echo ($this->id === 'contratos') ? 'active' : ''; ?>">
                    <i class="bi bi-file-earmark-text"></i> Contratos
                </a>
            </li>
            <li>
                <a href="<?php echo Yii::app()->createUrl('tickets/index'); ?>"
                   class="nav-item-link <?php echo ($this->id === 'tickets') ? 'active' : ''; ?>">
                    <i class="bi bi-ticket-perforated"></i> Tickets
                </a>
            </li>
        </ul>

        <!-- Compras con submenú -->
        <a class="nav-item-link"
           data-bs-toggle="collapse"
           href="#subCompras"
           role="button"
           aria-expanded="<?php echo ($this->id === 'compras') ? 'true' : 'false'; ?>"
           aria-controls="subCompras">
            <i class="bi bi-cart3"></i>
            Compras
            <i class="bi bi-chevron-down arrow"></i>
        </a>
        <ul class="nav-sub collapse <?php echo ($this->id === 'compras') ? 'show' : ''; ?>" id="subCompras">
            <li>
                <a href="<?php echo Yii::app()->createUrl('compras/index'); ?>"
                   class="nav-item-link <?php echo ($this->id === 'compras') ? 'active' : ''; ?>">
                    <i class="bi bi-list-ul"></i> Listado
                </a>
            </li>
        </ul>

        <!-- Materiales con submenú -->
        <a class="nav-item-link"
           data-bs-toggle="collapse"
           href="#subMateriales"
           role="button"
           aria-expanded="<?php echo ($this->id === 'materiales') ? 'true' : 'false'; ?>"
           aria-controls="subMateriales">
            <i class="bi bi-briefcase"></i>
            Materiales
            <i class="bi bi-chevron-down arrow"></i>
        </a>
        <ul class="nav-sub collapse <?php echo ($this->id === 'materiales') ? 'show' : ''; ?>" id="subMateriales">
            <li>
                <a href="<?php echo Yii::app()->createUrl('materiales/index'); ?>"
                   class="nav-item-link <?php echo ($this->id === 'materiales') ? 'active' : ''; ?>">
                    <i class="bi bi-list-ul"></i> Listado
                </a>
            </li>
        </ul>

        <div class="nav-section-label">Administración</div>

        <!-- Finanzas con submenú -->
        <a class="nav-item-link"
           data-bs-toggle="collapse"
           href="#subFinanzas"
           role="button"
           aria-expanded="<?php echo ($this->id === 'finanzas') ? 'true' : 'false'; ?>"
           aria-controls="subFinanzas">
            <i class="bi bi-graph-up-arrow"></i>
            Finanzas
            <i class="bi bi-chevron-down arrow"></i>
        </a>
        <ul class="nav-sub collapse <?php echo ($this->id === 'finanzas') ? 'show' : ''; ?>" id="subFinanzas">
            <li>
                <a href="<?php echo Yii::app()->createUrl('finanzas/index'); ?>"
                   class="nav-item-link <?php echo ($this->id === 'finanzas') ? 'active' : ''; ?>">
                    <i class="bi bi-list-ul"></i> Resumen
                </a>
            </li>
        </ul>

    </nav>
</aside>

<!-- ================================================================
     TOPBAR
================================================================ -->
<header id="topbar" role="banner">

    <!-- Hamburguesa (solo móvil) -->
    <button
        id="btnToggleSidebar"
        class="btn-icon"
        style="display:none;"
        onclick="toggleSidebar()"
        aria-label="Abrir menú"
    >
        <i class="bi bi-list"></i>
    </button>

    <!-- Logo solo móvil -->
    <a href="<?php echo Yii::app()->createUrl('site/index'); ?>" class="topbar-logo">
        EasyROI
    </a>

    <!-- Búsqueda -->
    <div class="search-box input-group">
        <input type="search" class="form-control" placeholder="Buscar..." aria-label="Buscar">
        <span class="input-group-text"
              style="border-radius:0 20px 20px 0; border-left:none; background:#f4f6f9;">
            <i class="bi bi-search text-secondary"></i>
        </span>
    </div>

    <!-- Acciones -->
    <div class="topbar-actions">
        <button class="btn-icon" title="Notificaciones">
            <i class="bi bi-bell"></i>
        </button>

        <div class="dropdown">
            <button class="btn-icon" data-bs-toggle="dropdown" aria-expanded="false" title="Cuenta">
                <i class="bi bi-person-badge-fill"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                <li>
                    <a class="dropdown-item" href="<?php echo Yii::app()->createUrl('site/profile'); ?>">
                        <i class="bi bi-person me-2"></i> Mi perfil
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item text-danger"
                       href="<?php echo Yii::app()->createUrl('site/logout'); ?>">
                        <i class="bi bi-box-arrow-right me-2"></i> Cerrar sesión
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>

<!-- ================================================================
     ÁREA DE CONTENIDO PRINCIPAL
================================================================ -->
<div id="main-wrapper">

    <!-- Breadcrumb dinámico -->
    <div id="breadcrumb-bar">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?php echo Yii::app()->createUrl('site/index'); ?>">
                        <i class="bi bi-house"></i> Inicio
                    </a>
                </li>
                <?php if (!empty($this->breadcrumbs)):
                    $crumbs  = $this->breadcrumbs;
                    $lastKey = array_key_last($crumbs);
                    foreach ($crumbs as $label => $url):
                        $isLast = ($label === $lastKey);
                ?>
                    <?php if ($isLast && is_numeric($label)): ?>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?php echo CHtml::encode($url); ?>
                        </li>
                    <?php elseif ($isLast): ?>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?php echo CHtml::encode($label); ?>
                        </li>
                    <?php else: ?>
                        <li class="breadcrumb-item">
                            <a href="<?php echo Yii::app()->createUrl(is_array($url) ? $url[0] : $url); ?>">
                                <?php echo CHtml::encode($label); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; endif; ?>
            </ol>
        </nav>
    </div>

    <!-- Título -->
    <div class="page-title-bar">
        <?php echo CHtml::encode($this->pageTitle); ?>
    </div>

    <!-- Contenido -->
    <div id="page-content">

        <?php
        /**
         * MENSAJES FLASH DE YII 1.1
         * En tus controllers usa:
         *   Yii::app()->user->setFlash('success', 'Guardado correctamente.');
         *   Yii::app()->user->setFlash('error',   'Ocurrió un error.');
         *   Yii::app()->user->setFlash('warning',  'Revisa los datos.');
         *   Yii::app()->user->setFlash('info',     'Ten esto en cuenta.');
         */
        $flashTypes = ['success', 'error', 'warning', 'info'];
        foreach ($flashTypes as $type):
            if (Yii::app()->user->hasFlash($type)):
                $bsType = ($type === 'error') ? 'danger' : $type;
                $icons  = [
                    'success' => 'check-circle-fill',
                    'error'   => 'x-circle-fill',
                    'warning' => 'exclamation-triangle-fill',
                    'info'    => 'info-circle-fill',
                ];
        ?>
            <div class="alert alert-<?php echo $bsType; ?> alert-dismissible fade show" role="alert">
                <i class="bi bi-<?php echo $icons[$type]; ?> me-2"></i>
                <?php echo CHtml::encode(Yii::app()->user->getFlash($type)); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php endif; endforeach; ?>

        <!-- Contenido de la vista inyectado por Yii -->
        <?php echo $content; ?>

    </div>
</div>

<!-- Bootstrap 5.3 JS -->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc4s9bIOgUxi8T/jzmDKQ7aqcT05I"
    crossorigin="anonymous"
></script>

<script>
    /* ============================================================
       SIDEBAR RESPONSIVE
    ============================================================ */
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.contains('sidebar-open') ? closeSidebar() : openSidebar();
    }

    function openSidebar() {
        document.getElementById('sidebar').classList.add('sidebar-open');
        document.body.classList.add('sidebar-open');
    }

    function closeSidebar() {
        document.getElementById('sidebar').classList.remove('sidebar-open');
        document.body.classList.remove('sidebar-open');
    }

    // Cerrar con Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeSidebar();
    });
</script>

</body>
</html>