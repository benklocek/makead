<?php
include 'banner-class.php';
$banner = new BPLBanner();
if(isset($_GET['position'])){
	foreach($_GET as $n=>$v){
		$banner->Set($n, $v);
	}
}
//$banner->Set('position', 'banner-right');
//$banner->Set('txtcolor', 'white');

//var_dump($banner);
//var_dump($_POST);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html> <!--<![endif]-->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>BPL Banner-Ad Generator - 1.1</title>
	<link href="http://webfonts.fontslive.com/css/aa671d7d-666b-4374-8303-4ded15c05d90.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.8.7.custom.css" type="text/css" media="screen" charset="utf-8">
	<link rel="stylesheet" href="css/ads.css" type="text/css" media="screen" charset="utf-8">	
	<link rel="stylesheet" href="http://cache.backpackinglight.com/backpackinglight/stylesheets/main.css?ad1" type="text/css" media="screen">
	
	<script src="js/jquery-1.4.4.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery-ui-1.8.7.custom.min.js" type="text/javascript" charset="utf-8"></script>
	<!-- // <script src="js/jquery.cycle.min-2.60.js" type="text/javascript" charset="utf-8"></script> -->
	<script src="js/script.js" type="text/javascript" charset="utf-8"></script> 
</head>
<body id="builder">
	<div id="container">
			<form action="./" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	<div id="contentwide">	
	<div id="front-ads" class="ads">
	
<?php $banner->Display(); ?>

	<span id="next-ads" style="display: none">
<?php //$banner->Display(); ?>
<?php //$banner->Display(); ?>
	</span>
	
	</div><br/>
	   <input type="hidden" name="submitted" value="1" id="submitted">
	   <input type="hidden" name="newfilename" value="<?php echo $banner->file; ?>" id="newfilename">
		<input type="hidden" name="max_file_size" value="1000000" id='max_file_size' />
		<div class="left">
		<dl id="position">
			<dt>Block Position</dt>
			
			<?php		                        //$id, $label, $name, $value, $type
		$position[] = array('id'=>'banner-left','label'=>'Left', 'value'=>'banner-left');
		$position[] = array('id'=>'banner-top','label'=>'Top', 'value'=>'banner-top');
		$position[] = array('id'=>'banner-bottom','label'=>'Bottom', 'value'=>'banner-bottom');
		$position[] = array('id'=>'banner-right','label'=>'Right', 'value'=>'banner-right');
		$position[] = array('id'=>'banner-none','label'=>'None', 'value'=>'banner-none');
		foreach ($position as $item){
		   $item['name'] = 'position';
		   $item['type'] = 'radio';
		   echo '<dd>'.$banner->DisplayInput($item).'</dd>';
		}
		?>
		</dl>
		
		<dl>
			<dt>Block Color</dt>
			<dd id="bgblack">Black: <?php
	   		$bgcolor[0] = array('id'=>'bg-black20','label'=>'20%', 'value'=>'bg-black20');
	   		$bgcolor[1] = array('id'=>'bg-black50','label'=>'50%', 'value'=>'bg-black50');
	   		$bgcolor[2] = array('id'=>'bg-black80','label'=>'80%', 'value'=>'bg-black80');
	   		foreach ($bgcolor as $item){
	   		   $item['name'] = 'bgcolor';
	   		   $item['type'] = 'radio';
	   		   echo '<span>'.$banner->DisplayInput($item).'</span>';
	   		}?>	
			</dd>
			<dd id="bgwhite">White:<?php
	   		$bgcolor[0] = array('id'=>'bg-white20','label'=>'20%', 'value'=>'bg-white20');
	   		$bgcolor[1] = array('id'=>'bg-white50','label'=>'50%', 'value'=>'bg-white50');
	   		$bgcolor[2] = array('id'=>'bg-white80','label'=>'80%', 'value'=>'bg-white80');
	   		foreach ($bgcolor as $item){
	   		   $item['name'] = 'bgcolor';
	   		   $item['type'] = 'radio';
	   		   echo '<span>'.$banner->DisplayInput($item).'</span>';
	   		} ?>	
			</dd>
			<dd id="bgorange">Orange:<?php
	   		$bgcolor[0] = array('id'=>'bg-orange20','label'=>'20%', 'value'=>'bg-orange20');
	   		$bgcolor[1] = array('id'=>'bg-orange50','label'=>'50%', 'value'=>'bg-orange50');
	   		$bgcolor[2] = array('id'=>'bg-orange80','label'=>'80%', 'value'=>'bg-orange80');
	   		foreach ($bgcolor as $item){
	   		   $item['name'] = 'bgcolor';
	   		   $item['type'] = 'radio';
	   		   echo '<span>'.$banner->DisplayInput($item).'</span>';
	   		} ?>	
			</dd>
		</dl>
		
		<dl>
			<dt>Block Text Color</dt>
			<select name="txtcolor" id="txtcolor" size="1">
				<?php
   		$txtcolor[] = array('id'=>'txt-white','label'=>'White', 'value'=>'txt-white');
   		$txtcolor[] = array('id'=>'txt-gray20','label'=>'Gray 20', 'value'=>'txt-gray20');
   		$txtcolor[] = array('id'=>'txt-gray50','label'=>'Gray 50', 'value'=>'txt-gray50');
   		$txtcolor[] = array('id'=>'txt-gray80','label'=>'Gray 80', 'value'=>'txt-gray80');
			$txtcolor[] = array('id'=>'txt-black','label'=>'Black', 'value'=>'txt-black');
   		$txtcolor[] = array('id'=>'txt-orange','label'=>'Orange', 'value'=>'txt-orange');
   		foreach ($txtcolor as $item){
   		   $item['name'] = 'txtcolor';
   		   $item['type'] = 'select';
   		   echo $banner->DisplayInput($item);
   		}
   		?>
			</select>
		</dl>
		
		</div>
		<div class="left">		
		<dl id="titlealign">
			<dt>Title Alignment &amp; Size</dt>
				<?php
   		$titlealign[] = array('id'=>'titlealign-left','label'=>'Left', 'value'=>'aleft');
   		$titlealign[] = array('id'=>'titlealign-center','label'=>'Center', 'value'=>'acenter');
   		$titlealign[] = array('id'=>'titlealign-right','label'=>'Right', 'value'=>'aright');
   		foreach ($titlealign as $item){
   		   $item['name'] = 'titlealign';
   		   $item['type'] = 'radio';
   		   echo '<dd>'.$banner->DisplayInput($item).'</dd>';
   		}
   		?>
			<dd><label for="titlesize">Size</label>
			<select name="titlesize" id="titlesize" size="1">
				<?php
   		$titlesize[] = array('id'=>'titlesize-1','label'=>'-2', 'value'=>'s1');
   		$titlesize[] = array('id'=>'titlesize-2','label'=>'-1', 'value'=>'s2');
   		$titlesize[] = array('id'=>'titlesize-3','label'=>'Default', 'value'=>'s3');
   		$titlesize[] = array('id'=>'titlesize-4','label'=>'+1', 'value'=>'s4');
   		$titlesize[] = array('id'=>'titlesize-5','label'=>'+2', 'value'=>'s5');
   		foreach ($titlesize as $item){
   		   $item['name'] = 'titlesize';
   		   $item['type'] = 'select';
   		   echo '<dd>'.$banner->DisplayInput($item).'</dd>';
   		}
   		?>
			</select>
			</dd>
		</dl>
		
		<dl id="textalign">
			<dt>Sub-text Alignment &amp; Size</dt>
				<?php
   		$textalign[] = array('id'=>'textalign-left','label'=>'Left', 'value'=>'aleft');
   		$textalign[] = array('id'=>'textalign-center','label'=>'Center', 'value'=>'acenter');
   		$textalign[] = array('id'=>'textalign-right','label'=>'Right', 'value'=>'aright');
   		foreach ($textalign as $item){
   		   $item['name'] = 'textalign';
   		   $item['type'] = 'radio';
   		   echo '<dd>'.$banner->DisplayInput($item).'</dd>';
   		}
   		?>
			<dd><label for="textsize">Size</label> <select name="textsize" id="textsize" size="1">
				<?php
   		$textsize[] = array('id'=>'textsize-1','label'=>'-2', 'value'=>'s1');
   		$textsize[] = array('id'=>'textsize-2','label'=>'-1', 'value'=>'s2');
   		$textsize[] = array('id'=>'textsize-3','label'=>'Default', 'value'=>'s3');
   		$textsize[] = array('id'=>'textsize-4','label'=>'+1', 'value'=>'s4');
   		$textsize[] = array('id'=>'textsize-5','label'=>'+2', 'value'=>'s5');
   		foreach ($textsize as $item){
   		   $item['name'] = 'textsize';
   		   $item['type'] = 'select';
   		   echo $banner->DisplayInput($item);
   		}
   		?>
			</select>
			</dd>
		</dl>
		
		
		</div>
		<div class="left">
			<dl>
				<dt>CTA Weight &amp; Color</dt>
				<dd>
					<label for="ctacolor">Color</label>
					<select name="ctacolor" id="ctacolor" size="1">
					<?php
	   		$ctacolor[] = array('id'=>'cta-white','label'=>'White', 'value'=>'cta-white');
	   		$ctacolor[] = array('id'=>'cta-gray20','label'=>'Gray 20', 'value'=>'cta-gray20');
	   		$ctacolor[] = array('id'=>'cta-gray50','label'=>'Gray 50', 'value'=>'cta-gray50');
	   		$ctacolor[] = array('id'=>'cta-gray80','label'=>'Gray 80', 'value'=>'cta-gray80');
				$ctacolor[] = array('id'=>'cta-black','label'=>'Black', 'value'=>'cta-black');
				$ctacolor[] = array('id'=>'cta-orange','label'=>'Orange', 'value'=>'cta-orange');
	   		foreach ($ctacolor as $item){
	   		   $item['name'] = 'ctacolor';
	   		   $item['type'] = 'select';
	   		   echo $banner->DisplayInput($item);
	   		}
	   		?>
				</select>
				</dd>
				<dd>
					<label for="ctaweight">Weight</label>
					<select name="ctaweight" id="ctaweight" size="1">
						<?php
		   		$ctaweight[] = array('id'=>'ctaweight-normal','label'=>'Normal', 'value'=>'normal');
		   		$ctaweight[] = array('id'=>'ctaweight-bold','label'=>'Bold', 'value'=>'bold');
		   		foreach ($ctaweight as $item){
		   		   $item['name'] = 'ctaweight';
		   		   $item['type'] = 'select';
		   		   echo '<dd>'.$banner->DisplayInput($item).'</dd>';
		   		}
		   		?>
					</select>
				</dd>
			</dl>
			
		<dl>
			<dt>Category Tag</dt>
			<select name="tag" id="tag" size="1">
				<?php
   		$tag[] = array('id'=>'tag-none','label'=>'None', 'value'=>'none');
   		$tag[] = array('id'=>'tag-gear','label'=>'Gear', 'value'=>'gear');
   		$tag[] = array('id'=>'tag-people','label'=>'People', 'value'=>'people');
   		$tag[] = array('id'=>'tag-places','label'=>'Places', 'value'=>'places');
   		$tag[] = array('id'=>'tag-sale','label'=>'Sale', 'value'=>'sale');
   		$tag[] = array('id'=>'tag-shop','label'=>'Shop', 'value'=>'shop');
   		$tag[] = array('id'=>'tag-gearshop','label'=>'Gear Shop', 'value'=>'gear shop');
   		$tag[] = array('id'=>'tag-trends','label'=>'Trends', 'value'=>'trends');
   		$tag[] = array('id'=>'tag-techniques','label'=>'Techniques', 'value'=>'techniques');
   		$tag[] = array('id'=>'tag-technology','label'=>'Technology', 'value'=>'technology');
   		$tag[] = array('id'=>'tag-wts','label'=>'Wilderness Trekking School', 'value'=>'Wilderness Trekking School');
   		$tag[] = array('id'=>'tag-wtssm','label'=>'WTS', 'value'=>'WTS');
   		foreach ($tag as $item){
   		   $item['name'] = 'tag';
   		   $item['type'] = 'select';
   		   echo $banner->DisplayInput($item);
   		}
   		?>
			</select>
		</dl>
		</div>
		<br clear="both">
		<hr/>
		<h3>Finish it!</h3>
		
			<ol>
				<li>Take a screen capture of the ad. Use <a href="http://iconfactory.com/software/xscope" title="Iconfactory : Software : Xscope">xScope</a> "Frames" to setup your desired capture.</li>
				<li>The dimensions should be 604px wide x 350px tall.</li>
				<li>If you expand your browser window (green dot in upper left) the ad should be in the same place each time.</li>
				<li>Under the "Frames" menu item, save your frame so you can use it again.</li>
				<li>Once you are pleased with the results, use the camera icon on the frame to take a screen cap. It will save it to your desktop.</li>
				<li>Re-title the image to something useful (ex. 2011-01-27gamblercocoon.jpg ), and upload it <a href="https://www.backpackinglight.com/cgi-bin/backpackinglight/admin/file_transfer?dir=www_backpackinglight/ads">here</a>.</li>
				<li>Cut-and-paste the code from "Get Code" into the advertisement edit form at Backpackinglight.com. You will need to update the image source to the filename of the screen cap (&lt;img src="/backpackinglight/ads/FILENAME-FROM-STEP-6.EXT" ... /&gt;), unless you linked directly to an image hosted at Backpackinglight.com.</li>
			</ol> 		
</div>
	<div id="sidebarwide">
		<p>
		<?php 
				
            $title = array('id'=>'title', 
              'label'=>'Title',
              'name'=>'title',
              'value'=>$banner->title,
              'type'=>'text');
            echo $banner->DisplayInput($title).'<br/>'; 
            
            $subtext = array('id'=>'subtext', 
              'label'=>'Subtext <span class="meta">Use &lt;br&gt; to force line-breaks.</span>',
              'name'=>'subtext',
              'value'=>$banner->subtext,
              'type'=>'textarea');
            echo $banner->DisplayInput($subtext).'<br/>'; 
        
            $attribution = array('id'=>'attribution', 
              'label'=>'Attribution <span class="meta">(optional)</span>',
              'name'=>'attribution',
              'value'=>$banner->attribution,
              'type'=>'text');
            echo $banner->DisplayInput($attribution).'<br/>'; 
            
            $cta = array('id'=>'cta', 
              'label'=>'Call To Action',
              'name'=>'cta',
              'value'=>$banner->cta,
              'type'=>'text');
            echo $banner->DisplayInput($cta).'<br/>'; 
            
            $link = array('id'=>'link', 
              'label'=>'Link for banner <span class="meta">(Most likely a BPL.com URL)</span>',
              'name'=>'link',
              'value'=>$banner->link,
              'type'=>'text');
            echo $banner->DisplayInput($link); 
            
            $imglink = array('id'=>'imglink', 
              'label'=>'Image URL <span class="meta">(For remote hosted files. Optional)</span>',
              'name'=>'imglink',
              'value'=>$banner->imglink,
              'type'=>'text');
            echo $banner->DisplayInput($imglink); 
       ?>
		<p>604 x 350 Test Image <span class="meta">(Not saved past this session.)</span><br/>
		<input name="upload" type="file" /></p>
		<p><input type="submit" value="Change Text or Image &rarr;" id="submit"></p>
		<h3 class="toggle">Get Code</h3>	
		<div>
		<textarea name="test_ad" rows="10" cols="74"><? $banner->DisplayIGCode(); ?></textarea>
		</div>
		
		<!-- <h3 class="toggle" id="sharelink">Get Share Link</h3>	
		<div>
		<input type="text" name="sharelinktext" value="" id="sharelinktext"/>
		<p class="meta">Use this link to share this particular configuration. May also be used to "save" a configuration, just save the link.</p>
		</div>
		 -->
		
	</div>
	<br clear="both"/>
	</form>
</div>
</body>