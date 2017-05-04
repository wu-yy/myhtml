<?php include maoo_temp('header'); ?>
<div class="breadcrumb-box">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li>
                <a href="<?php echo $date->siteUrl; ?>">首页</a></li>
            <li class="active">搜索：<?php echo $s; ?></li>
        </ol>
    </div>
</div>
<?php if($date->searchType=='product') : ?>
<div class="product-list search-page">
    <div class="container">
        <h4 class="title">
            <a href="<?php echo $date->siteUrl; ?>?s=<?php echo $s; ?>&type=product" class="active">搜索商品</a>
            <span class="point">•</span>
            <a href="<?php echo $date->siteUrl; ?>?s=<?php echo $s; ?>&type=post">搜索文章</a>
        </h4>
        <?php if($date->products->count>0) : ?>
        <div class="row">
            <?php foreach($date->products->result as $product) : ?>
            <div class="col-xs-3 col">
                <div class="thumbnail text-center product-list-item">
                    <?php if($product->saleText && $product->saleColor) : ?>
                    <span class="sale sale<?php echo $product->saleColor; ?>">
                        <?php echo $product->saleText; ?>
                    </span>
                    <?php endif; ?>
                    <a href="<?php echo maoo_url($date,'product','single',array('id'=>$product->id)); ?>" class="img-div cover">
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
        <?php else : ?>
        <div class="nothing">
            没有找到任何符合条件的商品！
        </div>
        <?php endif; ?>
    </div>
</div>
<?php else : ?>
<div class="container search-page">
    <h4 class="title">
        <a href="<?php echo $date->siteUrl; ?>?s=<?php echo $s; ?>&type=product">搜索商品</a>
        <span class="point">•</span>
        <a href="<?php echo $date->siteUrl; ?>?s=<?php echo $s; ?>&type=post" class="active">搜索文章</a>
    </h4>
    <?php if($date->posts->count>0) : ?>
    <div class="row">
        <div class="col-xs-12 col">
            <div class="post-list ">
                <?php foreach($date->posts->result as $post) : ?>
                <div class="post-list-item">
                    <?php if($post->cover) : ?>
                    <a class="left" href="<?php echo maoo_url($date,'post','single',$post->id); ?>">
                        <img src="<?php echo $post->cover; ?>?imageView2/1/w/200/h/150" />
                    </a>
                    <?php endif; ?>
                    <div class="right <?php if($post->cover) : ?>haveCover<?php endif; ?>">
                        <h4 class="title">
                            <a href="<?php echo maoo_url($date,'post','single',$post->id); ?>">
                                <?php echo $post->title; ?>
                            </a>
                        </h4>
                        <div class="info">
                            <span class="date">
                                <?php echo date('Y年m月d日 H:i',$post->date); ?>
                            </span>
                            <div class="comment">
                                <i class="fa fa-comment-o"></i> <?php echo $post->comment; ?>
                            </div>
                        </div>
                        <div class="excerpt">
                            <?php if($post->excerpt) : echo $post->excerpt; else : echo maoo_cut_str(strip_tags($post->content),99); endif; ?>
                        </div>
                        <?php if($post->tags) : ?>
                        <div class="tags">
                            <i class="fa fa-tags"></i>
                            <?php foreach($post->tags as $tag) : ?>
                            <a href="<?php echo maoo_url($date,'post','tag',array('tag'=>$tag)); ?>">
                                <?php echo $tag; ?>
                            </a>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php echo maoo_pagenavi($date->posts->count,$_GET['page'],$date->pageSizePost,$date->siteUrl); ?>
        </div>
    </div>
    <?php else : ?>
    <div class="nothing">
        没有找到任何符合条件的文章！
    </div>
    <?php endif; ?>
</div>
<?php endif; ?>
<?php include maoo_temp('footer'); ?>