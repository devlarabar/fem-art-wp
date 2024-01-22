<?php
/* Contains footer */
?>

<?php wp_footer(); ?>
</div>
</div>

<footer class="page-footer">
    <div class="footer-content">
        <section class="footer-logo">
            <?php
            if (is_active_sidebar('footer-1')) {
                dynamic_sidebar('footer-1');
            }
            ?>
        </section>
        <nav class="footer-nav">
            <?php
            if (is_active_sidebar('footer-2')) {
                dynamic_sidebar('footer-2');
            }
            ?>
        </nav>
        <section class="footer-socials">
            <?php
            if (is_active_sidebar('footer-3')) {
                dynamic_sidebar('footer-3');
            }
            ?>
        </section>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="js/main.js"></script>

</body>

</html>