<?php

Breadcrumbs::for('admin.user.index', function ($trail) {
    $trail->push(__('Administración de Usuarios'), route('admin.user.index'));
});

Breadcrumbs::for('admin.user.deactivated', function ($trail) {
    $trail->parent('admin.user.index');
    $trail->push(__('Usuarios desactivados'), route('admin.user.deactivated'));
});

Breadcrumbs::for('admin.user.deleted', function ($trail) {
    $trail->parent('admin.user.index');
    $trail->push(__('Usuarios eliminados'), route('admin.user.deleted'));
});

Breadcrumbs::for('admin.user.create', function ($trail) {
    $trail->parent('admin.user.index');
    $trail->push(__('Crear Usuario'), route('admin.user.create'));
});

Breadcrumbs::for('admin.user.show', function ($trail, $id) {
    $trail->parent('admin.user.index');
    $trail->push(__('Ver Usuario'), route('admin.user.show', $id));
});

Breadcrumbs::for('admin.user.edit', function ($trail, $id) {
    $trail->parent('admin.user.index');
    $trail->push(__('Modificar Usuario'), route('admin.user.edit', $id));
});

Breadcrumbs::for('admin.user.change-password', function ($trail, $id) {
    $trail->parent('admin.user.index');
    $trail->push(__('Cambiar la contraseña'), route('admin.user.change-password', $id));
});
