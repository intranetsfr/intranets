<style>
.row{
  width: 100%;
}
</style>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header ">
    <header class="mdl-layout__header mdl-layout__header--waterfall portfolio-header android-header">
        <div class="mdl-layout__header-row portfolio-logo-row">
            <span class="mdl-layout__title">
                <div class="portfolio-logo"></div>
                <span class="mdl-layout__title">{{config.config_title}}</span>
            </span>
        </div>
        <div class="mdl-layout__header-row portfolio-navigation-row mdl-layout--large-screen-only">
            <nav class="mdl-navigation mdl-typography--body-1-force-preferred-font">

				<?php
				foreach ($main as $item=>$url) {
					?>
					<a class="mdl-navigation__link is-active" href="<?= site_url($url)?>"><?= $item?></a>
					<?php
				}
				?>
            </nav>
        </div>
    </header>
    <div class="mdl-layout__drawer mdl-layout--small-screen-only">
        <nav class="mdl-navigation mdl-typography--body-1-force-preferred-font">
			<?php
			foreach ($main as $item=>$url) {
				?>
				<a class="mdl-navigation__link is-active" href="<?= site_url($url)?>"><?= $item?></a>
				<?php
			}
			?>
        </nav>
    </div>
    <main class="mdl-layout__content">
