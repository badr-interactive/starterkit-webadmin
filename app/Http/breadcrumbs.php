<?php

Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});

// Manage User
Breadcrumbs::register('user.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Users', route('user.index'));
});

Breadcrumbs::register('user.form', function ($breadcrumbs) {
    $breadcrumbs->parent('user.index');
    $breadcrumbs->push('Add / Edit ', route('user.form'));
});

// Manage Role
Breadcrumbs::register('user_role.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Roles', route('user_role.index'));
});

Breadcrumbs::register('user_role.form', function ($breadcrumbs) {
    $breadcrumbs->parent('user_role.index');
    $breadcrumbs->push('Add / Edit ', route('user_role.form'));
});

// Manage Control
Breadcrumbs::register('control.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Access Control', route('user.index'));
});
