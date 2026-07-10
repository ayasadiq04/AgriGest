<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriGest — <?php echo $__env->yieldContent('titre', 'Gestion des parcelles'); ?></title>
    <style>
        :root {
            --vert: #2f7d32;
            --vert-clair: #eaf4ea;
            --gris: #6c757d;
            --rouge: #c0392b;
            --jaune: #b7860b;
            --bordure: #dcdcdc;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg,#eef8ef,#f8fbf8);
            color: #222;
            margin: 0;
        }



        main {
            max-width: 960px;
            margin: 2rem auto;
            background: #fff;
            padding: 2rem;
            border-radius:18px;
            box-shadow:0 15px 35px rgba(0,0,0,.08);
        }

        h1 { margin-top: 0; color: var(--vert); }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th, td {
            padding: 0.6rem 0.8rem;
            text-align: left;
            border-bottom: 1px solid var(--bordure);
        }

        th { background: var(--vert-clair); }

        .btn {
            display: inline-block;
            padding: 0.4rem 0.9rem;
            border-radius: 4px;
            text-decoration: none;
            font-size: 0.9rem;
            border: none;
            cursor: pointer;
        }

        .btn-primary { background: var(--vert); color: #fff; }
        .btn-secondary { background: var(--gris); color: #fff; }
        .btn-edit { background: var(--jaune); color: #fff; }
        .btn-delete { background: var(--rouge); color: #fff; }

        .champ { margin-bottom: 1rem; }
        .champ label { display: block; margin-bottom: 0.3rem; font-weight: 600; }
        .champ input, .champ select {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid var(--bordure);
            border-radius: 4px;
        }

        .badge {
            padding: 0.2rem 0.6rem;
            border-radius: 12px;
            font-size: 0.8rem;
            color: #fff;
        }

        .badge-active { background: var(--vert); }
        .badge-en_repos { background: var(--jaune); }
        .badge-recoltee { background: var(--gris); }

        .errors {
            background: #fdecea;
            border: 1px solid var(--rouge);
            color: var(--rouge);
            padding: 0.8rem 1rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }

        .succes {
            background: var(--vert-clair);
            border: 1px solid var(--vert);
            color: var(--vert);
            padding: 0.8rem 1rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }

        a { color: var(--vert); }
    </style>
</head>
<body>

    <main>
        <?php if(session('succes')): ?>
            <div class="succes"><?php echo e(session('succes')); ?></div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('contenu'); ?>
    </main>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\AgriGest\resources\views/layouts/app.blade.php ENDPATH**/ ?>