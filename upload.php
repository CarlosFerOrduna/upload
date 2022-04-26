<?php


$directorio = 'uploads/';

$archivo = $directorio . basename($_FILES['file']['name']);

$tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

$validarImagen = getimagesize($_FILES['file']['tmp_name']);

if ($validarImagen != false) {
    $size = $_FILES['file']['size'];
    if ($size > 500000) {
        echo 'El archivo tiene que ser menor a 500kb';
    } else {
        if ($tipoArchivo == 'jpg' || $tipoArchivo == 'jpeg') {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $archivo)) {
                echo 'El archivo subio correctamente';
            } else {
                echo 'Error al subir archivo';
            }
        } else {
            echo 'Solo se aceptan archivos jpg';
        }
    }
} else {
    echo 'El documento no es una imagen';
}