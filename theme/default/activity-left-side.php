<div class="activity-side">
    <div class="activity-side-item activity-side-products">
        <h4 class="title">最新商品</h4>
        <?php foreach($date->custom->activitySideProducts as $product) : $product->id = maoo_toShortKey($product->id); ?>
        <div class="activity-side-products-item">
            <a href="<?php echo maoo_url($date,'product','single',$product->id); ?>" class="img-div">
                <img src="<?php echo $product->cover[0]; ?>?imageView2/1/w/200/h/200" />
            </a>
            <a class="title" href="<?php echo maoo_url($date,'product','single',$product->id); ?>">
                <?php echo $product->title; ?>
            </a>
            <div class="price">
                <?php echo $product->minPrice/100; ?>元起
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>