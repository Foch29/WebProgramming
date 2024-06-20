<?php $__env->startSection("title","WeatherHub"); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(url('/css/base_layout.css')); ?>" >
<link rel="stylesheet" href="<?php echo e(url('/css/weather.css')); ?>" >
<?php $__env->stopSection(); ?>

<?php $__env->startSection("js"); ?>
<script src = "<?php echo e(url('/js/weather_hub_AQ.js')); ?>" defer></script>
<script src = "<?php echo e(url('/js/weather_hub.js')); ?>" defer></script>
<script>
        const videoUrl = "<?php echo e(asset('video/mushrooms_wizard.mp4')); ?>";
    </script>
<?php $__env->stopSection(); ?>


<?php if(isset($json)): ?>
<script>
    let json_da_php = <?php echo json_encode($json, 15, 512) ?>; ///da testare, passo la variabile dal controller alla view a javascript
</script>
<?php endif; ?>

<?php if(isset($air_quality_API)): ?>
<script>
    let url_AV = "<?php echo $air_quality_API; ?>"; // !!per passarlo come url
</script>
<?php endif; ?>


<?php $__env->startSection("header"); ?>
<header>
    <div id="div_header">
        <h1 class="left_side">WeatherHub</h1>
        <p class="left_side" id="paragraph">
            <br>The growth of Mushrooms from the mycelium requires a lot of variables to be just right, but by far the 
            most important one is the humidity of the soil. <br><br>
            This online tool will let you know the chanche of finding mushrooms in the woods today. <br><br>
            
        </p>
    </div>
    <img class="right_side" id="photo_header" src="<?php echo e(url('img/US_Map.png')); ?>">
</header>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("main"); ?>
<div id="seconda_sezione">
    <p class="left_side" id="par_form" >Insert one of the US capital in the box to see if, in <br>the last week,
     the weather has been favorable for <br>mushrooms growth. 
    </p>
    <form class="right_side" id="form" method='post' name ="form_weather">
    <?php echo csrf_field(); ?>
    <div id="div_form">
    <label >CAPITAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="input" name='capital' id='capital' ></label>
    <label > <input id="submit" type='submit' value='Submit'></label>
    </div>
    </form>
</div>
<div id="div_list">
    <p id="par_list">List of states capital for which data is currently available</p>
<ul id="list">
    <?php $__currentLoopData = $list_capital; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $capital): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($capital); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
</div>

<div class ="hidden" id="container_results"> 
    <p id="result">Results</p>
    <p id="par_weather">Weather data of the last few days in <strong><?php echo e(Session::get('capital')); ?></strong>, capital of <strong><?php echo e(Session::get('state_capital')); ?></strong>.</p>
    <div id="container_days">
        <?php for($i = 6; $i > 0; $i--): ?>
        <div  class="border hidden" id="div_sun<?php echo e($i); ?>">
          <p class="text"><?php echo e($i); ?> giorni fa </p>
         <img class="icon" src="<?php echo e(url('/img/sun.png')); ?>">
        </div>
        <?php endfor; ?>
        <?php for($i = 6; $i > 0; $i--): ?>
        <div class="border hidden" id="div_rain<?php echo e($i); ?>">
            <p class="text"><?php echo e($i); ?> giorni fa </p>
            <img class="icon" src="<?php echo e(url('/img/cloud.png')); ?>">
        </div>
        <?php endfor; ?>
    </div>
    <div class="hidden" id="yes_div">
        <div id="yes" >
            <p class="final_result">The condition are right. Search for a hardwood forest nearby, put your trusted hiking 
                boots on and embark on this magic journey.<br></p>
            <p>Go out and pick'em all!</p>
            <div id="da_riempire"></div>
        </div>
    </div>
    <div id="no_div" class="hidden">
    <p id="no" class="final_result">That's too bad! It didn't rain enough in the last few days. You will probably not find any mushrooms outside.<br>
            Come again tommorow to check the weather!<br></p>
    <p class="final_result">In the meantime you can go for a walk and do birdwatching!</p>
    </div>
    
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sergio/Desktop/WebProgramming/BlogFunghi/resources/views/weather.blade.php ENDPATH**/ ?>