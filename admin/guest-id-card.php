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
                        ?>
                        <div style="position:relative !important;">
                        <a  class="btn btn-danger absolute " style="position:absolute; right:0; cursor:pointer;z-index:10" href="#" onclick="history.back()" class="color:white">Back</a>
                        <div>
                        <h4 class="card-title">Manage Queries</h4>
                        <h6 class="card-subtitle"></h6>
                        <div class="table-responsive m-t-40">
                            <!-- <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
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
										
                                    </tr>
                                </thead> -->

                                <!-- <tbody> -->
                                    <?php
                                    
                                    if(isset($_GET['id'])){
                                        $main_id=$_GET['id'];
                                        
                                        $fetch_blog = mysqli_query($con, "select * from req_people where id=$main_id");
                                    }
                                    else{
                                        
                                        $fetch_blog = mysqli_query($con, "select * from req_people order by id desc");
                                    }
                                        $i = 1;
                                    while ($res_blog = mysqli_fetch_array($fetch_blog)) {
                                        $main_phone=$_GET['phone'];
                                        $main_email=$_GET['email'];
                                        ?>
                                         
                                        <div class="container id-card mt-3">
                                            
        <div class="row justify-content-center" >
        <div class="col-auto"style="
        border: 2px solid black;
        background: white;">

            <!-- ID CARD -->
            <div class=" p-2"  >

            <!-- Header -->
            <div class="text-center fw-bold border-bottom border-dark ">
                <img 
                    src="<?php echo BASE_URL?>/img/logo1.png"
                    width="100"
                    height="35"
                    class=" m-3"
                    alt="Image"
                >
            </div>

          <!-- Organization -->
          <div class="d-flex align-items-center justify-content-center mt-1">

            <!-- Circular Image -->
            <img 
                src="<?php echo BASE_URL?>/img/morari_bapu1.png"
                width="80"
                height="80"
                class="rounded-circle border m-3"
                alt="Image"
            >

            <!-- Text -->
            <div class="text-start" style="font-weight:400; font-size:14px;">
                <strong>Ram Katha - Delhi</strong><br>
                Manas Sanatandharam<br>
                Room/Hall No.______<br>
                <strong>Hotel Alloted : </strong><?=$res_blog['hotel']?><br>
                <strong>Duty Person -</strong><br>
                <strong>Name : </strong><?=$res_blog['incharge_name']?><br>
                <strong>Contact : </strong><?=$res_blog['incharge_phoneno']?><br>
            </div>

</div>


          <!-- Photo + Details -->
          <div class="row mt-3 gap-4">
            <div class="col-4">
              <div class="photo-box"
               style="width: 100%;
      height: 120px;
      border: 2px solid black;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 12px;">
                <img 
                src="<?php echo BASE_URL?>/<?=$res_blog['photo']?>"
                width="120"
                height="120"
                class="border m-3"
                alt="Image"
            >
              </div>
            </div>

            <div class="col-8" style="font-weight:400; font-size:14px;">
              <div class="text-break"><strong>Name : </strong><?=$res_blog['first_name']?> <?=$res_blog['middle_name']?> <?=$res_blog['last_name']?></div>
              <div class="text-break"><strong>Mobile : </strong><?=$_GET['phone']?></div>
              <div class="text-break"><strong>Reg No : </strong><?=$res_blog['request_id']?>_<?=$res_blog['id']?></div>
              <div class="text-break"><strong>Arrival date : </strong><?=$_GET['arrival']?></div>
              <div class="text-break"><strong>Departure date : </strong><?=$_GET['departure']?></div>
            </div>
          </div>

          <!-- Valid -->
          <div class="valid-box text-center mt-3 p-1 small" 
          style="border: 2px solid black;
      font-weight: bold;">
            Valid Till 25 Jan 2026
          </div>

        </div>
        <!-- END CARD -->

      </div>
    </div>
</div>

                                        
                                    <?php  
                                    }
                                     ?>

                                <!-- </tbody> -->
                            <!-- </table> -->
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
<?php
include_once ('footer.php');
?>