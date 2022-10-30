 <!--start the intialize of js lib-->
        <!--first intilize jquery lib-->
        <script src="assets/js/lib/jquery-3.6.0.min.js"></script>
        <!--second intialize popper js lib-->
        <script src="assets/js/lib/popper.js"></script>
        <!--third intialize bootstrap js lib-->
        <script src="assets/js/lib/bootstrap.js"></script>
        <!--intialize owl coursel js lib -->
        <script src="assets/js/lib/owl.carousel.min.js"></script>
        <!--end the intialize of js lib-->
        <!--intialize main js file-->
        <script src="assets/js/main.js"></script>
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
		<script src="js/scripts.js"></script>
    </body>
</html>