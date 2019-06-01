<?php $title='Billet simple pour l\'Alaska - Jean Forteroche' ?>
<?php ob_start(); ?>

<a href="index.php?action=">Retour à la gestion des billets</a>
<h3><?= $getPost['title'];?> </h3><em>Le <?= $getPost['date_creation'];?></em> <p><?= $getPost['content'];?></p>
<hr>

<?php
while($dataComments=$getComments->fetch())
{
    if($dataComments['visibility']==1)
    {
?>

<p><strong><?=$dataComments['author'];?></strong><em> Le <?=$dataComments['date_comment'];?></em>: <?=$dataComments['comment'];?></p><a href="index.php?action=alertComment&amp;commentId=<?= $dataComments['id'] ?>&amp;postId=<?= $dataComments['id_ticket'];?>">Remonter une alerte sur ce commentaire</a>
<hr>

<?php
    }
    else
    {
?>
        <p><strong><?=$dataComments['author'];?></strong><em> Le <?=$dataComments['date_comment'];?>: En cours de modération. </em></p>
<hr>
<?php
    }
}
?>

<div id="formulaire">
    <h2>Faire un commentaire:</h2>
    <div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-lg-4">
    <form action="index.php?action=newComment&amp;postId=<?=$getPost['id']; ?>" method="post">
        <input type="hidden" name="id">
        <input type="text" placeholder="Nom" name="author"><br/><br/>
        <textarea rows="2" cols="50" name="comment"placeholder="Commentaire"></textarea><br/><br/>
        <input type="submit" class="btn btn-primary" value="Envoyer"><br/>
    </form>
        </div>
        </div>
    </div>
</div>

<?php $content= ob_get_clean() ?>
<?php require('template.php') ?>
    