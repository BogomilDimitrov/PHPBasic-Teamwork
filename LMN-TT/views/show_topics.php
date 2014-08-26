    <div id="forum">
        <ul class="group">
            <li class="group-head">
                <ul>
                    <li><?= $cat_name?></li>
                    <li>Теми</li>
                    <li>Мнения</li>
                    <li>Последно</li>
                </ul>
            </li>
            <?php
            for($i = 0; $i<count($data);$i++){
            ?>
            <li class="group-body">
                <ul>
                    <li>
                        <h3><a href="categoryId<?=$i+1?>">
                                <?=$data[$i]; ?></a></h3>
                        <span>Всичко свързано с езика С#</span>
                    </li>
                    <li>14</li>
                    <li>37</li>
                    <li>
                        <span class="date-of-last"><span class="fa fa-clock-o"></span>24.08.2014 at 17:55</span>
                        <span class="user-of-last"><span class="fa fa-user"></span> <a href="#">vanko1</a></span>
                    </li>
                </ul>
            <?php
            }
            ?>
            <li class="group-foot"></li>
        </ul>
    </div>
</main>