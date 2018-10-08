

<?php 

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['roll_number'])) {
	// set post fields
	$post = [
	    'roll_number' => $_POST['roll_number'],
	    'key' => 'somethingreallysecure',
	];

	$ch = curl_init('http://www.abboniss.com/championship_form/api.php');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

	// execute!
	$response = curl_exec($ch);

	// close the connection, release resources used
	curl_close($ch);

  	$resp = json_decode($response);
 	unset($_POST);
}
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
	<meta charset="UTF-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    		<link rel="icon" type="image/x-icon" href="images/favicon.png" />
	    <title>Study Abacus | Learn Vedic Maths | Teacher Training | Start-Up</title>
	<?php 
include_once('include_upper.html');
?>
</head>


<body class="page page-id-857 page-template-default themerex_body body_style_boxed body_filled theme_skin_education article_style_stretch layout_single-standard template_single-standard top_panel_style_light top_panel_opacity_solid top_panel_show top_panel_above menu_right user_menu_show sidebar_hide bg_image_2 wpb-js-composer js-comp-ver-4.6.1 vc_responsive">
	
	
	
	<div class="body_wrap">

		
		<div class="page_wrap">

						
			<div class="top_panel_fixed_wrap"></div>

			<?php
                include_once("header.html");
                ?>
                 <style>
				.page_top_wrap{
					background-color:#018763 !important;
						
				}
				
				</style>
            	<div class="page_top_wrap page_top_title page_top_breadcrumbs">
               
					<div class="content_wrap">
						<div class="breadcrumbs">
								<a class="breadcrumbs_item home" href="index.php">Home</a>
                                <span class="breadcrumbs_delimiter"></span>
                                <span class="breadcrumbs_item current">Result</span>							
                        </div>
<h1 class="page_title" style="color:#fff">Result</h1>
											</div>
				</div>
			
			<div class="page_content_wrap">

				
<div class="content">
<article class="itemscope post_item post_item_single post_featured_default post_format_standard post-756 page type-page status-publish hentry">
<section class="post_content" itemprop="articleBody"><div class="sc_reviews alignright"><!-- #TRX_REVIEWS_PLACEHOLDER# --></div><div class="vc_row wpb_row vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="wpb_wrapper"><div class="sc_section accent_top bg_tint_light" data-animation="animated fadeInUp normal" style="background-color:#f4f7f9;"><div class="sc_section_overlay" style=""><div class="sc_section_content"><div class="sc_content content_wrap" style="margin-top:2.5em !important;margin-bottom:2.5em !important;"><div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2">

<style>
h1{
	color:#000;
	font-size:48px;
}
</style>

<div class="sc_column_item sc_column_item_1 odd first" style="width:95%"><div class="sc_section" style="font-size:0.85em; line-height: 1.3em;">
	<div class="wpb_text_column wpb_content_element ">
		<div class="wpb_wrapper">
        <h3 class="sc_title sc_title_regular sc_align_center" style="margin-top:0px;margin-bottom:-.65em;text-align:center;">Annual Championship Exam 2017-18</h3><br>

        	<span class="sc_title sc_title_regular sc_align_center" style="margin-top:0px;margin-bottom:0.15em;text-align:center; font-size: 1.55em"><h5>Abacus   •    Vedic Maths     •     English</h5></span>

        	<span class="sc_title sc_title_regular sc_align_center" style="margin-top:0px;margin-bottom:0.85em;text-align:center;"><h5>Olympiad State Level Delhi NCR</h5></span>
			
			<!--  Main content -->

			<script type="text/javascript">
				// Set the date we're counting down to
				var countDownDate = new Date("Feb 11, 2018 18:30:00").getTime();

				// Update the count down every 1 second
				var x = setInterval(function() {

				    // Get todays date and time
				    var now = new Date().getTime();
				    
				    // Find the distance between now an the count down date
				    var distance = countDownDate - now;
				    
				    // Time calculations for days, hours, minutes and seconds
				    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
				    
				    // Output the result in an element with id="demo"
				    document.getElementById("countdown").innerHTML = 
				    `
				    <center>
				    <span
				    	style = "font-size: 3em; color: black"
				    >
				    ` 
				    + hours + "h "+ minutes + "m " + seconds + "s " + 
				    `
				    </span>
				    </center>
				    `
				    // If the count down is over, write some text 
				    if (distance < 0) {
				        clearInterval(x);
				        document.getElementById("countdown").innerHTML = `
				        	<center>
								<form style="margin-top: 1.8em;" action="" method="POST">
									<input type="text" name="roll_number" style="
										background-color: white;
										height: 3.9em;
										font-size: 1em;
									" placeholder="Roll Number" />
									<button type="submit" style="
										height: 3.9em;
				    					font-size: 1em;
									" > Submit </button>
								</form>
							</center>
				        `;
				    }
				}, 1000);
			</script>

			<?php if ($resp && !$resp->{'error'}): ?>
				<center style = "margin-top: 3em">
					<h4>Congratulations !</h4>
					<table
						style = "
							font-size: 14px;
							color: black
						"
					>
						<tr>
							<td><b>Student Name</b></td>
							<td><?= strtoupper($resp->{'student_name'}) ?></td>
						</tr>
						<tr>
							<td><b>CI Name </b></td>
							<td><?= $resp->{'ci_name'} ?></td>
						</tr>
						<tr>
							<td><b>Roll Number</b></td>
							<td><?= $resp->{'roll_number'} ?></td>
						</tr>
						<tr>
							<td colspan="2"><b><center>Exams (Marks in %)</center></b></td>
						</tr>
						<?php foreach ($resp->{'exams'} as $exam): ?>
							<tr>
								<td><?= strtoupper($exam->{'exam'}) ?></td>
								<td><?= $exam->{'marks'} ?></td>
							</tr>
						<?php endforeach ?>
					</table>
				</center>
			<?php elseif ($resp->{'error'}): ?>
				<center>
					<h5>
						<?= $resp->{'error'} ?>
					</h5>
				</center>
			<?php else: ?>
				<div id="countdown" style="margin-top: 5em"></div>
			<?php endif ?>

		</div> 
	</div> </div><br><br>
    <div class="sc_column_item sc_column_item_1 odd first" style="width:95%"><div class="sc_section" style="font-size:1.25em; line-height: 1.3em;">
	<div class="wpb_text_column wpb_content_element ">
		<div class="wpb_wrapper">
        <style>
		.double{
			width:45%;
			min-width:270px;
			color:#FFF;
			border-radius:10px;
			display:inline-block;
			vertical-align:top;
			margin-right:1.5%;
			margin-left:1.5%;
			margin-top:2.5%;
			margin-bottom:2.5%;
		}
		p{
			margin-bottom:10px;
		}
		.title{
			font-weight:300;
		}
		</style>
        </div> 
	</div> 
    
    </div></div></div></div></div></div></div></div></div>
    
   						
                            <?php include_once("footer.html"); ?>	<!-- /.contacts_wrap -->
						
		</div>	<!-- /.page_wrap -->

	</div>		<!-- /.body_wrap -->

<a href="#" class="scroll_to_top icon-up-2" title="Scroll to top"></a>

<div class="custom_html_section">
</div>

<?php include_once('include_bottom.html');  ?>


</body>

</html>