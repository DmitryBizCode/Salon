<?php
session_start();
$workers = [
    ['id'=>1,'name'=>'Вероніка','position'=>'Перукар, майстер із зачісок','imageName'=>'worker1','details'=>'Спеціаліст із зачісок для святкових подій. Досвід роботи: 5 років.'],
    ['id'=>2,'name'=>'Альбіна','position'=>'Перукар, колорист','imageName'=>'worker1','details'=>'Майстер з фарбування волосся. Експерт у техніках балаяж та омбре.'],
    ['id'=>3,'name'=>'Діана','position'=>'Перукар, майстер із складних фарбувань','imageName'=>'worker1','details'=>'Фахівець у складних фарбуваннях. Досвід роботи: 7 років.'],
    ['id'=>4,'name'=>'Ольга','position'=>'Косметолог','imageName'=>'worker1','details'=>'Надає професійні косметологічні послуги.'],
    ['id'=>5,'name'=>'Марія','position'=>'Масажист','imageName'=>'worker1','details'=>'Виконує класичний та антицелюлітний масаж.'],
    ['id'=>6,'name'=>'Крістіна','position'=>'Масажист','imageName'=>'worker1','details'=>'Спеціаліст з релаксуючого масажу.'],
    ['id'=>7,'name'=>'Вікторія','position'=>'Майстер манікюру та педикюру','imageName'=>'worker1','details'=>'Надає послуги манікюру та педикюру.'],
    ['id'=>8,'name'=>'Влада','position'=>'Майстер манікюру та педикюру','imageName'=>'worker1','details'=>'Надає послуги манікюру та педикюру.'],
    ['id'=>9,'name'=>'Єлизавета','position'=>'Адміністратор','imageName'=>'worker1','details'=>'Організовує запис клієнтів. Досвід роботи: 3 роки.'],
    ['id'=>10,'name'=>'Валерія','position'=>'Менеджер','imageName'=>'worker1','details'=>'Відповідає за керування персоналом.'],
    ['id'=>11,'name'=>'Таїсія','position'=>'Юрист','imageName'=>'worker1','details'=>'Юридичний супровід бізнесу.'],
    ['id'=>12,'name'=>'В\'ячеслав','position'=>'Охоронець','imageName'=>'worker1','details'=>'Забезпечує безпеку клієнтів та персоналу.'],
    ['id'=>13,'name'=>'Назар','position'=>'Охоронець','imageName'=>'worker1','details'=>'Забезпечує охорону майна та безпеку персоналу.'],
    ['id'=>14,'name'=>'Дарія','position'=>'Прибиральниця','imageName'=>'worker1','details'=>'Забезпечує чистоту салону.'],
];
?>
<div class="workers-container">
    <h1>Наші працівники</h1>
    <ul class="worker-list">
        <?php foreach ($workers as $worker): ?>
            <li class="worker-card">
                <a href="worker_detail.php?id=<?=$worker['id']?>">
                    <img src="assets/images/<?=$worker['imageName']?>.jpg" alt="<?=$worker['name']?>">
                    <div class="worker-info">
                        <h2><?=$worker['name']?></h2>
                        <p><?=$worker['position']?></p>
                    </div>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
