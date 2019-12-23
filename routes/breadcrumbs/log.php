<?php

Breadcrumbs::for('admin.user.logs.index', function ($trail) {
    $trail->push(__('Administración de Eventos'), route('admin.user.logs.index'));
});

Breadcrumbs::for('admin.user.logs.show', function ($trail, $id) {
    $trail->parent('admin.user.logs.index');
    $trail->push(__("Visualizando Evento [ $id ]"), route('admin.user.logs.show', $id));
});
