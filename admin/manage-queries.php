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
                        <li class="breadcrumb-item active">Main Person Queries</li>
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
                        ?>
                        <h4 class="card-title">Manage Queries</h4>
                        <h6 class="card-subtitle"></h6>
                        <div class="table-responsive mt-40">
                            <!-- <div>
                                <input type=text name="search" class="px-4 py-2" placeholder="Search">
                            </div> -->
                            <?php
                                                   if(isset($_POST['hotel'],$_POST['row_id'])){
                                                        $hotel=$_POST['hotel'];
                                                        $id=$_POST['row_id'];
                                                        mysqli_query($con,"UPDATE req_query_table SET hotel='$hotel' WHERE id='$id'");
                                                   }
                                                   if(isset($_POST['first_name'],$_POST['row_id'])){
                                                        $first_name=$_POST['first_name'];
                                                        $id=$_POST['row_id'];
                                                        mysqli_query($con,"UPDATE req_query_table SET first_name='$first_name' WHERE id='$id'");
                                                   }
                                                   if(isset($_POST['middle_name'],$_POST['row_id'])){
                                                        $middle_name=$_POST['middle_name'];
                                                        $id=$_POST['row_id'];
                                                        mysqli_query($con,"UPDATE req_query_table SET middle_name='$middle_name' WHERE id='$id'");
                                                   }
                                                   if(isset($_POST['last_name'],$_POST['row_id'])){
                                                        $last_name=$_POST['last_name'];
                                                        $id=$_POST['row_id'];
                                                        mysqli_query($con,"UPDATE req_query_table SET last_name='$last_name' WHERE id='$id'");
                                                   }
                                                   if(isset($_POST['arrival_date'],$_POST['row_id'])){
                                                        $arrival_date=$_POST['arrival_date'];
                                                        $id=$_POST['row_id'];
                                                        mysqli_query($con,"UPDATE req_query_table SET arrival_date='$arrival_date' WHERE id='$id'");
                                                   }
                                                   if(isset($_POST['departure_date'],$_POST['row_id'])){
                                                        $departure_date=$_POST['departure_date'];
                                                        $id=$_POST['row_id'];
                                                        mysqli_query($con,"UPDATE req_query_table SET departure_date='$departure_date' WHERE id='$id'");
                                                   }

                                                   ?>
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Registration number</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Email Id</th>
                                        <th>Country Code</th>
                                        <th>Phone Number</th>
										<th>Gender</th>
                                        <th>Age</th>
                                        <th>Country</th>
                                        <th>State</th>
                                        <th>City</th>
										<th>ID Proof Type</th>
										<th>ID Proof Number</th>
										<th>Uploaded ID Proof</th>
										<th>Total Guests</th>
										<th>Arrival Date</th>
										<th>Departure Date</th>
										<th>Photo</th>
										<th>Address</th>
                                        <th>Hotel</th>
                                        <th>Attendees</th>
                                        <th>ID Card</th>
										<th>Date and Time of Submission</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $fetch_blog = mysqli_query($con, "select * from req_query_table order by id desc");
                                        $i = 1;

                                    while ($res_blog = mysqli_fetch_array($fetch_blog)) {
                                        
                                        ?>

                                        <tr>

                                            <td>
                                                <?= $i++; ?>
                                            </td>
                                            <td>
                                                <?= $res_blog['id']; ?>
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
                                                <?= $res_blog['email_id']; ?>
                                            </td>
                                            <td>
                                                <?= $res_blog['country_code']; ?>
                                            </td>
                                            <td>
                                                <?= $res_blog['phone_number']; ?>
                                            </td>
                                            <td>
                                                <?= $res_blog['gender']; ?>
                                            </td>
                                            <td>
                                                <?= $res_blog['age']; ?>
                                            </td>
                                            <td>
                                                <?= $res_blog['country']; ?>
                                            </td>
											<td>
                                                <?= $res_blog['state']; ?>
                                            </td>
											<td>
                                                <?= $res_blog['city']; ?>
                                            </td>
											<td>
                                                <?= $res_blog['id_proof_type']; ?>
                                            </td>
											<td>
                                                <?= $res_blog['id_proof_number']; ?>
                                            </td>
											<td>
                                                <a href="<?php echo BASE_URL; ?>/<?= $res_blog['id_proof'];?>" target="_blank" class="btn btn-danger">Id Proof</a>
                                            </td>
											
											<td>
                                                <?= $res_blog['total_people_attending']; ?>
                                            </td>
											
											<td>
                                                <form method="Post">
                                                <input type="hidden" name="arrival_date" id="arrival_date"/>
                                                <input type="hidden" name="row_id" value="<?=$res_blog['id']?>">
                                    </form>
                                                <?= $res_blog['arrival_date']; ?><i class="bi bi-pencil-square p-4 cursor-pointer edit"></i>
                                            </td>
											<td>
                                                <form method="Post">
                                                <input type="hidden" name="departure_date" id="departure_date"/>
                                                <input type="hidden" name="row_id" value="<?=$res_blog['id']?>">
                                    </form>
                                                <?= $res_blog['departure_date']; ?><i class="bi bi-pencil-square p-4 cursor-pointer edit"></i>
                                            </td>
											<td>
                                                <a href="<?php echo BASE_URL; ?>/<?= $res_blog['photo'];?>" target="_blank" class="btn btn-danger">Photo</a>
                                            </td>
											<td>
                                                <?= $res_blog['address']; ?>
                                            </td>
                                           <td>
                                                <form method="POST">
                                                    <input type="hidden" name="row_id" value="<?=$res_blog['id']?>">

                                                <select name="hotel" id="hotel" onchange="this.form.submit()">
                                                    <option>Select Hotel</option>
                                                    <option value="Banglasaheb Gurudwara"<?= $res_blog['hotel']=='Banglasaheb Gurudwara'?"selected":""?>>Banglasaheb Gurudwara</option>
                                                    <option value="Seeshganjsaheb Gurudwara"<?= $res_blog['hotel']=='Seeshganjsaheb Gurudwara'?"selected":""?>>Seeshganjsaheb Gurudwara</option>
                                                    <option value="Rakabganj Gurudwara"<?= $res_blog['hotel']=='Rakabganj Gurudwara'?"selected":""?>>Rakabganj Gurudwara</option>
                                                    <option value="Balasaheb Gurudwara"<?= $res_blog['hotel']=='Balasaheb Gurudwara'?"selected":""?>>Balasaheb Gurudwara</option>
                                                    <option value="Gujrati Bhavan"<?= $res_blog['hotel']=='Gujrati Bhavan'?"selected":""?>>Gujrati Bhavan</option>
                                                </select>
                                    </form> 
                                                   
                                            </td>
                                            
                                            <td>
                                                <a href="manage-small-queries.php?id=<?=$res_blog['id']?>&phone=<?=urlencode($res_blog['phone_number']); ?>&email=<?= urlencode($res_blog['email_id']);?>&hotel=<?=urlencode($res_blog['hotel']);?>&arrival=<?=urlencode($res_blog['arrival_date']);?>&departure=<?=urlencode($res_blog['departure_date']);?>" target="_blank" class="btn btn-danger">Other Guests</a>
                                            </td>
                                            <td>
                                                <a href="main-id-card.php?id=<?=$res_blog['id'];?>" target="_blank" class="btn btn-danger">ID Card</a>
                                            </td>
                                            
                                            <td>
                                               <?= $res_blog['submitted_on'];?>
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
})
$(document).ready(function () {
    $('#example23').DataTable({
         pageLength: 250
    });

});
</script>
<?php
include_once ('footer.php');
?>