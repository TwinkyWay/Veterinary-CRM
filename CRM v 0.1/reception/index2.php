<?php require_once '../access.comp.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Заявка</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" media="print" href="../css/print.css">
</head>
<body>
    <?php require_once PATH_ROOT.'header.html.php'; ?>
    <?php require_once 'result_recept.comp.php'; ?>
    <div class="owner_info">
        <fieldset disabled="true">
            <legend><a href="#">Карта владельца</a></legend>
            <form action="post">
                <label>ФИО:<input type='text' name='name' value="<?=$owner['name']?>"></label>
                <label>Адрес:<input type='text' name='address' value="<?=$owner['address']?>"></label>
                <label>Телефон:<input type='text' name='phone' value="<?=$owner['phone']?>"></label>
                <label>Email:<input type='email' name='email' value="<?=$owner['email']?>"></label>
            </form>
        </fieldset>
    </div>
    <?php if ($_SESSION['doctor']['id']==4):?>
    <?php require_once 'reception.comp.php'; ?>
		<div>
			<a href="index.php?idAnimal=<?=$info['animal_id']?>&idOwner=<?=$owner['id']?>&recept=<?=$info['id']?>">Редактировать</a>
		</div>
	<?php endif;?>
    <div class="pet">
        <div class="pet__info">
            <fieldset disabled="true">
                <legend><?=$info['animal_name']?></legend>
                <form>
                    <label>Кличка: <input type="text" name="animal_name" value="<?=$info['animal_name']?>"></label>
                    <label>Вид: <input type="text" name="animal_type" value="<?=$info['type_name']?>"></label>
                    <label>Пол: <input type="text" name="animal_gender" value="<?=$info['gender_name']?>"></label>
                    <label>Порода: <input type="text" name="animal_breed" value="<?=$info['breed']?>" readonly></label>
                    <label>Дата заболевания<input type="date" value="<?=$info['date_illness']?>"></label>
                    <label>Первичный диагноз<textarea class="input_print" name="text2"> <?=$info['text2']?></textarea></label>
                    <label>Окончательный диагноз<textarea class="input_print" name="text6"><?=$info['text6']?></textarea></label>
                    <label>Анамнез<textarea class="input_print" name="text1"><?=$info['text1']?></textarea></label>
                    <label>Клинические признаки<textarea class="input_print" name="text3"><?=$info['text3']?></textarea></label>
                    <label>Рекоммендации<textarea class="input_print" name="text5"><?=$info['text5']?></textarea></label>
                </form>
            </fieldset>
        </div> <!-- end pet__info -->
        <div class="pet__ambulance">
            <fieldset class="pet__ambulance-types">
                <legend>Лечебная помощь</legend>
                <form method="post">
                <?php if (!empty($order_info['cons_price'])): ?>
                	<p>Расходные материалы:</p><div class="pet__ambulance-price1 pet__ambulance-visible"><?=$order_info['cons_price']?></div>
                <?php endif;?>                
                <?php foreach($order_info['detail'] as $order): ?>
					<div class="service">
						<p><?=$order['name']?></p><div class="pet__ambulance-price1 pet__ambulance-visible"><?=$order['price']?></div>
					</div>
				<?php endforeach; ?>
                <input type="text" value="<?=$order_info['sum']?>">
                <!--
                    <input type="checkbox" id="pet__ambulance-type1"><p>Прививка</p><div class="pet__ambulance-price1">1200 руб.</div>
                    <input type="checkbox" id="pet__ambulance-type2"><p>Обезболивающее</p><div class="pet__ambulance-price2">1200 руб.</div>
                    <input type="checkbox" id="pet__ambulance-type3"><p>Наложение шва</p><div class="pet__ambulance-price3">1200 руб.</div>
                    <input type="checkbox" id="pet__ambulance-type4"><p>Гипс</p><div class="pet__ambulance-price4">1200 руб.</div>
                    <input type="checkbox" id="pet__ambulance-type5"><p>Чистка</p><div class="pet__ambulance-price5">1200 руб.</div>
                    <input type="checkbox" id="pet__ambulance-type6"><p>Операция</p><div class="pet__ambulance-price6">1200 руб.</div>
                    <input type="checkbox" id="pet__ambulance-type7"><p>Удаление</p><div class="pet__ambulance-price7">1200 руб.</div>
                    <input type="checkbox" id="pet__ambulance-type8"><p>Стрижка</p><div class="pet__ambulance-price8">1200 руб.</div>
                    <input type="text" value="Итого:">
                    <input type="submit" value="Выбрать">-->
                 </form>
            </fieldset>
            <fieldset class="pet__ambulance-doctor" disabled="true">
                <legend>Данные ветеринара</legend>
                <form>
                    <label>Доктор<input type="text" name="doctorSurname" value="<?=$info['doc_name']?>"></label>
                    <label>Телефон:<input type='text' name='phone' value="<?=$info['doc_phone']?>"></label>
                    <label>Дата приема<input type="date" value="<?=$info['date_reception']?>"></label>
                    <!--
                    <label>Примечание<textarea placeholder="Примечание"></textarea></label>-->
                </form>
            </fieldset>
        </div> <!-- end pet__ambulance -->
        <div class="pet__signs">
            <div class="clientsign">
                <label>Подпись клиента: <input type="text"></label>
            </div>
            <div class="doctorsign">
                <label>Подпись ветеринара: <input type="text"></label>
            </div>
            <label>Дата: <input type="text"></label>
        </div>
        <div class="issue">
            <input type="submit" value="Оформить">
            <button onclick="window.print();">Печать</button>
        </div>
    </div> <!-- end pet -->

</body>
</html>