<?php

$events = get_posts([
    'numberposts' => 5,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_type' => 'event',
]);

if ($events): ?>
    <div class="sidebar__events">
        <div class="events-list">
            <?php foreach ($events as $event):
                $eventPostId = get_field('post', $event->ID);
                $eventPost = $eventPostId ? get_post($eventPostId) : null;

                $eventPostUrl = $eventPost ? get_permalink($eventPost->ID) : get_field('post_url', $event->ID);
                $eventPostTitle = $eventPost ? $eventPost->post_title : get_field('post_name', $event->ID);
                ?>
                <div class="events-list__item">
                    <div class="event-item">
                        <div class="event-item__description"><b><?= date('d.m.Y', strtotime($event->post_date)); ?></b> <?= $event->post_content; ?></div>
                        <a href="<?= $eventPostUrl; ?>"><?= $eventPostTitle; ?></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <center><a class="sidebar__events-link" href="/events/" style="font-weight: bold;margin-top: 5px;display: block;">- Все события -</a></center>
    </div>
<?php endif; ?>