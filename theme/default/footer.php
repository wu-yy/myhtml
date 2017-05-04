<div class="footer">
    <ul class="list-inline mb-10" style="margin-left:0">
        <li>
            <?php echo $date->siteTitle; ?>
        </li>
        <li>
            •
        </li>
        <li>
            <a target="_blank" href="<?php echo REQUEST_URL; ?>/project/control/<?php echo $date->id; ?>">网站管理</a>
        </li>
        <li>
            •
        </li>
        <li>
            Powered by <a target="_blank" href="<?php echo REQUEST_URL; ?>">Mao10CMS</a>
        </li>
    </ul>
    郑州云猫电子商务有限公司 专业的B2C网络商城系统
</div>
<?php if($_SESSION['flash']) : ?>
<div class="alertbox">
    <div class="alert alert-danger">
        <?php echo $_SESSION['flash']; ?>
        <div class="close">
            x
        </div>
    </div>
</div>
<script>
    setTimeout("$('.alertbox .alert').fadeOut()",3000);
    $('.alertbox .close').click(function(){
        $('.alertbox .alert').fadeOut();
    });
</script>
<?php endif; ?>
</body>
</html>