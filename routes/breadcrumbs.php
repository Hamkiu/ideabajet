<?php

// Home
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Home', route('dashboard'));
});

Breadcrumbs::for('pencadang', function ($trail) {
    $trail->push('Home', route('pencadang'));
});

//Dashboard > JKKP
Breadcrumbs::for('jkkpmains', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('JKKP', route('jkkpmains'));
});

//Dashboard > JKKP > Create
Breadcrumbs::for('jkkpmains.create', function ($trail) {
    $trail->parent('jkkpmains');
    $trail->push('Create', route('jkkpmains.create'));
});

//Dashboard > JKKP > Edit
Breadcrumbs::for('jkkpmains.edit', function ($trail, $id) {
    $trail->parent('jkkpmains');
    $trail->push('Edit', route('jkkpmains.edit', $id));
});

?>