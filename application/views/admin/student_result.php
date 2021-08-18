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
                    <h2 class="text-center" style="margin-top: 10px;">View Result</a></h2>
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
                            <button type="button" id="btnSave" class="btn btn-success">View Result</button>
                        </div>


                    </form>


                    <div class="modal fade myResult" id="myResult" role="dialog">
                        <div class="modal-dialog">
                            <!-- <form action="" method="post" id="user_form"> -->
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Your Result</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <div class="modal-body">
                                    <table class="table table-bordered">

                                        <thead>
                                            <h4 class="std_name"></h4>
                                            <tr>

                                                <th scope="col">Subjects</th>
                                                <th scope="col">Marks</th>
                                                <th scope="col">Passing Marks</th>
                                                <th scope="col">Out Of Marks</th>


                                            </tr>
                                        </thead>
                                        <tbody id="showData">

                                        </tbody>
                                    </table>

                                    <div class="text-center" id="results"></div>
                                </div>
                                <div class="modal-footer">

                                    <!-- <button type="button" id="btnDelete" class="btn btn-danger">Delete</button> -->
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </main>




            <script>
            $(document).ready(function() {
                // event.preventDefault();
                showAllData();
                showFormData();



                function showFormData() {

                    $.ajax({
                        url: '<?php echo base_url(); ?>admin/student_result_cl/showClass',
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
                                class_s);

                        },
                        error: function(data) {
                            alert('Not Added');
                            $('.alert-success').html(data.type);
                        }
                    })
                }

                $('#find_class').on('change', function() {

                    // $('#subject').show();
                    var id = $('#find_class').val();
                    // alert(id);

                    $.ajax({
                        url: '<?php echo base_url(); ?>admin/student_result_cl/showStudent',
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
                                '<option value="" disabled selected>Select Class</option>' +
                                class_s);

                        },
                        error: function(data) {
                            alert('Not Added');
                            $('.alert-success').html(data.type);
                        }
                    })


                });




                $('#btnSave').click(function() {

                    // $('#myResult').modal('show');
                    var class_id = $('#find_class').val();
                    var student_id = $('#find_std').val();
                    var subjectId = [];


                    $.ajax({
                        url: '<?php echo base_url(); ?>admin/student_result_cl/showSubjectMarks',
                        type: 'ajax',
                        method: 'get',
                        data: {
                            // class_id: class_id,
                            student_id: student_id
                        },
                        asynk: false,
                        dataType: 'json',
                        success: function(response) {
                            var html = '';
                            var i;
                            var totalMarks = 0;
                            var totalPassingMarks = 0;
                            var totalOutofMarks = 0;
                            for (i = 0; i < response.length; i++) {

                                totalMarks += parseFloat(response[i].marks);
                                totalPassingMarks += parseFloat(response[i].passingMarks);
                                totalOutofMarks += parseFloat(response[i].outofMarks);

                                // subjectId += response[i].subject;


                                $('#showData').html(
                                    html +=
                                    '<tr>' +
                                    '<td>' + response[i].subjectName + '</td>' +
                                    '<td>' + response[i].marks + '</td>' +
                                    '<td>' + response[i].passingMarks + '</td>' +
                                    '<td>' + response[i].outofMarks + '</td>' +


                                    '</tr>');
                            };



                            if (html == 0) {
                                $('#myResult').modal('hide');
                                alert("Your result has not been released yet!!");

                            } else {
                                $('#myResult').modal('show');
                                var percentage = (totalMarks / totalOutofMarks) * 100;
                                $('#showData').append(
                                    '<tr>' +
                                    '<td><b>Total Marks</b></td>' +
                                    '<td><b>' + totalMarks + '</b></td>' +
                                    '<td><b>' + totalPassingMarks + '</b></td>' +
                                    '<td><b>' + totalOutofMarks + '</b></td>' +
                                    '</tr>'

                                );
                                $('#showData').append(
                                    '<tr>' +
                                    '<td class="text-center" colspan="4"><b>Your Percentage is : ' +
                                    percentage + ' %</b></td>' +
                                    '</tr>'

                                );
                                if (percentage >= 50) {
                                    // alert("you are pass");
                                    $('#results').html(
                                        "<b>Congratulations You are Pass!!!!</b>")
                                } else {
                                    // alert("you are failed");
                                    $('#results').html("<b>You are failed </b>")
                                   

                                }
                            }
                        },
                        error: function() {
                            $('.alert-success').html(response.type);
                        }
                    });


                    $.ajax({
                        url: '<?php echo base_url(); ?>admin/student_result_cl/myResultData',
                        type: 'ajax',
                        method: 'get',
                        data: {
                            // class_id: class_id,
                            student_id: student_id
                        },
                        asynk: false,
                        dataType: 'json',
                        success: function(response) {

                            // alert(response[0].name);
                            $('.std_name').text('Name: ' + response[0].name + '');


                        },
                        error: function() {
                            $('.alert-success').html(response.type);
                        }
                    });


                    $.ajax({
                        url: '<?php echo base_url(); ?>admin/student_result_cl/showSubject',
                        type: 'ajax',
                        method: 'get',
                        data: {
                            // class_id: class_id,
                            student_id: student_id
                        },
                        asynk: false,
                        dataType: 'json',
                        success: function(response) {

                            // alert(response[0].name);
                            $('.std_name').text('Name: ' + response[0].name + '');


                        },
                        error: function() {
                            $('.alert-success').html(response.type);
                        }
                    })


                });

                function showAllData() {
                    $('#subject').hide();

                }



            });
            </script>
</body>

</html>