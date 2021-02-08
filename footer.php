                </div> <!-- .container-->
            </div> <!-- #anti-footer-->
            <footer id="footer">
                <div class="footer-credits-icons-container">
                    <div class="footer-credits"> Cutler McMartin 2021</div>
                    <div class="spacer">|</div>
                    <div class="icons">F in kitty</div>
                </div>
                <div class="footer-menu">
                <?php wp_nav_menu( array( 
                    'theme_location'    => 'footer-menu',
                    'menu_class'        => 'footer-menu',
                    'walker'            => new Walker_Nav_Menu()
                ) ); ?>
                </div>
            </footer> <!-- .container-->
        </div> <!-- .wrapper-->
        <?php wp_footer(); ?>
    </body>
</html>