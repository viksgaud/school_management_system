<!doctype html>
<html lang="en">

https://github.com/viksgaud/student_managment_system.git

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>School Management System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
    .global-container {
        height: 100%;
        width: 50%;
        margin: auto;
        display: flex;
        align-items: center;
        justify-content: center;
        /* background-color: #f5f5f5; */
    }

    @media screen and (max-width: 600px) {
        .global-container {
            height: 100%;
            width: 100%;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            /* background-color: #f5f5f5; */
        }
    }

    form {
        padding-top: 10px;
        font-size: 14px;
        margin-top: 30px;
    }

    .card-title {
        font-weight: 300;
    }

    .btn {
        font-size: 14px;
        margin-top: 20px;
    }


    .login-form {
        width: 100%;
        margin: 20px;
    }

    .sign-up {
        text-align: center;
        padding: 20px 0 0;
    }

    .alert {
        margin-bottom: -30px;
        font-size: 13px;
        margin-top: 20px;
    }
    </style>
</head>

<body>


    <div class="container" style="margin-top:100px;">
        <h2 class="text-center" style="margin-top: 10px;">School Managment System</a></h2>
        <h2 class="text-center" style="margin-top: 100px;">Please Login</a></h2>
        <br>
        <br>
        <div class="text-center" style="margin:0px;">
            <button type="button" class="btn btn-primary btn-lg" id="admin_l">Admin Login</button>
            <button type="button" class="btn btn-success btn-lg" id="student_l">Student Student</button>
        </div>
    </div>

    <div class="text-center " style="padding-top:40px;">


        <h3>Admin Login</h3>
        <h4>Username : admin<br>
            Password : admin</h4>


    </div>
    <div class="text-center " style="padding-top:20px;">

        <h3>Student Login</h3>
        <h4>Email : vikasgaud1138@gmail.com</h4>
        <h4>Roll No : 1001</h4>
    </div>


    <div class="modal fade" id="admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Admin Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="adminForm">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="email" class="form-control form-control-sm" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="username">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>

                            <input type="password" class="form-control form-control-sm" id="exampleInputPassword1"
                                name="password">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block" id="btnSaveAdmin">Sign in</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="student" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Student Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="studentForm">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control form-control-sm" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Roll No</label>
                            <input type="email" class="form-control form-control-sm" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="rollNo">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary btn-block" id="btnSaveStudent">Sign in</button>
                </div>
            </div>
        </div>
    </div>





    <script>
    $(document).ready(function() {

        $('#admin_l').click(function() {

            $('#admin').modal('show');

        });

        $('#student_l').click(function() {

            $('#student').modal('show');

        });



        $('#btnSaveAdmin').click(function() {

            var data = $('#adminForm').serialize();
            // alert(data);
            $.ajax({
                type: 'ajax',
                method: 'post',
                url: '<?php echo base_url(); ?>admin/Login_cl/loginAdmin',
                data: data,
                asynk: false,
                dataType: 'json',
                success: function(response) {

                    if (response.success) {
                        $('#admin').modal('hide');
                        window.location.href = "<?php echo base_url(); ?>admin/student_cl";

                    } else {
                        alert('Please Enter valid Username and Password');
                    }

                },
                error: function() {
                    alert('Not Added');
                    // $('.alert-success').html(result.type);
                }
            })
        });


        $('#btnSaveStudent').click(function() {

            var data = $('#studentForm').serialize();
            // alert(data);
            $.ajax({
                type: 'ajax',
                method: 'post',
                url: '<?php echo base_url(); ?>student/student_cl/loginStudent',
                data: data,
                asynk: false,
                dataType: 'json',
                success: function(response) {

                    if (response.success) {
                        $('#student').modal('hide');
                        window.location.href =
                            "<?php echo base_url(); ?>student/student_cl";

                    } else {
                        alert('Please Enter valid Email and Roll No');
                    }

                },
                error: function() {
                    alert('Not Added');
                    // $('.alert-success').html(result.type);
                }
            })
        });





    });
    </script>
</body>

</html>