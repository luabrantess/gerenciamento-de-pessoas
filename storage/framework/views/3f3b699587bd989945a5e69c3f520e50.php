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

    <form action="<?php echo e(route('estagiario.store')); ?>" enctype="multipart/form-data" method="POST">
        <?php echo csrf_field(); ?>

        <div class="form p-2 ">
            <div class="flex">
                <h2 class="font-bold text-lg p-2">Cadastro de estagiário</h2>
            </div>
        <div class="flex gap-7 mx-auto p-2 rounded-lg">

            <div class='grid w-full gap-3'>
                <div class="grid w-full">
                    <label for="nome" class="font-medium">Nome completo</label>
                    <input placeholder="" maxlength="100" minlength="5" name="nome" type="text" title="Escreva no mínimo 5 caracteres" class="bg-gray-50 outline-0 rounded shadow p-2 <?php echo e($errors->has('nome') ?  'input input-bordered input-error' : ''); ?>" />
                </div>

                <div class="grid w-full">
                    <label class="font-medium">Data de nascimento</label>
                    <input placeholder="Data de nascimento" name="nascimento" max="2005-12-31" type="date" class="bg-gray-50 outline-0 text-sm rounded shadow p-2 <?php echo e($errors->has('nascimento') ?  'input input-bordered input-error' : ''); ?>" />
                </div>
                <div class="grid w-full">
                    <label class="font-medium">CPF</label>
                    <input placeholder="" type="text" name="cpf" minlength="11" maxlength="11"  class="bg-gray-50 outline-0 rounded shadow p-2 <?php echo e($errors->has('cpf') ?  'input input-bordered input-error' : ''); ?>" />
                </div class=>
                <div class="grid w-full">
                    <label class="font-medium">Email</label>
                    <input placeholder="" type="email" name="email" class="bg-gray-50 outline-0 rounded shadow p-2 <?php echo e($errors->has('email') ?  'input input-bordered input-error' : ''); ?>" />
                   </div>
                <div class="grid w-full">
                    <label class="font-medium">Telefone</label>
                    <input placeholder="" type="text" name="telefone" minlength="8" class="bg-gray-50 outline-0 rounded shadow p-2 <?php echo e($errors->has('telefone') ?  'input input-bordered input-error' : ''); ?>" />
                </div>
                <div class="grid w-full">
                    <label class="font-medium">Nome da universidade</label>
                    <input placeholder="" type="text" name="faculdade" class="bg-gray-50 outline-0 rounded shadow p-2 <?php echo e($errors->has('faculdade') ?  'input input-bordered input-error' : ''); ?>" />
                </div>
            </div>
            <div class="grid w-full gap-3">
                <div class="grid w-full">
                    <label class="font-medium">CNPJ universidade</label>
                    <input placeholder="" type="text" name="cnpj_faculdade" minlength="14" maxlength="14" class="bg-gray-50 outline-0 rounded shadow p-2 <?php echo e($errors->has('cnpj_faculdade') ?  'input input-bordered input-error' : ''); ?>" />
                </div>
                <div class="grid w-full">
                    <label class="font-medium">Nome do curso</label>
                    <input placeholder="" type="text" name="curso" class="bg-gray-50 outline-0 rounded shadow p-2 <?php echo e($errors->has('curso') ?  'input input-bordered input-error' : ''); ?>" />
                </div>
                <div class="grid w-full">
                    <label class="font-medium" >Expectativa de formação</label>
                    <input placeholder="Expectativa da formação" type="date" name="expectativa_formacao" class="bg-gray-50 outline-0 rounded shadow p-2 <?php echo e($errors->has('expectativa_formacao') ?  'input input-bordered input-error' : ''); ?>" />
                </div>
                <div class="grid w-full">
                    <label class="font-medium">Termo de estágio assinado</label>
                    <input type="file" name="termo_assinado" class="file-input file-input-bordered w-full max-w-xs <?php echo e($errors->has('termo_assinado') ?  'input input-bordered input-error' : ''); ?>" />
                </div>
                <div class="grid w-full">
                    <label class="font-medium">Data inicial do contrato</label>
                    <input placeholder="Data inicial do contrato" type="date" name="inicio_contrato" class="bg-gray-50 outline-0 rounded shadow p-2 text-sm <?php echo e($errors->has('inicio_contrato') ?  'input input-bordered input-error' : ''); ?>" />
                </div>
                <div class="grid w-full">
                    <label class="font-medium">Data final do contrato</label>
                    <input placeholder="Data final do contrato" type="date" name="fim_contrato" class="date bg-gray-50 outline-0 rounded shadow p-2 text-sm <?php echo e($errors->has('fim_contrato') ?  'input input-bordered input-error' : ''); ?>" />
                </div>
            </div>
            

        </div>
        <div class="text-center mt-7">
                <button type="submit" class="outline-0 bg-[#002D4B] p-2 rounded shadow text-white font-medium w-[20%] hover:bg-blue-800">Salvar</button>
            </div>

        <?php if($message = Session::get('mensage')): ?>
        <div class="alert alert-success shadow-lg">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>O usuário foi criado!</span>
            </div>
        </div>
        <?php endif; ?>

    </form>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH C:\Users\ana.abrantes\Desktop\projetos\estagiarios\estagiarios\resources\views/create.blade.php ENDPATH**/ ?>