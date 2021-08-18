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
                    <h2 class="text-center" style="margin-top: 10px;">Add Result</a></h2>
                    <br>
                    <br>


                    <div class="alert alert-success " style="display:none;">
                        <span id="res_message"></span>
                    </div>

                    <form id="myForm" method="post" action="" class="form-horizontal">
                        <input type="hidden" name="txtId" value="0">
                        <div class="form-group">
                            <label for="class">Class</label>
                            <select class="form-control" id="find_class" name="className" required>
                                <option value="" disabled selected>Select class</option>

                            </select>
                        </div>
                        <div class="form-group">

                            <label for="">Student</label>
                            <select class="form-control" id="find_std" name="studentName" required>
                                <option value="" disabled selected name="option">Select Student</option>

                            </select>
                        </div>

                        <div id="subject">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Subject</label><br>
                                <!-- <input type="hidden" name="subject_id" value="0"> -->

                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" id="btnSave" class="btn btn-success">Submit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>


                    </form>
                </div>
            </main>


            <script>
            $(document).ready(function() {
                // event.preventDefault();
                showAllData();
                showFormData();



                function showFormData() {

                    $.ajax({
                        url: '<?php echo base_url(); ?>admin/Result_cl/showClass',
                        type: 'ajax',
                        asynk: false,
                        dataType: 'json',
                        success: function(data) {

                            var class_s = '';
                            var i;

                            for (i = 0; i < data.length; i++) {
                                class_s += '<option value="' + data[i].id + '">' + data[i]
                                    .className +
                                    '</option>'
                            }
                            $('#find_class').html(
                                '<option value="" disabled selected>Select Class</option>' +
                                class_s
                            );

                        },
                        error: function(data) {
                            alert('Not Added');
                            $('.alert-success').html(data.type);
                        }
                    })
                }

                $('#find_class').on('change', function() {

                    $('#subject').show();
                    var id = $('#find_class').val();
                    // alert(id);

                    $.ajax({
                        url: '<?php echo base_url(); ?>admin/Result_cl/showStudent',
                        type: 'ajax',
                        method: 'get',
                        data: {
                            id: id
                        },
                        asynk: false,
                        dataType: 'json',
                        success: function(data) {

                            var class_s = '';
                            var i;

                            for (i = 0; i < data.length; i++) {
                                class_s += '<option value="' + data[i].id + '">' + data[i]
                                    .name +
                                    '</option>'
                            }
                            $('#find_std').html(
                                '<option value="" disabled selected>Select Student</option>' +
                                class_s);

                        },
                        error: function(data) {
                            alert('Not Added');
                            $('.alert-success').html(data.type);
                        }
                    })
                    $.ajax({
                        url: '<?php echo base_url(); ?>admin/Result_cl/showSubject',
                        type: 'ajax',
                        method: 'get',
                        data: {
                            id: id
                        },
                        asynk: false,
                        dataType: 'json',
                        success: function(data) {

                            var class_s = '';
                            var i;
                            // var m;

                            for (i = 0; i < data.length; i++) {

                                class_s +=

                                    '<label>' + data[i].subjectName +
                                    '</label><input type="hidden" name="sub_ids_' + i +
                                    '" id="sub_ids_' + i + '" value="' + data[i].subjectid +
                                    '">' +
                                    '<input type="text" name="marks' + i +
                                    '" class="form-control" placeholder="Enter Marks" required /><br />';
                                $('input[name=className').val()
                            }
                            if (class_s == 0) {
                                $('#subject').html(
                                    '<label class="text-danger">Please Assign the Subjects to Class</label><br><br>'
                                );
                                alert("Please Assign the Subjects to Class");

                            } else {
                                $('#subject').html(
                                    '<label>Enter Subjects Marks</label><br>' +
                                    class_s);
                            }

                        },
                        error: function(data) {
                            alert('Not Added');
                            $('.alert-success').html(data.type);
                        }
                    })

                });

               

                $('#assignBtn').click(function() {

                    location.window.href = "<?php echo base_url(); ?>admin/ast_cl";

                });
                $('#btnSave').click(function() {

                    var url = $('#myForm').attr('action');

                    var data = $('#myForm').serialize();


                    $.ajax({
                        type: 'ajax',
                        method: 'post',
                        url: '<?php echo base_url(); ?>admin/Result_cl/insertData',
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
                                $('.alert-success').html('Student Result' + type +
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
                    // }

                });

                function showAllData() {
                    $('#subject').hide();
                    $.ajax({
                        url: '<?php echo base_url(); ?>admin/Result_cl/showData',
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
                                    '<td>' + response[i].name + '</td>' +
                                    '<td>' + response[i].class + '</td>' +
                                    '<td>' + response[i].email + '</td>' +
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



            });
            </script>
</body>

</html>