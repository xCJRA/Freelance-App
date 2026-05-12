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

    <!-- FOOTER: Desglose adaptable -->
    <?php if (!empty($breakdown)): ?>
        <?php $count = count($breakdown); ?>
        <div class="card-footer bg-light p-0">

            <?php if ($count <= 3): ?>
                <div class="row row-cols-<?php echo $count; ?> g-0 text-center">
                    <?php foreach ($breakdown as $i => $item): ?>
                        <div class="col py-2 px-1<?php echo ($i < $count - 1) ? ' border-end' : ''; ?>">
                            <p class="text-muted small text-uppercase mb-0" style="font-size: 0.6rem;">
                                <?php echo CHtml::encode($item['label']); ?>
                            </p>
                            <p class="fs-6 fw-bold mb-0">
                                <?php echo CHtml::encode($item['value']); ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>

            <?php elseif ($count === 4): ?>
                <div class="row row-cols-2 g-0 text-center">
                    <?php foreach ($breakdown as $i => $item): ?>
                        <div class="col py-2 px-1
                            <?php echo ($i % 2 === 0) ? 'border-end' : ''; ?>
                            <?php echo ($i < 2) ? 'border-bottom' : ''; ?>">
                            <p class="text-muted mb-0" style="font-size: 0.65rem; text-transform: uppercase;">
                                <?php echo CHtml::encode($item['label']); ?>
                            </p>
                            <p class="fw-bold mb-0 small">
                                <?php echo CHtml::encode($item['value']); ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>

            <?php else: ?>
                <ul class="list-unstyled mb-0 px-2 py-1">
                    <?php foreach ($breakdown as $i => $item): ?>
                        <?php if ($i > 0): ?>
                            <li><hr class="my-1" style="opacity: 0.15;"></li>
                        <?php endif; ?>
                        <li class="d-flex justify-content-between align-items-center py-1">
                            <span class="text-muted small text-uppercase" style="font-size: 0.7rem;">
                                <?php echo CHtml::encode($item['label']); ?>
                            </span>
                            <span class="fw-bold small">
                                <?php echo CHtml::encode($item['value']); ?>
                            </span>
                        </li>
                    <?php endforeach; ?>
                </ul>

            <?php endif; ?>

        </div>
    <?php endif; ?>

</div>