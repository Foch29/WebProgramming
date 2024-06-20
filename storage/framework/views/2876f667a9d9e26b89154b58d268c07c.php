<html>
    <head>
        <link rel='stylesheet' href="<?php echo e(url('css/login.css')); ?>">
        <link rel='stylesheet' href="<?php echo e(url('css/common.css')); ?>">
        <script src ="<?php echo e(url('js/register.js')); ?>" defer></script>
    </head>
    <body>
        
        <main>
            <div id="div_form">
                <form id="form" method='post' name ="form_register">
                    <?php echo csrf_field(); ?>
                    <label class ="small" id="top_label">Username <input class="input" name='username' id='username' value='<?php echo e(old("username")); ?>'></label>
                    <label class ="small">Email <input class="input" name='email' id='email' value ="<?php echo e(old('email')); ?>"></label>
                    <label class ="small">Password <input class="input" type='password' name='password' id='password' value ="<?php echo e(old('password')); ?>"></label>
                    <label class ="small">Confirm password <input class="input" type="password" name="confirm" id="confirm" value="<?php echo e(old('confirm')); ?>"></label>
                    <div id="div_nel_form">
                        <label id="bottom_label"> <input id="submit" type='submit' value='Submit'></label>
                        <div class='error_div'>
                             <?php if($error == 'empty_fields'): ?>
                            <p class="error">Enter the required fields</p>
                            <?php elseif($error == 'wrong'): ?>
                            <p class="error">Wrong credentials</p>
                            <?php elseif($error == "existing"): ?>
                            <p class="error">Username already taken. Choose a different one</p>
                            <?php endif; ?> 
                            
                        </div>
                    </div>
                </form>
                <p id="link_reg">Already have an account? Login <a id="Here" href= "<?php echo e(url('login')); ?>">Here</a><p>
            </div>
            <div id="bottom">
                <div class="item_bottom">Help</div>
                <div class="item_bottom">Privacy</div>
                <div class="item_bottom">Terms</div>
            </div>      
        </main>

        
    </body>
</html>
<?php /**PATH /home/sergio/Desktop/WebProgramming/BlogFunghi/resources/views/register.blade.php ENDPATH**/ ?>