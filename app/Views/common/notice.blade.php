<?php if (!empty($success)) { ?>
<div class="alert alert-success alert-dismissible fade show fs-7" role="alert">
    <?=$success?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>


<?php if (!empty($error)) { ?>
<div class="alert alert-danger alert-dismissible fade show fs-7" role="alert">
    <?=$error?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>