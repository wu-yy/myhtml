<?php include maoo_temp('header'); ?>
<div class="error-page">
    <div class="error-page-pic"></div>
    <h1>咦~出现错误啦~</h1>
    <div class="excerpt" style="font-size:1.5rem;">
        <?php if($date->code>0) : ?>
        <p>
            <?php echo $date->text; ?>
        </p>
        错误代码：<?php echo $date->code; ?>
        <?php else : ?>
        与数据服务器通信超时，请等待几秒后刷新页面。
        <?php endif; ?>
    </div>
    <a class="btn btn-warning" href="<?php echo $date->siteUrl; ?>">返回首页</a>
</div>
<?php include maoo_temp('footer'); ?>