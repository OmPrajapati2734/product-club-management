<!DOCTYPE html>
<html lang="en">

<head>
    <title>Clubs</title>
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
    </style>
</head>

<body>
    <div class="container-fluid">
        <h2>Club Form</h2>
        <br>
        <!-- Button trigger modal -->

        <form class="form-inline my-2">
            <input class="form-control w-40" id="search" type="search" placeholder="Search" aria-label="Search">
            <br>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <br> 
        <button type="button" class="btn btn-primary align-item-right" data-bs-toggle="modal"
            data-bs-target="#clubmodal">
            Add Club
        </button>
        <br>
        <div class="modal fade" id="clubmodal" tabindex="-1" aria-labelledby="addclubmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addModalLabel">Add Club Data</h5>

                        </div>
                    </div>

                    <div class="modal-body">
                        <ul id="save_msgList"></ul>

                        <div class="mb-3 mt-3">
                            <label for="group_id">Group Id:</label>
                            <input type="number" class="form-control" id="group_id" name="group_id" value="">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="business_name">Business Name:</label>
                            <input type="text" class="form-control" id="business_name"
                                placeholder="Enter business_name" name="business_name" value=""
                                autocomplete="off">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="club_name">Club Name:</label>
                            <input type="text" class="form-control" id="club_name" placeholder="Enter club_name"
                                name="club_name" value="">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="club_number">Club Number:</label>
                                    <input type="number" class="form-control" id="club_number"
                                        placeholder="Enter club_number" name="club_number" value="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3 ">
                                    <label for="club_state">Club State:</label>
                                    <input type="text" class="form-control" id="club_state"
                                        placeholder="Enter club_state" name="club_state" value="">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="club_description">Club Description:</label>
                            <input type="text" class="form-control" id="club_description"
                                placeholder="Enter club_state" name="club_description" value="">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="club_slug">Club Slug:</label>
                                    <input type="text" class="form-control" id="club_slug"
                                        placeholder="Enter club_slug" name="club_slug" value="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="website_title">Web site Title:</label>
                                    <input type="text" class="form-control" id="website_title"
                                        placeholder="Enter website_title" name="website_title" value="">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="website_link">Website Link:</label>
                            <input type="text" class="form-control" id="website_link"
                                placeholder="Enter club_slug" name="website_link" value="">
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="club_logo">Club Logo:</label>
                                <input type="file" class="form-control" accept=".png, .jpeg, .jpg" id="club_logo"
                                    placeholder="Enter club_logo" name="club_logo" value="">
                            </div>
                            <div class="col">
                                <label for="club_banner">Club Banner:</label>
                                <input type="file" class="form-control" accept=".png, .jpeg, .jpg"
                                    id="club_banner" placeholder="Enter club_banner" name="club_banner"
                                    value="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="Add_club" class="btn btn-primary Add_club">Save Changes</button>
                    </div>

                </div>
            </div>
        </div>
        <br>

        <!-- edit --!>

          <div class="modal fade" id="editclubmodal" tabindex="-1" aria-labelledby="editclubmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Club Data</h5>
                        </div>
                    </div>

                    <div class="modal-body">
                        <ul id="update_msgList"></ul>

                        
                        <div class="mb-3 mt-3">
                            <label for="club_id">Club Id:</label>
                            <input type="number" class="form-control" id="c_id" name="c_id" readonly value="">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="group_id">Group Id:</label>
                            <input type="number" class="form-control" id="group_id_edit" name="group_id_edit" value="">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="business_name">Business Name:</label>
                            <input type="text" class="form-control" id="business_name_edit"
                                placeholder="Enter business_name" name="business_name_edit" value=""
                                autocomplete="off">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="club_name">Club Name:</label>
                            <input type="text" class="form-control" id="club_name_edit" placeholder="Enter club_name"
                                name="club_name_edit" value="">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="club_number">Club Number:</label>
                                    <input type="number" class="form-control" id="club_number_edit"
                                        placeholder="Enter club_number" name="club_number_edit" value="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3 ">
                                    <label for="club_state">Club State:</label>
                                    <input type="text" class="form-control" id="club_state_edit"
                                        placeholder="Enter club_state" name="club_state_edit" value="">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="club_description">Club Description:</label>
                            <input type="text" class="form-control" id="club_description_edit"
                                placeholder="Enter club_state" name="club_description_edit" value="">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="club_slug">Club Slug:</label>
                                    <input type="text" class="form-control" id="club_slug_edit"
                                        placeholder="Enter club_slug" name="club_slug_edit" value="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="website_title">Web site Title:</label>
                                    <input type="text" class="form-control" id="website_title_edit"
                                        placeholder="Enter website_title" name="website_title_edit" value="">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="website_link">Website Link:</label>
                            <input type="text" class="form-control" id="website_link_edit"
                                placeholder="Enter club_slug" name="website_link_edit" value="">
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="club_logo">Club Logo:</label>
                                <input type="file" class="form-control" accept=".png, .jpeg, .jpg" id="club_logo_edit"
                                    placeholder="Enter club_logo_edit" name="club_logo_edit" value="">
                            </div>
                            <div class="col">
                                <label for="club_banner">Club Banner:</label>
                                <input type="file" class="form-control" accept=".png, .jpeg, .jpg"
                                    id="club_banner_edit" placeholder="Enter club_banner" name="club_banner_edit"
                                    value="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="update_club" class="btn btn-primary update_club">Update</button>
                    </div>

                </div>
            </div>
        </div>


        <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DeleteModalLabel">Delete Product Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Confirm to Delete Data ?</h4>
                    <input type="hidden" id="deleteing_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete_club">Yes Delete</button>
                </div>
            </div>
        </div>
    </div>
    
        <div class="row">
            <div class="col-md-12">

                <div id="success_message"></div>

                <div class="card">
                    <div class="card-header">
                        <h4>
                            Club Data

                        </h4>
                       
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>group_id</th>
                                    <th>business_name</th>
                                    <th>club_number</th>
                                    <th>club_name</th>
                                    <th>club_state</th>
                                    <th>club_description</th>
                                    <th>club_slug</th>
                                    <th>website_title</th>
                                    <th>website_link</th>
                                    <th>club_logo</th>
                                    <th>club_banner</th>
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
    <script>
        $(document).ready(function() {


            fetchclub();

            function fetchclub() {
                $.ajax({
                    type: "GET",
                    url: "/fetch-club",
                    dataType: "json",
                    success: function(clubs) {
                        console.log(clubs);
                        $('tbody').html("");
                        $.each(clubs.clubs, function(key, item) {
                            $('tbody').append('<tr>\
                                                        <td>' + item.id + '</td> \
                                                        <td>' + item.group_id + '</td>\
                                                        <td>' + item.business_name + '</td>\
                                                        <td>' + item.club_number + '</td>\
                                                         <td>' + item.club_name + '</td>\
                                                         <td>' + item.club_state + '</td>\
                                                         <td>' + item.club_description + '</td>\
                                                         <td>' + item.club_slug + '</td>\
                                                         <td>' + item.website_title + '</td>\
                                                         <td>' + item.website_link + '</td>\
                                                         <td>' + item.club_logo + '</td>\
                                                         <td>' + item.club_banner + '</td>\
                                                        <td><button type="button" value="' + item.id + '" id="editbtn" class="btn btn-primary editbtn btn-sm">Edit</button></td>\
                                                        <td><button type="button" value="' + item.id + '" id="deletebtn" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
                                                        \</tr>');
                        });
                    }
                });
            }


            $(document).on('click', '.Add_club', function(e) {
                e.preventDefault();
                $(this).text("Adding Data..");

                var club_data = {
                    'group_id': $('#group_id').val(),
                    'business_name': $('#business_name').val(),
                    'club_number': $('#club_number').val(),
                    'club_name': $('#club_name').val(),
                    'club_state': $('#club_state').val(),
                    'club_description': $('#club_description').val(),
                    'club_slug': $('#club_slug').val(),
                    'website_title': $('#website_title').val(),
                    'website_link': $('#website_link').val(),
                    'club_logo': $('#club_logo').val(),
                    'club_banner': $('#club_banner').val(),
                }
                console.log(club_data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/clubs",
                    data: club_data,
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 400) {
                            $('#save_msgList').html("");
                            $('#save_msgList').addClass('alert alert-danger');
                            $.each(response.errors, function(key, err_value) {
                                $('#save_msgList').append('<li>' + err_value + '</li>');
                            });
                            $('.Add_club').text('Save');
                        } else {
                            $('#save_msgList').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#clubmodal').find('input').val('');
                            $('.Add_club').text('Save');
                            $('#clubmodal').modal('hide');
                            fetchclub();
                        }
                    }
                });


            });


            $(document).on('click', '.editbtn', function(e) {
                e.preventDefault();

                var id = $(this).val();
                $('#editclubmodal').modal('show');
                alert(id)

                $.ajax({
                    method: "GET",
                    url: "/edit-club/" + id,
                    datatype: "json",
                    success: function(data) {
                        $('#c_id').val(data.id);
                        $('#group_id_edit').val(data.group_id);
                        $('#business_name_edit').val(data.business_name);
                        $('#club_name_edit').val(data.club_name);
                        $('#club_number_edit').val(data.club_number);
                        $('#club_state_edit').val(data.club_state);
                        $('#club_description_edit').val(data.club_description);
                        $('#club_slug_edit').val(data.club_slug);
                        $('#website_title_edit').val(data.website_title);
                        $('#website_link_edit').val(data.website_link);
                        // $('#club_logo_edit').val(files[0]);
                        // $('#club_banner_edit').val(files[1]);
                        console.log(data);
                    }
                });
            });

            $(document).on('click', '.update_club', function(e) {
                e.preventDefault();
                var id = $('#update_club').val();
                // $(this).text('Updating..');
                alert(id);

                var club_data = {
                    'id':$('#id').val(),
                    'group_id': $('#group_id_edit').val(),
                    'business_name': $('#business_name_edit').val(),
                    'club_number': $('#club_name_edit').val(),
                    'club_name': $('#club_number_edit').val(),
                    'club_state': $('#club_state_edit').val(),
                    'club_description': $('#club_description_edit').val(),
                    'club_slug': $('#club_slug_edit').val(),
                    'website_title': $('#website_title_edit').val(),
                    'website_link': $('#website_link_edit').val(),
                    'club_logo': $('#club_logo_edit').val(),
                    'club_banner': $('#club_banner_edit').val(),
                }
                console.log(club_data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var route="/update-club/" + id;
                $.ajax({
                    type: "POST",
                    url: route,
                    data: club_data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            $('#update_msgList').html("");
                            $('#update_msgList').addClass('alert alert-danger');
                            $.each(response.errors, function(key, err_value) {
                                $('#update_msgList').append('<li>' + err_value +
                                    '</li>');
                            });
                            $('.update_club').text('Update');
                        } else {
                            $('#update_msgList').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#editModal').find('input').val('');
                            $('.update_club').text('Update');
                            $('#editModal').modal('hide');
                            fetchclub();
                        }
                    }
                });
            });

            $(document).on('click', '.deletebtn', function() {
                var id = $(this).val();
                $('#DeleteModal').modal('show');
                $('#deleteing_id').val(id);
            });

            $(document).on('click', '.delete_club', function(e) {
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
                    url: "/delete-club/" + id,
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
                            $('.delete_club').text('Yes Delete');
                            $('#DeleteModal').modal('hide');
                            fetchclub();
                        }
                    }
                });
            });

            $('#search').on('keyup', function() {
                $value = $(this).val();

                $.ajax({
                    type: 'GET',
                    url: "/search",
                    data: {
                        'search': $value
                    },
                    success: function(data) {
                        console.log(data);
                        $('tbody').hide();
                    }
                })
            })
        });
    </script>
</body>
</html>
