<?php 
	/* Copyright 2023 Neen S.p.A.*/
	
	$isForm = TRUE;
	$activePage = 'Questionaire';
	require 'header.php';
?> 
 
	<div class="container">
	<form action="test.php" method="POST" onsubmit="<?php if($_SESSION['email'] != null){$_SESSION=$_POST['email'];}?>">
<?php

	// Determine which section of the assessment we are showing
	$uri = $_SERVER["REQUEST_URI"];
	$currentSection = explode("section-", $uri)[1];
	
	// Find the current section in our model
	$sectionIndex = 0;
	foreach ($survey->sections as $index=>$section)
	{
		if ( SectionnameToURLName($section['SectionName']) == $currentSection )
		{
			$sectionIndex = $index;
		}
	}
	
	// Determine the URL names for the next and previous sections
	$nextSection = '';
	if ( $sectionIndex<sizeof($survey->sections)-1 )
	{
		$nextSection = SectionnameToURLName($survey->sections[$sectionIndex + 1]['SectionName']);
	}
	$previousSection = '';
	if ( $sectionIndex>0 )
	{
		$previousSection = SectionnameToURLName($survey->sections[$sectionIndex - 1]['SectionName']);
	}
?>

	<div class="row">
		<div class="col-12 mx-auto text-center">
			<h1><?=$survey->sections[$sectionIndex]['SectionName']?></h1>
		<div class="progress">
			<div class="progress-bar" role="progressbar" style="width: <?=countSections(sizeof($survey->sections)-1, $sectionIndex)?>%;" aria-valuenow="<?=countSections(sizeof($survey->sections)-1, $sectionIndex)?>" aria-valuemin="0" aria-valuemax="100"><?=countSections(sizeof($survey->sections)-1, $sectionIndex)?>%</div>
		</div>
			<?php	
	// Render all the question for the current section
	foreach ($survey->sections[$sectionIndex]['Questions'] as $index=>$question)
	{	
		renderQuestion($question, $index);	
	}
	?>

		</div>

	</div>
	<div class="container">
	<div class="row form-group">
	<div class="text-center col-lg-12">
		<div class="btn-group-prev-next">
			<?php if ($previousSection != '') { ?>
			<div class="btn-group pos-prev">
				<button type="submit" class="btn btn-primary prev" onclick="$('form').attr('action', 'section-<?=$previousSection?>');">Prev</button>
			</div>
			<?php } ?>
			<?php if ($nextSection != '') { ?>
			<div class="btn-group pos-next" role="group">
				<button type="submit" class="btn btn-primary next" onclick="$('form').attr('action', 'section-<?=$nextSection?>');">Next</button>
			</div>
			<?php } ?>
			<!-- Show results button if we are on the final section -->
		<?php if ($nextSection == '') { ?>
			<div class="btn-group pos-next" role="group">
			<button type="submit" class="btn btn-primary next" onclick="$('form').attr('action', 'results');">View Results</button>
		</div>
		<?php } ?>
		</div>
		</div>
	</div>
	</div>
	
	</form>
	</div>
	
	<?php
	
	require 'footer.php';
	
	function countSections($sects, $currentSection){
		return round(($currentSection*100)/$sects, 2,PHP_ROUND_HALF_EVEN);
	}

	function renderQuestion($question, $index) { 
		
		?>
		
				<div class="box-form">
					<?php if ($question['Type']!='Banner') {?>
					<h6 class="header-text"><?=$question['QuestionText']?></h6>
					<?php } ?>
					<div class="form-item">
						<?php 
							switch ($question['Type']) {
								case 'Option':
									renderOptions($question);
									break;
								case 'Checkbox':
									renderCheckboxes($question);
									break;
								case 'Banner':
									echo $question['QuestionText'];
									break;
								case 'Input':
									renderEmailInput($question);
									break;
							} ?>
					</div>
				</div>
		<?php
	}
	
	function renderEmailInput($question){
		?>
			<div class="custom-control col-md-4"></div>
			<div class="custom-control col-md-4">
				<label for="emailLabel" name="emailLabel"></label>
				<input type="email" class="input-group input-group-sm mb-3" id="email" name="email" placeholder="Enter your email" required>
				<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			</div>
			<div class="custom-control col-md-4"></div></div>
		<?php
	}

	function renderCheckboxes($question) { 
		
		// We render a hidden field for each checkbox to enable us to recognise if chckboxes have been unchecked
		foreach ($question['Answers'] as $index=>$answer) { ?>
			<div class="custom-control custom-checkbox my-2">
			<input type="checkbox" class="custom-control-input" id="<?=$answer['ID']?>" name="<?=$answer['ID']?>" <?=$answer['Value']?>>
			<input type="hidden" name="<?=$answer['ID']?>-hidden" value="0" />
			<label class="custom-control-label" for="<?=$answer['ID']?>" name="<?=$answer['ID']?>"><?=$answer['Answer']?></label>
			</div>
		<?php } 
	
	}
	
	function renderOptions($question) { 
		
		foreach ($question['Answers'] as $index=>$answer) { ?>
			<div class="custom-radio item-form">
			<input type="radio" class="custom-control-input" id="<?=$answer['ID']?>" value="<?=$answer['ID']?>" name="<?=$question['ID']?>" <?=$answer['Value']?>>
			<label class="custom-control-label" for="<?=$answer['ID']?>"><?=$answer['Answer']?></label>
			</div>
		<?php } 
	}
	
?>	
