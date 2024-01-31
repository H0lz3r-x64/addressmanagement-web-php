<?php
namespace Views;

echo <<<EOF
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <base href="/commisioningdevopswebinterface-be/">

    <!-- jquery -->
    <link href="https://cdn.jsdelivr.net/npm/jquery-resizable-columns@0.2.3/dist/jquery.resizableColumns.min.css"
    rel="stylesheet">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

    <!-- bootstrap select plugin -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css" />

    <!-- perfect-scrollbar used for bootstrap table pluging -->
    <link href="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.5/css/perfect-scrollbar.min.css" rel="stylesheet">

    <!-- own styling -->
    <link rel="stylesheet" href="css/styles.css" />


    <title>DevOps Query Dashboard</title>
</head>
<body>
EOF;
require APP_ROOT_PATH . "/views/Base/Navbar.php";

?>