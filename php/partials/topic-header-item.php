<?php

namespace partials;

function topic_header_item($topic)
{
    ?>
<div class="row">
    <div class="col">
        <canvas id="chart" width="400" height="400" data-likes="3" data-dislikes="2"></canvas>
        <style>
            #chart {
                background-color: gray;
            }
        </style>
    </div>
    <div class="col my-5">
        <div class="">
            <h1>たこ焼きって美味しいですよね。</h1>
            <span class="mr-1 h5">Posted by テストユーザー</span>
            <span class="mr-1 h5">&bull;</span>
            <span class="h5">36 Views</span>
        </div>
        <div class="container text-center my-4">
            <div class="row justify-content-center">
                <div class="likes-green col-auto">
                    <div class="display-1">2</div>
                    <div class="h4 mb-0">賛成</div>
                </div>
                <div class="dislikes-red col-auto">
                    <div class="display-1">3</div>
                    <div class="h4 mb-0">反対</div>
                </div>
            </div>
        </div>
        <form action="">
            <span class="h4">あなたは賛成？それとも反対？</span>
            <input type="hidden" name="topic_id" value="3">
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
    </div>
</div>
<?php } ?>
