<?php
include_once ('header.php');
?>

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">List Queries</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Attending Guests Queries</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?php
                        if (isset($_SESSION['del_location'])) {
                            ?>
                            <div class="alert alert-danger alert-dismissible" id="success_alert" style="
    color: white;
    background: green;
">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>
                                    <?= $_SESSION['del_location']; ?>
                                </strong>
                            </div>
                            <?php
                            unset($_SESSION['del_location']);
                        }
                        $main_id=$_GET['id'];
                        ?>
                        <div style="position:relative !important;">
                        <a  class="btn btn-danger absolute " style="position:absolute; right:0; cursor:pointer;z-index:10" href="#" onclick="history.back()" class="color:white">Back</a>
                        
                        <a  class="btn btn-danger absolute " style="position:absolute; right:70;cursor:pointer;z-index:10" href="download-via-excel.php?id=<?=$main_id?>" class="color:white">Download Via Excel</a>
                    </div>
                        <h4 class="card-title">Manage Queries</h4>
                        <h6 class="card-subtitle"></h6>
                        <div class="table-responsive m-t-40 relative">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Registration Number</th>
                                        <th>Coming with</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Gender</th>
                                        <th>Age</th>
										<th>ID Proof Type</th>
										<th>ID Proof Number</th>
										<th>Uploaded ID Proof</th>
										<th>Photo</th>
                                        <th>ID Card</th>
                                        <th>Attendance</th>
										
										
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    if(isset($_POST['attendance'],$_POST['row_id'])){
                                                        $attendance=$_POST['attendance'];
                                                        $id=$_POST['row_id'];
                                                        mysqli_query($con,"UPDATE req_people SET attendance='$attendance' WHERE id='$id'");
                                                   }
                                    if(isset($_POST['first_name'],$_POST['row_id'])){
                                                        $first_name=$_POST['first_name'];
                                                        $id=$_POST['row_id'];
                                                        mysqli_query($con,"UPDATE req_people SET first_name='$first_name' WHERE id='$id'");
                                                   }
                                    if(isset($_POST['middle_name'],$_POST['row_id'])){
                                                        $middle_name=$_POST['middle_name'];
                                                        $id=$_POST['row_id'];
                                                        mysqli_query($con,"UPDATE req_people SET middle_name='$middle_name' WHERE id='$id'");
                                                   }
                                    if(isset($_POST['last_name'],$_POST['row_id'])){
                                                        $last_name=$_POST['last_name'];
                                                        $id=$_POST['row_id'];
                                                        mysqli_query($con,"UPDATE req_people SET last_name='$last_name' WHERE id='$id'");
                                                   }
                                    if (isset($_FILES['photo']) && isset($_POST['row_id'])) {

                                                        $id = $_POST['row_id'];

                                                        if ($_FILES['photo']['error'] == 0) {

                                                            $name = $_FILES['photo']['name'];
                                                            $tmp  = $_FILES['photo']['tmp_name'];

                                                            $photoname = time() . "_" . basename($name);

                                                            $uploadDir ="../uploads/photo/";
                                                            $serverPath = $uploadDir . $photoname;
                                                            $dbPath = "uploads/photo/" . $photoname;

                                                            if (!is_dir($uploadDir)) {
                                                                mkdir($uploadDir, 0777, true);
                                                            }

                                                            if (move_uploaded_file($tmp, $serverPath)) {

                                                                mysqli_query($con,
                                                                    "UPDATE req_people SET photo='$dbPath' WHERE id='$id'"
                                                                );

                                                            } else {
                                                                echo "❌ move_uploaded_file failed";
                                                            }

                                                        } else {
                                                            echo "❌ File error";
                                                        }
                                                    }

                                     $phoneno=$_GET['phone'];
                                    $email=$_GET['email'];
                                    $hotel=$_GET['hotel'];
                                    $arrival=$_GET['arrival'];
                                    $departure=$_GET['departure'];
                                    if(isset($_GET['id'])){
                                        $main_id=$_GET['id'];
                                        
                                        
                                        $fetch_blog = mysqli_query($con, "select * from req_people where request_id=$main_id");
                                    }
                                    else{
                                        
                                        $fetch_blog = mysqli_query($con, "select * from req_people order by id desc");
                                    }
                                        $i = 1;
                                    while ($res_blog = mysqli_fetch_array($fetch_blog)) {
                                       
                                        
                                        ?>

                                        <tr>

                                            <td>
                                                <?= $i++; ?>
                                            </td>
                                            <td>
                                                <?= $res_blog['request_id']; ?>_<?= $res_blog['id']?>
                                            </td>

                                            <td>
                                                <?= $res_blog['request_id']; ?>
                                            </td>
                        
                                            <td>
                                                <form method="Post">
                                                <input type="hidden" name="first_name" id="first_name"/>
                                                <input type="hidden" name="row_id" value="<?=$res_blog['id']?>">
                                                </form>
                                                <?= $res_blog['first_name']; ?><i class="bi bi-pencil-square p-4 cursor-pointer edit"></i>
                                            </td>
                                            <td>
                                                <form method="Post">
                                                <input type="hidden" name="middle_name" id="middle_name"/>
                                                <input type="hidden" name="row_id" value="<?=$res_blog['id']?>">
                                    </form>
                                                <?= $res_blog['middle_name']; ?><i class="bi bi-pencil-square p-4 cursor-pointer edit"></i>
                                            </td>
                                            <td>
                                                <form method="Post">
                                                <input type="hidden" name="last_name" id="last_name"/>
                                                <input type="hidden" name="row_id" value="<?=$res_blog['id']?>">
                                    </form>
                                                <?= $res_blog['last_name']; ?><i class="bi bi-pencil-square p-4 cursor-pointer edit"></i>
                                            </td>

                                            <td>
                                                <?= $res_blog['gender']; ?>
                                            </td>
                                            <td>
                                                <?= $res_blog['age']; ?>
                                            </td>
                                            <td>

                                                <?= $res_blog['id_proof_type']; ?>
                                            </td>
											<td>
                                                <?= $res_blog['id_proof_number']; ?>
                                            </td>
											<td>
                                                <a href="<?php echo BASE_URL; ?>/<?= $res_blog['id_proof_file'];?>" target="_blank" class="btn btn-danger">Id Proof</a>
                                            </td>
											
											<td>
                                                <form method="POST" enctype="multipart/form-data" class="photoForm">
                                                    <input type="file" name="photo" class="photoInput" style="display:none;">
                                                    <input type="hidden" name="row_id" value="<?=$res_blog['id']?>">
                                                    <button type="submit" class="submitBtn" style="display:none;">Save</button>
                                                </form>
                                                <a href="<?php echo BASE_URL; ?>/<?= $res_blog['photo'];?>" target="_blank"  class="btn btn-danger">Photo</a><i class="bi bi-pencil-square p-4 cursor-pointer editphoto"></i>
                                            </td>
											<td>
                                                <a href="guest-id-card.php?id=<?=$res_blog['id'];?>&phone=<?=$phoneno?>&email=<?=$email?>&hotel=<?=$hotel?>&arrival=<?=$arrival?>&departure=<?=$departure?>"  class="btn btn-danger">ID Card</a>
                                            </td>
                                            <td>
                                                 <form method="POST">
                                                    <input type="hidden" name="row_id" value="<?=$res_blog['id']?>">

                                                <select name="attendance" id="attendance" onchange="this.form.submit()">
                                                    <option value="Present"<?= $res_blog['attendance']=='Present'?"selected":""?>>Present</option>
                                                    <option value="Absent"<?= $res_blog['attendance']=='Absent'?"selected":""?>>Absent</option>
                                                </select>
                                            </form> 
                                        </td>

                                        </tr>
                                    <?php  } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <div class="right-sidebar">
            <div class="slimscrollright">
                <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                <div class="r-panel-body">
                    <ul id="themecolors" class="m-t-20">
                        <li><b>With Light sidebar</b></li>
                        <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme">4</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme working">6</a></li>
                        <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                        <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a>
                        </li>
                        <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a>
                        </li>
                        <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a>
                        </li>
                    </ul>
                    <ul class="m-t-20 chatonline">
                        <li><b>Chat option</b></li>
                        <li>
                            <a href="javascript:void(0)"><img src="assets/images/users/1.jpg" alt="user-img"
                                    class="img-circle"> <span>Varun Dhavan <small
                                        class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="assets/images/users/2.jpg" alt="user-img"
                                    class="img-circle"> <span>Genelia Deshmukh <small
                                        class="text-warning">Away</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="assets/images/users/3.jpg" alt="user-img"
                                    class="img-circle"> <span>Ritesh Deshmukh <small
                                        class="text-danger">Busy</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="assets/images/users/4.jpg" alt="user-img"
                                    class="img-circle"> <span>Arijit Sinh <small
                                        class="text-muted">Offline</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="assets/images/users/5.jpg" alt="user-img"
                                    class="img-circle"> <span>Govinda Star <small
                                        class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="assets/images/users/6.jpg" alt="user-img"
                                    class="img-circle"> <span>John Abraham<small
                                        class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="assets/images/users/7.jpg" alt="user-img"
                                    class="img-circle"> <span>Hritik Roshan<small
                                        class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="assets/images/users/8.jpg" alt="user-img"
                                    class="img-circle"> <span>Pwandeep rajan <small
                                        class="text-success">online</small></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
<script>
document.querySelectorAll('.edit').forEach((btn)=>{
    btn.addEventListener('click',(event)=>{
        const td=event.target.closest('td');
        console.log(td);
        const input=td.querySelector('input');
        input.type='text';
    });
});
document.querySelectorAll('.editphoto').forEach((icon) => {
    icon.addEventListener('click', function () {

        const td = this.closest('td');              // same row
        const fileInput = td.querySelector('.photoInput');
        const submitBtn = td.querySelector('.submitBtn');

        fileInput.style.display = 'block';
        submitBtn.style.display = 'block';

        fileInput.click(); // auto open file picker
    });
});
</script>
<?php
include_once ('footer.php');
?>