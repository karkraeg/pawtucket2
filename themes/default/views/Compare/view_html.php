<?php
/** ---------------------------------------------------------------------
 * themes/default/views/Compare/view_html.php :
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2016-2024 Whirl-i-Gig
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
 * @subpackage Media
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License version 3
 *
 * ----------------------------------------------------------------------
 */
$items = $this->getVar('items');

if(sizeof($items) > 0) {
 // Calculate window geometry; for up to 3 windows place side-by-side,
 // otherwise to to make something square-ish
 $num_windows = sizeof($items);
 if ($num_windows <= 3) {
	$layout = "1x{$num_windows}";
 } else {
	$dim_width = ceil(sqrt($num_windows));
	$dim_height = ceil($num_windows/$dim_width);
	$layout = "{$dim_width}x{$dim_height}";
 }

 $data = [];
 $windows = [];

 foreach($items as $item) {
	$data[] = [
		'manifestUri' =>  $url = caNavUrl($this->request, '', 'Compare', 'Manifest', ['id' => $item['resolved_id']])
	];
	$windows[] = [
		'loadedManifest' => $url,
		'overlay' => false,
		'viewType' => "ImageView",
		'availableViews' => ["ImageView"],
		'displayLayout' => false,
		'bottomPanel' => false,
		'bottomPanelAvailable' => false,
		'bottomPanelVisible' => false,
		'sidePanel' => false,
		'annotationLayer' => false,
		'annotationCreation' => false,
		'layoutOptions' => [
			'close' => false
		]
	];
 }
?>

<div style="width: 100%; height: 400px" id="comparison_viewer">

</div>

<script type="text/javascript">
var _compareViewer = Mirador({  
	id: "comparison_viewer",
	layout: "<?= $layout; ?>",
	data: <?= json_encode($data); ?>,  
	windowObjects: <?= json_encode($windows); ?>,
	buildPath: '<?= __CA_URL_ROOT__."/assets/mirador/"; ?>',
	mainMenuSettings: {
		buttons: { 
			layout: false
		},
		userButtons: [
			{"label": "Back",
			 "iconClass": "teal-results",
			 "attributes": { "class": "small", "href":  <?= json_encode(Session::getVar('compare_last_page')); ?> }
			}
		]
	}
});
$("#comparison_viewer").height($(window).height() - $("nav").height() + "px");
</script>
<?php
} else {
?>
<h2><?= _t('No images are selected'); ?></h2>
<?php
}
