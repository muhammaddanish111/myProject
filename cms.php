<?php
$pagenav=1;
include("include/connect.php");
include("include/page-add.php"); 
$imagepath = "gallery/large/";
$imagelist = "gallery/list/";
$rs = mysql_query("SELECT id,title,imagepath FROM `product` order by rand() LIMIT 0 , 4");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php echo showTitleFab($pagenav); ?>
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />

<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>
<script src="js/slider.js" type="text/javascript"></script>
<script type="text/javascript" src="js/main.js"></script>

</head>

<body>

<!-- Web Design & Developed by: http://www.webtimeinc.com -->

<!-- Top Start//-->
<div id="top-main">
<div id="top">
<?php echo logo(); ?>
<div id="top-right">
  <?php echo language() ?>
<div id="top-links">
<div id="navi-panel">
          <?php echo nav(); ?>
        <script type="text/javascript">
        jQuery.each(jQuery('#navi-panel>ul>li'), function() {
           if (jQuery(this).position().left > 625) {
                jQuery(this).children().filter('ul').addClass('submenuright')
            }
            jQuery(this).mouseover(function() {
                jQuery(this).addClass("sfhover")
            })
            jQuery(this).mouseout(function() {
                jQuery(this).removeClass("sfhover")
            })
        });
    </script>
      </div>
</div>
</div>
</div>
</div>
<!-- Top End//-->

<!-- image sliding start//-->
<!-- image sliding end//-->
<!-- center start//-->
<!-- center end//-->
<!-- welcome start//-->
<div id="welcome-ddc-box">
<!-- about start//-->
<div id="about-box">
<div id="welcome-heaading-inn">ABOUT US </div>
<!-- about text start//-->
<div id="welcome-text">
  <div align="justify"><?php $selcon = mysql_query("select aboutdesp from aboutus");
						   $rescol = mysql_fetch_assoc($selcon);
						   echo stripslashes($rescol['aboutdesp']);
						?>
  </div>
</div>
<!-- about text end//-->
</div>
<!-- about end//-->
<!-- getin touch start//-->
<div id="get-touch">
<div id="touch-heaading">STAY IN TOUCH </div>
<div id="touch-text"><?php $selcon = mysql_query("select contactdesp from contactus");
						   $rescol = mysql_fetch_assoc($selcon);
						   echo stripslashes($rescol['contactdesp']);
						?></div>
  
  </div></div>
<!-- getin touch end//-->

<!-- welcome end//-->

<!-- bottom start//-->
<?php echo bottom(); ?>
<!-- bottom end//-->
</body>
</html>
