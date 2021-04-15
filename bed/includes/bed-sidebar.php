<!-- Main Sidebar Container -->
<aside class="main-sidebar main-sidebar-custom sidebar-dark-red elevation-4">
    <!-- Brand Logo -->
    <a href="../bed-dashboard/index.php" class="brand-link text-md text-light pt-3 pb-3">
        <img src="../../../assets/img/logo.png" alt="SFAC Logo" class="brand-image img-circle elevation-3"
            style="opacity: .9">
        <span class="brand-text font-weight-light">SFAC Bacoor</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel pt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php
                if ($_SESSION['role'] == "Master Key") {
                    $get_user = mysqli_query($conn, "SELECT * FROM tbl_master_key WHERE mk_id = '$mk_id'");
                    while ($row = mysqli_fetch_array($get_user)) {
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="img-circle elevation-2 zoom" alt="User image">
                        </div>
                    <div class="info">
                     <a class="d-block">' . $row['name'];
                    }
                } elseif ($_SESSION['role'] == "Registrar") {
                    $get_user = mysqli_query($conn, "SELECT *, CONCAT(tbl_registrars.reg_lname, ', ', tbl_registrars.reg_fname, ' ', LEFT(tbl_registrars.reg_mname,1), '.' ) AS fullname FROM tbl_registrars WHERE reg_id = '$reg_id'");
                    while ($row = mysqli_fetch_array($get_user)) {
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="img-circle elevation-2 zoom" alt="User image" style="width: 38px; height: 38px;">
                        </div>
                    <div class="info">
                     <a class="d-block">' . $row['fullname'];
                    }
                } elseif ($_SESSION['role'] == "Principal") {
                    $get_user = mysqli_query($conn, "SELECT *, CONCAT(tbl_principals.prin_lname, ', ', tbl_principals.prin_fname, ' ', LEFT(tbl_principals.prin_mname,1), '.') AS fullname FROM tbl_principals WHERE prin_id = '$prin_id'");
                    while ($row = mysqli_fetch_array($get_user)) {
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="img-circle elevation-2 zoom" alt="User image" style="width: 38px; height: 38px;">
                        </div>
                    <div class="info">
                     <a class="d-block">' . $row['fullname'];
                    }
                } elseif ($_SESSION['role'] == "Accounting") {
                    $get_user = mysqli_query($conn, "SELECT *, CONCAT(tbl_accountings.accounting_lname, ', ', tbl_accountings.accounting_fname, ' ', LEFT(tbl_accountings.accounting_mname,1), '.') AS fullname FROM tbl_accountings WHERE acc_id = '$acc_id'");
                    while ($row = mysqli_fetch_array($get_user)) {
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="img-circle elevation-2 zoom" alt="User image" style="width: 38px; height: 38px;">
                        </div>
                    <div class="info">
                     <a class="d-block">' . $row['fullname'];
                    }
                } elseif ($_SESSION['role'] == "Admission") {
                    $get_user = mysqli_query($conn, "SELECT *, CONCAT(tbl_admissions.admission_lname, ', ', tbl_admissions.admission_fname, ' ', LEFT(tbl_admissions.admission_mname,1), '.') AS fullname FROM tbl_admissions WHERE admission_id = '$admission_id'");
                    while ($row = mysqli_fetch_array($get_user)) {
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="img-circle elevation-2 zoom" alt="User image" style="width: 38px; height: 38px;">
                        </div>
                    <div class="info">
                     <a class="d-block">' . $row['fullname'];
                    }
                } elseif ($_SESSION['role'] == "Teacher") {
                    $get_user = mysqli_query($conn, "SELECT *, CONCAT(tbl_teachers.teacher_lname, ', ', tbl_teachers.teacher_fname, ' ', LEFT(tbl_teachers.teacher_mname,1), '.') AS fullname FROM tbl_teachers WHERE teacher_id = '$teacher_id'");
                    while ($row = mysqli_fetch_array($get_user)) {
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="img-circle elevation-2 zoom" alt="User image" style="width: 38px; height: 38px;">
                        </div>
                    <div class="info">
                     <a class="d-block">' . $row['fullname'];
                    }
                } elseif ($_SESSION['role'] == "Adviser") {
                    $get_user = mysqli_query($conn, "SELECT *, CONCAT(tbl_adviser.ad_lname, ', ', tbl_adviser.ad_fname, ' ', LEFT(tbl_adviser.ad_mname,1), '.') AS fullname FROM tbl_adviser WHERE ad_id = '$ad_id'");
                    while ($row = mysqli_fetch_array($get_user)) {
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="img-circle elevation-2 zoom" alt="User image" style="width: 38px; height: 38px;">
                        </div>
                    <div class="info">
                    <a class="d-block">' . $row['fullname'];
                    }
                } ?>


                </a>
                <p class="mb-0 text-sm text-white-50"><em>(<?php echo $_SESSION['role'] ?>)</em></p>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <!-- MASTER KEY SIDEBAR -->

                <?php if ($_SESSION['role'] == "Master Key") {
                    echo '<li class="nav-item menu-open">
                    <a href="../bed-dashboard/index.php" id="loadfile" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li> 
                <li class="nav-item">
                    <a href="../bed-master_key/list.principal.php" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Principals List
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../bed-master_key/list.registrar.php" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Registrars List
                        </p>
                    </a>
                </li>
               
                <li class="nav-item">
                    <a href="../bed-master_key/list.accounting.php" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Accounting List
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../bed-master_key/list.admission.php" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Admission List
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../bed-master_key/list.adviser.php" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Advisers List
                        </p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="../bed-master_key/list.teacher.php" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Teachers List
                        </p>
                    </a>
                </li>
                <li class="nav-header">ADD NEW USER</li>
                <li class="nav-item">
                    <a href="../bed-master_key/add.principal.php" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            Add Principal
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../bed-master_key/add.registrar.php" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            Add Registrar
                        </p>
                    </a>
                </li>
               
                <li class="nav-item">
                    <a href="../bed-master_key/add.accounting.php" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            Add Accounting
                        </p>
                    </a>
                </li>
               
                <li class="nav-item">
                    <a href="../bed-master_key/add.admission.php" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            Add Admission
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../bed-master_key/add.adviser.php" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            Add Adviser
                        </p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="../bed-master_key/add.teacher.php" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            Add Teacher
                        </p>
                    </a>
                </li>';


                    // END OF MASTER KEY


                } elseif ($_SESSION['role'] == "Registrar") {
                    echo '<li class="nav-item menu-open">
                    <a href="../bed-dashboard/index.php" id="loadfile" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-binoculars"></i>
                    <p>
                        View Subjects
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
             <ul class="nav nav-treeview">
             <li class="nav-item">
             <a href="../bed-hedCurr/abm.php" class="nav-link">
               <i class="fa fa-file-alt"> </i>
               <p> ABM</p>
             </a>
           </li> 
           <li class="nav-item">
           <a href="#" class="nav-link">
             <i class="fa fa-file-alt"> </i>
             <p> GAS</p>
           </a>
         </li>
           <li class="nav-item">
           <a href="#" class="nav-link">
             <i class="fa fa-file-alt"> </i>
             <p> HUMSS</p>
           </a>
         </li>
           <li class="nav-item">
            <a href="../bed-hedCurr/stem.php" class="nav-link">
               <i class="fa fa-file-alt"> </i>
               <p> STEM</p>
             </a>
           </li>
           <li class="nav-item">
                <a href="#" class="nav-link">
               <i class="fa fa-file-alt"> </i>
               <p> TVL</p>
             </a>
           </li>
             </ul>
             </li>';
                }


                // END REGISTRAR


                elseif ($_SESSION['role'] == "Principal") {
                    echo '<li class="nav-item menu-open">
                    <a href="../bed-dashboard/index.php" id="loadfile" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>';
                } elseif ($_SESSION['role'] == "Admission") {
                    echo '<li class="nav-item menu-open">
                    <a href="../bed-dashboard/index.php" id="loadfile" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>';
                } elseif ($_SESSION['role'] == "Teacher") {
                    echo '<li class="nav-item menu-open">
                    <a href="../bed-dashboard/index.php" id="loadfile" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>';
                } elseif ($_SESSION['role'] == "Adviser") {
                    echo '<li class="nav-item menu-open">
                    <a href="../bed-dashboard/index.php" id="loadfile" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-binoculars"></i>
                    <p>
                        View Subjects
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="../bed-hedCurr/abm.php" class="nav-link">
                        <i class="fa fa-file-alt"> </i>
                        <p> ABM</p>
                    </a>
                </li> 
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-file-alt"> </i>
                            <p> GAS</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-file-alt"> </i>
                            <p> HUMSS</p>
                    </a>
                </li>
                 <li class="nav-item">
                 <a href="../bed-hedCurr/stem.php" class="nav-link">
                        <i class="fa fa-file-alt"> </i>
                            <p> STEM </p>
                    </a>
                </li>
                <li class="nav-item">
                <a href="#p" class="nav-link">
                        <i class="fa fa-file-alt"> </i>
                            <p> TVL</p>
                    </a>
                </li>
                </ul>
                </li>';              
                }
                ?>
                <!--  End Master Key  -->



            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <!-- sidebar custom -->
    <div class="sidebar-custom">
        <a href="#" class="btn btn-link ml-2"><i class="fas fa-cog text-gray"></i></a>
        <a href="#" class="btn btn-link pos-right mr-2 text-gray"><i class="fas fa-user-edit"></i></a>
    </div>
    <!-- sidebar custom -->
</aside>