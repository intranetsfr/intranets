<form action="" method="post" style="background-image: url(https://helpx.adobe.com/content/dam/help/en/stock/how-to/visual-reverse-image-search/jcr_content/main-pars/image/visual-reverse-image-search-v2_intro.jpg);padding: 150px;background-repeat: no-repeat;background-size: cover;">
            <div class="mdl-grid portfolio-max-width">
              <div class="row">
                <div class="col-12 col-md-6">

                    <div class="mdl-card mdl-shadow--4dp row">
                        <div class="mdl-card__media">
                            <img class="article-image" src="https://www.acdif.fr/wp-content/uploads/2018/09/photodune-6272262-promotion-stamp-xl-1280x420.jpg" border="0" alt="">
                        </div>
                        <div class="mdl-card__supporting-text">
                          Need help ?
                        </div>
                        <div class="mdl-card__actions mdl-card--border" align="center">
                            <a href="<?= site_url('users/subscribe')?>" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent mdl-button--raised">Subscribe</a>
                                <a href="<?= site_url('users/login')?>" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent"><i class="fa fa-lock"></i> Login</a>
                        </div>
                    </div>
                    <br />
                </div>
                <div class="col-12 col-md-6">
                  <div class="mdl-card mdl-shadow--4dp row">
                      <div class="mdl-card__media">
                          <img class="article-image" src=" images/example-work01.jpg" border="0" alt="">
                      </div>
                      <div class="mdl-card__title">
                          <h2 class="mdl-card__title-text"><i class="fa fa-lock"></i>&nbsp; <?= $title?></h2>
                      </div>
                      <div class="mdl-card__supporting-text">
                          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="email" name="users_login" id="users_login" required>
                            <label class="mdl-textfield__label" for="users_login">E-mail...</label>
                          </div>
                      </div>
                      <div class="mdl-card__actions mdl-card--border" align="center">
                          <button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent">Ok</a>
                      </div>
                  </div>
                </div>
              </div>

            </div>
</form>
