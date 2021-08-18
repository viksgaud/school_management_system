<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>School Management System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>


    <div class="container-fluid">
        <div class="row wrapper min-vh-100 flex-column flex-sm-row">
            <aside class="col-12 col-xl-3 p-0 bg-dark flex-shrink-1">
                <nav class="navbar navbar-expand-xl navbar-dark bg-dark align-items-start flex-sm-column flex-row">
                    <a class="navbar-brand" href="#"><i class="fas fa-users-cog"></i> Admin</a>
                    <a href class="navbar-toggler" data-toggle="collapse" data-target=".sidebar">
                        <span class="navbar-toggler-icon"></span>
                    </a>
                    <div class="collapse navbar-collapse sidebar">
                        <ul class="flex-column navbar-nav w-100 justify-content-between">
                            <li class="nav-item">
                                <a class="nav-link pl-0" href="<?php echo base_url(); ?>admin/student_cl"><i
                                        class="fas fa-user-graduate"></i> <span class=""> Manage Student</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-0" href="<?php echo base_url(); ?>admin/subject_cl"><i
                                        class="fa fa-book fa-fw"></i> <span class="">Manage Subject</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-0" href="<?php echo base_url(); ?>admin/class_cl"><i
                                        class="fa fa-book fa-fw"></i> <span class="">Manage Class</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-0" href="<?php echo base_url(); ?>admin/teacher_cl"><i
                                        class="fas fa-chalkboard-teacher"></i> <span class="">Teacher</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-0" href="<?php echo base_url(); ?>admin/ast_cl"><i
                                        class="fas fa-address-card"></i> <span class="">Assign Subject To
                                        Class</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-0" href="<?php echo base_url(); ?>admin/result_cl"><i
                                        class="fas fa-poll-h"></i> <span class="">Add Result</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-0" href="<?php echo base_url(); ?>admin/student_result_cl"><i
                                        class="far fa-eye"></i> <span class="">View Result</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-0" href="<?php echo base_url(); ?>admin/login_cl/logout"><i
                                        class="fas fa-chalkboard-teacher"></i> <span class="">Logout</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </aside>
            <main class="col bg-faded py-3">
                <div class="container">
                    <h2 class="text-center" style="margin-top: 10px;">School Managment System</a></h2>
                    <h2 class="text-center" style="margin-top: 10px;">Class</a></h2>
                    <br>
                    <br>


                    <div class="alert alert-success " style="display:none;">
                        <span id="res_message"></span>
                    </div>


                    <!-- Trigger the modal with a button -->


                    <!-- Modal -->
                    <div class="modal fade userModal" id="myModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- <form action="" method="post" id="user_form"> -->
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Student</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form id="myForm" method="post" action="" class="form-horizontal">
                                        <input type="hidden" name="txtId" value="0">
                                        <div class="form-group">
                                            <label for="class">Class</label>
                                            <input type="text" name="className" class="form-control"
                                                placeholder="Please enter Class number" required />
                                        </div>
                                      
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <div class="form-group">
                                        <button type="button" id="btnSave" class="btn btn-success">Submit</button>
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>


                    <div class="modal fade deleteModal" id="deleteModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- <form action="" method="post" id="user_form"> -->
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Confirm Delete</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <div class="modal-body">
                                    Do you want to delete this record?
                                </div>
                                <div class="modal-footer">

                                    <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>

                            </div>


                        </div>
                    </div>


                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Class</th>

                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody id="showData">

                        </tbody>
                    </table>

                    <div class="text-center">
                        <button type="button" id="add_button" class="btn btn-info btn-lg add_button"
                            data-toggle="modal">Add
                            Class</button>
                    </div>

                </div>
            </main>


            <script>
            $(document).ready(function() {
                // event.preventDefault();
                showAllData();

                $('#add_button').click(function() {

                    $('#myModal').modal('show');
                    $('#myModal').find('.modal-title').text("Add Class");
                    $('#myForm').attr('action',
                        '<?php echo base_url(); ?>admin/Class_cl/insertData');


                });

                $('#btnSave').click(function() {

                    var url = $('#myForm').attr('action');

                    var data = $('#myForm').serialize();
                    var className = $('input[name=className]');
                    var sub = $('input[name=subject]');

                    var result = '';

                    if (className.val() == '' || sub.val() == '') {
                        result = 0;
                    } else {
                        result = 1;
                    }
                    if (result == 1) {

                        $.ajax({
                            type: 'ajax',
                            method: 'post',
                            url: url,
                            data: data,
                            asynk: false,
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    $('#myModal').modal('hide');
                                    $('#myForm')[0].reset();

                                    if (response.type == 'add') {
                                        var type = 'added'
                                    } else if (response.type == 'update') {
                                        var type = 'updated'
                                    }
                                    $('.alert-success').html('Class ' + type +
                                            ' Successfully!!')
                                        .fadeIn()
                                        .delay(4000).fadeOut('slow');
                                    showAllData();
                                } else {
                                    alert(error);
                                }
                            },
                            error: function() {
                                alert('Not Added');
                                // $('.alert-success').html(result.type);
                            }
                        })
                    }

                });

                // showAllData();

                function showAllData() {

                    $.ajax({
                        url: '<?php echo base_url(); ?>admin/Class_cl/showData',
                        type: "ajax",
                        asynk: false,
                        dataType: 'json',
                        success: function(response) {
                            var html = '';
                            var i;
                            for (i = 0; i < response.length; i++) {
                                $('#showData').html(
                                    html +=
                                    '<tr>' +
                                    '<td>' + response[i].id + '</td>' +
                                    '<td>' + response[i].className + '</td>' +



                                    '<td>' +
                                    '<a href="javascript:;" class="btn btn-primary edit" data="' +
                                    response[i].id + '">Edit</td>' +
                                    '<td>' +
                                    '<a href="javascript:;" class="btn btn-danger delete" data="' +
                                    response[i].id + '">Delete</td>' +
                                    '</tr>');
                            }
                        },
                        error: function() {
                            $('.alert-success').html(response.type);
                        }
                    })
                }

                $('#showData').on('click', '.edit', function() {

                    var id = $(this).attr('data');

                    $.ajax({
                        url: '<?php echo base_url(); ?>admin/Class_cl/showSubject',
                        type: 'ajax',
                        asynk: false,
                        dataType: 'json',
                        success: function(data) {
                            var html = '';
                            var i;

                            for (i = 0; i < data.length; i++) {

                                html +=

                                    '<option>' + data[i].subjectName + '</option>';


                                $('input[name=txtSub]').val(data[i].id);
                            };
                            $('#find_class').append(html);

                        },
                        error: function(data) {
                            alert('Not Added');
                            $('.alert-success').html(data.type);
                        }
                    })

                    $('#myModal').modal('show');
                    $('#myModal').find('.modal-title').text("Edit Class");
                    $('#myForm').attr('action',
                        '<?php echo base_url(); ?>admin/Class_cl/updateData');

                    $.ajax({
                        url: '<?php echo base_url(); ?>admin/Class_cl/editData',
                        type: 'ajax',
                        method: 'get',
                        data: {
                            id: id
                        },
                        asynk: false,
                        dataType: 'json',
                        success: function(data) {

                            $('input[name=className]').val(data.className);
                            $('input[name=sub_1]').val(data.subject_1);
                            $('input[name=sub_2]').val(data.subject_2);
                            $('input[name=sub_3]').val(data.subject_3);
                            $('input[name=sub_4]').val(data.subject_4);
                            $('input[name=sub_5]').val(data.subject_5);
                            $('input[name=sub_6]').val(data.subject_6);
                            $('input[name=txtId]').val(data.id);

                        },
                        error: function(data) {
                            alert('Not Added');
                            $('.alert-success').html(data.type);
                        }
                    })
                });


                $('#showData').on('click', '.delete', function() {

                    var id = $(this).attr('data');

                    $('#deleteModal').modal('show');
                    // $('#myModal').find('.modal-title').text("Updata Student");
                    // $('#myModal').attr('action', '<?php echo base_url(); ?>index.php/Ajax_test/updataData');

                    $('#btnDelete').unbind().click(function() {
                        $.ajax({
                            url: '<?php echo base_url(); ?>admin/Class_cl/deleteData',
                            type: 'ajax',
                            method: 'get',
                            data: {
                                id: id
                            },
                            asynk: false,
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    $('#deleteModal').modal('hide');
                                    $('.alert-success').html(
                                            'Employee Deleted Success')
                                        .fadeIn()
                                        .delay(4000).fadeOut('slow');
                                    showAllData();
                                } else {
                                    alert('Error');
                                }

                            },
                            error: function(response) {
                                alert('Not Deleted');
                                $('.alert-success').html(response.type);
                            }
                        });
                    });
                })



            });
            </script>





</body>

</html>