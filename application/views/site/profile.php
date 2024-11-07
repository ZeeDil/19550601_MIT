<style>
    *,  *:before,  *:after  {
        -moz-box-sizing:  border-box;
        -webkit-box-sizing:  border-box;
        box-sizing:  border-box;
    }
    @keyframes animatedBackground  {
        from  {
            background-position:  0 0;
        }
        to  {
            background-position:  100% 0;
        }
    }
    form  {
        max-width:  300px;
        margin:  10px auto;
        padding:  10px 20px;
        background:  #f4f7f8;
        border-radius:  8px;
    }

    a{
        color:#fff;
        font-weight:400;
        text-decoration:none;
        font-size:26px;
    }

    h1  {
        margin:  0 0 30px 0;
        text-align:  center;
    }
    input[type="text"],  input[type="password"],  input[type="date"],  input[type="datetime"],  input[type="email"],  input[type="number"],  input[type="search"],  input[type="tel"],  input[type="time"],  input[type="url"],  textarea,  select  {
        background:  rgba(255, 255, 255, 0.1);
        border:  none;
        font-size:  16px;
        height:  auto;
        outline:  0;
        padding:  15px;
        width:  100%;
        background-color:  #e8eeef;
        color:  #8a97a0;
        box-shadow:  0 1px 0 rgba(0, 0, 0, 0.03) inset;
    }
    input[type="radio"],  input[type="checkbox"]  {
        margin:  0 4px 8px 0;
    }
    select  {
        padding:  6px;
        height:  32px;
        border-radius:  2px;
    }
    button  {
        padding:  19px 39px 18px 39px;
        color:  #FFF;
        background-color:  #4bc970;
        font-size:  18px;
        text-align:  center;
        font-style:  normal;
        border-radius:  5px;
        width:  100%;
        border:  1px solid #3ac162;
        border-width:  1px 1px 3px;
        box-shadow:  0 -1px 0 rgba(255, 255, 255, 0.1) inset;
        margin-bottom:  10px;
    }
    fieldset  {
        margin-bottom:  30px;
        border:  none;
    }
    legend  {
        font-size:  1.4em;
        margin-bottom:  10px;
    }
    label  {
        display:  block;
        margin-bottom:  8px;
    }
    label.light  {
        font-weight:  300;
        display:  inline;
    }
    .number  {
        background-color:  #5fcf80;
        color:  #fff;
        height:  30px;
        width:  30px;
        display:  inline-block;
        font-size:  0.8em;
        margin-right:  4px;
        line-height:  30px;
        text-align:  center;
        text-shadow:  0 1px 0 rgba(255, 255, 255, 0.2);
        border-radius:  100%;
    }
    @media screen and (min-width: 480px)  {
        form  {
            max-width:  480px;
        }
    }

    .create_basic_profile_section{
        margin-top: 300px;
        text-align: center!important;
    }

    #create_basic_profile_button{
        padding: 2px;
        font-size: 18px;
    }

    #create_basic_profile_button : hover{
        cursor: pointer;
    }

    .arrow_image{
        width: 40px;
        margin-bottom: 20px;
    }

    @media only screen and (max-width: 768px) {
        .arrow_image{
            display: none;
        }
    }

    .aceadamic_section{
        display: inline;
    }

    /* CSS for styling */
    .aceadamic_section {
        display: inline-block;
        /* Optional: Add some margin or padding if needed */
        margin-right: 10px;
    }

    /* Optional: Styling for the button */
    .btn {
        padding: 8px 16px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .aceadamic_section_right{
        float: right;
    }

    .smart_job_portal_button{
        margin-top: 15px;
    }


</style>
<body>
<div class="container" style="margin-top: 150px">
    <div class="row" style="text-align: center">
        <h4>Create Job Seeker Profile</h4>
    </div>
    <div class="row">
        <div class="col-md-5">

            <form id="basic_profile_form" method="post">
                <fieldset>
                    <legend><span class="number">1</span>Enter Your basic Details</legend>
                    <div class="form-group">
                        <label for="name">Full Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="form-group">
                        <label for="nic">NIC:</label>
                        <input type="text" class="form-control" id="nic" name="nic" maxlength="12">
                    </div>

                    <div class="form-group">
                        <label>Gender:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>

                    <div class="form-group">
                        <label for="mail">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo ($_SESSION['user_name']) ?>">
                    </div>

                    <div class="form-group">
                        <label for="dob">Date of Birth:</label>
                        <input type="text" class="form-control" id="dob" name="dob">
                    </div>

                    <div class="form-group">
                        <label for="profile_img">Profile Picture:</label>
                        <input type="file" id="profile_img" name="profile_img">
                    </div>

                    <div class="form-group">
                        <label for="cv">CV:</label>
                        <input type="file" name="upload_file_cv" id="upload_file_cv">
                    </div>

                </fieldset>
                <button id="create_basic_profile_button">Create Basic Profile </button>
            </form>
        </div>
        <div class="col-md-2 create_basic_profile_section">
            <img src="<?php echo base_url().'assets/image/arrow-9191.png' ?>" alt="arrow" class="arrow_image" width="100px">
        </div>

        <!-- Second form -->
        <div class="col-md-5">
            <form id="profile_form2" method="post">
                <fieldset>
                    <legend><span class="number">2</span>Acadamic Qualification</legend>
                    <div class="form-group">
                        <div class="aceadamic_section">
                            <label for="exampleButton">Ordinary Level:</label>
                        </div>
                        <div class="aceadamic_section_right">
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_ol">+ Add</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="aceadamic_section">
                            <label for="exampleButton">Advanced Level:</label>
                        </div>
                        <div class="aceadamic_section_right">
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_al">+ Add</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="aceadamic_section">
                            <label for="exampleButton">Higher National Diploma:</label>
                        </div>
                        <div class="aceadamic_section_right">
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_hnd">+ Add</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="aceadamic_section">
                            <label for="exampleButton">Bacholers Level:</label>
                        </div>
                        <div class="aceadamic_section_right">
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_bacheler">+ Add</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="aceadamic_section">
                            <label for="exampleButton">Masters Level:</label>
                        </div>
                        <div class="aceadamic_section_right">
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_masters">+ Add</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="aceadamic_section">
                            <label for="exampleButton">PHD or Upper Level:</label>
                        </div>
                        <div class="aceadamic_section_right">
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_phd">+ Add</button>
                        </div>
                    </div>

                </fieldset>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <input type="text" id="hidden_profile_id" name="hidden_profile_id">

        <!-- OLs result add -->
        <!-- Modal -->
        <div id="myModal_ol" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" style="width:50px">&times;</button>
                    </div>
                    <div class="modal-body">
                        <h6>Insert the results of the main subjects</h6>
                        <table class="table table-bordered table-hover" id="ol_table">
                            <thead>
                            <tr>
                                <th class="text-center">
                                    Subject
                                </th>
                                <th class="text-center">
                                    Result
                                </th>

                            </tr>
                            </thead>
                            <tbody id="medical_table_body">
                            <tr id='' class="rowval">
                                <td>
                                    <label for="mail">Mathematics</label>
                                </td>
                                <td>
                                    <select name="maths" id="maths">
                                        <option value="0">Select the Result</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="C">S</option>
                                        <option value="C">F</option>
                                    </select>
                                </td>
                            </tr>
                            <tr id='' class="rowval">
                                <td>
                                    <label for="mail">English</label>
                                </td>
                                <td>
                                    <select name="english" id="english">
                                        <option value="0">Select the Result</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="C">S</option>
                                        <option value="C">F</option>
                                    </select>
                                </td>
                            </tr>
                            <tr id='' class="rowval">
                                <td>
                                    <label for="mail">Science</label>
                                </td>
                                <td>
                                    <select name="science" id="science">
                                        <option value="0">Select the Result</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="C">S</option>
                                        <option value="C">F</option>
                                    </select>
                                </td>
                            </tr>
                            <tr id='' class="rowval">
                                <td>
                                    <label for="mail">History</label>
                                </td>
                                <td>
                                    <select name="history" id="history">
                                        <option value="0">Select the Result</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="C">S</option>
                                        <option value="C">F</option>
                                    </select>
                                </td>
                            </tr>
                            <tr id='' class="rowval">
                                <td>
                                    <label for="mail">Sinhala/Tamil</label>
                                </td>
                                <td>
                                    <select name="language" id="language">
                                        <option value="0">Select the Result</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="C">S</option>
                                        <option value="C">F</option>
                                    </select>
                                </td>
                            </tr>
                            <tr id='' class="rowval">
                                <td>
                                    <label for="mail">Religion</label>
                                </td>
                                <td>
                                    <select name="religion" id="religion">
                                        <option value="0">Select the Result</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="C">S</option>
                                        <option value="C">F</option>
                                    </select>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <button class="smart_job_portal_button" type="submit" id="save_ols"> Save</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Modal 2-->
        <div id="myModal_hnd" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" style="width:50px">&times;</button>
                    </div>
                    <div class="modal-body">
                        <h6>Insert the results of the HND  s</h6>
                        <form method="post" id="hnd_form">
                        <table class="table table-bordered table-hover" id="hnd_table">
                            <thead>
                            <tr>
                                <th class="text-center">
                                    Title
                                </th>
                                <th class="text-center">
                                    Institute
                                </th>

                            </tr>
                            </thead>
                            <tbody id="medical_table_body">

                            <tr id='addr0' class="rowval">
                                <td>
                                    <input type="text" name="hnd_name[]" id="hnd_name" placeholder="HND Name" class="form-control hnd_name" value=""/>
                                </td>
                                <td>
                                    <input type="text" name="hnd_institute[]" id="hnd_institute" placeholder="HND Institute" class="form-control hnd_institute" value=""/>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                        </form>
                        <a id="add_row_hnd" class="btn btn-default pull-left">Add Row</a>
                        <a id='delete_row_hnd' class="pull-right btn btn-default">Clear All</a>
                        <hr>
                        <button class="smart_job_portal_button" type="submit" id="save_hnd"> Save</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Modal 3-->
        <div id="myModal_al" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" style="width:50px">&times;</button>
                    </div>
                    <div class="modal-body">
                        <h6>Insert the results of the Advanced Level</h6>
                        <table class="table table-bordered table-hover" id="al_table">
                            <select name="maths" id="maths">
                                <option value="0">Select the stream</option>
                                <option value="Mathematics">Mathematics</option>
                                <option value="Biology">Biology</option>
                                <option value="Commerce">Commerce</option>
                                <option value="Technology">Technology</option>
                                <option value="Arts">Arts</option>
                            </select>

                            <thead>
                            <tr>
                                <th class="text-center">
                                    Subject
                                </th>
                                <th class="text-center">
                                    Result
                                </th>

                            </tr>
                            </thead>
                            <tbody id="medical_table_body">
                            <tr id='' class="rowval">
                                <td>
                                    <input for="ol" name="al1" id="al1" value="">
                                </td>
                                <td>
                                    <select name="subject1" id="subject1">
                                        <option value="0">Select the Result</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="C">S</option>
                                        <option value="C">F</option>
                                    </select>
                                </td>
                            </tr>
                            <tr id='' class="rowval">
                                <td>
                                    <input for="ol" name="al2" id="al2" value="">
                                </td>
                                <td>
                                    <select name="subject2" id="subject2">
                                        <option value="0">Select the Result</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="C">S</option>
                                        <option value="C">F</option>
                                    </select>
                                </td>
                            </tr>
                            <tr id='' class="rowval">
                                <td>
                                    <input for="ol" name="al3" id="al3" value="">
                                </td>
                                <td>
                                    <select name="science" id="science">
                                        <option value="0">Select the Result</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="C">S</option>
                                        <option value="C">F</option>
                                    </select>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                        <button class="smart_job_portal_button" type="submit" id="save_als"> Save</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Modal 4-->
        <div id="myModal_bacheler" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" style="width:50px">&times;</button>
                    </div>
                    <div class="modal-body">
                        <h6>Insert the results of the bachelor's</h6>
                        <table class="table table-bordered table-hover" id="bachelors_table">
                            <thead>
                            <tr>
                                <th class="text-center">
                                    Title
                                </th>
                                <th class="text-center">
                                    Institute
                                </th>

                            </tr>
                            </thead>
                            <tbody id="medical_table_body">

                            <tr id='addr0' class="rowval">
                                <td>
                                    <input type="text" name="degree_name[]" id="degree_name" placeholder="Degree Name" class="form-control degree_name" value=""/>
                                </td>
                                <td>
                                    <input type="text" name="degree_institute[]" id="degree_institute" placeholder="Institute" class="form-control degree_institute" value=""/>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <a id="add_row_bcheler" class="btn btn-default pull-left">Add Row</a><a id='delete_row_hnd' class="pull-right btn btn-default">Clear All</a>


                        <button class="smart_job_portal_button" type="submit" id="save_bachelers"> Save</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Modal 5-->
        <div id="myModal_masters" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" style="width:50px">&times;</button>
                    </div>
                    <div class="modal-body">
                        <h6>Insert the results of the Master's</h6>
                        <table class="table table-bordered table-hover" id="masters_table">
                            <thead>
                            <tr>
                                <th class="text-center">
                                    Title
                                </th>
                                <th class="text-center">
                                    Institute
                                </th>

                            </tr>
                            </thead>
                            <tbody id="medical_table_body">

                            <tr id='addr0' class="rowval">
                                <td>
                                    <input type="text" name="masters_name[]" id="masters_name" placeholder="Masters Degree Name" class="form-control masters_name" value=""/>
                                </td>
                                <td>
                                    <input type="text" name="masters_degree_institute[]" id="masters_degree_institute" placeholder="Institute" class="form-control masters_degree_institute" value=""/>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <a id="add_row_masters" class="btn btn-default pull-left">Add Row</a><a id='delete_row_hnd' class="pull-right btn btn-default">Clear All</a>


                        <button class="smart_job_portal_button" type="submit" id="save_masters"> Save</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Modal 6-->
        <div id="myModal_phd" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" style="width:50px">&times;</button>
                    </div>
                    <div class="modal-body">
                        <h6>Insert the results of the PHD's or Higher</h6>
                        <table class="table table-bordered table-hover" id="phd_table">
                            <thead>
                            <tr>
                                <th class="text-center">
                                    Title
                                </th>
                                <th class="text-center">
                                    Institute
                                </th>

                            </tr>
                            </thead>
                            <tbody id="medical_table_body">

                            <tr id='addr0' class="rowval">
                                <td>
                                    <input type="text" name="phd_name[]" id="phd_name" placeholder="PHD Degree Name" class="form-control masters_name" value=""/>
                                </td>
                                <td>
                                    <input type="text" name="phd_degree_institute[]" id="phd_degree_institute" placeholder="Institute" class="form-control phd_degree_institute" value=""/>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <a id="add_row_phd" class="btn btn-default pull-left">Add Row</a><a id='delete_row_hnd' class="pull-right btn btn-default">Clear All</a>


                        <button class="smart_job_portal_button" type="submit" id="save_phd"> Save</button>

                        <button class="" type="" id="fffffffffffff"> ffffff</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
                    </div>
                </div>

            </div>
        </div>


        <div class="col-md-5">
            <div class="alert alert-info form-alertbox" role="alert" style="display:none ;">
                Warning! Some messages shows here..
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url("assets/js/app_js/profile.js")?>"></script>
</body>
</html>
<script>

    var i = $('#hnd_table tr').length;

    $("#add_row_hnd").click(function () {
        $('#hnd_table').append("<tr id='addr" + (i + 1) + "' class='rowval'><td><input  name='hnd_name[]' id='hnd_name" + i + "'  value='' type='text' placeholder='HND Name'  class='form-control input-md hnd_name'></td><td><input  name='hnd_institute[]' id='hnd_institute" + i + "'  value='' type='text' placeholder='HND Instutute'  class='form-control input-md hnd_institute'></td></tr>");

    });

    $("#delete_row_hnd").click(function () { // remove rows from the detail table.
        alert();
        $("#hnd_table tbody").html('');
        $('#hnd_table').append("<tr id='addr" + (i + 1) + "' class='rowval'><td><input  name='hnd_name[]' id='hnd_name" + i + "'  value='' type='text' placeholder='HND Name'  class='form-control input-md hnd_name'></td><td><input  name='hnd_institute[]' id='hnd_institute" + i + "'  value='' type='text' placeholder='HND Instutute'  class='form-control input-md hnd_institute'></td></tr>");

    });

    var j = $('#bachelors_table tr').length;

    $("#add_row_bcheler").click(function () {
        $('#bachelors_table').append("<tr id='addr" + (i + 1) + "' class='rowval'><td><input  name='degree_name[]' id='degree_name" + i + "'  value='' type='text' placeholder='Degree Name'  class='form-control input-md degree_name'></td><td><input  name='degree_institute[]' id='degree_institute" + i + "'  value='' type='text' placeholder='Instutute'  class='form-control input-md degree_institute'></td></tr>");

    });

    var j = $('#masters_table tr').length;

    $("#add_row_masters").click(function () {
        $('#masters_table').append("<tr id='addr" + (i + 1) + "' class='rowval'><td><input  name='masters_name[]' id='masters_name" + i + "'  value='' type='text' placeholder='Degree Name'  class='form-control input-md masters_name'></td><td><input  name='masters_degree_institute[]' id='masters_degree_institute" + i + "'  value='' type='text' placeholder='Instutute'  class='form-control input-md masters_degree_institute'></td></tr>");

    });

    var j = $('#phd_table tr').length;

    $("#add_row_phd").click(function () {
        $('#phd_table').append("<tr id='addr" + (i + 1) + "' class='rowval'><td><input  name='phd_name[]' id='phd_name" + i + "'  value='' type='text' placeholder='Degree Name'  class='form-control input-md degree_name'></td><td><input  name='phd_degree_institute[]' id='phd_degree_institute" + i + "'  value='' type='text' placeholder='Instutute'  class='form-control input-md degree_institute'></td></tr>");

    });


</script>