<?php
	//if($this->request->getParameter("showCookieBanner", pString)){
	if(CookieOptionsManager::showBanner()) {
		$config = caGetCookiesConfig();
		$text = "";
		if(!($config->get("cookiesBannerGlobalValue") && $text = $this->getVar($config->get("cookiesBannerGlobalValue")))){
			$text = $config->get("cookiesBannerText");
		}
?>
<div id="cookieNotice" role="dialog" aria-labelledby="Cookie Window">
	<div class="row">
		<div class="col-sm-12 col-md-offset-3 col-md-6">
			<div class="cookieNoticeHeading">
				<?= _t('This Website uses Cookies. By using it you accept this. More information can be found in our <a href=\"https://www.internationale-computerspielesammlung.de/de/kontakt-impressum#datenschutz\" target=\"_blank\"><u>privacy policy</u></a>.'); ?>
			</div>
			<div>
				<?= $text; ?>
			</div>
			<div class="text-center">
				<?php print caNavLink($this->request, _t("Manage"), "btn btn-default btn-inverse", "", "Cookies", "manage").caNavLink($this->request, _t("Accept"), "btn btn-default", "", "Cookies", "manage", ['accept' => 1]); ?>
			</div>
		</div>
	</div>
</div>
<?php
	}
?>