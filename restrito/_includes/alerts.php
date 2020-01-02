<?php
    if(isset($_SESSION['msg'])): ?>
        <script>
            window.onload = function () {
                //mensagem
                Materialize.toast('<?php echo $_SESSION['msg'];?>', 8000, 'rounded');
            }
        </script>
<?php
        unset($_SESSION['msg']);
    endif;
?>