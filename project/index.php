<?php
die();
//     error_reporting(0);
  include('connect.php');

  if( isset($_GET['c']) || $_GET['c'] ){
	$TOKEN = $_GET['c'];
    $projectNumber = $_GET['p'];
    $buildingNumber = $_GET['b'];
}

$count =0;
$sql="select * from project_building WHERE project_number = '$projectNumber' 
                  AND building_number ='$buildingNumber' ";
$result=$conn->query($sql);
$count = $result->num_rows;
			while($row = $result->fetch_assoc()) {
				$count = $count+1;
			$cid=$row['id'];
			//$name = $row['name'];
			$step1 = $row['step1'];
			$step2 = $row['step2'];
			$step3 = $row['step3'];
			$step4 = $row['step4'];
			$step5 = $row['step5'];
			$step6 = $row['step6'];
			$step7 = $row['step7'];
      $projectdate = $row['project_date'];
      $deliveryDate = $row['project_delivery_date'];
      $project =($row['project_number']);
      $bulding=($row['building_number']);
//      $stock=($row['stock']);
//      $flat=($row['flat']);
//      $floor=($row['floor']);
      }
    ?>
  <?php include('inc/header.php'); ?>


		<div id="content" class="site-content">
		<div class="ast-container">
      <?php
  if ($count > '0'):
  ?>
				<div data-elementor-type="wp-page" data-elementor-id="7" class="elementor elementor-7">
									<section class="elementor-section elementor-top-section elementor-element elementor-element-c9c04a8 elementor-section-height-full elementor-section-boxed elementor-section-height-default elementor-section-items-middle" data-id="c9c04a8" data-element_type="section">
						<div class="elementor-container elementor-column-gap-default">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-233fe38" data-id="233fe38" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-3f884e8 elementor-widget elementor-widget-heading" data-id="3f884e8" data-element_type="widget" data-widget_type="heading.default">
				<div class="elementor-widget-container">
			<style>/*! elementor - v3.7.4 - 31-08-2022 */
.elementor-heading-title{padding:0;margin:0;line-height:1}.elementor-widget-heading .elementor-heading-title[class*=elementor-size-]>a{color:inherit;font-size:inherit;line-height:inherit}.elementor-widget-heading .elementor-heading-title.elementor-size-small{font-size:15px}.elementor-widget-heading .elementor-heading-title.elementor-size-medium{font-size:19px}.elementor-widget-heading .elementor-heading-title.elementor-size-large{font-size:29px}.elementor-widget-heading .elementor-heading-title.elementor-size-xl{font-size:39px}.elementor-widget-heading .elementor-heading-title.elementor-size-xxl{font-size:59px}</style>
      <h1 class="elementor-heading-title elementor-size-default">مراحل المشروع</h1>
        </div>
           <section class="elementor-section elementor-inner-section elementor-element elementor-element-2028ba3 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="2028ba3" data-element_type="section">
						<div class="elementor-container elementor-column-gap-default">
					<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-fe53c65" data-id="fe53c65" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-8723202 elementor-widget elementor-widget-heading" data-id="8723202" data-element_type="widget" data-widget_type="heading.default">
				<div class="elementor-widget-container">
			<h4 style="color:#837C7B;padding-top: 15px" class="elementor-heading-title elementor-size-default">مشروع(<?php echo $project; ?>) عمارة( <?php echo $bulding; ?>) قطعة (<?php echo $stock; ?>) شقة (<?php echo $flat; ?>) الدور (<?php echo $floor; ?>)</h4>		</div>
				</div>
					</div>
		</div>
							</div>
		</section>

				</div>

				<section class="elementor-section elementor-inner-section elementor-element elementor-element-6d07e02 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="6d07e02" data-element_type="section">
						<div class="elementor-container elementor-column-gap-default">
					<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-0117eea" data-id="0117eea" data-element_type="column">
			<div class="elementor-widget-wrap">
									</div>
		</div>
				<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-c3235e2" data-id="c3235e2" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-4ab3d47 elementor-widget elementor-widget-heading" data-id="4ab3d47" data-element_type="widget" data-widget_type="heading.default">
				<div class="elementor-widget-container">
			<h5 class="elementor-heading-title elementor-size-default">عزيزي العميل <?PHP ECHO $name;?> المحترم :</h5>		</div>
				</div>
				<div class="elementor-element elementor-element-3c896bb elementor-widget elementor-widget-text-editor" data-id="3c896bb" data-element_type="widget" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
			<style>/*! elementor - v3.7.4 - 31-08-2022 */
.elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap{background-color:#818a91;color:#fff}.elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap{color:#818a91;border:3px solid;background-color:transparent}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap{margin-top:8px}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter{width:1em;height:1em}.elementor-widget-text-editor .elementor-drop-cap{float:right;text-align:center;line-height:1;font-size:50px}.elementor-widget-text-editor .elementor-drop-cap-letter{display:inline-block}</style>

   <?php
        $sql="select * from setting  ";
      $result=$conn->query($sql);
       $count = $result->num_rows;
			while($row = $result->fetch_assoc()) {
        ?>
			 <p>
        <?php
        echo $row['comment'];
         ?>
     </p>
       <?php
      }
      ?>

				</div>
				<div class="elementor-element elementor-element-4b35050 elementor-widget elementor-widget-heading" data-id="4b35050" data-element_type="widget" data-widget_type="heading.default">
				<div class="elementor-widget-container">
			<h3 class="elementor-heading-title elementor-size-default">درة العقارية</h3>		</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-179fe10" data-id="179fe10" data-element_type="column">
			<div class="elementor-widget-wrap">
									</div>
		</div>
							</div>
		</section>
					</div>
		</div>
							</div>
		</section>
				<section class="elementor-section elementor-top-section elementor-element elementor-element-bd228a8 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="bd228a8" data-element_type="section" id="xs_pie_1">
						<div class="elementor-container elementor-column-gap-default">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-2149f7d1" data-id="2149f7d1" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-70c6b933 elementor-widget elementor-widget-elementskit-heading" data-id="70c6b933" data-element_type="widget" data-widget_type="elementskit-heading.default">
				<div class="elementor-widget-container">
			<div class="ekit-wid-con" ><div class="ekit-heading elementskit-section-title-wraper center   ekit_heading_tablet-   ekit_heading_mobile-"><h2 class="ekit-heading--title elementskit-section-title ">
					المراحل
				</h2><div class="ekit_heading_separetor_wraper ekit_heading_elementskit-border-divider"><div class="elementskit-border-divider"></div></div>				<div class='ekit-heading__description'>
					<p>حيث أنَّ أهمية مراحل التنفيذ وبناء المشاريع وإنشائها له دور كبير ويمر من خلال مراحل معينة دقيقة، وكما حرصنا على اطلاعكم بمستجدات المشروع ومراحله عليه نبين لكم دورة مشروعكم كما يلي:</p>
				</div>
			</div></div>		</div>
				</div>
				<section class="elementor-section elementor-inner-section elementor-element elementor-element-5e83eb67 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="5e83eb67" data-element_type="section">
						<div class="elementor-container elementor-column-gap-default">
					<div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-2a6976fc" data-id="2a6976fc" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-6cfd68d1 elementor-widget elementor-widget-elementskit-piechart" data-id="6cfd68d1" data-element_type="widget" data-widget_type="elementskit-piechart.default">
				<div class="elementor-widget-container">
			<div class="ekit-wid-con" >        <div class="ekit-single-piechart withcontent">


            <div class="colorful-chart piechart" data-color="#35ed7e" data-size="150" data-linewidth="20" data-percent="<?PHP echo $step1; ?>">


                    <span class="ekit-chart-content"><?PHP echo $step1; ?>&#37;</span>






            </div>
                         <h2 class="ekit-piechart-title">إصدار رخصة البناء</h2>

            <p> <?php echo $projectdate; ?></p>

                    </div>
    </div>		</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-6dc86ad3" data-id="6dc86ad3" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-5de45326 elementor-widget elementor-widget-elementskit-piechart" data-id="5de45326" data-element_type="widget" data-widget_type="elementskit-piechart.default">
				<div class="elementor-widget-container">
			<div class="ekit-wid-con" >        <div class="ekit-single-piechart withcontent">


            <div class="colorful-chart piechart" data-color="#f96933" data-size="150" data-linewidth="20" data-percent="<?PHP echo $step2; ?>">


                    <span class="ekit-chart-content"><?PHP echo $step2; ?>&#37;</span>






            </div>
                         <h2 class="ekit-piechart-title">الأعمال الإنشائية</h2>



                    </div>
    </div>		</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-7e1f9bef" data-id="7e1f9bef" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-1e2d3e90 elementor-widget elementor-widget-elementskit-piechart" data-id="1e2d3e90" data-element_type="widget" data-widget_type="elementskit-piechart.default">
				<div class="elementor-widget-container">
			<div class="ekit-wid-con" >        <div class="ekit-single-piechart withcontent">


            <div class="colorful-chart piechart" data-size="150" data-linewidth="20" data-percent="<?PHP echo $step3; ?>">


                    <span class="ekit-chart-content"><?PHP echo $step3; ?>&#37;</span>






            </div>
                         <h2 class="ekit-piechart-title">التشطيبات الداخلية</h2>



                    </div>
    </div>		</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-17b0818b" data-id="17b0818b" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-5de62ef1 elementor-widget elementor-widget-elementskit-piechart" data-id="5de62ef1" data-element_type="widget" data-widget_type="elementskit-piechart.default">
				<div class="elementor-widget-container">
			<div class="ekit-wid-con" >        <div class="ekit-single-piechart withcontent">


            <div class="colorful-chart piechart" data-color="#9460ff" data-size="150" data-linewidth="20" data-percent="<?PHP echo $step4; ?>">


                    <span class="ekit-chart-content"><?PHP echo $step4; ?>&#37;</span>






            </div>
                         <h2 class="ekit-piechart-title">التشطيبات الخارجية</h2>



                    </div>
    </div>		</div>
				</div>
					</div>
		</div>
							</div>
		</section>
				<section class="elementor-section elementor-inner-section elementor-element elementor-element-3722c0a elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3722c0a" data-element_type="section">
						<div class="elementor-container elementor-column-gap-default">
					<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-5feb409" data-id="5feb409" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-972ab4a elementor-widget elementor-widget-elementskit-piechart" data-id="972ab4a" data-element_type="widget" data-widget_type="elementskit-piechart.default">
				<div class="elementor-widget-container">
			<div class="ekit-wid-con" >        <div class="ekit-single-piechart withcontent">


            <div class="colorful-chart piechart" data-color="#35ed7e" data-size="150" data-linewidth="20" data-percent="<?PHP echo $step5; ?>">


                    <span class="ekit-chart-content"><?PHP echo $step5; ?>&#37;</span>






            </div>
                         <h2 class="ekit-piechart-title">استلام اتحاد الملاك</h2>



                    </div>
    </div>		</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-c93ce2c" data-id="c93ce2c" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-eaf88a4 elementor-widget elementor-widget-elementskit-piechart" data-id="eaf88a4" data-element_type="widget" data-widget_type="elementskit-piechart.default">
				<div class="elementor-widget-container">
			<div class="ekit-wid-con" >        <div class="ekit-single-piechart withcontent">


            <div class="colorful-chart piechart" data-color="#f96933" data-size="150" data-linewidth="20" data-percent="<?PHP echo $step6; ?>">


                    <span class="ekit-chart-content"><?PHP echo $step6; ?>&#37;</span>






            </div>
                         <h2 class="ekit-piechart-title">فرز الصكوك</h2>



                    </div>
    </div>		</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-b9b7381" data-id="b9b7381" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-e5f099c elementor-widget elementor-widget-elementskit-piechart" data-id="e5f099c" data-element_type="widget" data-widget_type="elementskit-piechart.default">
				<div class="elementor-widget-container">
			<div class="ekit-wid-con" >        <div class="ekit-single-piechart withcontent">


            <div class="colorful-chart piechart" data-color="#9460ff" data-size="150" data-linewidth="20" data-percent="<?PHP echo $step7; ?>">


                    <span class="ekit-chart-content"><?PHP echo $step7; ?>&#37;</span>






            </div>
                         <h2 class="ekit-piechart-title">شهادة الأشغال</h2>



                    </div>
    </div>		</div>
				</div>
					</div>
		</div>
							</div>
		</section>
					</div>
		</div>
							</div>
		</section>
				<section class="elementor-section elementor-top-section elementor-element elementor-element-56d1572 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="56d1572" data-element_type="section">
						<div class="elementor-container elementor-column-gap-default">
					<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-85893f3" data-id="85893f3" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-22c1bbd ekit-equal-height-enable elementor-widget elementor-widget-elementskit-image-box" data-id="22c1bbd" data-element_type="widget" data-widget_type="elementskit-image-box.default">
				<div class="elementor-widget-container">
			<div class="ekit-wid-con" >
            <div class="elementskit-info-image-box ekit-image-box text-center simple-card" >


                <div class="elementskit-box-header image-box-img-center">

                    <img width="1280" height="799" src="https://project.floteksa.com/wp-content/uploads/2022/09/WhatsApp-Image-2022-08-04-at-10.12.12-AM-1.jpeg" class="attachment-full size-full" alt="" loading="lazy" srcset="https://project.floteksa.com/wp-content/uploads/2022/09/WhatsApp-Image-2022-08-04-at-10.12.12-AM-1.jpeg 1280w, https://project.floteksa.com/wp-content/uploads/2022/09/WhatsApp-Image-2022-08-04-at-10.12.12-AM-1-300x187.jpeg 300w, https://project.floteksa.com/wp-content/uploads/2022/09/WhatsApp-Image-2022-08-04-at-10.12.12-AM-1-1024x639.jpeg 1024w, https://project.floteksa.com/wp-content/uploads/2022/09/WhatsApp-Image-2022-08-04-at-10.12.12-AM-1-768x479.jpeg 768w" sizes="(max-width: 1280px) 100vw, 1280px" />
                </div>

                <div class="elementskit-box-body ekit-image-box-body">
                    <div class="elementskit-box-content ekit-image-box-body-inner">
                                                <h3 class="elementskit-info-box-title">


                        <a>صور الإنشاءات </a>

                    </h3>
                                                        </div>

                                <div class="elementskit-box-footer">
                    <div class="box-footer">
                        <div class="btn-wraper">
                   <a target="_blank" href="album.php?c=<?php echo $TOKEN ?>&B=1" class="elementskit-btn whitespace--normal">


                                    عرض الألبوم                                </a>
                                                        </div>
                    </div>
                </div>
                            </div>
            </div>
    </div>		</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-ede7651" data-id="ede7651" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-408cddc ekit-equal-height-disable elementor-widget elementor-widget-elementskit-image-box" data-id="408cddc" data-element_type="widget" data-widget_type="elementskit-image-box.default">
				<div class="elementor-widget-container">
			<div class="ekit-wid-con" >
            <div class="elementskit-info-image-box ekit-image-box text-center simple-card" >


                <div class="elementskit-box-header image-box-img-center">

                    <img width="1280" height="799" src="https://project.floteksa.com/wp-content/uploads/2022/09/WhatsApp-Image-2022-08-04-at-10.12.12-AM.jpeg" class="attachment-full size-full" alt="" loading="lazy" srcset="https://project.floteksa.com/wp-content/uploads/2022/09/WhatsApp-Image-2022-08-04-at-10.12.12-AM.jpeg 1280w, https://project.floteksa.com/wp-content/uploads/2022/09/WhatsApp-Image-2022-08-04-at-10.12.12-AM-300x187.jpeg 300w, https://project.floteksa.com/wp-content/uploads/2022/09/WhatsApp-Image-2022-08-04-at-10.12.12-AM-1024x639.jpeg 1024w, https://project.floteksa.com/wp-content/uploads/2022/09/WhatsApp-Image-2022-08-04-at-10.12.12-AM-768x479.jpeg 768w" sizes="(max-width: 1280px) 100vw, 1280px" />
                </div>

                <div class="elementskit-box-body ekit-image-box-body">
                    <div class="elementskit-box-content ekit-image-box-body-inner">
                                                <h3 class="elementskit-info-box-title">


                        <a>التشطيبات الداخلية </a>

                    </h3>
                                                        </div>

                                <div class="elementskit-box-footer">
                    <div class="box-footer">
                        <div class="btn-wraper">
                     <a target="_blank" href="album.php?c=<?php echo $TOKEN ?>&B=2" class="elementskit-btn whitespace--normal">


                                    عرض الألبوم                                </a>
                                                        </div>
                    </div>
                </div>
                            </div>
            </div>
    </div>		</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-c9a8e63" data-id="c9a8e63" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-8c329fe ekit-equal-height-disable elementor-widget elementor-widget-elementskit-image-box" data-id="8c329fe" data-element_type="widget" data-widget_type="elementskit-image-box.default">
				<div class="elementor-widget-container">
			<div class="ekit-wid-con" >
            <div class="elementskit-info-image-box ekit-image-box text-center simple-card" >


                <div class="elementskit-box-header image-box-img-center">

                    <img width="1280" height="800" src="https://project.floteksa.com/wp-content/uploads/2022/09/WhatsApp-Image-2022-08-10-at-10.22.31-AM.jpeg" class="attachment-full size-full" alt="" loading="lazy" srcset="https://project.floteksa.com/wp-content/uploads/2022/09/WhatsApp-Image-2022-08-10-at-10.22.31-AM.jpeg 1280w, https://project.floteksa.com/wp-content/uploads/2022/09/WhatsApp-Image-2022-08-10-at-10.22.31-AM-300x188.jpeg 300w, https://project.floteksa.com/wp-content/uploads/2022/09/WhatsApp-Image-2022-08-10-at-10.22.31-AM-1024x640.jpeg 1024w, https://project.floteksa.com/wp-content/uploads/2022/09/WhatsApp-Image-2022-08-10-at-10.22.31-AM-768x480.jpeg 768w" sizes="(max-width: 1280px) 100vw, 1280px" />
                </div>

                <div class="elementskit-box-body ekit-image-box-body">
                    <div class="elementskit-box-content ekit-image-box-body-inner">
                                                <h3 class="elementskit-info-box-title">


                        <a>التشطيبات الخارجية </a>

                    </h3>
                                                        </div>

                                <div class="elementskit-box-footer">
                    <div class="box-footer">
                        <div class="btn-wraper">
                 <a target="_blank" href="album.php?c=<?php echo $TOKEN ?>&B=3" class="elementskit-btn whitespace--normal">


                                    عرض الألبوم                                </a>
                                                        </div>
                    </div>
                </div>
                            </div>
            </div>
    </div>		</div>
				</div>
					</div>
		</div>
							</div>
		</section>

				<section class="elementor-section elementor-top-section elementor-element elementor-element-7269e31 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="7269e31" data-element_type="section">
						<div class="elementor-container elementor-column-gap-default">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-ae3408e" data-id="ae3408e" data-element_type="column">
			<div class="elementor-widget-wrap">
									</div>
		</div>
							</div>
		</section>
							</div>
        <?php endif ?>
			</div> <!-- ast-container -->
	</div><!-- #content -->
  <?php include('inc/footer.php'); ?>
