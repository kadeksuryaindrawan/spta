   
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    



    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                
                                    <a class="text-center"> <h4>SPTA PNB</h4></a>
        
                                <form class="mt-5 mb-5 login-input" action="<?= base_url('Register/process') ?>" method="POST">
                                    
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control"  placeholder="Email" required>
                                    </div>
									<div class="form-group">
                                        <input type="text" name="name" class="form-control"  placeholder="Nama Lengkap" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    </div>
									<div class="form-group">
                                        <input type="password" name="repassword" class="form-control" placeholder="Re-password" required>
                                    </div>
                                    <button type="submit" class="btn login-form__btn submit w-100">Daftar</button>
                                </form>
                                    <p class="mt-5 login-form__footer">Sudah punya akun? <a href="<?= base_url('Login') ?>" class="text-primary">Masuk</p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



