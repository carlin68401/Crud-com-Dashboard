<?php
// Inicia Seção //
if(!isset($_SESSION)) {
    session_start();
}

session_destroy();

// encaminha para login //
header("Location: ../view/index.php");
