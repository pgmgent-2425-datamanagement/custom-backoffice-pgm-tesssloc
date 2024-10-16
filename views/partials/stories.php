<div class="card">
    <h3 class="card__title card__item"><?= $story->title ?></h3>
    <div class="card__content card__item"><?= $story->content ?></div>
    <a href="/stories/<?= $story->id ?>" class="card__link card__item">View more</a>
    <a href="/stories/edit/<?= $story->id ?>">Edit</a>
    <a href="/stories/delete/<?= $story->id ?>">Delete</a>
</div>