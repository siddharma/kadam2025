<?php $this->load->view('front/common/header.php'); ?>
<?php $this->load->view('front/common/left-menu.php'); ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> My Member Tree</h1>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Subscribe</h3>
            <div class="tile-body">
              <form class="row" method="post" action="<?php echo base_url();?>level">
            
                <div class="form-group col-md-3">
                  <label class="control-label">Email</label>
                  <input class="form-control" type="text" name="search_id" placeholder="Enter your ID">
                </div>
                <div class="form-group col-md-3 align-self-end">
                    <input class="btn btn-primary" type="submit" id="downid" name="btnid" value="Down">
                    <input class="btn btn-primary" type="submit" id="upid" name="btnid" value="Up">
                 
                </div>
             
                <div class="form-group col-md-6 align-self-end">
                  <div style="width:auto; height:50px; float:right;">
                                <div class="a1">
                                    <img src="<?php echo base_url(); ?>media/front/images/vacant.png" style="width:50px; height:50px;">
                                    <span class="aaa">Vacant</span>
                                </div>
                                <div class="a1">
                                    <img src="<?php echo base_url(); ?>media/front/images/active.png" style="width:50px; height:50px ">
                                    <span class="aaa">Active</span>
                                </div>
                                <div class="a1">
                                    <img src="<?php echo base_url(); ?>media/front/images/inactive.png" style="width:50px; height:50px">
                                    <span class="aaa">Inactive</span>
                                </div>
                            </div>
                </div>
                 </form>
            </div>

                <style>.aaa{float:left; margin:0 0 0 -3px; padding:0 0 5px 0; font-size:10px; font-family:Verdana, Arial, Helvetica, sans-serif; font-weight:bold; width:80%; text-align:center;}.a1{float:left; margin:0; padding:10px 0 0 0; width:100px;}</style>

                <style>
                    table{
                        border:none !important;
                    }
                    .gogreencls{
	float:left; width:auto;  margin:0; text-align:center; font-size:14px;
    display:block;
    width:40px;
}
.gogreencls a{
	float:left;
	width:100%;
	height:100%;
	font-size:14px;
	color:#9F0000;
	padding:0;
	margin:0;
    display:block;
	text-align:center;
}
                </style>
                <div class="clear"></div>
                <div style="overflow: auto;" class="col-md-12"><br><br><br><br><br><br>
                    <div style="margin-top:60px;">
                        <div class="gogreencls" style="margin-left: 474px;margin-bottom: 15px;" onmouseout="$('.mypopup').hide();"
                        onmousemove="getmsg('<?php echo $sponser_user['user_sponser_id'];?>', '<?php echo $sponser_user['register_date'];?>','<?php echo $sponser_user['activate_date'];?>', '<?php echo $sponser_user['full_name'];?>','<?php echo $sponser_user['sponser_id'];?>')">
                         <a href="<?php echo base_url();?>level/<?php echo $sponser_user['user_sponser_id'];?>">
                        <img src="<?php echo base_url(); ?>media/front/images/active.png" style="width:40px; height:40px;  border:0px solid #CCCCCC;"><br>
                        <?php echo $sponser_user['user_sponser_id'];?></a>
                        </div>
                       
                    </div>
                  
                    <div style="width:1020px;"><img src="<?php echo base_url(); ?>media/front/images/line.png" style="margin-left:-7px;"><br><br></div>
                    <div class="clear"></div><div style="width:1075px;">
                        <table border="0">
                            <tbody>
                                <tr>
                                    <?php 
                                        $imgcnt = count($arr_team_data);
                                        if($imgcnt>0){
                                        foreach ($arr_team_data as $key=>$team){
                                 
                                    ?>
                                    <td style="width:104px">
                                        <div class="gogreencls"  onmouseout="$('.mypopup').hide();"
                                             onmousemove="getmsg('<?php echo $team['user_sponser_id'];?>', '<?php echo $team['register_date'];?>','<?php echo $team['activate_date'];?>', '<?php echo $team['full_name'];?>','<?php echo $team['sponser_id'];?>');">
                                            <?php if($team['is_active']=='No'){?>
                                            <a href="#">
                                                <img src="<?php echo base_url(); ?>media/front/images/inactive.png" style="width:40px; height:40px; border:0px solid #CCCCCC;"><br>
                                                <?php echo $team['user_sponser_id'];?></a>
                                            <?php }else{?>
                                            <a href="<?php echo base_url();?>level/<?php echo $team['user_sponser_id'];?>">
                                                <img src="<?php echo base_url(); ?>media/front/images/active.png" style="width:40px; height:40px; border:0px solid #CCCCCC;"><br>
                                                <?php echo $team['user_sponser_id'];?></a>
                                            <?php } ?>
                                        </div>
                                    </td>
                                   
                                        <?php } if($imgcnt<10){ 
                                       for($i=$imgcnt; $i<=9; $i++){?>
                                     <td>
                                        <div style="width:104px;"><div class="gogreencls" >
                                                <img src="<?php echo base_url(); ?>media/front/images/vacant.png" style="width:40px; height:40px; border:0px solid #CCCCCC;">
                                                <br>Vacant</div>
                                        </div>
                                    </td>
                                       <?php } }  }else{ 
                                           for($i=0; $i<=9; $i++){?>
                                    <td>
                                        <div style="width:104px;"><div class="gogreencls" >
                                                <img src="<?php echo base_url(); ?>media/front/images/vacant.png" style="width:40px; height:40px; border:0px solid #CCCCCC;">
                                                <br>Vacant</div>
                                        </div>
                                    </td>
                                       <?php } }?>
                                    
                                               
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br>
                </div>
        </div>
        </div>
    </div>
    </div>
</main>
<?php $this->load->view('front/common/footer.php'); ?>
<div style="position: absolute; z-index: 10000;display:none; " class="mypopup" id="popup"></div>
<style>
.no-pager + div .ng-table-pager {
    display: none!important;
}
</style>
<script type="text/javascript">

    $("div.gogreencls").mousemove(function(e){
        
   var parentOffset = $(this).offset();//$(this).parent().offset(); 
  
   var relX = e.pageX-150;// - parentOffset.left;
   var relY = e.pageY-150;// - parentOffset.top;

   if( ($('div.mypopup').css('display'))=='block' )
   {
        $('div.mypopup').css({'left':relX,'top':relY});
   }
    });	
        
    function getmsg(userid, joining,activate, fullname,sponserid) {
                
        var data = '<table style="border-collapse:collapse; font:11px Lucida Grande, Lucida Sans Unicode, Helvetica, Arial, sans-serif; background: #009688c7; color:#000000;" class="no-pager">';
        data = data + '<tr><td style="border:1px solid white; font-weight:bold; padding:5px;">Full Name</td><td colspan="6" style="border:1px solid white; padding:5px;" width="100">' + fullname + '</td></tr>';
        
        data=data+'<tr><td style="border:1px solid white;font-weight:bold; padding:5px;">Joining Date</td>';
        data = data + '<td style="border:1px solid white; padding:5px;" colspan="2" >' + joining + '</td><td style="border:1px solid white;font-weight:bold; padding:5px;">Active Date</td>';
        data = data + '<td style="border:1px solid white; padding:5px;" colspan="2">' + activate + '</td></tr>'
        data = data + '<tr><td style="border:1px solid white;font-weight:bold; padding:5px;">Login ID</td><td style="border:1px solid white; text-align:left; padding:5px;"colspan="2">' + userid + '</td><td style="border:1px solid white;font-weight:bold; padding:5px;">Sponsor</td><td style="border:1px solid white; padding:5px;"colspan="2">' + sponserid + '</td></tr>'; 
        data = data + '</table>';            
        $('.mypopup').html(data);
        $('.mypopup').show();
       }
</script>