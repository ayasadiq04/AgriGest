<?php if($errors->any()): ?>
    <div class="errors">
        <strong>Merci de corriger les erreurs suivantes :</strong>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<div class="champ">
    <label for="nom">Nom de la parcelle</label>
    <input type="text" id="nom" name="nom" value="<?php echo e(old('nom', $parcelle->nom ?? '')); ?>" placeholder="Ex : Parcelle Nord">
</div>

<div class="champ">
    <label for="culture">Culture</label>
    <input type="text" id="culture" name="culture" value="<?php echo e(old('culture', $parcelle->culture ?? '')); ?>" placeholder="Ex : Blé">
</div>

<div class="champ">
    <label for="superficie">Superficie (en hectares)</label>
    <input type="number" step="0.01" min="0.01" id="superficie" name="superficie"
           value="<?php echo e(old('superficie', $parcelle->superficie ?? '')); ?>" placeholder="Ex : 3.5">
</div>

<div class="champ">
    <label for="date_plantation">Date de plantation</label>
    <input type="date" id="date_plantation" name="date_plantation"
           value="<?php echo e(old('date_plantation', isset($parcelle) ? $parcelle->date_plantation->format('Y-m-d') : '')); ?>">
</div>

<div class="champ">
    <label for="statut">Statut</label>
    <select id="statut" name="statut">
        <?php $__currentLoopData = $statuts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valeur => $libelle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($valeur); ?>" <?php if(old('statut', $parcelle->statut ?? '') === $valeur): echo 'selected'; endif; ?>>
                <?php echo e($libelle); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>

<button type="submit" class="btn btn-primary">Enregistrer</button>
<a href="<?php echo e(route('parcelles.index')); ?>" class="btn btn-secondary">Annuler</a><?php /**PATH C:\xampp\htdocs\AgriGest\resources\views/parcelles/_form.blade.php ENDPATH**/ ?>