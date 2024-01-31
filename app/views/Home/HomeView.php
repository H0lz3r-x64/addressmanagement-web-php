<?php
namespace Views;

require APP_ROOT_PATH . "/views/Base/BaseViewTemplate.php";
?>
<link rel="stylesheet" href="css/dashboardStyle.css" />

<div id="app">
    <h1>All Dashboards</h1>

    <i>ux to select dashboard is subject to change</i>

    <div class="query-container">
        <?php foreach ($data['dashboards'] as $dashboard): ?>
            <a href="<?= 'dashboards/' . $dashboard->name ?>" class="query-box">
                <?= $dashboard->name; ?>
            </a>
        <?php endforeach; ?>
        <div class="query-box add-query">
            +
        </div>
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
</body>

</html>