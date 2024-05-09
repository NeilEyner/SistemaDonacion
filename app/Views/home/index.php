<?php $session = session() ?>
<?= $this->include('Layouts/header.php'); ?>

<body class="template-color-1 spybody white-version" data-spy="scroll" data-target=".navbar-example2" data-offset="150">
    <!-- Barra de navegación -->
    <?= $this->include('Layouts/nav.php'); ?>

    <!-- Contenido principal -->
    <main class="main-page-wrapper">

        <?= $this->include('home/inicio'); ?>
        <?= $this->include('home/quienes_somos'); ?>
        <?= $this->include('home/donaciones'); ?>
        <?= $this->include('home/preguntas'); ?>
        <?= $this->include('home/contacto'); ?>
        
    </main>



    <!-- Pie de página -->
    <?= $this->include('Layouts/footer.php'); ?>
</body>

</html>