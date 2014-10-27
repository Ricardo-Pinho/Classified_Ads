<!-- Script used to do pagination via ajax -->
<script type="text/javascript">
            $(document).ready(function(){
            var num_adverts = <?=$num_adverts?>;
            var loaded_adverts = 0;
             if(num_adverts < 9)
                {
                    $("#more_button").hide();
                }
                $(window).scroll(function() {
                    if($(window).scrollTop() + $(window).height() == $(document).height()) {
                        if(loaded_adverts <= num_adverts)
                        {
                            loaded_adverts += 9;
                            $('#loadimg').show();
                            $.get("get_newads/" + loaded_adverts, function(data){
                                //alert(window.location);
                                $("#content").append(data);
                                $('#loadimg').hide();
                            });

                            if(loaded_adverts >= num_adverts - 9)
                            {
                                $("#more_button").hide();
                                //alert('hide');
                            }
                        }
                    }
                });
            });
        </script>


<?php foreach ($adverts as $advert_item): ?>
    <div class='advert'>
        <h4><span><?php echo $advert_item['title'] ?></span></h4>
        
        <!-- Checks for main image, sets default image if none exists -->
        <div class='container'>
            <div class='ad_info'>
                <?php 
                    $img= base_url().'uploads/ads_img/'.$advert_item['id'].'/main.jpg';
                    $default_img= base_url().'uploads/ads_img/default.png';
                    if (file_exists( 'uploads/ads_img/'.$advert_item['id'].'/main.jpg' ))
                        {
                            echo '<img src="'.$img.'" alt="main_img" height="200" width="200"> ';
                        }
                        else
                        {
                            echo '<img src="'.$default_img.'" alt="main_img" height="200" width="200"> ';
                        }
                ?>
                <?php echo '<p class="advert_geninfo"> by '.$advert_item['customer']['name'].' ('.$advert_item['customer']['email'].')</p>' ?>
                <?php echo '<p class="advert_geninfo"> $'.$advert_item['price'].'</p>' ?>
                <!-- Extra information
                <div class='main'>
                    <?php echo '<p> Body: '.$advert_item['body'].'</p>' ?>
                    <?php echo '<p> Seller: '.$advert_item['customer']['name'].'</p>' ?>
                    <?php echo '<p> Category: '.$advert_item['category']['name'].'</p>' ?>
                    <?php echo '<p> Subcategory: '.$advert_item['subcategory']['name'].'</p>' ?>
                    <?php echo '<p> Type: '.$advert_item['type']['name'].'</p>' ?>
                    <?php echo '<p> Post Date: '.$advert_item['post_date'].'</p>' ?>
                    <?php echo '<p> Price: $'.$advert_item['price'].'</p>' ?>
                    <?php echo '<p> Status: '.$advert_item['status'].'</p>' ?>
                </div> -->
            </div>
            <!-- Information displayed when hovering the ad -->  
            <div class='clickad'>
                <a class='clickad_info' href='<?php echo base_url(); ?>advert/<?php echo $advert_item['id'] ?>'>
                    <?php 
                        $body = (strlen($advert_item['body']) > 200) ? substr ( $advert_item['body'] , 0 , 200 ).'...' : $advert_item['body'];
                        echo '<p class="advert_geninfo">'.$body.'</p>';
                     ?>
                    </br>
                    <p>View More</p>
                </a>
            </div>

        </div>
    </div>
<?php endforeach ?>
</div>
<!-- Loading bar during pagination -->
<div id="loadimg"><img src="<?php echo base_url(); ?>public/img/bkg-loading-wheel.gif" > Loading </div>
<div id="more_button">
more
</div>