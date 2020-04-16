</div>
    <footer>
        <p>
            &copy; <?php echo date('Y '); ?><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
            <a href="http://www.beian.miit.gov.cn/" target="_blank"> <?php $this->options->icpNum(); ?> </a>  <!-- 备案号（functions  -->
            <?php $this->options->siteStat(); ?> <!-- 网站统计代码（functions  -->
            网站加载耗时:<?php echo timer_get();?>
            <?php _e('由 <a href="http://www.typecho.org" target="_blank">Typecho</a> 强力驱动'); ?>.
            <?php _e('<a href="https://github.com/laulzgoay/Briefness" target="_blank">Theme is Briefness </a>by <a href="https://www.xjisme.com/" target="_blank"> 小俊 </a>'); ?>
        </p>
    </footer>
    
        <script src="<?php $this->options->themeUrl('./assets/js/lightbox.js'); ?>"></script>

       <?php if (!empty($this->options->tools) && in_array('prism', $this->options->tools)): ?>
       <script src="<?php $this->options->themeUrl('./prism/prism.js?v=1.0.5'); ?>"></script><?php endif; ?>

       <script>
        $(document).ready(function() {
        $(".post-content img").each(function() {
            var strA = "<a href='" + this.src + "' data-lightbox='example-set' ></a>";
            $(this).wrapAll(strA);
            });
        });

        $(".post-content a").each(function(){
            $(this).attr("target","_blank");
        });
        </script>
        

</div>
</body>
</html>