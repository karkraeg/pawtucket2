<?php
/* ----------------------------------------------------------------------
 * views/pageFormat/pageFooter.php :
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2015 Whirl-i-Gig
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
?>
</div>
<footer id="footer" class="page-footer">
    <div class="container">
        <div class="row" >
            <div class="col-xs-12 col-sm-6" style="margin-top: 10px;">
                <p>Copyright © 2022-24 · Internationale Computerspielesammlung</p>
            </div>
            <div class="col-xs-12 col-sm-6" style="margin-top: 10px;text-align: right;">
                <a href="https://www.internationale-computerspielesammlung.de/en/press" target="_blank"><?php echo _t('Press') ?></a> |
                <a href="https://www.internationale-computerspielesammlung.de/en/publishing-and-contact-details" target="_blank"><?php echo _t('Contact & Imprint') ?></a> |
                <a href="https://www.internationale-computerspielesammlung.de/en/publishing-and-contact-details" target="_blank"><?php echo _t('Data privacy') ?></a>
            </div>
        </div>
    </div>
</footer>

                     <!-- <div id="cookienotice"><div>
            <span style="color: #fff;"><?php echo _t('This Website uses Cookies. By using it you accept this. More information can be found in our <a href=\"https://www.internationale-computerspielesammlung.de/de/kontakt-impressum#datenschutz\" target=\"_blank\"><u>privacy policy</u></a>.') ?></span>

            <span id="cookienoticeCloser" onclick="document.cookie = 'hidecookienotice=1;path=/';jQuery('#cookienotice').slideUp()">&#10006;</span> -->
<?php
//
// Output HTML for debug bar
//
if (Debug::isEnabled()) {
    echo Debug::$bar->getJavascriptRenderer()->render();
}
?>

                <?php echo TooltipManager::getLoadHTML(); ?>

                <div id="caMediaPanel" style="background: #EFEFEF;">
                        <div id="caMediaPanelContentArea">

                        </div>
                </div>
                <script data-goatcounter="https://gamesarchive.goatcounter.com/count"
        async src="https://db.games-archive.org/count.js"></script>
                <script type="text/javascript">
                        /*
                                Set up the "caMediaPanel" panel that will be triggered by links in object detail
                                Note that the actual <div>'s implementing the panel are located here in views/pageFormat/pageFooter.php
                        */
                        var caMediaPanel;
                        jQuery(document).ready(function() {
                                if (caUI.initPanel) {
                                        caMediaPanel = caUI.initPanel({
                                                panelID: 'caMediaPanel',                                                                                /* DOM ID of the <div> enclosing the panel */
                                                panelContentID: 'caMediaPanelContentArea',                /* DOM ID of the content area <div> in the panel */
                                                exposeBackgroundColor: '#FFFFFF',                                                /* color (in hex notation) of background masking out page content; include the leading '#' in the color spec */
                                                exposeBackgroundOpacity: 0.7,                                                        /* opacity of background color masking out page content; 1.0 is opaque */
                                                panelTransitionSpeed: 400,                                                                         /* time it takes the panel to fade in/out in milliseconds */
                                                allowMobileSafariZooming: true,
                                                mobileSafariViewportTagID: '_msafari_viewport',
                                                closeButtonSelector: '.close'                                        /* anything with the CSS classname "close" will trigger the panel to close */
                                        });
                                }
                        });
                        // (function(e,d,b){var a=0;var f=null;var c={x:0,y:0};e("[data-toggle]").closest("li").on("mouseenter",function(g){if(f){f.removeClass("open")}d.clearTimeout(a);f=e(this);a=d.setTimeout(function(){f.addClass("open")},b)}).on("mousemove",function(g){if(Math.abs(c.x-g.ScreenX)>4||Math.abs(c.y-g.ScreenY)>4){c.x=g.ScreenX;c.y=g.ScreenY;return}if(f.hasClass("open")){return}d.clearTimeout(a);a=d.setTimeout(function(){f.addClass("open")},b)}).on("mouseleave",function(g){d.clearTimeout(a);f=e(this);a=d.setTimeout(function(){f.removeClass("open")},b)})})(jQuery,window,200);
                </script>
        <!-- <script>
            if(document.cookie.indexOf('hidecookienotice=1') != -1){
                jQuery('#cookienotice').hide();
            }
            else{
                jQuery('#cookienotice').prependTo('body');
                jQuery('#cookienoticeCloser').show();
            }
        </script> -->
        <?= $this->render("Cookies/banner_html.php"); ?>
</body>
</html>
