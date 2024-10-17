<div class="detail">
    <h3 class="detail__title detail__item"><?= $story->title ?></h3>
    <div class="detail__content detail__item"><?= $story->content ?></div>
    <div class="detail__content detail__item"><?= $story->user_id ?></div>
    <div class="detail__content detail__item"><?= $story->date_posted ?></div>
    <a href="/stories/edit/<?= $story->id ?>">Edit</a>
    <a href="/stories/delete/<?= $story->id ?>">Delete</a>
</div>