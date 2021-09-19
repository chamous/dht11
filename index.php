<?php

session_start();

$con=mysqli_connect('localhost','root','','north');

if (!isset($_SESSION['user'])) {
  ?>
    <script>
      alert('Session id denied please Goto Login Page ..! Thank Page ...!')
      window.open('login.php','_self')
    </script>
  <?php
  exit();
}

if (isset($_POST['create'])) {
    
    $name=$_POST['name'];
    $desc=$_POST['desc'];

    if ($name == '') {
       ?>
        <script>
          alert('This fields is blank ')
        </script>
      <?php
    }
    if ($desc == '') {
       ?>
        <script>
          alert('This fields is blank ')
        </script>
      <?php
    }

    $Query="INSERT INTO category (categoryName , categoryDescription) VALUES ('$name','$desc') ";
    $run=mysqli_query($con,$Query);
    if ($run > 0) {
      ?>
        <script>
          alert('Insert Successfull ...!')
        </script>
      <?php
    }
    else{
      ?>
        <script>
          alert('Error  !')
        </script>
      <?php    
    }
  }
?>

<?php include 'header.php' ;?>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                      <div class="row">

                                            <div class="col-sm-12">
                                                <div class="card shadow-lg">
                                                  <div class="card-body font-weight-bold">
                                                        <div class="form-group">
                                                          <button onclick='window.location.reload(true)' class="btn btn-block btn-info btn-sm font-weight-bold">Refresh</button>
                                                        </div>
                                                      </form>

                                                      <table class="table table-hover " id="mytable">
                                                        <thead>
                                                          <tr>
                                                            <th>ID</th>
                                                            <th>Humidity</th>
                                                            <th>Temperature</th>
                                                            <th>Date</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                          <?php 
                                                              $con=mysqli_connect('localhost','root','','temphumid');
                                                              $Query="SELECT * FROM dht11";
                                                              $run=mysqli_query($con,$Query);
                                                              while ($row=mysqli_fetch_array($run)) {
                                                                ?>
                                                                  <tr>
                                                                    <td><?php echo $row['ID'];?></td>
                                                                    <td><?php echo $row['humidity'];?></td>
                                                                <td>
                                                                <?php echo $row['temperature'];?></td>
                                                                <td><?php echo $row['date'];?></td>
                                                                <?php
                                                              }
                                                          ?>
                                                        </tbody>
                                                        <tfoot>
                                                        </tfoot>
                                                      </table>
                                                  </div>
                                                </div>
                                            </div>
                                          </div>
                                      </div>
                                  </div>
                               </div>
                            </div> 
                          </div>       
<script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
<!-- am chart -->
<script src="assets/pages/widget/amchart/amcharts.min.js"></script>
<script src="assets/pages/widget/amchart/serial.min.js"></script>
<!-- Chart js -->
<script type="text/javascript" src="assets/js/chart.js/Chart.js"></script>
<!-- Todo js -->
<script type="text/javascript " src="assets/pages/todo/todo.js "></script>
<!-- Custom js -->
<script type="text/javascript" src="assets/pages/dashboard/custom-dashboard.min.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>
<script type="text/javascript " src="assets/js/SmoothScroll.js"></script>
<script src="assets/js/pcoded.min.js"></script>
<script src="assets/js/vartical-demo.js"></script>
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
</body>

</html>
