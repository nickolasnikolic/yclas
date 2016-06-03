<?php defined('SYSPATH') or die('No direct script access.');?>
<div class="pad_10tb">
	<div class="container">
		<div class="col-xs-12">
			<div class="page-header">
				<h3><?=__('Sales')?></h3>
			</div>

			<?foreach($orders as $order):?>
				<div class="my_ad_item">
					<div class="my_ad_body clearfix">
						<div class="ad_pcoll">
							<div class="pad_10">
							<?if($order->ad->get_first_image() !== NULL):?>
								<img src="<?=$order->ad->get_first_image()?>" alt="<?=HTML::chars($order->ad->title)?>" />
							<?else:?>
								<img data-src="holder.js/<?=core::config('image.width_thumb')?>x<?=core::config('image.height_thumb')?>?<?=str_replace('+', ' ', http_build_query(array('text' => $order->ad->category->name, 'size' => 14, 'auto' => 'yes')))?>" alt="<?=HTML::chars($order->ad->title)?>"> 
							<?endif?>
							</div>
						</div>
						<div class="ad_dcoll">
							<div class="pad_10">
								<div class="my_ad_title clearfix">
									<a class="at" href="<?=Route::url('ad', array('controller'=>'ad','category'=>$order->ad->category->seoname,'seotitle'=>$order->ad->seotitle))?>"><?=$order->ad->title?> (#<?=$order->pk()?>)</a>
								</div>
								<p><b><?=__('User')?> : </b><a href="<?=Route::url('profile', array('seoname'=> $order->user->seoname)) ?>" ><?=$order->user->name?></a></p>
								<p><b><?=__('Date')?> : </b><?=$order->pay_date?></p>
								<p><b><?=__('Price')?> : </b><?=i18n::format_currency($order->amount, $order->currency)?></p>
							</div>
						</div>
					</div>
				</div>
			<?endforeach?>

			<div class="text-center">
				<?=$pagination?>
			</div>
		</div>
	</div>
</div>