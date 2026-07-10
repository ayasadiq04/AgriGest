

<?php $__env->startSection('titre', 'Fiche parcelle - ' . $parcelle->nom); ?>

<?php $__env->startSection('contenu'); ?>
    <a href="<?php echo e(route('parcelles.index')); ?>">&larr; Retour à la liste</a>

    <h1><?php echo e($parcelle->nom); ?></h1>

    <table>
        <tr>
            <th>Culture</th>
            <td><?php echo e($parcelle->culture); ?></td>
        </tr>
        <tr>
            <th>Superficie</th>
            <td><?php echo e($parcelle->superficie); ?> ha</td>
        </tr>
        <tr>
            <th>Date de plantation</th>
            <td><?php echo e($parcelle->date_plantation->format('d/m/Y')); ?></td>
        </tr>
        <tr>
            <th>Statut</th>
            <td><span class="badge badge-<?php echo e($parcelle->statut); ?>"><?php echo e($parcelle->statutLibelle()); ?></span></td>
        </tr>
    </table>

    <div style="margin-top:1.5rem;">
        <a href="<?php echo e(route('parcelles.edit', $parcelle)); ?>" class="btn btn-edit">Modifier</a>
        <form action="<?php echo e(route('parcelles.destroy', $parcelle)); ?>" method="POST" style="display:inline"
              onsubmit="return confirm('Supprimer définitivement cette parcelle ?');">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-delete">Supprimer</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\AgriGest\resources\views/parcelles/show.blade.php ENDPATH**/ ?>