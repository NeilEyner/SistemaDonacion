<?php $session = session() ?>
<?= $this->include('Layouts/header.php'); ?>

<body class="">
    <!-- Barra de navegación -->
    <?= $this->include('Layouts/nav.php'); ?>

    <!-- Contenido principal -->
    <main>
        <?= $this->include('home/inicio'); ?>
        <?= $this->include('home/quienes_somos'); ?>
        <?= $this->include('home/donaciones'); ?>
        <?= $this->include('home/contacto'); ?>
        <?= $this->include('home/preguntas'); ?>
    </main>

    <!-- Pie de página -->
    <?= $this->include('Layouts/footer.php'); ?>
</body>
</html>
