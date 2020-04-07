</div>
    <footer>
        <p>
            &copy; <?php echo date('Y '); ?><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
            <?php _e('由 <a href="http://www.typecho.org" target="_blank">Typecho</a> 强力驱动'); ?>.
            <?php _e('<a href="https://www.xjisme.com/" target="_blank">Theme is Briefness by 小俊</a>'); ?>
        </p>
    </footer>
        <script src="<?php $this->options->themeUrl('./assets/js/lightbox.js'); ?>"></script>

<?php if (!empty($this->options->tools) && in_array('prism', $this->options->tools)): ?>
<script src="<?php echo theurl; ?>./prism/prism.js?v=1.0.5"></script><?php endif; ?>

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