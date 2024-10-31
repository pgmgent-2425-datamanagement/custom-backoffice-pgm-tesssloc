<div class="card">
    <h3 class="card__name card__item"><?= $user->firstName . ' ' . $user->lastName ?></h3>
    <div class="card__username card__item"><?= $user->username ?></div>
    <div class="card__profilePic card__item"><img src="/images/<?= $user->profilePic ?>" alt="<?= $user->username ?>"></div>
    <div class="card__email card__item"><?= $user->email ?></div>
    <a href="/users/<?= $user->id ?>" class="card__link card__item">View more</a>
    <a href="/stories?user_id=<?= $user->id ?>&search=<?= $_GET['search'] ?? '' ?>" class="card__link card__item">View Stories</a>
    <a class="edit_button button" href="/users/edit/<?= $user->id ?>">Edit</a>
    <a class="delete_button button" href="/users/delete/<?= $user->id ?>">Delete</a>
</div>