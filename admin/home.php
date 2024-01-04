<h1>Welcome to <?php echo $_settings->info('name') ?></h1>
<hr class="border-danger">
<style>
    #website-cover{
        width:100%;
        height:30em;
        object-fit:cover;
        object-position:center center;
    }
</style>
<div class="row">
<!---->
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-orange elevation-1"><i class="fas fa-file-alt"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Expiring Insurances</span>
            <span class="info-box-number text-right">
                <?php
                $firstName = $_settings->userdata('firstname');
                $lastName = $_settings->userdata('lastname');

                // Concatenate and format the user's name
                $userName = ucwords($firstName . ' ' . $lastName);

                $userName1 = "Christabel Chinyanganya";
                if ($_settings->userdata('type') == 1):
                 echo   $qry = $conn->query("SELECT *
FROM `insurance_list`
WHERE CURDATE() < `expiration_date` AND DATEDIFF(`expiration_date`, CURDATE()) < 8  
;")->num_rows;
                else:
                   echo $qry = $conn->query("SELECT *
FROM `insurance_list`
WHERE CURDATE() < `expiration_date` AND DATEDIFF(`expiration_date`, CURDATE()) < 8 AND `user_name` = '" .$conn->real_escape_string($userName) . "' 
;")->num_rows;
                endif;
//                    echo $conn->query("SELECT * FROM `policy_list` where `status` = 1  && `delete_flag`= 1 ")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-maroon elevation-1"><i class="fas fa-file-alt"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Expired Insurances</span>
            <span class="info-box-number text-right">
                <?php
                $firstName = $_settings->userdata('firstname');
                $lastName = $_settings->userdata('lastname');

                // Concatenate and format the user's name
                $userName = ucwords($firstName . ' ' . $lastName);
//                echo $userName;

                if ($_settings->userdata('type') == 1):
                  echo  $qry = $conn->query("SELECT * FROM `insurance_list` WHERE `expiration_date` < NOW()  ORDER BY DATE(`registration_date`) ASC ; ")->num_rows;
                else:
                 echo  $qry = $conn->query("SELECT * FROM `insurance_list` WHERE `expiration_date` < NOW() AND `user_name` = '" .$conn->real_escape_string($userName) . "' ; ")->num_rows;
                endif;
//                    echo $conn->query("SELECT * FROM `policy_list` where `status` = 1 AND `delete_flag`= 0 ")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-gradient-light shadow">
            <span class="info-box-icon bg-gradient-teal elevation-1"><i class="fas fa-car"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Active Insurance</span>
            <span class="info-box-number text-right">
                <?php
                $firstName = $_settings->userdata('firstname');
                $lastName = $_settings->userdata('lastname');

                // Concatenate and format the user's name
                $userName = ucwords($firstName . ' ' . $lastName);
                if ($_settings->userdata('type') == 1):
                  echo  $qry = $conn->query("SELECT * FROM `insurance_list` WHERE `expiration_date` > NOW()  ORDER BY DATE(`registration_date`) ASC ; ")->num_rows;

                else:
                  echo  $qry = $conn->query("SELECT * FROM `insurance_list` WHERE `expiration_date` > NOW() AND `user_name` = '" .$conn->real_escape_string($userName) . "'  ; ")->num_rows;

                endif;
//                    echo $conn->query("SELECT * FROM `insurance_list` where `status` = 1 and date(expiration_date) > '".(date("Y-m-d"))."' ")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <?php if($_settings->userdata('type') == 1): ?>
        <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <div class="info-box bg-gradient-light shadow">
                <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-user-tie"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Clients</span>
                    <span class="info-box-number text-right">
                <?php
                echo $conn->query("SELECT * FROM `client_list` WHERE `delete_flag` = 0")->num_rows;
                ?>
            </span>
                </div>

                <!-- /.info-box-content -->
            </div>

            <!-- /.info-box -->
        </div>
    <?php endif; ?>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <img src="http://localhost/vims/uploads/back.png" alt="Website Cover" class="img-fluid border w-100 " id="website-cover">
    </div>
</div>
