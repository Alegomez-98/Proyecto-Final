<?php

require_once __DIR__ . "/../includes/app.php";

use Controllers\EntradaController;
use Controllers\LoginController;
use Controllers\NoticiaController;
use Controllers\PaginasController;
use Controllers\ProductoController;
use MVC\Router;
use Controllers\ServicioController;
use Controllers\ProfesionalController;

$router = new Router();

//Zona Privada
$router->get("/admin", [ServicioController::class, "index"]);
$router->get("/servicios/crear", [ServicioController::class, "crear"]);
$router->post("/servicios/crear", [ServicioController::class, "crear"]);
$router->get("/servicios/actualizar", [ServicioController::class, "actualizar"]);
$router->post("/servicios/actualizar", [ServicioController::class, "actualizar"]);
$router->post("/servicios/eliminar", [ServicioController::class, "eliminar"]);

$router->get("/profesionales/crear", [ProfesionalController::class, "crear"]);
$router->post("/profesionales/crear", [ProfesionalController::class, "crear"]);
$router->get("/profesionales/actualizar", [ProfesionalController::class, "actualizar"]);
$router->post("/profesionales/actualizar", [ProfesionalController::class, "actualizar"]);
$router->post("/profesionales/eliminar", [ProfesionalController::class, "eliminar"]);

$router->get("/noticias/crear", [NoticiaController::class, "crear"]);
$router->post("/noticias/crear", [NoticiaController::class, "crear"]);
$router->get("/noticias/actualizar", [NoticiaController::class, "actualizar"]);
$router->post("/noticias/actualizar", [NoticiaController::class, "actualizar"]);
$router->post("/noticias/eliminar", [NoticiaController::class, "eliminar"]);

$router->get("/entradas/crear", [EntradaController::class, "crear"]);
$router->post("/entradas/crear", [EntradaController::class, "crear"]);
$router->get("/entradas/actualizar", [EntradaController::class, "actualizar"]);
$router->post("/entradas/actualizar", [EntradaController::class, "actualizar"]);
$router->post("/entradas/eliminar", [EntradaController::class, "eliminar"]);

$router->get("/productos/crear", [ProductoController::class, "crear"]);
$router->post("/productos/crear", [ProductoController::class, "crear"]);
$router->get("/productos/actualizar", [ProductoController::class, "actualizar"]);
$router->post("/productos/actualizar", [ProductoController::class, "actualizar"]);
$router->post("/productos/eliminar", [ProductoController::class, "eliminar"]);

//Zona Pública
$router->get("/", [PaginasController::class, "index"]);
$router->get("/profesional", [PaginasController::class, "profesional"] );
$router->get("/servicios", [PaginasController::class, "servicios"] );
$router->get("/noticias", [PaginasController::class, "noticias"] );
$router->get("/noticia", [PaginasController::class, "noticia"] );
$router->get("/blog", [PaginasController::class, "blog"] );
$router->get("/entrada", [PaginasController::class, "entrada"] );
$router->get("/contacto", [PaginasController::class, "contacto"] );
$router->post("/contacto", [PaginasController::class, "contacto"] );

//Login y Autenticación
$router->get("/login", [LoginController::class, "login"]);
$router->post("/login", [LoginController::class, "login"]);
$router->get("/logout", [LoginController::class, "logout"]);

//Recuperar Password
$router->get("/olvide", [LoginController::class, "olvide"]);
$router->post("/olvide", [LoginController::class, "olvide"]);
$router->get("/recuperar", [LoginController::class, "recuperar"]);
$router->post("/recuperar", [LoginController::class, "recuperar"]);

//Crear Cuenta
$router->get("/crear-cuenta", [LoginController::class, "crear"]);
$router->post("/crear-cuenta", [LoginController::class, "crear"]);

//Confirmar Cuenta
$router->get("/confirmar-cuenta", [LoginController::class, "confirmar"]);
$router->get("/mensaje", [LoginController::class, "mensaje"]);

$router->comprobarRutas();