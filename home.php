<?php
/* Copyright 2023 Neen S.p.A.*/

$isForm = FALSE;
$activePage = 'Home';

require 'header.php';

function RenderTwitterLink($URL)
{
	?>
	<a style="color:#00A3F3" href="<?= $URL ?>" target="_blank">
		<span class="fa-stack fa-1x">
			<i class="fas fa-square fa-stack-2x"></i>
			<i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
		</span>
	</a>
	<?php
}

function RenderLinkedInLink($URL)
{
	?>
	<a style="color:#0078B5" href="<?= $URL ?>" target="_blank">
		<span class="fa-stack fa-1x">
			<i class="fas fa-square fa-stack-2x"></i>
			<i class="fab fa-linkedin-in fa-stack-1x fa-inverse"></i>
		</span>
	</a>
	<?php
}
?>
<div class="container">
	<div class="row">
		<div class="col-12">
<div class="box-head">
		<h1>Improve Your Cloud Capability</h1>
					<p class="text-top">This online Cloud Maturity Assessment questionnaire will help you understand your
						current strengths and weaknesses and then recommend resources that can support you in taking the
						next steps on your Cloud journey.</p>
					<p>
						<a href="<?= 'section-' . SectionNameToURLName($survey->sections[0]['SectionName']) ?>"
							class="btn btn-primary">Start the Questionnaire</a>
					</p>
					<p class="txt-cta">We do not harvest your data and we will not share your results with anyone else.</p>
		
</div>
			<!-- Three columns of text below the jumbotron -->
			<div class="row">

				<div class="col-lg-6">
				<div class="title-icon"><img src="assets/icon-1.png" class="icon-h2"></div>
				<div class="box-icon"><h2>Understand Where You Are</h2></div>
				<div class="pos-text-box-icon">
					<p class="box-text">Our set of carefully designed questions across 10 different areas will help
						you quickly establish your current level of Cloud maturity.</p>
					<p class="box-text">You can view the results online as well as downloading them in CSV format
						for more detailed analysis.</p></div>
				</div><!-- /.col-lg-6 -->

				<div class="col-lg-6">
					
					<div class="title-icon"><img src="assets/icon-2.png" class="icon-h2"></div>
					<div class="box-icon">
					<h2>Identify Your Next Steps</h2></div>
					<div class="pos-text-box-icon">
					<p class="box-text">For each area we have identified a range of free or commercially available
						books, videos, blog posts, white papers and websites that will help you take the next steps on
						your Cloud journey.</p></div>
				</div><!-- /.col-lg-6 -->


			</div><!-- /.row -->
			<!-- <div class="row">
				<div class="col-lg-12">
					<p align="center"><em>We do not harvest your data and we will not share your results with anyone
							else.</em></p>
				</div>
			</div> -->
		</div><!-- /.col-lg-6 -->

	</div><!-- /.col-lg-8 -->

</div><!-- /.row -->

</div><!-- /.container -->

<?php

require 'footer.php';

?>