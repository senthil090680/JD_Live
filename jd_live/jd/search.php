<?php require_once 'include/header.php';
error_reporting(E_ALL & ~E_NOTICE);

pre($_REQUEST);
if(isset($_REQUEST['action_search']) && $_REQUEST['action_search'] != '' && $_REQUEST['action_search'] == 'actionsearch' && isset($_REQUEST)) {
	extract($_REQUEST);

	//singleTon::debugerr($_REQUEST);
	//singleTon::debugerr($_FILES);
		
	//exit(0);

	$conWhere			=	" WHERE citytown = '$citytown' AND (companyname LIKE '%$companyname%' OR stradd LIKE '%$companyname%' OR postalcode LIKE '%$companyname%' OR mainphone LIKE '%$companyname%' OR mobilephone LIKE '%$companyname%' OR emailadd LIKE '%$companyname%' OR websitename LIKE '%$companyname%' OR descrip LIKE '%$companyname%' OR categ LIKE '%$companyname%' OR paymentoptions LIKE '%$companyname%' OR tags LIKE '%$companyname%')";

	$result				=	SingleTon::selectQuery("post_id,countryname,companyname,stradd,citytown,postalcode,mainphone,mobilephone, emailadd,websitename,descrip,categ,hoomonon,hoomonout,hoomonoff,hootueon,hootueout,hootueoff,hoowedon,hoowedout, hoowedoff,hoothuon,hoothuout,hoothuoff,hoofrion,hoofriout,hoofrioff,hoosaton,hoosatout,hoosatoff,hoosunon,hoosunout,hoosunoff, paymentoptions,photopath1,photopath2,photopath3,videopath1,tags,poststatus,insertedDate,modifiedDate","$conWhere",TABLE_POST,MY_ASSOC,NOR_YES);	
	$noOfRows				=	$result[0];
	$resultArray			=	$result[1];

	//pre($resultArray);
}
?>
<link rel='stylesheet' href="css/popup_open.css" type="text/css" />
<script type="text/javascript" src="js/popup_open.js"></script>
<script type="text/javascript" src="js/common.js"></script>
  <tr>
    <td align="center" valign="top"><img src="images/topimg.png" width="985" height="48" border="0" usemap="#Map" /></td>
  </tr>
  <tr>
    <td align="center" valign="top" bgcolor="#FFFFFF"><img src="images/line.png" width="985" height="5" /></td>
  </tr>
  <tr>
    <td align="center" valign="top"><img src="images/bluebot.png" width="985" height="8" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>

  <?php 
		if($noOfRows > 0) {		
		foreach($resultArray as $resultVal) { 
		
		$post_id	=	base64_encode($resultVal[post_id]); 
  ?>
  <tr>
    <td align="left" valign="top" >
	<form name="post<?php echo $post_id; ?>" id="post<?php $post_id; ?>" action="search_institute.php" method="post">
		<input type="hidden" id="post_data" name="post_data" value="<?php echo $post_id; ?>"/>
		<input type="hidden" id="action_indiv" name="action_indiv" value="actionindiv"/>
		<input type="hidden" id="keyword_indiv" name="keyword_indiv" value="<?php echo ($companyname); ?>"/>
	</form>
	<form name="rate<?php echo $post_id; ?>" id="rate<?php $post_id; ?>" action="rating.php" method="post">
		<input type="hidden" id="post_data" name="post_data" value="<?php echo $post_id; ?>"/>
		<input type="hidden" id="action_rating" name="action_rating" value=""/>
		<input type="hidden" id="keyword_indiv" name="keyword_indiv" value="<?php echo ($companyname); ?>"/>
		<input type="hidden" id="citytown" name="citytown" value="<?php echo ($citytown); ?>"/>
	</form>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="70%" align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">			
              <tr>
                <td width="2%" align="left" valign="top">&nbsp;</td>
                <td width="94%" height="30" align="left" valign="top" class="titxt"><a href="javascript:void(0);" onclick="callLandingPage('<?php $post_id; ?>');" ><?php echo $resultVal[companyname]; ?></a></td>
                <td width="4%" align="left" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="top">&nbsp;</td>
                <td align="left" valign="top"><div id="divbg">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="18%" align="left" valign="top">
					  
					  <?php if($resultVal[photopath1] !='') { ?>
					  <img src="<?php echo $resultVal[photopath1]; ?>" width="100" height="100" />				   
					  <?php } else if($resultVal[photopath2] !='') { ?>
					  <img src="<?php echo $resultVal[photopath2]; ?>" width="100" height="100" />				   
					  <?php } elseif($resultVal[photopath3] !='') { ?>
					  <img src="<?php echo $resultVal[photopath3]; ?>" width="100" height="100" />				   
					  <?php } else {?>
					  <img src="images/img.png" width="100" height="100" />
					  <?php } ?>
					  </td>
                      <td width="71%" align="left" valign="top"><span class="txt"><?php echo $resultVal[stradd]; ?><br/>
					  Call: +(91)- <?php echo $resultVal[mainphone];  ?>
					  <br/>
					  
					<?php if($resultVal[mobilephone] != '') { ?>
						Mobile : +(91)- <?php echo $resultVal[mobilephone];  }
					?>
					  </span></td>
                      <td width="11%" align="left" valign="top" class="txt"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td align="left" valign="top"><a href="javascript:void(0);" onclick="beforeCreateChatBox('<?php echo ($companyname); ?>','<?php echo base64_decode($post_id); ?>')" ><img src="images/emailbut.png" width="70" height="21" border="0"/></a></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top">&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="left" valign="top">
						  
						  <a href="javascript:void(0);" onclick="callRatingPage('<?php $post_id; ?>');" ><img src="images/rate.png" width="70" height="21" border="0" /></a>
						  
						  <!-- <a href="rateing.php" target="_self"><img src="images/rate.png" width="70" height="21" border="0" /></a> --></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table>
                </div></td>
                <td align="left" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="top">&nbsp;</td>
                <td align="left" valign="top" class="line1">&nbsp;</td>
                <td align="left" valign="top">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
        </table></td>
        <td width="30%" align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="97%" height="30" align="center" valign="middle" bgcolor="#F2F2F2" class="titxt">Ads</td>
            <td width="3%" align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
<?php }  } else { ?>
<tr>
    <td align="left" valign="top" >	
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="70%" align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">			
              <tr>
                <td width="2%" align="left" valign="top">&nbsp;</td>
                <td width="94%" height="30" align="left" valign="top" class="titxt"></td>
                <td width="4%" align="left" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="top">&nbsp;</td>
                <td align="left" valign="top"><div id="divbg">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="18%" align="left" valign="top">					  
					  &nbsp;
					  </td>
                      <td width="71%" align="left" valign="top"><span class="noresult">NO RESULTS FOUND FOR THE SEARCH.</span></td>
                      <td width="11%" align="left" valign="top" class="txt"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td align="left" valign="top">&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="left" valign="top">&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="left" valign="top">&nbsp;</td>
                        </tr>
                      </table></td>
                    </tr>
                  </table>
                </div></td>
                <td align="left" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="top">&nbsp;</td>
                <td align="left" valign="top" class="line1">&nbsp;</td>
                <td align="left" valign="top">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
        </table></td>
        <td width="30%" align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="97%" height="30" align="center" valign="middle" class="titxt">&nbsp;</td>
            <td width="3%" align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
  <td>
 
  </td>
  </tr>
<?php } ?>
 <div id="backgroundChatPopup"></div>
<?php require_once 'include/footer.php';
?>