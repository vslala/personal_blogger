    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>js/build/author/user_script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

    <?php if (isset($scripts[0])): ?>
        <?php foreach ($scripts as $s): ?>
        <script type="text/javascript" src="<?= $s; ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>

    </body>
</html>