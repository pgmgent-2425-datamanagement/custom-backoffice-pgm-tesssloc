<h2>Filemanager</h2>

<ul class="card_list">
    <?php foreach($list as $item): 
    if ($item != '.' && $item != '..') : ?>
        <li class="card file_card">  
            <img class="file_card__img" src="/images/<?= $item ?>" alt="">
            <div class="buttons">
                <a class="edit_button button" href="/files/edit/<?= $item ?>">Edit</a>
                <a class="delete_button button" href="/files/delete/<?= $item ?>">Delete</a>
            </div>
        </li>
    <?php endif; ?>
<?php endforeach; ?>
</ul>
