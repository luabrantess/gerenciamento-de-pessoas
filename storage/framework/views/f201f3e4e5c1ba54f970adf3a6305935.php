<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div>
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


    <form action="<?php echo e(route('estagiario.update', $estagiario->id)); ?>" method="POST" enctype="multipart/form-data"">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

        <div class="form p-2 ">
            <div class="flex">
                <h2 class="font-bold text-lg p-2">Edição de estagiário</h2>
            </div>

        <div class="flex gap-7 mx-auto w-full p-2 rounded-lg">

            <div class='grid w-full gap-3'>
                <div class="grid w-full">
                    <label class="font-medium" for="nome">Nome completo</label>
                    <input placeholder="" maxlength="100" minlength="5" name="nome" type="text" required
                    title="Escreva no mínimo 5 caractéres" class="bg-gray-50 outline-0 rounded shadow p-2"
                    value="<?php echo e($estagiario->nome); ?>" />
                </div>

                <div class="grid w-full">
                    <label class="font-medium">Data de nascimento</label>
                    <input placeholder="" name="nascimento" max="2005-12-31" type="date" required
                    class="bg-gray-50 outline-0 rounded shadow p-2" value="<?php echo e(Date('Y-m-d', strtotime($estagiario->nascimento))); ?>" />
                </div>

                <div class="grid w-full">
                    <label class="font-medium">CPF</label>
                    <input placeholder="" type="text" name="cpf" required minlength="11" maxlength="11"
                    class="bg-gray-50 outline-0 rounded shadow p-2" value="<?php echo e($estagiario->cpf); ?>" />
                </div>

                <div class="grid w-full">
                    <label class="font-medium">Email</label>
                    <input placeholder="" type="email" name="email" required
                    class="bg-gray-50 outline-0 rounded shadow p-2" value="<?php echo e($estagiario->email); ?>" />
                </div>

                <div class="grid w-full">
                    <label class="font-medium">Telefone</label>
                    <input placeholder="" type="text" name="telefone" value="<?php echo e($estagiario->telefone); ?>" minlength="8" required
                    class="bg-gray-50 outline-0 rounded shadow p-2" />
                </div>

                <div class="grid w-full">
                    <label class="font-medium">Nome da faculdade</label>
                    <input placeholder="" type="text" value="<?php echo e($estagiario->faculdade); ?>" name="faculdade" required
                        class="bg-gray-50 outline-0 rounded shadow p-2" />
                </div>

            </div>

            <div class='grid w-full gap-3'>

                <div class="grid w-full">
                    <label class="font-medium">CNPJ faculdade</label>
                    <input placeholder="" type="text" name="cnpj_faculdade" value="<?php echo e($estagiario->cnpj_faculdade); ?>" minlength="14" maxlength="14"
                        required class="bg-gray-50 outline-0 rounded shadow p-2" />
                </div>
                <div class="grid w-full">
                <label class="font-medium">Nome do curso</label>
                <input placeholder="" type="text" name="curso" value="<?php echo e($estagiario->curso); ?>" required
                    class="bg-gray-50 outline-0 rounded shadow p-2" />
                    </div>
                <div class="grid w-full">
                <label class="font-medium">Expectativa de formação</label>
                <input placeholder="" type="date" name="expectativa_formacao" value="<?php echo e(Date('Y-m-d', strtotime($estagiario->expectativa_formacao))); ?>" required
                    class="bg-gray-50 outline-0 rounded shadow p-2" />
                    </div>
                <div class="grid w-full">
                <label class="font-medium">Termo de estágio assinado</label>
                <input type="file" class="file-input file-input-bordered w-full max-w-xs" name="termo_assinado" value="<?php echo e($estagiario->termo_assinado); ?>"
                    />
                    </div>
                <div class="grid w-full">
                <label class="font-medium">Data inicial do contrato</label>
                <input placeholder="" type="date" name="inicio_contrato" value="<?php echo e(Date('Y-m-d', strtotime($estagiario->inicio_contrato))); ?>" required
                    class="bg-gray-50 outline-0 rounded shadow p-2" />
                </div>
                <div class="grid w-full">
                <label class="font-medium">Data final do contrato</label>
                <input placeholder="" type="date" name="fim_contrato" value="<?php echo e(Date('Y-m-d', strtotime($estagiario->fim_contrato))); ?>" required
                    class="bg-gray-50 outline-0 rounded shadow p-2" />
                </div>
            </div>

        </div>
        <div class="text-center mt-10">
                <button type="submit"
                    class="outline-0 bg-[#002D4B] p-2 rounded shadow text-white font-medium w-[20%] hover:bg-blue-800">Enviar</button>
            </div>



    </form>
</div>



 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH C:\Users\ana.abrantes\Desktop\projetos\estagiarios\estagiarios\resources\views/edit.blade.php ENDPATH**/ ?>