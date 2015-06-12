<?php if(is_front_page() || is_page_template('template-team.php')) echo '<div id="progress-back" class="load-item"><div id="progress-bar"></div></div>';
	elseif(is_page_template('template-portfolio.php') || is_page_template('template-contact.php') ) echo '<div class="fdiv mw"><p class="fll">'.ot_get_option('footer-text', '').'</p><p class="flr tta">top</p></div>';
	else echo '<div class="fdiv"><p class="fll">'.ot_get_option('footer-text', '').'</p><p class="flr tta">top</p></div>'; ?>

<?php wp_footer(); ?>
</body>
</html>
