<?php
/**
* For building the BPL Banners
*/
class BPLBanner {

	var $file; //uploaded temp file
	var $position;
	var $bgcolor;
	var $tag;
	var $txtcolor;
	var $ctacolor;
	var $ctaweight;
	var $title;
	var $subtext;
	var $attribution;
	var $link;
	var $imglink;
	var $cta;
	var $sub = false;
	
	function __construct(
	$file = './images/banner-1.jpg',
	$position = 'banner-top',
	$bgcolor = 'bg-orange20',
	$tag = 'places',
	$txtcolor = 'txt-white',
	$ctacolor = 'cta-white',
	$ctaweight = 'normal',
	$titlealign = 'aleft',
	$titlesize = 's3',
	$textalign = 'aleft',
	$textsize = 's3',
	$link = '#',
	$title = 'The Wind in the Willows',
	$subtext = 'It is spring time, the weather is fine, and good-natured Mole heads up to take in the air.',
	$attribution = 'By Kenneth Grahame',
	$cta = 'Read Now') {
							
		$this->file = $file;
		$this->position = $position;
		$this->bgcolor = $bgcolor;
		$this->tag = $tag;
		$this->txtcolor = $txtcolor;
		$this->ctacolor = $ctacolor;
		$this->ctaweight = $ctaweight;
		$this->titlealign = $titlealign;
		$this->titlesize = $titlesize;
		$this->textalign = $textalign;
		$this->textsize = $textsize;
		$this->link = $link;
		$this->imglink = '';
		$this->title = $title;
		$this->subtext = $subtext;
		$this->attribution = $attribution;
		$this->cta = $cta;
		
		if(isset($_POST['submitted'])) $this->sub = true;
	}
		
	function Set($varname, $value){
		$this->$varname = $value;
	}
	
	function Display(){
		echo stripslashes(trim($this->ProcessCode()));
	}
	
	
	function ProcessCode(){
		if($this->sub){
			$this->position = $_POST['position']?$_POST['position']:$this->position;
			$this->bgcolor = $_POST['bgcolor']?$_POST['bgcolor']:$this->bgcolor;
			$this->tag = $_POST['tag']?$_POST['tag']:$this->tag;
			$this->txtcolor = $_POST['txtcolor']?$_POST['txtcolor']:$this->txtcolor;
			$this->ctacolor = $_POST['ctacolor']?$_POST['ctacolor']:$this->ctacolor;
			$this->ctaweight = $_POST['ctaweight']?$_POST['ctaweight']:$this->ctaweight;
			$this->titlealign = $_POST['titlealign']?$_POST['titlealign']:$this->titlealign;
			$this->titlesize = $_POST['titlesize']?$_POST['titlesize']:$this->titlesize;
			$this->textalign = $_POST['textalign']?$_POST['textalign']:$this->textalign;
			$this->textsize = $_POST['textsize']?$_POST['textsize']:$this->textsize;
			$this->link = $_POST['link']?$_POST['link']:$this->link;
			$this->title = $_POST['title']?$_POST['title']:'';
			$this->subtext = $_POST['subtext']?$_POST['subtext']:'';
			$this->attribution = $_POST['attribution']?$_POST['attribution']:'';
			$this->cta = $_POST['cta']?$_POST['cta']:$this->cta;
			$this->imglink = @$_POST['imglink']?$_POST['imglink']:'';
			$this->file = $this->ProcessUpload();
		}
		return $this->ReturnCode();
	}

	function DisplayIGCode(){

		$igcode = "<div class=\"largefeature\">
			<a href=\"[% tag('advertising_link', {href =>'$this->link'})%]\">
				<img src=\"[% tag('ig_cache_image_url') %]/backpackinglight/ads/FILENAME-FROM-STEP-6.EXT\" alt=\"$this->title\" height=\"350\" width=\"604\" border=\"0\">
			</a>
		</div>";
		echo stripslashes(trim($igcode));
	}
	
	function ReturnCode(){
		$tagged = ($this->tag != 'none') ? "\n   <div class=\"banner-tag\"><span class=\"png\">$this->tag</span></div>" : '';
		$attributed = ($this->attribution != '') ? "<i>$this->attribution</i><br>" : '';

		return "<div class=\"largefeature $this->position $this->bgcolor $this->txtcolor\">
			<span class=\"banner-text $this->titlealign\">
				<h3 class=\"$this->titlesize\">$this->title</h3>
				<p class=\"$this->textalign $this->textsize\">$attributed
					$this->subtext
				</p>
				<a href=\"$this->link\" class=\"$this->ctacolor $this->ctaweight\">$this->cta &raquo;</a>
			</span>$tagged
			<a href=\"$this->link\" class=\"imglink\"><img src=\"$this->file\" height=\"350\" width=\"604\" alt=\"$this->title\" border=\"0\"/></a>
		</div>";
	}
	
	function DisplayInput($item){
	   
		if ($item['type'] == 'text') {
			$format = ($item['type'] == 'text')?'<br/>':':';
			return '<label for="'.$item['id'].'">'.$item['label'].'</label> '.$format.'<input type="'.$item['type'].'" name="'.$item['name'].'" value="'.stripslashes($item['value']).'" id="'.$item['id'].'"/>';
		}	   
		elseif ($item['type'] == 'textarea')
		return ' <label for="'.$item['id'].'">'.$item['label'].'</label><textarea id="'.$item['id'].'" name="'.$item['name'].'" >'.stripslashes($item['value']).'</textarea>';
	   
		elseif ($item['type'] == 'select'){
			$selected = ($this->$item['name'] == $item['value']) ? 'selected' : '' ;
			return ' <option value="'.$item['value'].'" '.$selected.'>'.$item['label'].'</option>';
		}
		
		else {
			$checked = ($this->$item['name'] == $item['value']) ? 'checked' : '' ;
			return '<input type="'.$item['type'].'" name="'.$item['name'].'" value="'.$item['value'].'" id="'.$item['id'].'" '.$checked.'/> <label for="'.$item['id'].'">'.$item['label'].'</label>';
		}
	}
	
	function ProcessUpload(){
		//Сheck that we have a file
		if((!empty($_FILES["upload"])) && ($_FILES['upload']['error'] == 0)) {
			
			//Check if the file is JPEG image and it's size is less than 350Kb		
			$filename = basename($_FILES['upload']['name']);
			$ext = substr($filename, strrpos($filename, '.') + 1);
		
			if (($ext == "jpg") && ($_FILES["upload"]["type"] == "image/jpeg") && 
			($_FILES["upload"]["size"] < 350000)) {
			
				//Determine the path to which we want to save this file		
				$newname = dirname(__FILE__).'/temp/'.$filename;
		
				//Attempt to move the uploaded file to it's new place
				if ((move_uploaded_file($_FILES['upload']['tmp_name'],$newname))) {
					return $this->file = './temp/'.$filename;
				}
			}
		} elseif (@$_POST['imglink'] != '') return $this->file = $_POST['imglink'];
		elseif ($_POST['newfilename'] != '') return $this->file = $_POST['newfilename'];
		else return $this->file;
	}	
}
?>