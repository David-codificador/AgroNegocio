Rodapé
<script>
<?php
if ($Sessao::retornaMensagem() != '') {
    ?>
        alert("<?= $Sessao::retornaMensagem() ?>");
    <?php
    $Sessao::limpaMensagem();
}
?>
</script>