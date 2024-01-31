<?php
namespace Views;

require APP_ROOT_PATH . "/views/Base/BaseViewTemplate.php";
?>




<div id="app">
    <h1>
        <?= $data['query_name'] ?>
    </h1>
    <p>
        <?= $data['query_wiql_string'] ?>
    </p>

    <ul class="nav nav-pills">
        <li class="active">
            <a data-toggle="pill" href="#results">Results</a>
        </li>
        <li><a data-toggle="pill" href="#editor">Editor</a></li>
    </ul>

    <div class="tab-content">
        <div id="results" class="tab-pane fade"></div>
        <div id="editor" class="tab-pane fade">
            <p>Type of query</p>
            <select id="slc_typeOfQuery" class="selectpicker">
                <option style="height: 30px;"
                    data-content="<img src='img/query-type-1.svg'/<span> Flat list of work items</span>">
                    <!-- content in here doesn't show when data-content -->
                </option>
                <option style="height: 30px;"
                    data-content="<img src='img/query-type-2.svg'><span> Work items and direct links</span>">
                    <!-- content in here doesn't show when data-content -->
                </option>
                <option style="height: 30px;"
                    data-content="<img src='img/query-type-3.svg'><span> Tree of work items</span>">
                    <!-- content in here doesn't show when data-content -->
                </option>
            </select>

            <select id="slc_projectForQueryEditSuggestions" class="selectpicker">
                <?php foreach ($data['all_projects'] as $project): ?>
                    <option>
                        <?= $project->projectName ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <p>Filters for top level work items</p>
            <div id="query-editor">
                <table id="query_edit_table" class="table table-borderless">
                    <thead>
                        <tr>
                            <th></th>
                            <th>
                                <button>
                                    <svg xmlns=" http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-lock" viewBox="0 0 16 16">
                                        <path
                                            d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1" />
                                    </svg>
                                </button>
                            </th>
                            <th>And/Or</th>
                            <th>
                                Field
                                <span style="color: red;">
                                    *
                                </span>
                            </th>
                            <th>Operator</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">
                                <div style="display: flex;">
                                    <button id="btn_addNewClause">
                                        <svg style="margin-right: 12px;" xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="#7FB800" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                                        </svg>

                                        <span style=" text-align: left; width:200px;">
                                            Add new clause
                                        </span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <br>
    Placeholder for results table
    <table id="results_table" data-toggle="table" data-show-columns="true" data-search="true" data-show-toggle="true"
        data-pagination="true" data-resizable="true">
        <thead>
            <tr>
                <th data-field="id" data-sortable="true">ID</th>
                <th data-field="name" data-sortable="true">Item Name</th>
                <th data-field="price" data-sortable="true">Item Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Item 1</td>
                <td>$1</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Item 2</td>
                <td>$2</td>
            </tr>
    </table>


    <link rel="stylesheet" href="css/query-edit.css" />


    <!-- ordering is important -->

    <!-- jQuery js -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- bootstrap js -->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

    <!-- bootstrap select plugin js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>


    <script type="module" src="js/QueryView.js"></script>


    </body>

    </html>