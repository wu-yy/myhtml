<?php include maoo_temp('header'); ?>
<div class="breadcrumb-box">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li>
                <a href="<?php echo $date->siteUrl; ?>">首页</a></li>
            <li>
                <a href="<?php echo maoo_url($date,'product'); ?>">全部商品</a>
            </li>
            <li class="active"><?php echo $date->term->title; ?></li>
        </ol>
    </div>
</div>
<div class="product-list">
    <div class="container">
        <div class="row">
            <?php foreach($date->products->result as $product) : ?>
            <div class="col-xs-3 col">
                <div class="thumbnail text-center product-list-item">
                    <?php if($product->saleText && $product->saleColor) : ?>
                    <span class="sale sale<?php echo $product->saleColor; ?>">
                        <?php echo $product->saleText; ?>
                    </span>
                    <?php endif; ?>
                    <a href="<?php echo maoo_url($date,'product','single',$product->id); ?>" class="img-div cover">
                        <img src="<?php echo $product->cover[0]; ?>?imageView2/1/w/160/h/160" alt="<?php echo $product->title; ?>">
                    </a>
                    <div class="caption">
                        <h5>
                            <a href="<?php echo maoo_url($date,'product','single',$product->id); ?>">
                                <?php echo $product->title; ?>
                            </a>
                        </h5>
                        <div class="price">
                            <?php echo $product->minPrice/100; ?>元起
                        </div>
                        <ul class="list-inline cover-list">
                            <?php $num = 0; foreach($product->cover as $cover) : ?>
                            <li class="<?php if($num==0) echo 'active'; ?>">
                                <img src-data="<?php echo $cover; ?>" src="<?php echo $cover; ?>?imageView2/1/w/34/h/34">
                            </li>
                            <?php $num++; endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <script>
            $('.thumbnail .cover-list li').hover(function(){
                var proBox = $(this).parent('.cover-list').parent('.caption').parent('.thumbnail');
                var img = $('img',this).attr('src-data');
                $('.cover img',proBox).attr('src',img+'?imageView2/1/w/200/h/200');
                var coverList = $(this).parent('.cover-list');
                $('li',coverList).removeClass('active');
                $(this).addClass('active');
            });
        </script>
        <?php echo maoo_pagenavi($date->products->count,$_GET['page'],$date->pageSizeProduct,$date->siteUrl); ?>
        <!--div class="well">
            <?php print_r($date->products); ?>
        </div-->
    </div>
</div>
<?php include maoo_temp('footer'); ?>