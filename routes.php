<?php
Route::setRoutes("login", function() {
    login::view("login");
});

Route::setRoutes("register", function() {
    register::view("register");
});

Route::setRoutes("list-items", function() {
    ListItems::view("list-items");
});