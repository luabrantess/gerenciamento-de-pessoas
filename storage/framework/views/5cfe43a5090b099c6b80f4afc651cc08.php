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
                            <th>Contrato</th>
                            <th>Aniversário</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                            date_default_timezone_set('America/Sao_Paulo');
                        ?>

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
                                <td>De <?php echo e(date( 'd/m/Y' , strtotime($estagiario->inicio_contrato))); ?> a
                                <?php echo e(date( 'd/m/Y' , strtotime($estagiario->fim_contrato))); ?> </td>

                                <?php
                                    $aniversario = Carbon\Carbon::create($estagiario->nascimento)->setYear(date('Y'));
                                    $proximo_aniversario = $aniversario->isFuture() ? $aniversario : $aniversario->addYear();
                                    $falta_quanto = $proximo_aniversario->diffForHumans();
                                ?>


                                <td><?php echo e(Carbon\Carbon::create($estagiario->nascimento)->format('d/m')); ?> (<?php echo e($falta_quanto); ?>)</td>
                                
                                <td>
                                <details class="dropdown dropdown-left dropdown-end p-3">
                                    <summary class="m-1 btn"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                                    </svg>
                                    </summary>
                                    
                                    <ul class="p-2 shadow menu dropdown-content z-[1] bg-base-100 rounded-box w-52">
                                        <li><a href="<?php echo e(route('fip.create', $estagiario->id)); ?>">Adicionar FIP</a></li>
                                        <li><a href="<?php echo e(route('estagiario.edit', $estagiario->id)); ?>">Editar estagiário</a></li>
                                        <li><label for="modal-deletar-usuario-<?php echo e($estagiario->id); ?>">
                                        Excluir estagiário
                                    </label></li>
                                    </ul>
                                </details>

                                    <!-- Put this part before </body> tag -->

                                    <input type="checkbox" id="modal-deletar-usuario-<?php echo e($estagiario->id); ?>" class="modal-toggle" />

                                        <div class="modal">
                                            <div class="modal-box">
                                                <h3 class="font-bold text-lg">Excluir</h3>
                                                <p class="py-4">Tem certeza que deseja desativar o estagiário <?php echo e($estagiario->nome); ?>?</p>
                                                <div class="modal-action">

                                                    <form  action="<?php echo e(route('estagiario.delete', $estagiario->id)); ?>" method="POST">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                        <button class="btn btn-outline btn-success" type="submit">Sim</button>

                                                    </form>
                                                    <label for="modal-deletar-usuario-<?php echo e($estagiario->id); ?>" class="btn">Fechar</label>
                                                </div>
                                            </div>
                                        </div></li>
                                    

                                    <!-- The button to open modal -->
                                    
                                </td>
                            </tr>

                            <!-- Put this part before </body> tag -->
                            <input type="checkbox" id="modal-detalhe-estagiario-<?php echo e($estagiario->id); ?>"
                                class="modal-toggle" />
                            <div class="modal">
                                <div class="modal-box max-w-5xl">
                                    <h3 class="font-bold text-lg"><?php echo e($estagiario->nome); ?> </h3>
                                    <p class="py-4"><a class="btn btn-sm" target="_blank" href="<?php echo e(asset('storage/' . $estagiario->termo_assinado)); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="inline w-5 h-5">
                                            <path fill-rule="evenodd" d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z" clip-rule="evenodd" />
                                            <path d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
                                          </svg>
                                          Termo Assinado
                                        </a></p>

                                    <div class="border-2 rounded mt-2 p-2 space-y-2 grid grid-cols-6">
                                        <h1 class="font-medium text-xl">Fips assinadas</h1>

                                        <?php $__currentLoopData = $estagiario->fips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <p class="mt-2 flex w-[90%] gap-5 ">
                                            <a class="btn w-full" target="_blank" href="<?php echo e(asset('storage/' . $fip->fip_assinada)); ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                                  </svg>                                                
                                                  <?php echo e(substr(strftime('%B%Y', strtotime($fip->mes)), 0, 3)); ?>, <?php echo e(strftime('%Y')); ?>

                                            </a>
                                        </p>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>

                                    <div class="border-2 rounded  mt-2 p-2" >
                                        <h1 class="font-medium text-xl">Dados pessoais</h1>
                                        <p>Data de nascimento: <?php echo e(date( 'd/m/Y' , strtotime($estagiario->nascimento))); ?></p>
                                        <p class="">Telefone: <?php echo e($estagiario->telefone); ?></p>
                                        <p class="">CPF: <?php echo e($estagiario->cpf); ?></p>
                                        <p class="">Email: <?php echo e($estagiario->email); ?></p>
                                    </div>

                                    <div class="border-2 rounded  mt-2 p-2" >
                                        <h1 class="font-medium text-xl">Dados universitários</h1>
                                        <p class="">Inicio de contrato: <?php echo e(date( 'd/m/Y' , strtotime($estagiario->inicio_contrato))); ?></p>
                                        <p class="">Fim de contrato: <?php echo e(date( 'd/m/Y' , strtotime($estagiario->fim_contrato))); ?></p>
                                        <p class="">Faculdade: <?php echo e($estagiario->faculdade); ?></p>
                                        <p class="">CNPJ Faculdade: <?php echo e($estagiario->cnpj_faculdade); ?></p>
                                        <p class="">Curso: <?php echo e($estagiario->curso); ?></p>
                                        <p class="">Expectativa de formação: <?php echo e(date( 'd/m/Y' , strtotime($estagiario->expectativa_formacao))); ?></p>
                                    </div>

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