<?
$insta_link = \Victory\Options\CVictoryOptions::getOptionValue('insta_link');
$vb_link = \Victory\Options\CVictoryOptions::getOptionValue('vb_link');
$tictoc_link = \Victory\Options\CVictoryOptions::getOptionValue('tictoc_link');
if ($insta_link || $vb_link || $tictoc_link) :
?>
	<ul class="flex items-center justify-between gap-2 max-w-36">
		<? if ($insta_link) : ?>
			<li class="social__item">
				<a href="<?= $insta_link ?>" target="_blank" class="flex items-center justify-center transition duration-500 bg-white rounded-full w-9 h-9 group/messengers">
					<img src="<?= SITE_TEMPLATE_PATH ?>/images/icons/insta.svg" width="18" height="18" alt="instagram" title="instagram" />
				</a>
			</li>
		<? endif; ?>
		<? if ($vb_link) : ?>
			<li class=" social__item">
				<a href="<?= $vb_link ?>" target="_blank" class="flex items-center justify-center transition duration-500 bg-white rounded-full w-9 h-9 group/messengers">
					<img src="<?= SITE_TEMPLATE_PATH ?>/images/icons/viber.svg" width="18" height="18" alt="viber" title="viber" />
				</a>
			</li>
		<? endif; ?>
		<? if ($tictoc_link) : ?>
			<li class="social__item">
				<a href="<?= $tictoc_link ?>" target="_blank" class="flex items-center justify-center transition duration-500 bg-white rounded-full w-9 h-9 group/messengers">
					<img src="<?= SITE_TEMPLATE_PATH ?>/images/icons/tic-tok.svg" width="18" height="18" alt="tic-tok" title="tic-tok" />
				</a>
			</li>
		<? endif; ?>
	</ul>
<? endif; ?>