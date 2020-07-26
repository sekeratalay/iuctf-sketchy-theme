<?= $this->extend($config->viewLayout) ?>


<?= $this->section('title') ?>
	<?= lang('Auth.loginTitle') ?>
<?= $this->endSection() ?>


<?= $this->section('content') ?>

	<div class="col-sm-8 offset-sm-2 my-4">
		<div class="card">
			<h2 class="card-header"><?= lang('Auth.loginTitle') ?></h2>
			<div class="card-body">
				<?= $this->include('templates/message_block') ?>

				<form action="<?= route_to('login') ?>" method="post">
					<?= csrf_field() ?>

					<?php if ($config->validFields === ['email']) : ?>
						<div class="form-group">
							<label for="login"><?= lang('Auth.email') ?></label>
							<input autofocus type="email" class="form-control form-control-lg <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
									name="login" placeholder="<?= lang('Auth.email') ?>">
							<div class="invalid-feedback">
								<?= session('errors.login') ?>
							</div>
						</div>
					<?php else : ?>
						<div class="form-group">
							<label for="login"><?= lang('Auth.emailOrUsername') ?></label>
							<input autofocus type="text" class="form-control form-control-lg <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
									name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
							<div class="invalid-feedback">
								<?= session('errors.login') ?>
							</div>
						</div>
					<?php endif ?>

					<div class="form-group">
						<label for="password"><?= lang('Auth.password') ?></label>
						<input type="password" name="password" class="form-control form-control-lg <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
						<div class="invalid-feedback">
							<?= session('errors.password') ?>
						</div>
					</div>

					<?php if ($config->allowRemembering) : ?>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" name="remember" class="form-check-input" <?php if(old('remember')) : ?> checked <?php endif ?>>
								<?= lang('Auth.rememberMe') ?>
							</label>
						</div>
					<?php endif ?>

					<button type="submit" class="btn btn-primary btn-block btn-lg"><?= lang('Auth.loginAction') ?></button>
				</form>

				<hr>

				<?php if ($config->allowRegistration) : ?>
					<p><a href="<?= route_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></p>
				<?php endif ?>
				<p><a href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
			</div>
		</div>
	</div>

<?= $this->endSection() ?>
