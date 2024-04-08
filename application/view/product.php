<div id="content">
    <?php 
    $files = array_diff(scandir('images/product/medium'), array(".", "..") );
    
    $first = 0;
    $class = "";
    $loopIndex = 1;
        foreach($files as $file) {
            $productName = substr($file, 0, strrpos($file, "."));
            if($first == 0) {
                $class = "first";
            } else {
                $class = "";
            }
    ?>
    
    <?php if($loopIndex == 1) { ?>
    	<div id="featured">
    		<ul>
    <?php } ?>
    	<li class="<?php echo $class; ?>">
    		<a href="product-detail.php">
    			<img src="images/product/medium/<?php echo $file; ?>" alt="Image" />
    		</a>
			<?php include_once 'product/description/'.$productName.'.php'; ?>
    		<a class="link" href="detail?pname=<?php echo $productName; ?>">View Detail</a>
    	</li>
    	<?php $first++; ?>
    	<?php if($loopIndex%3 == 0) { ?>
    		</ul></div>
    		<div id="featured"><ul>
    		<?php $first = 0; ?>
    	<?php } ?>
    	
    	<?php if($loopIndex == count($files)) { ?>
    		</ul></div>
    	<?php } ?>
    	<?php $loopIndex++; ?>
    <?php } ?>
</div>
<script>
    $(document).ready(function() {
    	$('.nav-list li.current').removeClass('current');
    	$('#productLi').addClass('current');
    });
</script>