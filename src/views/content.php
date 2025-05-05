<?php
$tab = $_GET['tab'] ?? 'clients';
?>
<div class="tabs">
    <a href="/index.php?tab=clients" class="<?= $tab === 'clients' ? 'active' : '' ?>">Клієнти</a>
    <a href="/index.php?tab=services" class="<?= $tab === 'services' ? 'active' : '' ?>">Послуги</a>
    <a href="/index.php?tab=appointments" class="<?= $tab === 'appointments' ? 'active' : '' ?>">Записи</a>
    <a href="/index.php?tab=workers" class="<?= $tab === 'workers' ? 'active' : '' ?>">Працівники</a>
</div>
<div class="tab-content">
    <?php
    switch ($tab) {
        case 'clients':
            include __DIR__ . '/clients.php';
            break;
        case 'services':
            include __DIR__ . '/services.php';
            break;
        case 'appointments':
            include __DIR__ . '/appointments.php';
            break;
        case 'workers':
            include __DIR__ . '/workers.php';
            break;
        default:
            include __DIR__ . '/add_appointment.php';
            break;
    }
    ?>
</div>