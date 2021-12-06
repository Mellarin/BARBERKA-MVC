<?php if(!empty($_SESSION['user'])){
    header('location: /'.'profile');
    exit;
}
?>
<section class="register_new">
    <div class="container_new">
        <div class="header_new">
            <h2>Create Account</h2>
            <?php
            if(isset($_SESSION['USEREXISTS'])){
                echo '<h2> User with this email or username exists</h2>';
            }
            unset($_SESSION['USEREXISTS']);
            if(isset($_SESSION['service_message'])){
                echo '<h2> Success! Now you need to activate your account via email!</h2>';
            }
            unset($_SESSION['service_message']);
            if(isset($_SESSION['INVALIDDATA'])){
                echo '<h2> Invalid data!</h2>';
            }
            unset($_SESSION['INVALIDDATA']);
            ?>
        </div>
        <form action="/register" method = "post" id="form" class="form">
            <div class="form-control">
                <label for="username">Username</label>
                <input type="text" placeholder="Alexey" id="username" name="username" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="username">Email</label>
                <input type="email" placeholder="example@example.com" id="email" name="email" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="username">Password</label>
                <input type="password" placeholder="Password" id="password" name="password" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
                <a style="font-size:14px">*Password must be contains at least 1 uppercase</a>
            </div>
            <div class="form-control">
                <label for="username">Password check</label>
                <input type="password" placeholder="Password two" id="password2" name="password2" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
                <a style="font-size:14px">*Password must be contains at least 1 uppercase</a>
            </div>
            <div class="form-control">
                <label for="username">Phone number</label>
                <input type="number" placeholder="+380505028413" id="password2" name="phone" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
                <a style="font-size:14px">*Allows only ukrainian numbers</a>
            </div>
            <div class="form-control">
                <label for="username">Country</label>
                <select id='selector' style="font-size:1.8rem; width:200px" name='country'>
                    <option value="countries"></option>
                </select>
                <small>Error message</small>
            </div>
            <p>Already have an account?<a href="/login"> Login here!</a></p>
            <button>Submit</button>
        </form>
    </div>
    <script>
        fetch("/public/json/ua.json")
            .then(response => response.json())
            .then(ua => {
                    var template = '';
                    for(var country of ua)
                    {
                        template+=`<option value="${country.city}">${country.city}</option>`
                    }
                    const l = document.getElementById('selector')
                    l.innerHTML=template;
                }
            )
    </script>
</section>