<h1>ログインページです</h1>
<form action="<?php echo CURRENT_URI; ?>" method="post">
    <div class="">
        <label for="id">ID</label>
        <input type="text" name="id" id="id">
    </div>
    <div class="">
        <label for="pwd">パスワード</label>
        <input type="text" name="pwd" id="pwd">
    </div>
    <input type="submit" value="ログイン">
</form>
