<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:https://us3.ca.analytics.ibm.com/bi/?perspective=explore&id=i25D64416091D4556B273BB9BF2B0CEA0&objRef=i25D64416091D4556B273BB9BF2B0CEA0&options%5BdisableGlassPrefetch%5D=true&options%5Bcollections%5D%5BcanvasExtension%5D%5Bid%5D=com.ibm.bi.dashboard.canvasExtension&options%5Bcollections%5D%5BfeatureExtension%5D%5Bid%5D=com.ibm.bi.dashboard.core-features&options%5Bcollections%5D%5Bbuttons%5D%5Bid%5D=com.ibm.bi.dashboard.buttons&options%5Bcollections%5D%5Bwidget%5D%5Bid%5D=com.ibm.bi.dashboard.widgets&options%5Bcollections%5D%5BcontentFeatureExtension%5D%5Bid%5D=com.ibm.bi.dashboard.content-features&options%5Bcollections%5D%5BsaveServices%5D%5Bid%5D=com.ibm.bi.dashboard.saveServices&options%5Bcollections%5D%5Btemplates%5D%5Bid%5D=com.ibm.bi.dashboard.templates&options%5Bcollections%5D%5BvisualizationExtension%5D%5Bid%5D=com.ibm.bi.dashboard.visualizationExtensionCA&options%5Bcollections%5D%5BboardModel%5D%5Bid%5D=com.ibm.bi.dashboard.boardModelExtension&options%5Bcollections%5D%5BcontentTypes%5D%5Bid%5D=com.ibm.bi.dashboard.contentTypes&options%5Bcollections%5D%5BserviceExtension%5D%5Bid%5D=com.ibm.bi.dashboard.serviceExtension&options%5Bcollections%5D%5BlayoutExtension%5D%5Bid%5D=com.ibm.bi.dashboard.layoutExtension&options%5Bcollections%5D%5BcolorSetExtensions%5D%5Bid%5D=com.ibm.bi.dashboard.colorSetExtensions&options%5Bconfig%5D%5BeditPropertiesLabel%5D=true&options%5Bconfig%5D%5BenableInteractions%5D=true&options%5Bconfig%5D%5BassetTags%5D%5B%5D=explore&options%5Bconfig%5D%5Bupgrades%5D=dashboard-core%2Fjs%2Fdashboard%2Fupgrades&options%5Bconfig%5D%5BusePreferredSize%5D=false&options%5Bconfig%5D%5BgeoService%5D=CA&options%5Bconfig%5D%5Binteractions%5D%5Bmove%5D=false&options%5Bconfig%5D%5Binteractions%5D%5BeditTitle%5D=false&options%5Bconfig%5D%5Binteractions%5D%5Bduplicate%5D=false&options%5Bconfig%5D%5Binteractions%5D%5BlaunchExplore%5D=false&options%5Bconfig%5D%5Binteractions%5D%5Bdelete%5D=false&options%5Bconfig%5D%5Binteractions%5D%5BchangeVis%5D=false&options%5Bconfig%5D%5Binteractions%5D%5BeditNotebookWidget%5D=false&options%5Bconfig%5D%5Binteractions%5D%5Bexpand%5D=false&options%5Bconfig%5D%5Binteractions%5D%5BmoveGroupContent%5D=false&options%5Bconfig%5D%5Binteractions%5D%5Bselection%5D=explore%2Finteractions%2Fselection&options%5Bconfig%5D%5Binteractions%5D%5Bresize%5D=false&options%5Bconfig%5D%5Binteractions%5D%5BeventGroup%5D=false&options%5Bconfig%5D%5Binteractions%5D%5BdrillThrough%5D=false&options%5Bconfig%5D%5Binteractions%5D%5Bgroup%5D=false&options%5Bconfig%5D%5Binteractions%5D%5Border%5D=false&options%5Bconfig%5D%5BremainSelectedOnPin%5D=true&options%5Bconfig%5D%5BshowTabs%5D=true&options%5Bconfig%5D%5BenableCustomDataSelection%5D=true&options%5Bconfig%5D%5Bproduct%5D=CA&options%5Bconfig%5D%5Bthumbnail%5D%5Bsize%5D%5Bwidth%5D=190&options%5Bconfig%5D%5Bthumbnail%5D%5Bsize%5D%5Bheight%5D=100&options%5Bconfig%5D%5Bprofile%5D=explore&options%5Bconfig%5D%5BhostApplicationName%5D=.ExploreHost&options%5Bconfig%5D%5BenableCustomVisualizations%5D=true&options%5Bconfig%5D%5BfilterDock%5D=true&options%5Bconfig%5D%5BshowMembers%5D=true&options%5Bconfig%5D%5BassetType%5D=exploration&options%5Bconfig%5D%5Btoolbar%5D=false&options%5Bconfig%5D%5BsmartTitle%5D=true&options%5Bconfig%5D%5Bselection%5D%5BdeselectionSelector%5D=explore%2Finteractions%2Fdeselection&options%5Bconfig%5D%5BpageContainerType%5D=exploreCard&options%5Bconfig%5D%5BnavigationGroupAction%5D=true&options%5Bconfig%5D%5BenableDataQuality%5D=false&options%5Bconfig%5D%5BmemberCalculation%5D=false&isAuthoringMode=true&boardId=i25D64416091D4556B273BB9BF2B0CEA0');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register_form.php">register now</a></p>
   </form>

</div>

</body>
</html>