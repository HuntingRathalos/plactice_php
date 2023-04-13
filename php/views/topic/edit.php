<?php

namespace view\topic\edit;

function index($topic)
{
    ?>
    <h1 class="h2 mb-3">トピック作成</h1>
        <div
            class="bg-white p-4 shadow-sm mx-auto rounded"
        >
            <form action="">
                <div class="form-group">
                    <label for="">タイトル</label>
                    <input type="text" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="">ステータス</label>
                    <select name="" id="" form-control>
                        <option value="1" selected>公開</option>
                        <option value="0">非公開</option>
                    </select>
                </div>
                <div
                    class="d-flex align-items-center
                "
                >
                <div class="">
                    <input
                        class="btn btn-primary shadow-sm mr-3"
                        type="submit"
                        value="送信"
                    />
                </div>
                    <div class="">
                        <a href="">戻る</a>
                    </div>
                </div>
            </form>
        </div>
<?php } ?>
