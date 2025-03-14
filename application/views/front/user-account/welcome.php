<?php $this->load->view('front/common/header.php'); ?>
<?php $this->load->view('front/common/left-menu.php'); ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Welcome Letter</h1>
            <p>  &nbsp;</p>
            <p><a href="<?php echo base_url();?>generate-pdf" target="_blank" class="btn btn-primary">PDF Download</a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="about-letter-t">
                        <div class="about-letter-r">
                            <div class="about-letter-b">
                                <div class="about-letter-l">
                                    <div class="about-letter">
                                        <?php //echo "<pre>";print_r($arr_user_data);echo "</pre>";?>
                                        <strong> Congratulations ! </strong> <br> <br>

                                        You Are Successfully Register With <strong> JANHIT </strong> <br><br>

                                        <table cellpadding="pixels" cellspacing="pixels"><tbody><tr><td style="padding-right: 10px">
                                                        <strong> Member ID </strong>  </td><td> - <?php echo $arr_user_data['user_sponser_id']; ?> </td></tr>

                                                <tr><td><strong> Name  </strong> </td><td> - <?php echo strtoupper($arr_user_data['full_name']); ?></td></tr>   

                                                <tr><td><strong> Date of Joining  </strong></td><td> - <?php echo $arr_user_data['register_date']; ?> </td></tr>

                                                <tr><td><strong> Mobile No.  </strong> </td><td> - <?php echo $arr_user_data['mobile_no']; ?>  </td></tr> 

                                                <tr><td><strong> E-Mail ID  </strong></td><td> - <?php echo strtoupper($arr_user_data['user_email']); ?> </td></tr>

                                            </tbody></table> <br><br>

                                        <strong> Dear Sir/Madam,</strong><br> <br>

                                        We Congratulate you for being the part of <strong>JANHIT.</strong> We wholeheartedly welcome you. We really appreciate your decision of choosing the best system which will make you economically independent. We have launched a totally different concept which will make you feel everything different than old traditional System. We have provided you a golden opportunity to prove yourself and carry out all your caliber .
                                        <br> <br>
                                        OUR concept is genuine System in which you have to enrol persons who are really interested and voluntarily offer them to be the part of this group just like you and develop a strong system which will keep you at very high prominent place and apex of success. All the staff members are always ready to assist you all the time. Please do feel free to share your new thoughts and ideas. For latest information and updates keep surfing at <strong> www.gogreensavetree.in </strong> and forward your suggestion by mailing us to <strong> gogreensavetree52@gmail.com </strong> Your suggestions are very precious to us.   <br> <br>

                                        We once again congratulate and welcome you to the world of <strong> JANHIT </strong>  System and thank you for giving us an opportunity to serve you.   <br> <br>

                                        Yours Sincerely,   <br> <br>

                                        <strong> JANHIT </strong> Team  <br> <br>

                                        <br> 
                                        <strong> Managing Director </strong>

                                        <div class="space20"></div>

                                        <div class="space20"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $this->load->view('front/common/footer.php'); ?>
<style>
 
table {
    clear: both;
    max-width: none !important;
    width: 100%;
    max-width: 100%;
    margin-bottom: 1rem;
    border-collapse: collapse;
    background-color: #fff;
    border: 1px solid #d1d4d7;    
}
table th {
    vertical-align: bottom;
    border-bottom: 2px solid #d1d4d7;
    color: #55595c;
    background-color: #d1d4d7;
}
table th, table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #d1d4d7;
}
 </style>