<?php
   require_once("db_conf.php");
   unset($_SESSION['message']);
   unset($_SESSION['type']);


   if(isset($_POST['Submit'])){

      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $country = $_POST['country'];
      $cname = $_POST['cname'];

      $inisql = "INSERT INTO employee
         (fname, lname, country, cname)
         VALUES ('$fname','$lname','$country','$cname')"
         ;
      $retvalnew = mysqli_query( $con, $inisql);
      if ( $retvalnew ) {
         // echo "New record created successfully";
         $_SESSION['message'] ='New record created successfully';
         $_SESSION['type'] ='success';
      } else {
         echo "Error: " . $sql . "<br>" . mysqli_error($con);
      }
      // var_dump($_SESSION);
      // exit();
      // $_SESSION['entry_tab_show'] =  1;
      header("location: ../index.php");

   }
   if(isset($_POST['Update']))
   {
      $id = $_POST['id'];

      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $country = $_POST['country'];
      $cname = $_POST['cname'];

      // update user data
      $result = "UPDATE employee SET fname='$fname',lname='$lname',country='$country',cname='$cname' WHERE id='$id'";

      $rev = mysqli_query( $con, $result);
      $_SESSION['message'] ='Record Updated successfully';
      $_SESSION['type'] ='info';
      // Redirect to homepage to display updated user in list
      header("location: ../index.php");
   }
   if(isset($_GET['delete'])){
      $id = $_GET['delete'];

      $nwsql = "DELETE FROM employee WHERE id='$id'";
      // print_r($id);
      // exit();
      $cont = mysqli_query($con, $nwsql);
      $_SESSION['message'] ='Record deleted successfully';
      $_SESSION['type'] ='danger';
      header("location: ../index.php");
   }
?>
