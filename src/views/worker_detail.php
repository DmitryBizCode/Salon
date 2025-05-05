<?php
session_start();
$workers = [/* same array as in workers.php */];
$id = (int)($_GET['id'] ?? 0);
$worker = null;
foreach ($workers as $w) { if ($w['id'] === $id) { $worker = $w; break; } }
if (!$worker) { echo '<p>Працівника не знайдено</p>'; exit; }
?>
<div class="worker-detail">
    <img src="assets/images/<?=$worker['imageName']?>.jpg" alt="<?=$worker['name']?>">
    <h1><?=$worker['name']?></h1>
    <p><?=$worker['position']?></p>
    <p><?=$worker['details']?></p>
    <a href="/index.php?tab=workers" class="back-button">Назад до списку працівників</a>
</div>