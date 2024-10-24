<h2>Filemanager</h2>

<?php foreach($list as $item): 
    if ($item != '.' && $item != '..') : ?>
        <li>   
            <?= $item ?>
            <a href="/files/delete/<?= $item ?>">Delete</a>
        </li>
    <?php endif; ?>
<?php endforeach; ?>