<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <?= $this->Html->css(['cake','theme','bootstrap.min','font-face','font-awesome.min','fontawesome-all.min','material-design-iconic-font.min','icon','my']) ?>
    <?= $this->Html->script(['main','animsition.min','jquery-3.2.1.min']) ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
 
</head>
<!-- <body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Cake</span>PHP</a>
        </div>
        <div class="top-nav-links">
            <a target="_blank" rel="noopener" href="https://book.cakephp.org/4/">Documentation</a>
            <a target="_blank" rel="noopener" href="https://api.cakephp.org/">API</a>
        </div>
    </nav> -->
    <main class="main">
        <div class="container-fluid">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
     var csrfToken = $('meta[name="csrfToken"]').attr('content');
    </script>

    <script>
    $('#category_id').on('change', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
            }
        });
        
        var data = $(this).val();
       
        $.ajax({
            url: "http://localhost:8765/users/adminpanel",
            data: {'status':data},
            type: "json",
            method: "get",
            success:function(response){
                // code will work in case of json retun from the ajax start here
                // res = JSON.parse(response);
                // var tabel_html = '<table><thead><tr><th>id</th><th>name</th><th>email</th><th>image</th><th>created_at</th><th> Actions</th></tr></thead>';
                // tabel_html += '<tbody>';
                // $.each(res, function (key, val) {
                //         tabel_html += '<tr><td>'+val.id+'</td><td>'+val.name+'</td><td>'+val.email+'</td><td></td><td></td><td class="actions"></td></tr>';
                    
                // })
                // tabel_html +='</tbody>';
                // tabel_html +='</table>';
                // $('.table-responsive').html(tabel_html);
                 // code will work in case of json retun from the ajax end here
                 
                // code will work in case cakephp element render start here \
                $('.table-responsive').html(response);
                // code will work in case cakephp element render end here 
            }
        });
    });
</script>

    <?= $this->Html->script(['cdnjquery'])?>
     <?= $this->Html->script(['plugins'])?>
    <?= $this->Html->script(['user'])?> 
    <?= $this->fetch('script') ?>
</body>
</html> 
