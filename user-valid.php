<?php include 'includes/session.php'; ?>
<?php include 'includes/regheader.php'; ?>




        <!--start main-->
        <main>
            <!--Start register-pg -->
            <section class="register-pg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 m-auto">
                            <div class="form-wrapper">
                                <form>
                                    <div class="heading text-center mb-5">
                                        <h4 class="h4"> User Valid</h4>
                                        <img src="assets/images/logo.png" alt="" class="logo">
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="text" class="form-control" autocomplete="off" autofocus required />
                                        <label class="floating-label">Activation Code</label>
                                    </div>
                                    <a href="index.html" class="submit-btn">Activate</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="images/pattern-3.png" alt="" class="pattern">
            </section>
        </main>
 
        <?php include 'includes/footer1.php'; ?>

  
        <script>
            //show password
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');
        
            togglePassword.addEventListener('click', function (e) {
                // toggle the type attribute
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                // toggle the eye slash icon
                this.classList.toggle('fa-eye-slash');
            });
        </script>
    </body>
</html>