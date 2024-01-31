<?php
namespace Views;

require APP_ROOT_PATH . "/views/Base/BaseViewTemplate.php";
?>
<link rel="stylesheet" href="css/dashboardStyle.css" />

<div id="app">
    <h1>
        <?= $data['dashboard_name'] ?>
    </h1>

    <div class="query-container">
        <?php foreach ($data['dashboard_queries'] as $query): ?>
            <a href="<?= 'queries/' . $query->id; ?>" class="query-box">
                <?= $query->name; ?>
            </a>
        <?php endforeach; ?>
        <a href="#" class="query-box add-query">
            +
        </a>
    </div>
</div>




<!-- bootstrap js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>

<!-- bootstrap select plugin js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="js/home.js" type="module"></script>

</body>

</html>