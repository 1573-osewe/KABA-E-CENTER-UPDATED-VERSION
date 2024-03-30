 <?php 
       // $this->view('includes/header');
        // $this->view('includes/nav');

  ?>
<link rel="stylesheet" href="<?php echo ROOT?>/assets/vendor/bootstrap/css/bootstrap.min.css">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');



*{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

.flex-r ,.flex-c {
    justify-content: center;
    align-items: center;
    display: flex;
}
.flex-c{
    flex-direction: column;
}
.flex-r{
    flex-direction: row;
}

.container{
    width: 100%;
    min-height: 100vh;
    padding: 20px 10px;
    background: #E5E5E5;  
}



.login-text{
    background-color: #F6F6F6;
    max-width: 400px;
    min-height: 500px;
    border-radius: 10px;
    padding: 10px 20px;
}

.logo{
    margin-bottom: 20px;
}
.logo span , .logo span i{
    font-size: 25px;
    color:#0d8aa7 ;
}

.login-text h1{
    font-size: 25px;
}
.login-text p{
    font-size: 15px;
    color: #000000B2;
}

form{
    align-items: flex-start !important;
    width: 100%;
    margin-top: 15px;
}

.input-box{
    margin: 10px 0px;
    width: 100%;
}

.label{
    font-size: 15px;
    color: black;
    margin-bottom: 3px;
}

.input{
    background-color: #F6F6F6;
    padding: 0px 5px;
    border: 2px solid rgba(216, 216, 216, 1);
    border-radius: 10px;
    overflow: hidden;
    justify-content: flex-start;
}

input{
    border: none;
    outline: none;
    padding: 10px 5px;
    background-color: #F6F6F6;
    flex: 1;
}
.input i{
    color:rgba(0, 0, 0, 0.4);
}

.check span{
    color:#000000B2;
    font-size: 15px;
    font-weight: bold;
    margin-left: 5px;
}

.btn{
    color: #ffffff;
    border-radius: 30px;
    padding: 10px 15px;
    background: linear-gradient(122.33deg, #68bed1 30.62%, #1E94E9 100%);
    margin-top: 30px;
    margin-bottom: 10px;
    font-size: 16px;
    transition: all 0.3s linear;
}

.btn:hover{
    transform: translateY(-2px);
}
.extra-line{
    font-size: 15px;
    font-weight: 600;
}
.extra-line a{
    color: #0095B6;
}

  </style>

    <main>
        <!-- <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6  ">
                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="assets/img/logo.pngk" alt="">
                                <span class="d-none d-lg-block">Jack classic</span>
                            </a>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-2 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-3">Create an Account</h5>
                                    <p class="text-center small">Enter your personal details to login</p>
                                     <?php if(message()): ?>
                                    <div class ="alert alert-danger text-center"><?php echo message('', true) ?></div>
                                     <?php endif;?>
                                         <?php if(!empty($errors['email'])):?>
                                     <div class ="alert alert-danger text-center"><?php echo $errors['email'] ?></div> 
                                     <?php endif;?>
                                </div>

                                <form method= "POST" class="row g-3 ">
                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">Your Email</label>
                                        <input type="email" name="email" class="form-control form-section" id="yEmail">
                                        <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                    </div>



                                    <div class="col-12 mb-5">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control form-section" id="">
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Login</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Already have an account? <a
                                                href="signup">Sign Up</a></p>
                                    </div>
                                </form>

                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </section> -->

            <div class=" flex-r container">
        <div class="flex-r login-wrapper">
            <div class="login-text">
                <div class="logo">
                    <span><i class="fab fa-speakap"></i></span>
                    
                </div>
                <h1>Sign In</h1>
                    <?php if(message()): ?>
                    <div class ="alert alert-danger text-center"><?php echo message('', true) ?></div>
                        <?php endif;?>
                            <?php if(!empty($errors['email'])):?>
                        <div class ="alert alert-danger text-center"><?php echo $errors['email'] ?></div> 
                        <?php endif;?>
            

                <form method="POST" class="flex-c">
                    <div class="input-box">
                        <span class="label">E-mail</span>
                        <div class=" flex-r input">
                            <input type="email" name="email" placeholder="name@abc.com">
                            <i class="fas fa-at"></i>
                        </div>
                    </div>
                    
                    <div class="input-box">
                        <span class="label">Password</span>
                        <div class="flex-r input">
                            <input name="password" type="password" placeholder="8+ (a, A, 1, #)">
                            <i class="fas fa-lock"></i>
                        </div>
                    </div>

                    <!-- <div class="check">
                        <input type="checkbox" name="" id="">
                        <span>I've read and agree with T&C</span>
                    </div> -->

                    <input class="btn" type="submit" value="Login">
                    <span class="extra-line">
                        <span>Already have an account?</span>
                        <a href="signup">Sign Up</a>
                    </span>
                </form>

            </div>
        </div>
    </div>
    </main>
    <section class="to-top-arrow">
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short h4"></i></a>
    </section>






 <?php 
        $this->view('includes/footer');
  ?>