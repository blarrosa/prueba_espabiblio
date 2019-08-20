<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */

   require_once("../shared/common.php");
  $tab = "user";
  $nav = "view";
  $helpPage = "memberView";

  $focus_form_name = "pwdresetform";
  $focus_form_field = "pass_user";
 // $focus_form_name = "barcodesearch";
//  $focus_form_field = "barcodeNmbr";
  include("../user/logincheck.php");
  include("../shared/header.php");
  require_once("../classes/Localize.php");
  $loc = new Localize(OBIB_LOCALE,$tab);

  #****************************************************************************
  #*  Checking for query string flag to read data from database.
  #****************************************************************************
  if (isset($_GET["UID"])){
    unset($_SESSION["postVars"]);
    unset($_SESSION["pageErrors"]);

    $postVars["barcode_nmbr"] = $_GET["UID"];
  } else {
    require("../shared/get_form_vars.php");
  }

?>

<form name="pass_userResetform" method="POST" action="../user/user_pwd_reset.php">
<input type="hidden" name="barcode_nmbr" value="<?php echo H($postVars["barcode_nmbr"]);?>">
<table class="primary">
  <tr>
    <th colspan="2" valign="top" nowrap="yes" align="left">
      <?php echo $loc->getText("adminStaff_pwd_reset_form_Resetheader"); ?>
    </td>
  </tr>
  <tr>
    <td nowrap="true" class="primary">
      <?php echo $loc->getText("adminStaff_new_form_Password"); ?>
    </td>
    <td valign="top" class="primary">
      <input type="password" name="pass_user" size="20" maxlength="20"
      value="<?php if (isset($postVars["pass_user"])) echo H($postVars["pass_user"]); ?>" ><br>
      <font class="error">
      <?php if (isset($pageErrors["pass_user"])) echo H($pageErrors["pass_user"]); ?></font>
    </td>
  </tr>
  <tr>
    <td nowrap="true" class="primary">
      <?php echo $loc->getText("adminStaff_new_form_Reenterpassword"); ?>
    </td>
    <td valign="top" class="primary">
      <input type="password" name="pass_user2" size="20" maxlength="20"
      value="<?php if (isset($postVars["pass_user2"])) echo H($postVars["pass_user2"]); ?>" ><br>
      <font class="error">
      <?php if (isset($pageErrors["pass_user2"])) echo H($pageErrors["pass_user2"]); ?></font>
    </td>
  </tr>
  <tr>
    <td align="center" colspan="2" class="primary">
      <input type="submit" value="  <?php echo $loc->getText("adminSubmit"); ?>  " class="button">
      <input type="button" onClick="self.location='../admin/staff_list.php'" value="  <?php echo $loc->getText("adminCancel"); ?>  " class="button">
    </td>
  </tr>

</table>
</form>
<?php include("../shared/footer.php"); ?>