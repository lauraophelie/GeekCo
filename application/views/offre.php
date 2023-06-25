<!DOCTYPE html>
<html lang="en">
<head>
    <title>Entrer votre offre</title>
</head>
<body>
    <h2>Offre Emploi,stage ou bourse</h2>
        <form action="<?php echo site_url("offre/saveOffre"); ?>" method="post">
        <div>
            <textarea name="offre" cols="30" rows="5" placeholder="Votre texte"></textarea>
        </div>
        <div>
             Lieu:
            <select name="lieu">
                <?php foreach ($lieux as $lieu) { ?>
                    <option value="<?php echo $lieu['nom']; ?>"><?php echo $lieu['nom']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            Type:
            <select name="type">
                <?php foreach ($types as $type) { ?>
                    <option value="<?php echo $type['nom']; ?>"><?php echo $type['nom']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div id="date">
             Date:
             <input type="datetime-local" name="dateFin" >
        </div>
        <div id="sub">
            <input type="submit" value="enter">
        </div>
        </form>
</body>
</html>