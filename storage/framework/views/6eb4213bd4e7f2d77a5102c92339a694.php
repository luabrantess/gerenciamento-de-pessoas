<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    <?php if($errors->any()): ?>
    <div class="max-w-2xl mx-1">
        <div class="alert alert-error my-5">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
          </svg>
        <p>Erro na criação do estagiário.</p>
    </div>
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><span class="text-error-content bg-error my-2 p-1"><?php echo e($error); ?></span></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    </div>
    <?php endif; ?>



    <div class="m-5">


        <form action="<?php echo e(route('fip.store')); ?>" enctype="multipart/form-data" method="POST">
        <?php echo csrf_field(); ?>

        <div class="form p-2 ">
            <div class="flex">
                <h2 class="font-medium text-2xl">Incluir FIP para <?php echo e($estagiario->nome); ?></h2>
            </div>

            <div class="w-full">
                <input type="hidden" name="estagiario" value="<?php echo e($estagiario->id); ?>">

                <div class="my-5 w-full">

                    <select title="Selecione o mês da FIP" class="select select-bordered w-full max-w-xs" name="mes" id="mes">
                        <option disabled selected>Selecione o mês</option>
                        <?php
                            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                            date_default_timezone_set('America/Sao_Paulo');
                            // Force locale
                            setlocale(LC_ALL, 'pt_BR.utf-8', 'ptb', 'pt_BR', 'portuguese-brazil', 'portuguese-brazilian', 'bra', 'brazil', 'br');
                        ?>

                        <?php $__currentLoopData = range(1,12); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <option value="01-<?php echo e(sprintf('%02d', $mes)); ?>-<?php echo e(date('Y')); ?>">
                            <?php echo e(Carbon\Carbon::parse("01-{$mes}-". date('Y'))->formatLocalized('%B %Y')); ?>

                        </option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="my-5">
                    <input type="file" title="Selecione a FIP assinada" name="fip_assinada" class="file-input file-input-bordered w-full max-w-xs" />
                </div>

            </div>

            <button class="btn btn-outline btn-success mr-auto" type="submit">Salvar FIP</button>


        </form>
    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH C:\Users\ana.abrantes\Desktop\projetos\estagiarios\estagiarios\resources\views/fip/create.blade.php ENDPATH**/ ?>