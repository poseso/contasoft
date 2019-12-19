<?php

Breadcrumbs::for('admin.user.role.index', function ($trail) {
    $trail->push(__('menus.backend.access.roles.management'), route('admin.user.role.index'));
});

Breadcrumbs::for('admin.user.role.create', function ($trail) {
    $trail->parent('admin.user.role.index');
    $trail->push(__('menus.backend.access.roles.create'), route('admin.user.role.create'));
});

Breadcrumbs::for('admin.user.role.edit', function ($trail, $id) {
    $trail->parent('admin.user.role.index');
    $trail->push(__('menus.backend.access.roles.edit'), route('admin.user.role.edit', $id));
});
