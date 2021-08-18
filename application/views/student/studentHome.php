<!doctype html>
<html lang="en">

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
        <!-- <h2 class="text-center" style="margin-top: 100px;">Please Login</a></h2> -->
        <br>
        <br>
        <div id="find_std" class="text-center">

        </div>
        <div id="id_std" class="text-center" style="display:none;">

        </div>
        <div id="" class="text-center">
            <button class="btn btn-success btn-lg" id="viewResult">View Result</button>
        </div>
        <div id="" class="text-center">
            <a href="<?php echo base_url(); ?>student/student_cl/logout" class="btn btn-primary btn-lg" id="logout">Logout</a>
        </div>

    </div>
    
   

    <div class="modal fade" id="viewResultSheet" role="dialog">
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




    <script>
    $(document).ready(function() {




        $.ajax({
            url: '<?php echo base_url(); ?>student/student_cl/showStudent',
            type: 'ajax',
            asynk: false,
            dataType: 'json',
            success: function(data) {

                // alert(data.id);
                // alert(data.name);
                $('#find_std').html('<h4>Welcome ' + data.name + '</h4>');
                $('.std_name').html('<h4>Name:  ' + data.name + '</h4>');
                $('#id_std').val(data.id);

            },
            error: function(data) {
                alert('Not Added');
                $('.alert-success').html(data.type);
            }
        });


        $('#viewResult').click(function() {

            // $('#viewResultSheet').modal('show');

            var student_id = $('#id_std').val();

            $.ajax({
                url: '<?php echo base_url(); ?>student/student_cl/showMarks',
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
                        $('#viewResultSheet').modal('hide');
                        alert("Your result has not been released yet!!");

                    } else {
                        $('#viewResultSheet').modal('show');
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
        })


      





    });
    </script>
</body>

</html>