<div class="card">
    <h3 class="card__name card__item"><?= $user->firstName . ' ' . $user->lastName ?></h3>
    <div class="card__username card__item"><?= $user->username ?></div>
    <div class="card__email card__item"><?= $user->email ?></div>
    <a href="/users/<?= $user->id ?>" class="card__link card__item">View Profile</a>
    <a href="/users/edit/<?= $user->id ?>">Edit</a>
    <a href="/users/delete/<?= $user->id ?>">Delete</a>
</div>