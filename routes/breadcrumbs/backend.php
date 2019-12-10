<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('Tablero de Control'), route('admin.dashboard'));
});

Breadcrumbs::for('frontend.user.account', function ($trail) {
    $trail->push(__('Mi Cuenta'), route('frontend.user.account'));
});

Breadcrumbs::for('admin.dashboard.colores', function ($trail) {
    $trail->push(__('Paleta de Colores'), route('admin.dashboard.colores'));
});

require __DIR__.'/user.php';
require __DIR__.'/role.php';
require __DIR__.'/log.php';
require __DIR__.'/log-viewer.php';
require __DIR__.'/backup.php';
