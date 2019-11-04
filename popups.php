 <div class="signin-popup popup-window mfp-hide" id="signin">
            <h3>sign in</h3>
            <span>New to site? <a href="#signup" class="popup">Create an Account</a></span>
            <form action="#">
                <div class="form-group">
                    <label for="signin-email">Email</label>
                    <input type="text" name="signin-email" id="signin-email">
                </div>
                <div class="form-group">
                    <label for="signin-password">Password</label>
                    <input type="password" name="signin-password" id="signin-password">
                </div>
                <a href="#forgot-password" class="popup clr-lighther block">Forgot password?</a>
                <input type="submit" name="signin-btn" class="button button-bg" value="Sign in">
            </form>
            <div class="social-signin">
                <span>or</span>
                <a href="#" class="social-sign sign-facebook">
                    <i class="fa fa-facebook"></i>
                    <span>Facebook</span>
                </a>
                <a href="#" class="social-sign sign-twitter">
                    <i class="fa fa-twitter"></i>
                    <span>Twitter</span>
                </a>
            </div><!-- /.social-signin -->
        </div><!-- /.signin-popup -->
        <div class="popup-window mfp-hide" id="forgot-password">
            <h3>Forgot password</h3>
            <span>Already have account? <a href="#signin" class="popup">Sign in</a></span>
            <form action="#">
                <div class="form-group">
                    <label for="forgot-email">Email *</label>
                    <input type="text" name="forgot-email" id="forgot-email">
                </div>

                <input type="submit" name="forgot-btn" class="button button-bg" value="Send">
            </form>
        </div><!-- /.signup-popup -->
        <div class="popup-window mfp-hide" id="signup">
            <h3>Sign up</h3>
            <span>Already have account? <a href="#signin" class="popup">Sign in</a></span>
            <form action="#">
                <div class="form-group">
                    <label for="signup-login">Username *</label>
                    <input type="text" name="signup-login" id="signup-login">
                </div>
                <div class="form-group">
                    <label for="signup-email">Email *</label>
                    <input type="text" name="signin-email" id="signup-email">
                </div>
                <div class="form-group">
                    <label for="signup-password">Password *</label>
                    <input type="password" name="signin-password" id="signup-password">
                </div>
                <input type="submit" name="signup-btn" class="button button-bg" value="Sign up">
            </form>
        </div>