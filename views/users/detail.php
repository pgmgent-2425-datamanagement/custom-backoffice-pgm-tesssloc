<div class="detail">
    <h3 class="detail__title detail__item"><?= $user->firstName . ' ' . $user->lastName?></h3>
    <div class="card__profilePic__detail card__item"><img src="/images/<?= $user->profilePic ?>" alt="<?= $user->username ?>"></div>
    <div class="detail__content detail__item">Email: <?= $user->email ?></div>
    <div class="detail__content detail__item">Username: <?= $user->username ?></div>
    <a class="edit_button button" href="/users/edit/<?= $user->id ?>">Edit</a>
    <a class="delete_button button" href="/users/delete/<?= $user->id ?>">Delete</a>
</div>