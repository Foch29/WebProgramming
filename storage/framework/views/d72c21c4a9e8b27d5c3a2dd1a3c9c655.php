

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href="<?php echo e(url('css/common.css')); ?>">
    <title><?php echo $__env->yieldContent('title'); ?></title>

    
    <link rel="icon" type="image/x-icon" href= "<?php echo e(url('/img/Logo.png')); ?>">  
    <?php echo $__env->yieldContent('css'); ?>
    <?php echo $__env->yieldContent("js"); ?>

</head>


<body>

    <nav>
        <a class="link" href="<?php echo e(url('/')); ?>">
            <div id="logo">
                <img id="logo_immagine" src= "<?php echo e(url('/img/Logo.png')); ?>">
                <img id="logo_testo"src="<?php echo e(url('/img/Testo_logo.png')); ?>">
            </div>
        </a>
        
        
            <ul class="navbar_sito">
                <li class="element_nav"><a class="link" href="<?php echo e(url('/')); ?>">Home</a></li>
                <li class="element_nav"><a class="link" href="<?php echo e(url('recipes')); ?>">Recipes</a></li>
                <li class="element_nav"><a class="link" href="<?php echo e(url('weather')); ?>">WeatherHub</a></li>
                <li class="element_nav"><a class="link" href="<?php echo e(url('login')); ?>">Login</a></li>
            </ul>  
    </nav>
        <?php echo $__env->yieldContent("header"); ?>
        <?php echo $__env->yieldContent("main"); ?>
        <footer>
            
        </footer>


</body>
</html>
<?php /**PATH /home/sergio/Desktop/WebProgramming/BlogFunghi/resources/views/layout.blade.php ENDPATH**/ ?>