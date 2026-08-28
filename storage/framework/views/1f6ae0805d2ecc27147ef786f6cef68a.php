

<?php $__env->startSection('titre', 'Ajouter une parcelle'); ?>

<?php $__env->startSection('contenu'); ?>
    <a href="<?php echo e(route('parcelles.index')); ?>">&larr; Retour à la liste</a>
    <h1>Ajouter une parcelle</h1>

    <form action="<?php echo e(route('parcelles.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo $__env->make('parcelles._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\hp\Desktop\AgriGest\resources\views/parcelles/create.blade.php ENDPATH**/ ?>