<div class="detail">
    <h3 class="detail__title detail__item">Titel: <?= $story->title ?></h3>
    <div class="detail__content detail__item">Inhoud: <?= $story->content ?></div>
    <div class="detail__user detail__item">Schrijver: <a href="/users/<?= $user->id ?>"><?= $user->username ?></a></div>
    <div class="detail__posted detail__item">Gepost op: <?= $story->date_posted ?></div>
    <a class="edit_button button" href="/stories/edit/<?= $story->id ?>">Edit</a>
    <a class="delete_button button" href="/stories/delete/<?= $story->id ?>">Delete</a>
</div>