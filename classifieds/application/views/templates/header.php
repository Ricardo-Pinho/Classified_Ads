<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/main.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/menu.css">
        <script src="http://www.google.com/jsapi"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="<?php echo base_url();?>public/js/jssor.slider.js"></script>
        <script src="<?php echo base_url();?>public/js/jssor.js"></script>
        <title>Classified Ads - Place your ads NOW!</title>
    </head>
    <body>
        <div class="header">
            <h1>CLASSIFIEDS</h1>
        </div>
        

        <!-- Menu with Categories, subcategories, and types - created in basic controller -->
        <div class="menu">
        	<h3>Categories</h3>
                <div id='cssmenu'>
                    <ul>
        	        	<?php foreach ($menu as $category_item): ?>
            				<li class='active has-sub'><a href='<?php echo base_url(); ?>advert/category/<?php echo $category_item['id'];?>'><span><?php echo $category_item['name'] ?></span></a>
            					<ul>
                                    <?php foreach ($category_item['subcategories'] as $subcategory_item): ?>
                    					<li class='has-sub'><a href='<?php echo base_url(); ?>advert/subcategory/<?php echo $subcategory_item['id'];?>'><span><?php echo $subcategory_item['name'] ?></span></a>
                        					<ul>
                                            	<?php foreach ($subcategory_item['types'] as $type_item): ?>
                        							<li><a href='<?php echo base_url(); ?>advert/type/<?php echo $type_item['id'];?>'><span><?php echo $type_item['name'] ?></span></a></li>
                        						<?php endforeach ?>
                                            </ul>
                                        </li>
                					<?php endforeach ?>
                                </ul>
                            </li>
            			<?php endforeach ?>
                    </ul>
                </div>
           <div id="xml_json_links"><a href="<?php echo end($this->uri->segments) ?>.xml">XML</a> | <a href="<?php echo end($this->uri->segments) ?>.json">JSON</a> </div>
 	   </div>

        <?php       
        	$this->load->helper('url');
        	$this->load->helper('html');
        ?>
        <!-- Category Bar with current category, subcategory, and type -->
        <div id='category_bar'>
            <div class='category_bar_link'>
                <a href='/classifieds/advert'>All</a> >
                <?php if (isset($category_url)) { ?> 
                    <a href='<?php echo $category_url ?>'><?php echo $category_name ?> </a> >
                    <?php if (isset($subcategory_url)) { ?>  
                        <a href='<?php echo $subcategory_url ?>'><?php echo $subcategory_name ?> </a> > 
                        <?php if (isset($type_url)) { ?> 
                            <a href='<?php echo $type_url ?>'><?php echo $type_name ?> </a>
                            <?php }
                        }
                    } ?>     
            </div>
        </div>
        <div id='content'>