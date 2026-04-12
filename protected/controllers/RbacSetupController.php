<?php
class RbacSetupController extends Controller
{
    // IMPORTANTE: Elimina este controller después de usarlo
    public function actionIndex()
    {
        $auth = Yii::app()->authManager;

        // Limpiar todo antes de regenerar (útil al hacer cambios)
        $auth->clearAll();

        // =================================================
        // NIVEL 1 — OPERACIONES (acciones específicas)
        // Son los permisos más pequeños y atómicos
        // =================================================

        // Operaciones de Usuarios
        $auth->createOperation('crearUsuario',    'Crear nuevos usuarios');
        $auth->createOperation('editarUsuario',   'Editar usuarios existentes');
        $auth->createOperation('eliminarUsuario', 'Eliminar usuarios');
        $auth->createOperation('verUsuarios',     'Ver listado de usuarios');
        $auth->createOperation('verPerfil',       'Ver su propio perfil');

        // Operaciones de Proyectos (ejemplo para tu app freelance)
        $auth->createOperation('crearProyecto',    'Crear proyectos');
        $auth->createOperation('editarProyecto',   'Editar proyectos');
        $auth->createOperation('eliminarProyecto', 'Eliminar proyectos');
        $auth->createOperation('verProyectos',     'Ver proyectos');

        // =================================================
        // NIVEL 2 — TAREAS (agrupan operaciones)
        // =================================================

        // Tarea: Gestión completa de usuarios
        $gestionUsuarios = $auth->createTask('gestionarUsuarios', 'Gestión completa de usuarios');
        $gestionUsuarios->addChild('crearUsuario');
        $gestionUsuarios->addChild('editarUsuario');
        $gestionUsuarios->addChild('eliminarUsuario');
        $gestionUsuarios->addChild('verUsuarios');

        // Tarea: Gestión completa de proyectos
        $gestionProyectos = $auth->createTask('gestionarProyectos', 'Gestión completa de proyectos');
        $gestionProyectos->addChild('crearProyecto');
        $gestionProyectos->addChild('editarProyecto');
        $gestionProyectos->addChild('eliminarProyecto');
        $gestionProyectos->addChild('verProyectos');

        // Tarea: Solo ver proyectos (para usuario normal)
        $verProyectos = $auth->createTask('verSoloProyectos', 'Solo puede ver proyectos');
        $verProyectos->addChild('verProyectos');

        // =================================================
        // NIVEL 3 — ROLES (agrupan tareas)
        // =================================================

        // ROL: Administrador — tiene acceso a todo
        $admin = $auth->createRole('admin');
        $admin->addChild('gestionarUsuarios');
        $admin->addChild('gestionarProyectos');

        // ROL: Moderador — gestiona proyectos pero no usuarios
        $moderador = $auth->createRole('moderador');
        $moderador->addChild('gestionarProyectos');
        $moderador->addChild('verUsuarios'); // Solo ver, no gestionar

        // ROL: Usuario normal — solo ve proyectos y su perfil
        $usuario = $auth->createRole('usuario');
        $usuario->addChild('verSoloProyectos');
        $usuario->addChild('verPerfil');

        echo "RBAC generado correctamente.\n";

         // Primero busca el ID de tu usuario
        $miUsuario = Usuarios::model()->findByAttributes(
            array('username' => 'tks_admin')
        );

        if ($miUsuario) {
            $auth->assign('admin', $miUsuario->id);
            echo "<h3>✅ Rol admin asignado a tks_admin (ID: {$miUsuario->id})</h3>";
        } else {
            echo "<h3>❌ Usuario tks_admin no encontrado.</h3>";
        }
    }
}