<?php
session_start();
session_destroy();

echo "<script>window.location.href = '../view/principal.php?sesion=close';</script>";


