<div class="form-container_cal">
    <h2>Сalendar time and date</h2>
    <form action="/booking/index/" method="get">
        <div class="form-group">
            <label for="date">data:</label>
            <input type="date" value="<?= $date ?>" id="date" name="date">
        </div>
        <div class="form-group">
            <input type="submit" value="Show hours">
        </div>
    </form>
</div>
<div>
    <form action="/booking/reserve" method="post" >
        <?php for($i=0; $i < 24; $i++) :?>
	            <?php if(!$user) :?>
		            <?php if (in_array($i, $hours)) :?>
                        <lable class="no-user"><?= $i.':00' ?>
                            <input type="checkbox" disabled>
                        </lable>
		            <?php else :?>
                        <lable><?= $i.':00' ?>
                            <input type="checkbox" disabled>
                        </lable>
		            <?php endif ?>
	            <?php else :?>
                <?php if (in_array($i, $hours)) :?>
                    <lable class="no-user"><?= $i.':00' ?>
                        <input type="checkbox" disabled>
                    </lable>
                <?php else :?>
                    <lable><?= $i.':00' ?>
                        <input type="checkbox" name="<?= $i ?>" value= "<?= $i ?>">
                    </lable>
                    <input type="hidden" name="date" value="<?= $date ?>">
                <?php endif ?>
	            <?php endif ?>
        <?php endfor; ?>
        <?php if($user) :?>
            <input class="sub-reserve" type="submit" value="reserve">
        <?php else :?>
            <button><a href="/user/index">Log in</a></button>
        <?php endif; ?>
    </form>
</div>