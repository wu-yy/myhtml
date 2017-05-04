<?php include maoo_temp('header'); ?>
<div class="breadcrumb-box">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li>
                <a href="<?php echo $date->siteUrl; ?>">首页</a></li>
            <li>
                <a href="<?php echo maoo_url($date,'product'); ?>">全部商品</a>
            </li>
            <li>
                <a href="<?php echo maoo_url($date,'product','term',$date->product->term->id); ?>">
                    <?php echo $date->product->term->title; ?>
                </a>
            </li>
            <li class="active"><?php echo $date->product->title; ?></li>
        </ol>
    </div>
</div>
<div class="pro-single">
	<div class="container">
		<div class="row">
			<div class="col-md-7 col">
				<div class="cover">
					<div class="pull-left">
						<ul class="list-unstyled mb0">
                            <?php $num=0; foreach($date->product->cover as $cover) : ?>
							<li class="<?php if($num==0) echo 'active'; ?>">
								<img src-data="<?php echo $cover; ?>" src="<?php echo $cover; ?>?imageView2/1/w/60/h/60">
                            </li>
							<?php $num++; endforeach; ?>
						</ul>
					</div>
					<div class="pull-right">
						<img src="<?php echo $date->product->cover[0]; ?>?imageView2/1/w/482/h/482">
                    </div>
				</div>
			</div>
			<script>
                $('.cover .list-unstyled li').click(function() {
					var img = $('img', this).attr('src-data');
					$('.cover .pull-right img').attr('src', img + '?imageView2/1/w/482/h/482');
					$('.cover .list-unstyled li').removeClass('active');
					$(this).addClass('active');
				});
            </script>
			<div class="col-md-5 col">
				<div class="info">
					<h1 class="title mt-0"><?php echo $date->product->title; ?></h1>
					<div class="excerpt"><?php echo $date->product->excerpt; ?></div>
					<div class="price" price-data="<?php echo $date->product->price; ?>">
                        <?php if($date->product->minPrice!=$date->product->maxPrice) : ?><span><?php echo $date->product->minPrice/100; ?> - <?php echo $date->product->maxPrice/100; ?></span><?php else : ?><?php echo $date->product->minPrice/100; ?><?php endif; ?> <small>元</small>
                    </div>
                    <form method="post" action="<?php echo $date->siteUrl; ?>/engine/action/cart.php">
                        <input type="hidden" name="id" value="<?php echo $date->product->id; ?>" />
                        <textarea class="hidden" id="param-form" name="params"></textarea>
                        <?php if(count($date->product->param)>0) : ?>
                        <?php foreach($date->product->param as $param) : ?>
                        <div class="optional" name-data="<?php echo $param->title; ?>">
                            <div class="name"><?php echo $param->title; ?>：</div>
                            <?php $num = 0; foreach($param->list as $list) : ?>
                            <label class="" price-data="<?php echo $list->price; ?>">
                                <?php echo $list->name; ?>
                                <input type="radio" name="param" value="<?php echo $list->name; ?>" />
                            </label>
                            <?php $num++; endforeach; ?>
                            <div class="clearfix"></div>
                        </div>
                        <?php endforeach; ?>
                        <script>
                        $('.optional label').click(function(){
                            var out = $(this).parent('.optional');
                            $('label',out).removeClass('active');
                            $(this).addClass('active');
                            var priceRe = $('.pro-single .price').attr('price-data')*1;
                            var price = 0;
                            $('.optional label.active').each(function(){
                                price += $(this).attr('price-data')*1;
                            });
                            $('.price span').text((price+priceRe)/100);
                            var params = [];
                            $('.optional').each(function(){
                                params.push({
                                    title : $(this).attr('name-data'),
                                    name : $('.active input',this).val()
                                });
                            });
                            $('#param-form').html(JSON.stringify(params));
                        });
                        </script>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-md-7 col">
                                <button type="submit" class="btn btn-warning btn-block btn-lg btn-addCart">
                                    <i class="fa fa-cart-plus"></i>加入购物车
                                </button>
                            </div>
                            <div class="col-md-5 col">
                                <?php echo maoo_like_product_btn($date,$date->product->id); ?>
                            </div>
                        </div>
                        <?php if(count($date->product->param)>0) : ?>
                        <script>
                            $('.btn-addCart').click(function(){
                                var num = 0;
                                $('.optional label.active').each(function(){
                                    num++;
                                });
                                if(num!=<?php echo count($date->product->param); ?>) {
                                    alert('请选择全部参数');
                                    return false;
                                };
                            });
                        </script>
                        <?php endif; ?>
                    </form>
					<div class="user-action text-center">
						<div class="row">
							<div class="col-md-4 col">
								<a href="#pro-nav-item-3">
									<i class="fa fa-commenting"></i> 评价 0
                                </a>
							</div>
							<div class="col-md-4 col">
								<a href="#pro-nav-item-4">
									<i class="fa fa-question-circle"></i> 提问 0
                                </a>
							</div>
							<div class="col-md-4 col">
								<a href="#pro-nav-item-3">
									<i class="fa fa-thumbs-up"></i> 满意度 100%
                                </a>
							</div>
						</div>
					</div>
					<a href="<?php echo maoo_url($date,'product','term',$date->product->term->id); ?>" class="more">
						<i class="fa fa-th-large"></i> 查看更多同类产品
                    </a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="pro-entry">
    <div class="container">
        <div class="entry">
            <?php echo $date->product->content; ?>
        </div>
    </div>
</div>
<?php echo maoo_like_product_js($date); ?>
<?php include maoo_temp('footer'); ?>