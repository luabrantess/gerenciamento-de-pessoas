<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<form action="<?php echo e(route('ferias.store')); ?>" enctype="multipart/form-data" method="POST">
    <div class="datas grid p-5 gap-3 ">

        <div class="flex">
            <h2 class="text-2xl font-medium">Incluir FIP para <?php echo e($estagiario->nome); ?></h2>
        </div>

        <div class="grid w-full">
            <label class="font-medium">Inicio das férias</label>
            <input placeholder="" name="nascimento" max="2005-12-31" type="date" required
            class="bg-gray-50 outline-0 rounded shadow p-2" value="<?php echo e(Date('Y-m-d', strtotime($estagiario->nascimento))); ?>" />
        </div>

        <div class="grid w-full">
            <label class="font-medium">Fim das férias</label>
            <input placeholder="" name="nascimento" max="2005-12-31" type="date" required
            class="bg-gray-50 outline-0 rounded shadow p-2" value="<?php echo e(Date('Y-m-d', strtotime($estagiario->nascimento))); ?>" />
        </div>

    </div>

    <div class="text-center mt-10">
        <button type="submit"
            class="outline-0 bg-[#002D4B] p-2 rounded shadow text-white font-medium w-[20%] hover:bg-blue-800">Salvar</button>
    </div>
</form>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?><?php /**PATH C:\Users\ana.abrantes\Desktop\projetos\estagiarios\estagiarios\resources\views/ferias.blade.php ENDPATH**/ ?>