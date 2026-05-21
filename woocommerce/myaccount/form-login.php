<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

do_action( 'woocommerce_before_customer_login_form' ); ?>

<div class="polar-auth-container" id="customer_login">

    <!-- LOGIN FORM SECTION -->
    <div class="auth-box login-box" id="auth-login-section">
        <h2><?php esc_html_e( 'Login', 'woocommerce' ); ?></h2>
        <form class="woocommerce-form woocommerce-form-login login" method="post">
            <?php do_action( 'woocommerce_login_form_start' ); ?>

            <p class="form-row">
                <label for="username"><?php esc_html_e( 'Username or email', 'woocommerce' ); ?> *</label>
                <input type="text" class="input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" />
            </p>
            <p class="form-row">
                <label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?> *</label>
                <input class="input-text" type="password" name="password" id="password" autocomplete="current-password" />
            </p>

            <?php do_action( 'woocommerce_login_form' ); ?>

            <div class="auth-actions d-flex justify-content-between align-items-center mb-3">
                <label class="remember-me">
                    <input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
                </label>
                <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" class="lost-pass"><?php esc_html_e( 'Forgot password?', 'woocommerce' ); ?></a>
            </div>

            <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
            <button type="submit" class="button default-btn dark-bg w-100" name="login" value="Log in">Log in</button>

            <!-- TOGGLE LINK -->
            <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
                <p class="auth-toggle-text text-center mt-4">
                    Don't have an account? <a href="#" id="show-register-btn">Register here</a>
                </p>
            <?php endif; ?>

            <?php do_action( 'woocommerce_login_form_end' ); ?>
        </form>
    </div>

    <!-- REGISTER FORM SECTION -->
    <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
    <div class="auth-box register-box" id="auth-register-section" style="display: none;">
        <h2><?php esc_html_e( 'Register', 'woocommerce' ); ?></h2>
        <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
            <?php do_action( 'woocommerce_register_form_start' ); ?>

            <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
                <p class="form-row">
                    <label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?> *</label>
                    <input type="text" class="input-text" name="username" id="reg_username" autocomplete="username" />
                </p>
            <?php endif; ?>

            <p class="form-row">
                <label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?> *</label>
                <input type="email" class="input-text" name="email" id="reg_email" autocomplete="email" />
            </p>

            <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
                <p class="form-row">
                    <label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?> *</label>
                    <input type="password" class="input-text" name="password" id="reg_password" autocomplete="new-password" />
                </p>
            <?php else : ?>
                <p><?php esc_html_e( 'A link to set a new password will be sent to your email address.', 'woocommerce' ); ?></p>
            <?php endif; ?>

            <?php do_action( 'woocommerce_register_form' ); ?>

            <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
            <button type="submit" class="button default-btn dark-bg w-100" name="register" value="Register">Register</button>

            <!-- TOGGLE LINK -->
            <p class="auth-toggle-text text-center mt-4">
                Already have an account? <a href="#" id="show-login-btn">Login here</a>
            </p>

            <?php do_action( 'woocommerce_register_form_end' ); ?>
        </form>
    </div>
    <?php endif; ?>

</div>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>