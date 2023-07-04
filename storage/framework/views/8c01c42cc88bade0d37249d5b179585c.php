<!DOCTYPE html>
<html>
<head>
    <title>Contagem Regressiva</title>
</head>
<body>
<?php $__currentLoopData = $estagiarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estagiario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h1>Contagem Regressiva</h1>
    <p>Tempo restante: <?php echo e($days); ?> dias, <?php echo e($hours); ?> horas, <?php echo e($minutes); ?> minutos, <?php echo e($seconds); ?> segundos</p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html>
<?php /**PATH C:\Users\ana.abrantes\Desktop\projetos\estagiarios\estagiarios\resources\views/countdown.blade.php ENDPATH**/ ?>