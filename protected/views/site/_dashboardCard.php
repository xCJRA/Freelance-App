<?php
/**
 * Vista parcial reutilizable - Dashboard Card
 *
 * @var string     $title      Título de la card
 * @var string|int $total      Total general a mostrar
 * @var string     $icon       Clase de icono Bootstrap (ej: 'bi bi-people')
 * @var string     $colorClass Clase de color Bootstrap (ej: 'text-bg-primary')
 * @var array      $breakdown  array de ['label' => '', 'value' => '']
 */
?>

<div class="card shadow-sm" style="width: 15rem;">

    <!-- HEADER -->
    <div class="card-header <?php echo isset($colorClass) ? $colorClass : 'text-bg-secondary'; ?> d-flex align-items-center gap-2">
        <?php if (isset($icon)): ?>
            <i class="<?php echo $icon; ?>"></i>
        <?php endif; ?>
        <span class="fw-semibold"><?php echo CHtml::encode($title); ?></span>
    </div>

    <!-- BODY -->
    <div class="card-body text-center py-4">
        <p class="display-4 fw-bold mb-0"><?php echo CHtml::encode($total); ?></p>
        <p class="text-muted small text-uppercase letter-spacing-1 mb-0">Total</p>
    </div>

    <!-- FOOTER: Desglose -->
    <?php if (!empty($breakdown)): ?>
        <div class="card-footer bg-light">
            <div class="row text-center">
                <?php foreach ($breakdown as $item): ?>
                    <div class="col border-end last-border-0">
                        <p class="text-muted small text-uppercase mb-0">
                            <?php echo CHtml::encode($item['label']); ?>
                        </p>
                        <p class="fs-5 fw-bold mb-0">
                            <?php echo CHtml::encode($item['value']); ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

</div>