<?php
session_start();
include("page-add.php");
include("../include/connect.php");
include("../db/db.php");
if($_SESSION['AdminId']=="")
{
echo "<script>window.location.href='index.php';</script>";
}

$editid = $_REQUEST['editid'];
$sql = rs_select_con("subcategory ","id='$editid'");
$res = mysql_fetch_assoc($sql);

$status = $res['status']=="Y"?"checked":"";
$sel = rs_select("category where status ='Y' and catname !=''","catname,id");
$sel1 = mysql_query("select ja_catname,id from category where status ='Y' and id ='".$res['catid']."'");
$ressel1 = mysql_fetch_assoc($sel1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//en" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin:: 47th Diamond District Corp.</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="js/validation.js"></script>
</head>

<body bgcolor="#F5F3E3">
<center>
  <?php echo admin_top();
  ?>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="text">
    <tr>
      <td bgcolor="#583103"><img src="images/dot.gif" width="1" height="2" /></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#3A1F08"><div id="navi-panel">
          <?php echo admin_nav(); ?>
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
      </div></td>
    </tr>
  </table>
  <?php echo admin_right_nav(); if(isset($_SESSION['msg']))
{
	echo $_SESSION['msg'];
	unset($_SESSION['msg']);
}?>
<br />
<table width="90%" height="33" border="0" cellpadding="6" cellspacing="0" class="text1">
  <tr>
    <td><h1><font color="#6B6B6B">Edit Sub Category</font></h1></td>
    <td align="right"><a href="#"></a></td>
  </tr>
</table>
<form action="dbfunction.php" name="addsubcat" method="post"  enctype="multipart/form-data">
<table width="90%" border="0" cellpadding="3" cellspacing="1" class="text1">
  <tr class="text">
    <td height="33" align="center" valign="top" bgcolor="#FFFFFF"><table width="50%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top"><table width="530" border="0" cellpadding="0" cellspacing="5" bgcolor="#FFFFFF" class="text1">
          <tr>
            <td width="130">Choose <font color="#6B6B6B">Category</font>:</td>
            <td width="262" height="48" align="center" ><label></label>
                <label>
                <select name="selectcat" class="inp2" id="selectcat" onchange="getServerResponse('showcatjap','AjaxHandler.php?query=showsubcat&dublicate='+this.value,'',false)">
                 <option value="">Select Category</option>
						<?php
						while($result = mysql_fetch_assoc($sel))
						{
							if($res['catid']==$result['id'])
							{
								echo'<option value='.$result['id'].' selected >'. stripslashes($result['catname']).'</option>';
							}
							else
							{
								echo'<option value='.$result['id'].'>'. stripslashes($result['catname']).'</option>';
							}
						}
						?>
                </select>
                </label>
            </td>
          </tr>
          <tr>
            <td width="130">Add <font color="#6B6B6B">Sub Category</font>:</td>
            <td width="262" height="48" align="center" ><label></label>
                <input name="textfield22" type="text" class="inp2" value="<?php echo stripslashes($res['subcat']); ?>" onchange="getServerResponse('subcatdiv2','AjaxHandler.php?query=checksubcat&catname='+document.getElementById('selectcat').value+'&dublicate='+this.value,'',false)" /></td><td width="130"><div id="subcatdiv2" style="color:#FF0000"></div></td>
          </tr>
           <tr>
            <td width="130">選択 <font color="#6B6B6B">カテゴリー</font>:</td>
            <td width="262" height="48" align="center" id="showcatjap"><input type ="text" name="subjapan" class="inp2" value ="<?php echo stripslashes($ressel1['ja_catname']); ?>" readonly="" id="subjapan"></td>
          </tr>
          <tr>
            <td width="130">追加 <font color="#6B6B6B">サブカテゴリー</font>:</td>
            <td width="262" height="48" align="center" ><label></label>
                <input name="jatextfield22" type="text" class="inp2" value="<?php echo stripslashes($res['ja_subcat']); ?>"  /></td><td width="130"><div id="subcatdiv3" style="color:#FF0000"></div></td>
          </tr>
		      <tr>
            <td>Add <font color="#6B6B6B">Image</font>:</td>
            <td width="262" height="48"  ><label></label>
             <input name="subimage" id="sub_image" type="file" class="inp5" />  </td>
		   </tr>
		   <tr>
            <td width="120"><font color="#6B6B6B">Title</font></td>
            <td width="262" height="48" align="left" colspan="2" ><label></label>
                    <input name="title" type="text" class="inp2"  id="title" value="<?php echo $res['seotitle']; ?>"/></td>
          </tr>
		   <tr>
            <td width="120"><font color="#6B6B6B">Japense Title</font></td>
            <td width="262" height="48" align="left" colspan="2" ><label></label>
                    <input name="jatitle" type="text" class="inp2"  id="jatitle" value="<?php echo $res['seojatitle']; ?>"/></td>
          </tr>
		  <tr>
            <td width="120"><font color="#6B6B6B">Keywords</font></td>
            <td width="262" height="48" align="left" colspan="2" ><label></label>
                  <textarea name="keywords" class="inp5" cols="45" rows="4"  id="keywords"><?php echo $res['keyword']; ?></textarea></td>
          </tr>
		   <tr>
            <td width="120"><font color="#6B6B6B">Japense Keywords</font></td>
            <td width="262" height="48" align="left" colspan="2" ><label></label>
                  <textarea name="jakeywords" class="inp5" cols="45" rows="4"  id="jakeywords"><?php echo $res['jakeyword']; ?></textarea></td>
          </tr>
		   <tr>
            <td width="120"><font color="#6B6B6B">Seo Description</font></td>
            <td width="262" height="48" align="left" colspan="2" ><label></label>
                    <textarea name="seodescription" class="inp5" cols="45" rows="4"  id="seodescription"><?php echo $res['seodescription']; ?></textarea></td>
          </tr>
		  <tr>
            <td width="120"><font color="#6B6B6B">Japense Seo Description</font></td>
            <td width="262" height="48" align="left" colspan="2" ><label></label>
                    <textarea name="jaseodescription" class="inp5" cols="45" rows="4"  id="jaseodescription"><?php echo $res['jaseodescription']; ?></textarea></td>
          </tr>
            <tr>
            <td>Publish:</td>
            <td width="262" height="48" align="left"><label>
              <input type="checkbox" name="checkbox" value="checkbox" <?php echo $status ?> />
              </label>
            </td>
          </tr>
          <tr>
            <td height="48" colspan="2" align="center"><br />
              <table width="240" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="center"><input type="image" src="images/update.gif" alt="submit" width="99" height="30" border="0" name="editsubcat" onclick = "return editSubCat();" /></a></td>
                  <td align="center"><a style="cursor:pointer"><img src="images/cancel.gif" alt="clear" width="99" height="30" border="0" onclick="history.back(-1);" /></a></td>
                </tr>
              </table>
              <label></label></td>
          </tr>
        </table></td>
        </tr>
    </table>
        <br />
        <br /></td>
  </tr>
</table>
<input type="hidden" name="editid" value="<?php echo $editid; ?>"  />
<input type="hidden" name="page" value="<?php echo $_REQUEST['page']; ?>"  />
<input type="hidden" name="catname" value="<?php echo $_REQUEST['catname']; ?>"  />
<input type="hidden" name="oldimagepath" value="<?php echo $res['imagepath']; ?>"  />

</form>


<br />
<?php echo admin_footer(); ?>
</center>
</body>
</html>
