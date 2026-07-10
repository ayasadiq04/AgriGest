

<?php $__env->startSection('titre', 'Liste des parcelles'); ?>

<?php $__env->startSection('contenu'); ?>
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h1>Liste des parcelles</h1>
        <a href="<?php echo e(route('parcelles.create')); ?>" class="btn btn-primary">+ Ajouter une parcelle</a>
    </div>

    <?php if($parcelles->isEmpty()): ?>
        <p>Aucune parcelle enregistrée pour le moment.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Culture</th>
                    <th>Superficie (ha)</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $parcelles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parcelle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($parcelle->nom); ?></td>
                        <td><?php echo e($parcelle->culture); ?></td>
                        <td><?php echo e($parcelle->superficie); ?></td>
                        <td>
                            <span class="badge badge-<?php echo e($parcelle->statut); ?>">
                                <?php echo e($parcelle->statutLibelle()); ?>

                            </span>
                        </td>
                        <td>
                            <a href="<?php echo e(route('parcelles.show', $parcelle)); ?>" class="btn btn-secondary">Voir</a>
                            <a href="<?php echo e(route('parcelles.edit', $parcelle)); ?>" class="btn btn-edit">Modifier</a>
                            <form action="<?php echo e(route('parcelles.destroy', $parcelle)); ?>" method="POST" style="display:inline"
                                  onsubmit="return confirm('Supprimer définitivement cette parcelle ?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-delete">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <div style="margin-top:1rem;">
            <?php echo e($parcelles->links()); ?>

        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\AgriGest\resources\views/parcelles/index.blade.php ENDPATH**/ ?>