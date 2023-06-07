<?php

$events = get_posts([
    'numberposts' => 30,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_type' => 'event',
]);

if ($events): ?>
    <div class="events-page__events">
        <div class="events-list">
            <?php foreach ($events as $event):
                $eventPostId = get_field('post', $event->ID);
                $eventPost = $eventPostId ? get_post($eventPostId) : null;

                $eventPostUrl = $eventPost ? get_permalink($eventPost->ID) : get_field('post_url', $event->ID);
                $eventPostTitle = $eventPost ? $eventPost->post_title : get_field('post_name', $event->ID);
                ?>
                <div class="events-list__item">
                    <div class="event-item">
                        <div class="event-item__description"><?= date('d.m.Y', strtotime($event->post_date)); ?> <?= $event->post_content; ?></div>
                        <a href="<?= $eventPostUrl; ?>"><?= $eventPostTitle; ?></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>