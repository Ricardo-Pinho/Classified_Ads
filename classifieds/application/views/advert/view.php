<!-- Script used in slideshow -->
<script>
    jQuery(document).ready(function ($) {
    var options = {
        $ArrowNavigatorOptions: {
            $Class: $JssorArrowNavigator$,
            $ChanceToShow: 2

        },
        $ThumbnailNavigatorOptions: {
            $Class: $JssorThumbnailNavigator$,
            $ChanceToShow: 2
        }
    };
        var jssor_slider1 = new $JssorSlider$('slider1_container', options);
    });
</script>
<?php
	echo '<h2>'.$advert_item['title'].'</h2>';
	

	//Checks for main image, sets default image if none exists
	$img_dir= 'uploads/ads_img/'.$advert_item['id'];
	$img= $img_dir.'/main.jpg';
    $default_img= 'uploads/ads_img/default.png';
    if (file_exists( $img ))
        {
            echo '<img class="main_img" src="../'.$img.'" alt="main_img" height="200" width="200"> ';
        }
        else
        {
            echo '<img class="main_img" src="../'.$default_img.'" alt="main_img" height="200" width="200"> ';
        }

    //Extra information
	echo '<p>'.$advert_item['body'].'</p>';
	echo '<p> Seller: '.$advert_item['customer']['name'].' ('.$advert_item['customer']['email'].')</p>';
	echo '<p> Category: '.$advert_item['category']['name'].'</p>';
	echo '<p> Subcategory: '.$advert_item['subcategory']['name'].'</p>';
	echo '<p> Type: '.$advert_item['type']['name'].'</p>';
	echo '<p> Post Date: '.$advert_item['post_date'].'</p>';
	echo '<p> Price: $'.$advert_item['price'].'</p>';
	//echo '<p> Status: '.$advert_item['status'].'</p>';
	
    //Adds all other existing images for this advert in a slideshow
	$cntr=1;
	$other_imgs=$img_dir.'/'.$cntr.'.jpg';
    if (file_exists( $other_imgs ))
    {
    	echo '<div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 400px;
     height: 300px; overflow: hidden;">';
    	echo '<div u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 400px; height: 300px;">';
    	//echo '<div u="slides" style="cursor: move; width: 600px; height: 300px;">';
    	while (file_exists( $other_imgs ))
            {
                echo '<div><img u="image" src="../'.$other_imgs.'" alt="main_img" height="200" width="200"></div> ';
                ++$cntr;
                $other_imgs=$img_dir.'/'.$cntr.'.jpg';
            }
        echo "</div>";
    ?>
        <!-- Slideshow Arrows -->
        <!-- Arrow Left -->
        <span u="arrowleft" class="jssora09l" style="width: 50px; height: 50px; top: 123px; left: 8px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora09r" style="width: 50px; height: 50px; top: 123px; right: 8px">
        </span>
        <!-- Arrow Navigator Skin End -->
    </div>
<?php
}
