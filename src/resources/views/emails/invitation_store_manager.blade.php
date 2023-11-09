<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>店舗代表者登録用メール</title>
</head>

<body>
    <main>
        <div class="invitation-introduction">
            <p>{{$user->name}}様</p>
            <p>お疲れ様です。</p>
            <p>当社店舗代表者として登録するためのURLを送付いたします。</p>
            <p>以下に記載のURLより必要事項をご入力の上、ご登録くださいますようお願いいたします。</p>
        </div>
        <div class="invitation-page">
            <p class="invitation-text">代表者登録はこちらよりお進みください</p>
            <p class="invitation-url"></p>
        </div>
    </main>
</body>

</html>