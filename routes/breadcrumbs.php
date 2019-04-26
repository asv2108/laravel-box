<?php
use App\User;
use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator as Crumbs;

Breadcrumbs::register('backend.home', function (Crumbs $crumbs) {
    $crumbs->push('Home', route('home'));
});

Breadcrumbs::register('login', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Login', route('login'));
});

Breadcrumbs::register('login.phone', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Login', route('login.phone'));
});

Breadcrumbs::register('register', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Register', route('register'));
});

Breadcrumbs::register('password.request', function (Crumbs $crumbs) {
    $crumbs->parent('login');
    $crumbs->push('Reset Password', route('password.request'));
});

Breadcrumbs::register('password.reset', function (Crumbs $crumbs) {
    $crumbs->parent('password.request');
    $crumbs->push('Change', route('password.reset'));
});

// Users

Breadcrumbs::register('backend.users.index', function (Crumbs $crumbs) {
    $crumbs->parent('backend.home');
    $crumbs->push('Users', route('backend.users.index'));
});

Breadcrumbs::register('backend.users.create', function (Crumbs $crumbs) {
    $crumbs->parent('backend.users.index');
    $crumbs->push('Create', route('backend.users.create'));
});

Breadcrumbs::register('backend.users.show', function (Crumbs $crumbs, User $user) {
    $crumbs->parent('backend.users.index');
    $crumbs->push($user->name, route('backend.users.show', $user));
});

Breadcrumbs::register('backend.users.edit', function (Crumbs $crumbs, User $user) {
    $crumbs->parent('backend.users.show', $user);
    $crumbs->push('Edit', route('backend.users.edit', $user));
});

