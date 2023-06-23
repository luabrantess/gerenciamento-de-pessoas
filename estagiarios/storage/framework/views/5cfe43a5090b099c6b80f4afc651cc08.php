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

        <div class="form p-2 ">


        <div class="navbar bg-base-100">
            <div class="navbar-start">
                <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
                </label>
                </div>
                <a class="btn btn-ghost normal-case text-xl">Lista de Estagiários</a>
            </div>
            <div class="navbar-end">
                <a class="btn" href="<?php echo e(route('estagiario.create')); ?>">Cadastrar novo</a>
            </div>
            </div>

            <?php if(session()->has('message')): ?>
            <div class="alert alert-success">
                <?php if(is_array(session('message'))): ?>
                    <ul>
                        <?php $__currentLoopData = session('message'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($message); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php else: ?>
                    <?php echo e(session('message')); ?>

                <?php endif; ?>
            </div>
            <?php endif; ?>

            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <!-- head -->
                    <thead>
                        <tr>

                            <th>Nome</th>
                            <th>Faculdade</th>
                            <th>Curso</th>
                            <th>Início contrato</th>
                            <th>Fim contrato</th>
                            <th>Aniversário</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $estagiarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estagiario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th>

                                    <!-- The button to open modal -->
                                    <label for="modal-detalhe-estagiario-<?php echo e($estagiario->id); ?>" class="btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 inline">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                        </svg>

                                        <?php echo e($estagiario->nome); ?>

                                    </label>

                                </th>
                                <td><?php echo e($estagiario->faculdade); ?></td>
                                <td><?php echo e($estagiario->curso); ?></td>
                                <td><?php echo e($estagiario->inicio_contrato); ?></td>
                                <td><?php echo e($estagiario->fim_contrato); ?></td>
                                <td><?php echo e($estagiario->nascimento); ?></td>
                                <td>
                                    <a href="<?php echo e(route('estagiario.edit', $estagiario->id)); ?>"><svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg></a>
                                           <!-- The button to open modal -->
                                    <label for="my-modal" class="btn btn-xs btn-circle btn-outline rounded-full">x</label>

                                    <!-- Put this part before </body> tag -->
                                    
                                    <input type="checkbox" id="my-modal" class="modal-toggle" />

                                        <div class="modal">
                                            <div class="modal-box">
                                                <h3 class="font-bold text-lg">Excluir</h3>
                                                <p class="py-4">Tem certeza que deseja excluir esse usuário?</p>
                                                <div class="modal-action">
                                                
                                                    <form  action="<?php echo e(route('estagiario.delete', $estagiario->id)); ?>" method="POST">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                        <button class="btn btn-outline btn-success" type="submit">Sim</button>
                                                        <?php if($message = Session::get('mensage')): ?>
                                                        <div class="alert alert-success shadow-lg">
                                                            <div>
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                                                <span>O usuário foi excluído!</span>
                                                            </div>
                                                        </div>
                                                        <?php endif; ?>
                                                    </form>                                                                                       
                                                    <a role="button"  href="<?php echo e(route('estagiario.index')); ?>" class="btn btn-ghost">Não</a>
                                                </div>
                                            </div>
                                        </div>
                     




                                </td>

                            </tr>


                            <!-- Put this part before </body> tag -->
                            <input type="checkbox" id="modal-detalhe-estagiario-<?php echo e($estagiario->id); ?>"
                                class="modal-toggle" />
                            <div class="modal">
                                <div class="modal-box w-6/12 max-w-5xl">
                                    <h3 class="font-bold text-lg"><?php echo e($estagiario->nome); ?></h3>
                                    <p class="py-4">Inicio de contrato: <?php echo e($estagiario->inicio_contrato); ?></p>
                                    <p class="py-4">Fim de contrato: <?php echo e($estagiario->fim_contrato); ?></p>
                                    <p class="py-4">Faculdade: <?php echo e($estagiario->faculdade); ?></p>
                                    <p class="py-4">CNPJ Faculdade: <?php echo e($estagiario->cnpj_faculdade); ?></p>
                                    <p class="py-4">Curso: <?php echo e($estagiario->curso); ?></p>
                                    <p class="py-4">Expectativa de formação: <?php echo e($estagiario->expectativa_formacao); ?>

                                    </p>
                                    <p class="py-4">Data de nascimento: <?php echo e($estagiario->nascimento); ?></p>
                                    <p class="py-4">Telefone: <?php echo e($estagiario->telefone); ?></p>
                                    <p class="py-4">CPF: <?php echo e($estagiario->cpf); ?></p>
                                    <p class="py-4">Email: <?php echo e($estagiario->email); ?></p>
                                    <p><a href="<?php echo e($estagiario->termo_assinado); ?>">Termo Assinado</p>
                                    <div class="modal-action">
                                        <label for="modal-detalhe-estagiario-<?php echo e($estagiario->id); ?>"
                                            class="btn">Fechar</label>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

        </div>

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH C:\Users\ana.abrantes\Desktop\projetos\estagiarios\estagiarios\resources\views/index.blade.php ENDPATH**/ ?>