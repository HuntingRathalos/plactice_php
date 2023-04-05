<?php

namespace partials;

use lib\Auth;

function topic_header_item($topic)
{
    ?>
<div class="row">
    <div class="col">
        <?php chart($topic); ?>
    </div>
    <div class="col my-5">
        <?php  topic_main($topic);?>
        <?php comment_form($topic); ?>
    </div>
</div>
<?php }

function chart($topic)
{
    ?>
    <canvas id="chart" width="400" height="400" data-likes="<?php echo $topic->likes; ?>" data-dislikes="<?php echo $topic->dislikes; ?>"></canvas>
    <style>
        #chart {
            background-color: gray;
        }
    </style>
<?php }

function topic_main($topic)
{
    ?>
    <div class="">
        <h1><?php echo $topic->title; ?></h1>
        <span class="mr-1 h5">Posted by <?php echo $topic->nickname; ?></span>
        <span class="mr-1 h5">&bull;</span>
        <span class="h5"><?php echo $topic->view; ?> Views</span>
    </div>
    <div class="container text-center my-4">
        <div class="row justify-content-center">
            <div class="likes-green col-auto">
                <div class="display-1"><?php echo $topic->agree; ?></div>
                <div class="h4 mb-0">賛成</div>
            </div>
            <div class="dislikes-red col-auto">
                <div class="display-1"><?php echo $topic->disagree; ?></div>
                <div class="h4 mb-0">反対</div>
            </div>
        </div>
    </div>
<?php }

function comment_form($topic)
{
    ?>
    <?php if(Auth::isLogin()) :?>
    <form action="<?php the_url('topic/detail');?>" method="post">
        <span class="h4">あなたは賛成？それとも反対？</span>
        <input type="hidden" name="topic_id" value="<?php echo $topic->id; ?>">
        <div class="form-group">
            <textarea class="w-100 border-light" name="body" id="body" rows="5"></textarea>
        </div>
        <div class="container">
            <div class="row form-group h4">
                <div class="col-auto d-flex align-items-center pl-0">
                    <div class="form-check-inline">
                        <input class="form-check-inline" type="radio" name="agree" id="agree" value="1" checked>
                        <label for="agree">賛成</label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-inline" type="radio" name="disagree" id="disagree" value="0">
                        <label for="agree">反対</label>
                    </div>
                </div>
                <input class="col btn btn-success shadow-sm" type="submit" value="送信">
            </div>
        </div>
    </form>
<?php else :?>
    <div class="text-center mt-5">
        <div class="mb-2">ログインしてアンケートに参加しよう！</div>
        <a href="<?php the_url('login'); ?>" class="btn btn-lg btn-success">ログインはこちら</a>
    </div>
<?php endif; ?>
<?php } ?>

