                </div> <!-- .container-->
            </div> <!-- #anti-footer-->
            <footer id="footer">
                <?php if (has_nav_menu('footer-menu')) { ?>
                    <div class="footer-menu">
                        <?php wp_nav_menu( array( 
                            'theme_location'    => 'footer-menu',
                            'menu_class'        => 'footer-menu',
                            'walker'            => new Walker_Nav_Menu()
                        ) ); ?>
                    </div>
                <?php } ?>

                <div class="footer-credits-icons-container">
                
                    <?php if (get_theme_mod('footer_text_content', '') != '') {
                        ?><div class="footer-text-content"><?php
                            echo get_theme_mod('footer_text_content', '');
                        ?></div><?php
                    } ?>

                    <?php if ((get_theme_mod('footer_text_content', '') != '') and ((get_theme_mod('linkedin_url', '') != '') or (get_theme_mod('github_url', '') != '') or (get_theme_mod('instagram_url', '') != '') or (get_theme_mod('facebook_url', '') != ''))) { ?> <div class="footer-spacer">|</div> <?php } ?>
                    
                    <div class="footer-social-icons-container">
                        <?php if (get_theme_mod('linkedin_url', '') != '') { ?> <a href="<?php echo get_theme_mod('linkedin_url', '') ?>"><div class="social-footer-icons"><?php echo file_get_contents(get_template_directory_uri() . "/svgs/linkedin-in-brands.svg") ?></div></a> <?php } ?>
                        <?php if (get_theme_mod('github_url', '') != '') { ?> <a href="<?php echo get_theme_mod('github_url', '') ?>"><div class="social-footer-icons"><?php echo file_get_contents(get_template_directory_uri() . "/svgs/github-alt-brands.svg") ?></div></a> <?php } ?>
                        <?php if (get_theme_mod('instagram_url', '') != '') { ?> <a href="<?php echo get_theme_mod('instagram_url', '') ?>"><div class="social-footer-icons"><?php echo file_get_contents(get_template_directory_uri() . "/svgs/instagram-brands.svg") ?></div></a> <?php } ?>
                        <?php if (get_theme_mod('facebook_url', '') != '') { ?> <a href="<?php echo get_theme_mod('facebook_url', '') ?>"><div class="social-footer-icons"><?php echo file_get_contents(get_template_directory_uri() . "/svgs/facebook-f-brands.svg") ?></div></a> <?php } ?>
                        <?php if (get_theme_mod('twitter_url', '') != '') { ?> <a href="<?php echo get_theme_mod('twitter_url', '') ?>"><div class="social-footer-icons"><?php echo file_get_contents(get_template_directory_uri() . "/svgs/twitter-brands.svg") ?></div></a> <?php } ?>
                    </div>

                </div>

            </footer> <!-- .container-->
        </div> <!-- .wrapper-->
        <?php wp_footer(); ?>
    </body>
</html>