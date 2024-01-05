<?php
/** ---------------------------------------------------------------------
 * themes/default/Front/front_page_html : Front page of site 
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2013 Whirl-i-Gig
 *
 * For more information visit http://www.CollectiveAccess.org
 *
 * This program is free software; you may redistribute it and/or modify it under
 * the terms of the provided license as published by Whirl-i-Gig
 *
 * CollectiveAccess is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTIES whatsoever, including any implied warranty of 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
 *
 * This source code is free and modifiable under the terms of 
 * GNU General Public License. (http://www.gnu.org/copyleft/gpl.html). See
 * the "license.txt" file for details, or visit the CollectiveAccess web site at
 * http://www.CollectiveAccess.org
 *
 * @package CollectiveAccess
 * @subpackage Core
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License version 3
 *
 * ----------------------------------------------------------------------
 */
 
 $t_set = ca_sets::findAsInstance(['set_code' => 'performances'], ['checkAccess' => caGetUserAccessValues($this->request)]);
 $set_items = $t_set ? $t_set->getItems(['thumbnailVersion' => 'thumbnail']) : [];
 ?>
<main data-barba="container" data-barba-namespace="performances" class="barba-main-container performances-section">
	<div class="general-page">
		<div class="container">
			<div class="row justify-content-center">
				<h1 class="page-heading heading-size-2 ps-0">Performances</h1>
				<div class="col-auto">
					<p class="page-content content-size-2 mb-5">
						<?= $t_set->get('ca_sets.set_description'); ?>
					</p>
					<?php
						foreach($set_items as $item) {	
							$item = array_shift($item);
					?>			
							<div class="performances-links mt-4">
								<?= $item['representation_tag']; ?>
								<?= caDetailLink($this->request, '<svg xmlns="http://www.w3.org/2000/svg" width="34" height="33" viewBox="0 0 34 33" fill="none">
										<path d="M33.0163 16.5C33.0163 25.3173 25.7498 32.4794 16.7684 32.4794C7.78704 32.4794 0.520588 25.3173 0.520588 16.5C0.520588 7.6827 7.78704 0.520588 16.7684 0.520588C25.7498 0.520588 33.0163 7.6827 33.0163 16.5Z" stroke="#E2D49F" stroke-width="1.04118"></path>
										<path d="M24.728 16.3281L12.5267 23.2597L12.5267 9.39643L24.728 16.3281Z" fill="#E2D49F"></path>
									</svg>', 'me-3', 'ca_objects', $item['row_id']); ?>
								<?= caDetailLink($this->request, $item['name'], 'link-text', 'ca_objects', $item['row_id']); ?>
							</div>
					<?php
						}
					?>
				</div> 
			</div>
		</div>

		<div class="nb-graphic position-fixed" style="right: 0;">
			<svg width="624" height="100" viewBox="0 0 624 100" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M0.8 95.48L11.84 93.68V6.31999L0.8 4.63999V2H38.48C50.32 2 59.12 4.52 64.88 9.55999C70.64 14.6 73.52 21.88 73.52 31.4C73.52 40.92 70.64 48.2 64.88 53.24C59.12 58.28 50.32 60.8 38.48 60.8H25.04V93.68L36.08 95.48V98H0.8V95.48ZM36.8 57.92C51.6 57.92 59 49.88 59 33.8V29C59 13 51.6 5 36.8 5H25.04V57.92H36.8ZM112.528 99.2C106.608 99.2 101.248 97.88 96.4475 95.24C91.6475 92.52 87.8475 88.72 85.0475 83.84C82.2475 78.96 80.8475 73.32 80.8475 66.92C80.8475 60.52 82.2075 54.92 84.9275 50.12C87.7275 45.24 91.4475 41.48 96.0875 38.84C100.808 36.12 106.048 34.76 111.808 34.76C116.848 34.76 121.368 35.88 125.368 38.12C129.368 40.36 132.488 43.48 134.728 47.48C136.968 51.4 138.128 55.92 138.208 61.04H94.0475V72.92C94.0475 79.96 95.6075 85.68 98.7275 90.08C101.928 94.4 106.528 96.56 112.528 96.56C118.048 96.56 122.928 95 127.168 91.88C131.408 88.76 134.008 84.72 134.968 79.76H137.728C136.608 85.68 133.768 90.4 129.208 93.92C124.648 97.44 119.088 99.2 112.528 99.2ZM125.008 58.04C125.008 51.08 123.928 45.92 121.768 42.56C119.608 39.12 116.248 37.4 111.688 37.4C106.328 37.4 102.168 39.28 99.2075 43.04C96.2475 46.8 94.5675 51.8 94.1675 58.04H125.008ZM146.193 95.6L154.593 94.4V39.44L146.193 38.24V35.84H166.593V45.08C171.633 38.2 177.313 34.76 183.633 34.76C186.673 34.76 189.353 35.56 191.673 37.16C193.993 38.68 195.153 40.88 195.153 43.76C195.153 45.84 194.473 47.6 193.113 49.04C191.753 50.4 189.953 51.08 187.713 51.08C185.153 51.08 183.073 50.08 181.473 48.08C182.353 46.96 182.793 45.76 182.793 44.48C182.793 43.12 182.313 42.04 181.353 41.24C180.473 40.36 179.273 39.92 177.753 39.92C176.073 39.92 174.353 40.72 172.593 42.32C170.833 43.84 168.833 46.24 166.593 49.52V94.4L176.193 95.6V98H146.193V95.6ZM199.279 95.6L207.679 94.4V39.44L199.279 38.24V35.84H207.679V25.76C207.679 18.08 209.239 12 212.359 7.52C215.479 3.03999 220.799 0.799993 228.319 0.799993C233.039 0.799993 236.919 1.95999 239.959 4.28C243.079 6.52 244.639 9.6 244.639 13.52C244.639 15.92 243.959 17.88 242.599 19.4C241.319 20.92 239.559 21.68 237.319 21.68C235.319 21.68 233.559 20.92 232.039 19.4C230.519 17.88 229.759 16.12 229.759 14.12C232.479 13.32 233.839 11.44 233.839 8.47999C233.839 7.12 233.279 5.96 232.159 5C231.119 3.95999 229.839 3.43999 228.319 3.43999C225.199 3.43999 222.959 4.91999 221.599 7.87999C220.319 10.76 219.679 15.48 219.679 22.04V35.84H235.279V38.24L219.679 39.44V94.4L233.959 95.6V98H199.279V95.6ZM271.303 99.2C265.543 99.2 260.303 97.88 255.583 95.24C250.863 92.52 247.103 88.72 244.303 83.84C241.583 78.88 240.223 73.24 240.223 66.92C240.223 60.6 241.583 55 244.303 50.12C247.103 45.24 250.863 41.48 255.583 38.84C260.303 36.12 265.543 34.76 271.303 34.76C277.063 34.76 282.303 36.12 287.023 38.84C291.743 41.48 295.463 45.24 298.183 50.12C300.983 55 302.383 60.6 302.383 66.92C302.383 73.24 300.983 78.88 298.183 83.84C295.463 88.72 291.743 92.52 287.023 95.24C282.303 97.88 277.063 99.2 271.303 99.2ZM271.303 96.56C277.223 96.56 281.663 94.4 284.623 90.08C287.663 85.76 289.183 80.04 289.183 72.92V60.92C289.183 53.8 287.663 48.12 284.623 43.88C281.663 39.56 277.223 37.4 271.303 37.4C265.383 37.4 260.903 39.56 257.863 43.88C254.903 48.12 253.423 53.8 253.423 60.92V72.92C253.423 80.04 254.903 85.76 257.863 90.08C260.903 94.4 265.383 96.56 271.303 96.56ZM310.724 95.6L319.124 94.4V39.44L310.724 38.24V35.84H331.124V45.08C336.164 38.2 341.844 34.76 348.164 34.76C351.204 34.76 353.884 35.56 356.204 37.16C358.524 38.68 359.684 40.88 359.684 43.76C359.684 45.84 359.004 47.6 357.644 49.04C356.284 50.4 354.484 51.08 352.244 51.08C349.684 51.08 347.604 50.08 346.004 48.08C346.884 46.96 347.324 45.76 347.324 44.48C347.324 43.12 346.844 42.04 345.884 41.24C345.004 40.36 343.804 39.92 342.284 39.92C340.604 39.92 338.884 40.72 337.124 42.32C335.364 43.84 333.364 46.24 331.124 49.52V94.4L340.724 95.6V98H310.724V95.6ZM363.81 95.6L372.21 94.4V39.44L363.81 38.24V35.84H384.21V46.88C387.09 43.12 390.33 40.16 393.93 38C397.61 35.84 401.57 34.76 405.81 34.76C410.69 34.76 414.65 35.84 417.69 38C420.81 40.08 422.77 43.24 423.57 47.48C426.45 43.56 429.73 40.48 433.41 38.24C437.09 35.92 441.13 34.76 445.53 34.76C451.21 34.76 455.61 36.2 458.73 39.08C461.93 41.88 463.53 46.16 463.53 51.92V94.4L471.93 95.6V98H444.33V95.6L451.53 94.4V52.16C451.53 47.92 450.77 44.68 449.25 42.44C447.73 40.2 445.25 39.08 441.81 39.08C438.53 39.08 435.33 40.2 432.21 42.44C429.17 44.68 426.41 47.56 423.93 51.08V94.4L431.13 95.6V98H404.61V95.6L411.81 94.4V52.16C411.81 47.92 411.05 44.68 409.53 42.44C408.01 40.2 405.53 39.08 402.09 39.08C398.81 39.08 395.61 40.2 392.49 42.44C389.45 44.68 386.69 47.56 384.21 51.08V94.4L391.41 95.6V98H363.81V95.6ZM497.165 99.2C492.045 99.2 487.845 97.88 484.565 95.24C481.285 92.52 479.645 88.52 479.645 83.24C479.645 75.72 482.805 70.4 489.125 67.28C495.445 64.08 502.765 62.48 511.085 62.48H519.125V53.24C519.125 49.08 518.645 45.88 517.685 43.64C516.805 41.32 515.405 39.72 513.485 38.84C511.565 37.88 508.965 37.4 505.685 37.4C501.925 37.4 499.125 38.16 497.285 39.68C495.445 41.12 494.525 43.08 494.525 45.56C494.525 47.88 495.645 49.4 497.885 50.12C497.885 52.12 497.125 53.88 495.605 55.4C494.085 56.92 492.285 57.68 490.205 57.68C487.965 57.68 486.165 57.08 484.805 55.88C483.445 54.6 482.765 52.68 482.765 50.12C482.765 45.48 485.085 41.76 489.725 38.96C494.365 36.16 500.165 34.76 507.125 34.76C523.125 34.76 531.125 41.72 531.125 55.64V89.96C531.125 91.72 531.485 93.08 532.205 94.04C533.005 94.92 534.125 95.36 535.565 95.36C536.925 95.36 538.005 94.92 538.805 94.04C539.605 93.08 540.005 91.8 540.005 90.2H542.525C542.525 93 541.605 95.2 539.765 96.8C538.005 98.4 535.525 99.2 532.325 99.2C528.645 99.2 525.525 98.16 522.965 96.08C520.485 93.92 519.205 90.6 519.125 86.12C517.205 90.2 514.245 93.4 510.245 95.72C506.325 98.04 501.965 99.2 497.165 99.2ZM503.765 93.92C505.925 93.92 508.125 93.28 510.365 92C512.685 90.72 514.645 88.88 516.245 86.48C517.845 84 518.805 81.04 519.125 77.6V65.12H511.085C504.525 65.12 499.605 66.6 496.325 69.56C493.125 72.44 491.525 76.52 491.525 81.8C491.525 86.2 492.565 89.32 494.645 91.16C496.725 93 499.765 93.92 503.765 93.92ZM545.451 95.6L553.851 94.4V39.44L545.451 38.24V35.84H565.851V48.8C568.811 44.48 572.291 41.08 576.291 38.6C580.291 36.04 584.611 34.76 589.251 34.76C595.011 34.76 599.531 36.2 602.811 39.08C606.171 41.96 607.851 46.24 607.851 51.92V94.4L616.251 95.6V98H588.651V95.6L595.851 94.4V52.16C595.851 48 595.011 44.8 593.331 42.56C591.651 40.24 589.051 39.08 585.531 39.08C581.851 39.08 578.291 40.44 574.851 43.16C571.491 45.8 568.491 49.08 565.851 53V94.4L573.051 95.6V98H545.451V95.6ZM654.623 99.2C648.863 99.2 643.623 97.88 638.903 95.24C634.183 92.52 630.423 88.72 627.623 83.84C624.903 78.88 623.543 73.24 623.543 66.92C623.543 60.28 624.983 54.52 627.863 49.64C630.823 44.76 634.663 41.08 639.383 38.6C644.103 36.04 649.183 34.76 654.623 34.76C659.183 34.76 663.343 35.56 667.103 37.16C670.863 38.68 673.823 40.84 675.983 43.64C678.223 46.44 679.343 49.6 679.343 53.12C679.343 55.76 678.663 57.8 677.303 59.24C675.943 60.6 674.143 61.28 671.903 61.28C669.743 61.28 667.943 60.56 666.503 59.12C665.063 57.68 664.343 55.88 664.343 53.72C665.543 52.92 666.383 52.04 666.863 51.08C667.343 50.12 667.583 48.92 667.583 47.48C667.583 44.52 666.383 42.12 663.983 40.28C661.663 38.36 658.543 37.4 654.623 37.4C648.863 37.4 644.423 39.48 641.303 43.64C638.263 47.72 636.743 53.48 636.743 60.92V72.92C636.743 80.04 638.223 85.76 641.183 90.08C644.223 94.4 648.703 96.56 654.623 96.56C660.063 96.56 664.783 95.04 668.783 92C672.863 88.88 675.383 84.8 676.343 79.76H679.103C677.983 85.68 675.183 90.4 670.703 93.92C666.303 97.44 660.943 99.2 654.623 99.2ZM720.848 99.2C714.928 99.2 709.568 97.88 704.768 95.24C699.968 92.52 696.168 88.72 693.368 83.84C690.568 78.96 689.168 73.32 689.168 66.92C689.168 60.52 690.528 54.92 693.248 50.12C696.048 45.24 699.768 41.48 704.408 38.84C709.128 36.12 714.368 34.76 720.128 34.76C725.168 34.76 729.688 35.88 733.688 38.12C737.688 40.36 740.808 43.48 743.048 47.48C745.288 51.4 746.448 55.92 746.528 61.04H702.368V72.92C702.368 79.96 703.928 85.68 707.048 90.08C710.248 94.4 714.848 96.56 720.848 96.56C726.368 96.56 731.248 95 735.488 91.88C739.728 88.76 742.328 84.72 743.288 79.76H746.048C744.928 85.68 742.088 90.4 737.528 93.92C732.968 97.44 727.408 99.2 720.848 99.2ZM733.328 58.04C733.328 51.08 732.248 45.92 730.088 42.56C727.928 39.12 724.568 37.4 720.008 37.4C714.648 37.4 710.488 39.28 707.528 43.04C704.568 46.8 702.888 51.8 702.488 58.04H733.328Z" fill="#767676" fill-opacity="0.15"/>
			</svg>
		</div>
		<div class="nb-graphic position-fixed" style="left:-80px;top:600px;transform: rotate(-250deg);">
			<svg width="475" height="495" viewBox="0 0 475 495" fill="none" xmlns="http://www.w3.org/2000/svg">
				<circle opacity="0.7" cx="268" cy="268" r="267" stroke="white" stroke-opacity="0.07" stroke-width="2"/>
			</svg>
		</div>


	</div>
</main>