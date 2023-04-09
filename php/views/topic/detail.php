<?php

namespace view\topic\detail;

function index($topic, $comments)
{
    \partials\topic_header_item($topic, false);
    ?>
    <ul class="list-unstyled my-5">
        <?php foreach($comments as $commeent) : ?>
            <?php
            $agree_label = $comment->agree ? '賛成' : '反対';
            $agree_cls = $comment->agree ? 'budge-success' : 'badge-dander';
            ?>
            <li class=" bg-white shadow-sm mb-3 rounded p-3">
                <h2 class="h4 mb-2">
                    <span class="badge mr-1 aling-bottom <?php echo $agree_cls ; ?>"><?php echo $agree_label; ?></span>
                    <span class="text-body"><?php echo $comment->body ; ?></span>
                </h2>
                <span>Commented by <?php echo $comment->nickname; ?></span>
            </li>
        <?php endforeach ; ?>
    </ul>
<?php }
