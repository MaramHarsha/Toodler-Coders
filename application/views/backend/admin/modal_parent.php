<?php 
    $parents = $this->db->get_where('parent' , array('parent_id' => $param2))->result_array();
    foreach($parents as $row):
?>
    <div class="modal-body">
        <div class="modal-header" style="background-color:#00579c">
            <h6 class="title" style="color:white"><?php echo getEduAppGTLang('update_information');?></h6>
        </div>
        <div class="ui-block-content">
            <?php echo form_open(base_url() . 'admin/parents/update/'.$row['parent_id'], array('enctype' => 'multipart/form-data'));?>
                <div class="row">
                    <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                         <div class="form-group">
                            <label class="control-label"><?php echo getEduAppGTLang('photo');?></label>
                            <input name="userfile" accept="image/x-png,image/gif,image/jpeg" id="imgpre" type="file"/>
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group label-floating">
                            <label class="control-label"><?php echo getEduAppGTLang('first_name');?></label>
                            <input class="form-control" type="text" name="first_name" required="" value="<?php echo $row['first_name'];?>">
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group label-floating">
                            <label class="control-label"><?php echo getEduAppGTLang('last_name');?></label>
                            <input class="form-control" type="text" required="" name="last_name" value="<?php echo $row['last_name'];?>">
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group label-floating">
                            <label class="control-label"><?php echo getEduAppGTLang('username');?></label>
                            <input class="form-control" type="text" name="username" required="" value="<?php echo $row['username'];?>">
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group label-floating">
                            <label class="control-label"><?php echo getEduAppGTLang('password');?></label>
                            <input class="form-control" type="text" name="password">
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group label-floating">
                            <label class="control-label"><?php echo getEduAppGTLang('email');?></label>
                            <input class="form-control" type="email" id="email" name="email" value="<?php echo $row['email'];?>">
                            <small><span id="result_email"></span></small>
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group label-floating">
                            <label class="control-label"><?php echo getEduAppGTLang('business_work');?></label>
                            <input class="form-control" type="text" name="business"  value="<?php echo $row['business'];?>">
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group label-floating">
                            <label class="control-label"><?php echo getEduAppGTLang('phone_work');?></label>
                            <input class="form-control" type="text" name="business_phone"  value="<?php echo $row['business_phone'];?>">
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group label-floating">
                            <label class="control-label"><?php echo getEduAppGTLang('phone');?></label>
                            <input class="form-control" placeholder="" name="phone" type="text" value="<?php echo $row['phone'];?>">
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group label-floating">
                            <label class="control-label"><?php echo getEduAppGTLang('home_phone');?></label>
                            <input class="form-control" type="text" name="home_phone"  value="<?php echo $row['home_phone'];?>">
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group label-floating">
                            <label class="control-label"><?php echo getEduAppGTLang('address');?></label>
                            <input class="form-control" placeholder="" name="address" type="text" value="<?php echo $row['address'];?>">
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                        <button class="btn btn-rounded btn-success btn-lg" id="sub_form" type="submit"><?php echo getEduAppGTLang('update');?></button>
                    </div>
                </div>
            <?php echo form_close();?>
        </div>
    </div>
    <?php endforeach;?>
    <script type="text/javascript">
        $(document).ready(function(){         
            var query;          
            $("#email").keyup(function(e){
                query = $("#email").val();
                $("#result_email").queue(function(n) {                     
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url();?>register/search_email',
                        data: "c="+query,
                        dataType: "html",
                        error: function(){
                            alert("¡Error!");
                        },
                        success: function(data)
                        { 
                            if (data == "success") 
                            {            
                                texto = "<b style='color:#ff214f'><?php echo getEduAppGTLang('email_already_exist');?></b>"; 
                                $("#result_email").html(texto);
                                $('#sub_form').attr('disabled','disabled');
                            }
                            else { 
                                texto = ""; 
                                $("#result_email").html(texto);
                                $('#sub_form').removeAttr('disabled');
                            }
                            n();
                        }
                    });                           
                });                       
            });                       
        });
    </script>