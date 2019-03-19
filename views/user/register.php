<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign in</title>
    <link rel="stylesheet" type="text/css" href="/template/css/style.css">
    <link rel="stylesheet" type="text/css" href="/template/css/chosen.css">
    <script src="/template/js/main.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="form">
            <form action="/register/" method="post">
                <div class="login">
                    <div class="input"><input required id="name" type="text" name="name" placeholder="ФИО" value=""/></div>
                    <br><br>
                    <div class="input"><input required id="email" type="text" name="email" placeholder="e-mail" value=""/></div>
                    <br><br>

                    <div class="input">
                        <select id="regions" name="region" required>
                            <option value="regions">Регион</option>
                            <?php foreach($regions as $region): ?>
                                <option value="<?php echo $region; ?>"><?php echo $region; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div><br/>
                    <div class="input cities">

                    </div><br/>
                    <div class="input areas">

                    </div>
                    <br/>
                </div>
                <div class="submit">
                    <div class="input"><input id="submit" type="submit" name="submit" value="Go!"></div>
                </div>
            </form>
        </div>
    </div>
    <script src="/template/js/jquery.js"></script>
    <script src="/template/js/chosen.jquery.js"></script>
    <script>
    $("select").chosen();
    </script>
</body>
</html>
