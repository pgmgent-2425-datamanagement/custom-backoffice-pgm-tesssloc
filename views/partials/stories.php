<div class="story">
    <h3 class="story__title story__item"><?= $story->title ?></h3>
    <div class="story__content story__item"><?= $story->content ?></div>
    <a href="/stories/<?= $story->id ?>" class="story__link story__item">Read more</a>
    <a href="/stories/edit/<?= $story->id ?>">Edit</a>
    <a href="/stories/delete/<?= $story->id ?>">Delete</a>
</div>