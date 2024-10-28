<?php
/* ----------------------------------------------------------------------
 * views/pageFormat/pageHeader.php :
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2014 Whirl-i-Gig
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
 * ----------------------------------------------------------------------
 */

$va_lightboxDisplayName = caGetLightboxDisplayName();
$vs_lightbox_sectionHeading = ucfirst($va_lightboxDisplayName['section_heading']);
$va_classroomDisplayName = caGetClassroomDisplayName();
$vs_classroom_sectionHeading = ucfirst($va_classroomDisplayName['section_heading']);

// Collect the user links: they are output twice, once for toggle menu and once for nav
$va_user_links = array();
if ($this->request->isLoggedIn()) {
    $va_user_links[] = '<li role="presentation" class="dropdown-header">' . trim($this->request->user->get('fname') . ' ' . $this->request->user->get('lname')) . ', ' . $this->request->user->get('email') . '</li>';
    $va_user_links[] = '<li class="divider nav-divider"></li>';
    if (caDisplayLightbox($this->request)) {
        $va_user_links[] = '<li>' . caNavLink($this->request, $vs_lightbox_sectionHeading, '', '', 'Lightbox', 'Index', array()) . '</li>';
    }
    if (caDisplayClassroom($this->request)) {
        $va_user_links[] = '<li>' . caNavLink($this->request, $vs_classroom_sectionHeading, '', '', 'Classroom', 'Index', array()) . '</li>';
    }
    $va_user_links[] = '<li>' . caNavLink($this->request, _t('User Profile'), '', '', 'LoginReg', 'profileForm', array()) . '</li>';
    $va_user_links[] = '<li>' . caNavLink($this->request, _t('Logout'), '', '', 'LoginReg', 'Logout', array()) . '</li>';
} else {
    if (!$this->request->config->get('dont_allow_registration_and_login') || $this->request->config->get('pawtucket_requires_login')) {
        $va_user_links[] = "<li><a href='#' onclick='caMediaPanel.showPanel(\"" . caNavUrl($this->request, '', 'LoginReg', 'LoginForm', array()) . "\"); return false;' >" . _t('Login') . '</a></li>';
    }
    // if (!$this->request->config->get('dont_allow_registration_and_login')) {
    //     $va_user_links[] = "<li><a href='#' onclick='caMediaPanel.showPanel(\"".caNavUrl($this->request, '', 'LoginReg', 'RegisterForm', array())."\"); return false;' >"._t('Register').'</a></li>';
    // }
}
$vb_has_user_links = (sizeof($va_user_links) > 0);

?>
<!DOCTYPE html>
<html lang="de">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
        <meta name="description" content="Description-Tag">
        <?php
//$t_item->get('ca_objects.signatur');
echo '<meta property="og:description" content="' . 'Description' . '"/>';
?>
        <?php echo MetaTagManager::getHTML(); ?>
        <?php echo AssetLoadManager::getLoadHTML($this->request); ?>

        <title>
            <?php echo (MetaTagManager::getWindowTitle()) ? MetaTagManager::getWindowTitle() : $this->request->config->get('app_display_name'); ?>
        </title>
        <link href="<?php echo $this->request->getThemeUrlPath(); ?>/assets/pawtucket/css/favicon.ico" rel="icon"
            type="image/x-icon" />
        <!-- Browse Menu, obsolet
    <script type="text/javascript">
		jQuery(document).ready(function() {
    		jQuery('#browse-menu').on('click mouseover mouseout mousemove mouseenter',function(e) { e.stopPropagation(); });
    	});
	</script>
    -->
        <?php
if (Debug::isEnabled()) {
    //
    // Pull in JS and CSS for debug bar
    //
    $o_debugbar_renderer = Debug::$bar->getJavascriptRenderer();
    $o_debugbar_renderer->setBaseUrl(__CA_URL_ROOT__ . $o_debugbar_renderer->getBaseUrl());
    echo $o_debugbar_renderer->renderHead();
}
?>

        <link rel="stylesheet" type="text/css"
            href="<?php echo $this->request->getAssetsUrlPath(); ?>/mirador/css/mirador-combined.css">

    </head>

    <body>
        <nav class="navbar navbar-default yamm" role="navigation" style="box-shadow: none;">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <!-- Logo -->
                    <?php
if ($vb_has_user_links) {
    ?>
                    <button type="button" class="navbar-toggle navbar-toggle-user" data-toggle="collapse"
                        data-target="#user-navbar-toggle">
                        <span class="sr-only">User Options</span>
                        <span class="glyphicon glyphicon-user"></span>
                    </button>
                    <?php
}
?>
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#bs-main-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                <a href='https://www.internationale-computerspielesammlung.de/en/' class='navbar-brand'>
                    <img src='/themes/ics22/assets/pawtucket/graphics/ca_nav_logo300.png'/>
                </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <!-- bs-user-navbar-collapse is the user menu that shows up in the toggle menu - hidden at larger size -->
                <?php
if ($vb_has_user_links) {
    ?>
                <div class="collapse navbar-collapse" id="user-navbar-toggle">
                    <ul class="nav navbar-nav">
                        <?php echo join("\n", $va_user_links); ?>
                    </ul>
                </div>
                <?php
}
?>
                <div class="collapse navbar-collapse" id="bs-main-navbar-collapse-1">
                    <?php
if ($vb_has_user_links) {
    ?>
                    <ul class="nav navbar-nav navbar-right" id="user-navbar">
                        <li class="dropdown" style="position:relative;">
                            <a href="#" class="dropdown-toggle icon" data-toggle="dropdown"><span
                                    class="glyphicon glyphicon-user"></span></a>
                            <ul class="dropdown-menu"><?php echo join("\n", $va_user_links); ?></ul>
                        </li>
                    </ul>
                    <?php
}
?>
                    <form class="navbar-form navbar-right" role="search"
                        action="<?php echo caNavUrl($this->request, '', 'MultiSearch', 'Index'); ?>">
                        <div class="formOutline">
                            <div class="form-group" data-toggle="popover" data-trigger="hover" data-placement="bottom"
                                data-content="Benutzen Sie * zur Verbesserung der Suchergebnisse. ">
                                <input type="text" class="form-control" placeholder="Quick search" name="search">
                            </div>
                            <button type="submit" class="btn-search"><span
                                    class="glyphicon glyphicon-search"></span></button>
                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right menuItems">
                          <li style="margin-right: 10px; margin-top: 10px;">
                            <span class="center-block lang <?php print ($g_ui_locale == 'en_US') ? 'active' : ''; ?>"><?php $img = '<img src="'.$vs_path.'/themes/ics22/assets/pawtucket/graphics/en.png"  width="30px"/>'; print caChangeLocaleLink($this->request, 'en_US', $img, ['hreflang' => 'en', 'title' => 'English']); ?></span>
                        </li>
                        <li style="margin-top: 10px;">
                            <span class="lang <?php print ($g_ui_locale == 'de_DE') ? 'active' : ''; ?>"><?php $img = '<img src="'.$vs_path.'/themes/ics22/assets/pawtucket/graphics/de.png"  width="30px"/>'; print caChangeLocaleLink($this->request, 'de_DE', $img, ['hreflang' => 'de', 'title' => 'Deutsch']); ?></span>
                        </li>
                        <li <?php echo ($this->request->getController() == 'Front') ? 'class="active"' : ''; ?>>
                        <?php echo caNavLink($this->request, _t('Start'), '', '', 'Front', 'Index'); ?></li>
                        <li>
                            <a href="https://db.games-archive.org/index.php/Browse/objects"><?php print _t("Browse")?></a>
                        </li>

                        <li <?php echo ($this->request->getController() == 'Search')&& ($this->request->getAction() == 'advanced') ? 'class="active"' : ''; ?>>
                        <!-- <?php echo caNavLink($this->request, _t('Title Search'), '', '', 'Search', 'advanced/objects'); ?></li> -->
                        <li <?php echo ($this->request->getController() == 'Help') ? 'class="active"' : ''; ?>>
                        <?php echo caNavLink($this->request, _t('Help'), '', '', 'Help', 'Index'); ?></li>


                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- end container -->
        </nav>
        <div class="container">
            <div id="pageArea" <?php echo caGetPageCSSClasses(); ?>>
                <div class="row">
                    <div class="container">