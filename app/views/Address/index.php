<?php
namespace Views;

require APP_ROOT_PATH . "/views/Base/BaseViewTemplate.php";
?>
<link rel="stylesheet" href="css/dashboardStyle.css" />
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.2/dist/bootstrap-table.min.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.22.2/extensions/fixed-columns/bootstrap-table-fixed-columns.min.css"
    integrity="sha512-XFIp0DIxpu4RzEDrgcgzXkar9u9ROfgY/MVOGuqqSysXNuPUZI+FhG/9Vme+0jn1JCSqajzBJQTVRJfaE7W1jA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<div id="app">

    <div class="container mt-5">
        <table id="table" class="table table-striped" data-toggle="table" data-pagination="true" data-search="true"
            data-show-columns="true" data-fixed-columns="true" data-fixed-number="1" data-fixed-right-number="1"
            data-page-size="5" data-page-list="[5, 10, 25]">
            <thead>
                <tr>
                    <th data-sortable="true" scope="col">#</th>
                    <th data-sortable="true" scope="col">Profile Picture</th>
                    <th data-sortable="true" scope="col">First Name</th>
                    <th data-sortable="true" scope="col">Last Name</th>
                    <th data-sortable="true" scope="col">Street</th>
                    <th data-sortable="true" scope="col">Street Number</th>
                    <th data-sortable="true" scope="col">Apartment Number</th>
                    <th data-sortable="true" scope="col">City</th>
                    <th data-sortable="true" scope="col">State</th>
                    <th data-sortable="true" scope="col">Zip Code</th>
                    <th data-sortable="true" scope="col">Country</th>
                    <th data-sortable="true" scope="col">Created At</th>
                    <th data-sortable="true" scope="col">Updated At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['addresses'] as $address): ?>
                    <tr data-id="<?= $address->id ?>">
                        <td>
                            <?= $address->id ?>
                        </td>
                        <td width><img src="<?= $address->profile_picture ?>" alt="Profile Picture" class="img-thumbnail"
                                style="width: 100px; height: 100px;"></td>
                        <td><input type="text" disabled="true" class="form-control" name="first_name"
                                value="<?= $address->first_name ?>"></td>
                        <td><input type="text" disabled="true" class="form-control" name="last_name"
                                value="<?= $address->last_name ?>"></td>
                        <td><input type="text" disabled="true" class="form-control" name="street"
                                value="<?= $address->street ?>"></td>
                        <td><input type="text" disabled="true" class="form-control" name="street_number"
                                value="<?= $address->street_number ?>"></td>
                        <td><input type="text" disabled="true" class="form-control" name="apartment_number"
                                value="<?= $address->apartment_number ?>"></td>
                        <td><input type="text" disabled="true" class="form-control" name="city"
                                value="<?= $address->city ?>"></td>
                        <td><input type="text" disabled="true" class="form-control" name="state"
                                value="<?= $address->state ?>"></td>
                        <td><input type="text" disabled="true" class="form-control" name="zip_code"
                                value="<?= $address->zip_code ?>"></td>
                        <td><input type="text" disabled="true" class="form-control" name="country"
                                value="<?= $address->country ?>"></td>
                        <td><input type="text" disabled="true" class="form-control" name="created_at"
                                value="<?= $address->created_at ?>"></td>
                        <td><input type="text" disabled="true" class="form-control" name="updated_at"
                                value="<?= $address->updated_at ?>"></td>
                        <td>
                            <div class="dropdown">
                                <button id="button-row-tools" class="btn btn-secondary dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    ...
                                </button>
                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item edit-button" href="javascript:void(0)">Edit</a>
                                    <a class="dropdown-item delete-button" href="javascript:void(0)">Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button id="add-row" class="btn btn-primary">Add New Row</button>

    </div>
    <!-- put code here! -->

</div>

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
<script src="https://unpkg.com/bootstrap-table@1.22.2/dist/bootstrap-table.min.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.22.2/extensions/fixed-columns/bootstrap-table-fixed-columns.min.js"
    integrity="sha512-d8GA7rAp73ZuYs7vIg6T5iUde0TdWsFNPbIZwL739ejnEbHxeMZTe7xYoT3wkae6ZRy++FuY0IevSVMqqJGS4A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>


    $(document).ready(function () {
        let currentlyEditing = null;
        const url = `${document.querySelector("base").getAttribute("href")}`;

        $(document).on('click', function (e) {
            console.log('click');

            if (!$(e.target).closest('.dropdown').length) {
                // for each dropdown-menu with a parent data attribute
                $('.dropdown-menu').each(function () {
                    let $this = $(this);
                    if ($this.data('parent')) {
                        $this.hide().appendTo($this.data('parent'));
                        $this.data('parent', '');
                    }
                });
            }

            if (currentlyEditing && !($(currentlyEditing[0]).data('id') == $(e.target).attr('data-rowid'))) {
                currentlyEditing.find('.form-control').each(function () {
                    // Make the field uneditable
                    $(this).prop('disabled', true);
                });

                currentlyEditing = null;
            }
        });

        $('.dropdown-toggle').on('click', function (e) {
            debugger;
            e.stopPropagation()

            if ($(this).next('.dropdown-menu').length === 0 || currentlyEditing) {
                console.log('dropdown-toggle clicked');
                $(document).trigger('click', e);
            }
            if (currentlyEditing) {
                return;
            }

            let id = $(this).closest('tr').data('id');
            let offset = $(this).offset();
            $('.dropdown-menu').hide(); // Hide any other visible dropdowns
            let $dropdown = $(this).next('.dropdown-menu');

            $dropdown.children().attr('data-rowid', id);
            $dropdown.data('parent', $dropdown.parent()); // Store the parent
            $dropdown.detach().appendTo('body');
            $dropdown.css({
                'display': 'block',
                'top': offset.top + $(this).outerHeight(),
                'left': offset.left
            });
        });


        $('.form-control').on('blur', function () {
            let id = $(this).closest('tr').data('id');
            let field = $(this).attr('name');
            let value = $(this).val();

            $.ajax({
                url: `${url}/address/store`,
                type: 'POST',
                data: {
                    id: id,
                    field: field,
                    value: value
                },
                success: function (response) {
                    console.log(response);
                    // Handle the response from the server
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown); url
                    // Handle any errors
                }
            });
        });

        $('#add-row').on('click', function () {
            $.get(`${url}/address/create`, function (data, status) {
                if (status == 'success') {
                    location.reload();
                }
                else if (status == 'error') {
                    alert('Error adding address');
                }
            });
        });

        $('.delete-button').on('click', function (e) {
            let id = $(this).attr('data-rowid');

            e.preventDefault();

            $.post(`${url}/address/delete`, { id: id }, function (data, status) {
                if (status == 'success') {
                    location.reload();
                }
                else if (status == 'error') {
                    alert('Error deleting address');
                }
            });
        });

        $('.edit-button').on('click', function (e) {

            let id = $(this).attr('data-rowid');
            e.preventDefault();
            // find row using the id
            let $row = $('.table').find(`[data-id=${id}]`);
            $row.find('.form-control').each(function () {
                // Make the field editable
                $(this).prop('disabled', false);
            });

            currentlyEditing = $row;
        });


    });

</script>

<style>
    #table {
        overflow: visible !important;
    }

    input[disabled] {
        pointer-events: none
    }

    /* style for disabled form control */
    .form-control:disabled {
        background: none;
        border: none;
        outline: none;
    }

    td {
        width: fit-content !important;
    }
</style>

</body>

</html>