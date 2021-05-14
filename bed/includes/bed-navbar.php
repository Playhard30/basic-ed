<ul class="navbar-nav ml-auto">
    <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link disabled text-light" id="clock"></a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link pt-1" data-toggle="dropdown" href="#">
            <div class="user-panel d-flex">
                <div class="image">
                    <?php
                    if ($_SESSION['role'] == "Master Key") {
                        $get_user = mysqli_query($conn, "SELECT * FROM tbl_master_key WHERE mk_id = '$mk_id'") or die(mysqli_error($conn));
                        while ($row = mysqli_fetch_array($get_user)) {
                            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="img-circle elevation-0 mb-3" alt="User Image" style="width: 35px; height: 35px;">';
                        }
                    } elseif ($_SESSION['role'] == "Registrar") {
                        $get_user = mysqli_query($conn, "SELECT * FROM tbl_registrars WHERE reg_id = '$reg_id'") or die(mysqli_error($conn));
                        while ($row = mysqli_fetch_array($get_user)) {
                            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="img-circle elevation-0 mb-3" alt="User Image" style="width: 35px; height: 35px;">';
                        }
                    } elseif ($_SESSION['role'] == "Principal") {
                        $get_user = mysqli_query($conn, "SELECT * FROM tbl_principals WHERE prin_id = '$prin_id'");
                        while ($row = mysqli_fetch_array($get_user)) {
                            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="img-circle elevation-0 mb-3" alt="User Image" style="width: 35px; height: 35px;">';
                        }
                    } elseif ($_SESSION['role'] == "Accounting") {
                        $get_user = mysqli_query($conn, "SELECT * FROM tbl_accountings WHERE acc_id = '$acc_id'");
                        while ($row = mysqli_fetch_array($get_user)) {
                            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="img-circle elevation-0 mb-3" alt="User Image" style="width: 35px; height: 35px;">';
                        }
                    } elseif ($_SESSION['role'] == "Admission") {
                        $get_user = mysqli_query($conn, "SELECT * FROM tbl_admissions WHERE admission_id = '$admission_id'");
                        while ($row = mysqli_fetch_array($get_user)) {
                            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="img-circle elevation-0 mb-3" alt="User Image" style="width: 35px; height: 35px;">';
                        }
                    } elseif ($_SESSION['role'] == "Teacher") {
                        $get_user = mysqli_query($conn, "SELECT * FROM tbl_teachers WHERE teacher_id = '$teacher_id'");
                        while ($row = mysqli_fetch_array($get_user)) {
                            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="img-circle elevation-0 mb-3" alt="User Image" style="width: 35px; height: 35px;">';
                        }
                    } elseif ($_SESSION['role'] == "Adviser") {
                        $get_user = mysqli_query($conn, "SELECT * FROM tbl_adviser WHERE ad_id = '$ad_id'");
                        while ($row = mysqli_fetch_array($get_user)) {
                            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="img-circle elevation-0 mb-3" alt="User Image" style="width: 35px; height: 35px;">';
                        }
                    } elseif ($_SESSION['role'] == "Student") {
                        $get_user = mysqli_query($conn, "SELECT * FROM tbl_students WHERE student_id = '$stud_id'") or die(mysqli_error($conn));
                        while ($row = mysqli_fetch_array($get_user)) {
                            if (empty(base64_encode($row['img']))) {
                                echo '<img src="../../../assets/img/red_user.jpg" class="img-circle elevation-0 mb-3" alt="User Image" style="width: 35px; height: 35px;">';
                            } else {
                                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="img-circle elevation-0 mb-3" alt="User Image" style="width: 35px; height: 35px;">';
                            }
                        }
                    } ?>

                </div>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <!-- <span class="dropdown-item dropdown-header"> </span> -->
            <a href="../bed-login/controllerLogin/ctrl.logout.php" class="dropdown-item">
                Logout

            </a>

        </div>
    </li>
</ul>
</nav>
<!-- /.navbar -->