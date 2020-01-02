<?php

if((isset($_SESSION['log'])) && $_SESSION['log'] === 1){ ?>
	<script>
    window.onload = function () {
        //mensagem
        Materialize.toast('<?php echo $_SESSION['msg'];?>', 8000, 'rounded');
    }
</script>
<?php
    session_destroy();
}

session_start();


if(isset($_SESSION['msg'])): ?>
<script>
    window.onload = function () {
        //mensagem
        Materialize.toast('<?php echo $_SESSION['msg'];?>', 8000, 'rounded');
    }
</script>
<?php
session_unset();
endif;
?>