<!DOCTYPE html>
<html lang="en">

<head>
    <title>Products</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
        < script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js" >
    </script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>

    <div class="container mt-3">
        <h2>Product Form</h2>


        <form class="form-inline my-2">
            <input class="form-control w-40" id="search" type="search" placeholder="Search" aria-label="Search">
            <br>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <br>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productmodal">
            Add Product
        </button>

        <!-- ADD Modal -->
        <div class="modal fade" id="productmodal" tabindex="-1" aria-labelledby="productmodalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productmodalLabel">Product Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <ul id="save_msgList"></ul>

                    <div class="modal-body">
                        <h2>Add Products Details</h2>

                        <div class="form-group mb-3">
                            <label for="club_id">Club Id:</label>
                            <input type="number" class="form-control" id="club_id" name="club_id">
                        </div>
                        <div class="form-group mb-3">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Title"
                                name="title">
                        </div>
                        <div class="form-group mb-3">
                            <label for="product_title">Product Title:</label>
                            <input type="text" class="form-control" id="product_title"
                                placeholder="Enter product_title" name="product_title">
                        </div>
                        <div class="form-group mb-3">
                            <label for="type">Type:</label>
                            <input type="text" class="form-control" id="type" placeholder="Enter type"
                                name="type">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary add_product" id="addproduct">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editmodalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit & Update Product Data</h5>
                        </div>
                    </div>

                    <form id="contact-form" class="edit-form" method="POST">
                        @csrf
                        <div class="modal-body">
                            <ul id="update_msgList"></ul>

                            <input type="hidden" id="id" />

                            <div class="form-group mb-3">
                                <label for="club_id">Prodcut Id:</label>
                                <input type="number" class="form-control" readonly id="product_id_edit"
                                    name="product_id_edit" value="">
                            </div>
                            <div class="form-group mb-3">
                                <label for="club_id">Club Id:</label>
                                <input type="number" class="form-control" id="club_id_edit" name="club_id_edit"
                                    value="">
                            </div>
                            <div class="form-group mb-3">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title_edit" name="title_edit"
                                    value="">
                            </div>
                            <div class="form-group mb-3">
                                <label for="product_title">Product Title:</label>
                                <input type="text" class="form-control" id="product_title_edit"
                                    name="product_title_edit" value="">
                            </div>
                            <div class="form-group mb-3">
                                <label for="type">Type:</label>
                                <input type="text" class="form-control" id="type_edit" name="type_edit"
                                    value="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary update_product">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Product Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Confirm to Delete Data ?</h4>
                    <input type="hidden" id="deleteing_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete_product">Yes Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">

                <div id="success_message"></div>

                <div class="card">
                    <div class="card-header">
                        <h4>
                            Product Data
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Club_id</th>
                                    <th>Title</th>
                                    <th>Product Title</th>
                                    <th>Type</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            fetchproduct();

            function fetchproduct() {
                $.ajax({
                    type: "GET",
                    url: "/fetch-product",
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        $('tbody').html("");
                        $.each(response.products, function(key, item) {
                            $('tbody').append('<tr>\
                                        <td>' + item.id + '</td>\
                                        <td>' + item.club_id + '</td>\
                                        <td>' + item.title + '</td>\
                                        <td>' + item.product_title + '</td>\
                                         <td>' + item.type + '</td>\
                                        <td><button type="button" value="' + item.id + '" class="btn btn-primary editbtn btn-sm">Edit</button></td>\
                                        <td><button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
                                        \</tr>');
                        });

                    }
                });
            }

            $(document).on('click', '.add_product', function(e) {
                e.preventDefault();
                $(this).text("Adding Data..");

                var product_data = {
                    'club_id': $('#club_id').val(),
                    'title': $('#title').val(),
                    'product_title': $('#product_title').val(),
                    'type': $('#type').val(),
                }
                console.log(product_data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/products",
                    data: product_data,
                    response: 'not get data',
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 400) {
                            $('#save_msgList').html("");
                            $('#save_msgList').addClass('alert alert-danger');
                            $.each(response.errors, function(key, err_value) {
                                $('#save_msgList').append('<li>' + err_value + '</li>');
                            });
                            $('.add_product').text('Save');
                        } else {
                            $('#save_msgList').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#productmodal').find('input').val('');
                            $('.add_product').text('Save');
                            $('#productmodal').modal('hide');
                            fetchproduct();
                        }
                    }
                });


            });

            $(document).on('click', '.editbtn', function(e) {
                e.preventDefault();

                var product_id = $(this).val();
                $('#editmodal').modal('show');
                alert(product_id)

                $.ajax({
                    method: "GET",
                    url: `/edit-product/${product_id}`,
                    datatypr: "json",
                    success: function(response) {
                        console.log(response.Data);
                        $('#product_id_edit').val(response.Data.id);
                        $('#club_id_edit').val(response.Data.club_id);
                        $('#title_edit').val(response.Data.title);
                        $('#product_title_edit').val(response.Data.product_title);
                        $('#type_edit').val(response.Data.type);

                    }
                });
            });

            $(document).on('submit', '#edit-form', function(e) {
                e.preventDefault();
                $(this).text('Updating..');
                var id = $('#id').val();
                // alert(id);

                var product_data = {
                    'club_id': $('#club_id_edit').val(),
                    'title': $('#title_edit').val(),
                    'product_title': $('#product_title_edit').val(),
                    'type': $('#type_edit').val(),
                }
                console.log(product_data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: "/update-product/" + id,
                    data: product_data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            $('#update_msgList').html("");
                            $('#update_msgList').addClass('alert alert-danger');
                            $.each(response.errors, function(key, err_value) {
                                $('#update_msgList').append('<li>' + err_value +
                                    '</li>');
                            });
                            $('.update_product').text('Update');
                        } else {
                            $('#update_msgList').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#editModal').find('input').val('');
                            $('.update_product').text('Update');
                            $('#editModal').modal('hide');
                            fetchproduct();
                        }
                    }
                });

            });


            $(document).on('click', '.deletebtn', function() {
                var id = $(this).val();
                $('#DeleteModal').modal('show');
                $('#deleteing_id').val(id);
            });

            $(document).on('click', '.delete_product', function(e) {
                e.preventDefault();

                $(this).text('Deleting..');
                var id = $('#deleteing_id').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "DELETE",
                    url: "/delete-product/" + id,
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 404) {
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_product').text('Yes Delete');
                        } else {
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_product').text('Yes Delete');
                            $('#DeleteModal').modal('hide');
                            fetchproduct();
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>
